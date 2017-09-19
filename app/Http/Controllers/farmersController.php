<?php

namespace App\Http\Controllers;

//use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\farmproduct;
use App\postedproduct;
use App\User;
use App\varieties;
use View;
use App\Bid;
use App\lookingtobuy;
use App\Notifications\BidAccepted;
use App\Notifications\SaleCanceled;
use App\Notifications\SaleEdited;


class farmersController extends Controller
{

    /**
    * Create a new controller instance.
    *
    * @return void
    */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('farmer');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $firstimg='';
        $userid= Auth::user()->id; //user's id
        $sales=postedproduct::all()->where('user_id',$userid); //where statement 
        $saleswbid=postedproduct::all()->where('user_id',$userid); //where statement 
        if($sales){
            $errormsg="No Sales Uploaded"; 
            return view('farmers.farmerHome',compact('sales','errormsg'));
        }else
            return view('farmers.farmerHome',compact('sales','firstimg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $farmProducts=farmProduct::all();
        $variety='';
        return view('farmers.farmerAddSale',compact('farmProducts','$variety'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $prodName=farmproduct::find($request->productName); //gets the name of product from farmproducts by the id on the select
        $userid= Auth::user()->id;
        $product = new postedproduct;
        $this->validate($request,[
            'productName'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'images'=>'required',
            'sdate'=>'required|date',
            'edate'=>'required|date|after:sdate',
            'tradeInstruction'=>'required',
        ]);
        $product->user_id=$userid;//contains the id of the current user;
        $product->productName = $prodName->productName;
        $product->variety = $request->variety;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
       
        $images=array();
        if($files=$request->file('images')){
            foreach($files as $file){
                $name = str_random(5) .'.'. $file->getClientOriginalExtension();
                $file->move(public_path('images/Uploaded'),$name);
                $images[] = $name;
            }
        }
        $product->images=implode(',',$images);
        $product->sdate = $request->sdate;
        $product->edate = $request->edate;
        $product->tradeInstruction = $request->tradeInstruction;

        session()->flash('message','New Sale Added');
        $product->save();
        return redirect('farmer');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    //additional functions -----------------------------------------------------------

    public function lookedProducts()
    {
        //$threads = user::has('lookingtobuy')->first();
        
        $threads = lookingtobuy::with('user')->get();
        //return $threads;
        return view('farmers.farmerLookingFor',compact('threads'));
    }

    public function lookedProductsSpecific($id)
    {
        $lookingfor = lookingtobuy::find($id);
        //return $lookingfor;
        return view('farmers.farmerViewLookingFor',compact('lookingfor'));
    }

    public function transactionHistory()
    {
       return view('farmers.farmerTransactionHistory');
    }
    
    public function editProfile()
    {
       $userdetails=Auth::user(); //get user 
       return view('farmers.farmerEditProfile',compact('userdetails'));
    }

    public function updateProfile(Request $request)
    {
       
       $uid=Auth::user()->id;
       $newProfile = User::find($uid);
       $this->validate($request,[
            'email' => 'required|string|email|max:100',
            'contactno' => 'required|string|max:12',
            
        ]);

        $newProfile->email = $request->email;
        $newProfile->contactno = $request->contactno;

        session()->flash('message','Your Profile was Updated Successfully'); //flash session
        $newProfile->save();
        return redirect('/farmer');
    }

    public function viewProfile()
    {
       return view('farmers.farmerProfile');
    }

    public function manageSale($id)
    {
       $farmproducts = farmproduct::all();
       $product=postedproduct::find($id);
       $owner= user::find(Auth::user()->id);  //gets  the owner of the sale.
       $bids = postedproduct::find($product->id)->bid;
       $acceptedBids = postedproduct::find($product->id)->acceptedBid;//determine if the farmer accepted
       $totalProfit=0;
       $totalQuantity=0;
       $images='';
       return view('farmers.farmerManageSale',compact('farmproducts','product','totalProfit','images','owner','bids','acceptedBids','totalQuantity'));
    }

   

    public function editSale(Request $request)
    {
        //return $request->file('images');
        $prodName=farmproduct::find($request->productName); //gets the name of product from farmproducts by the id on the select
        $updatedproduct = postedproduct::find($request->productid);
        $this->validate($request,[
            'productName'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'images'=>'required',
            'sdate'=>'required|date',
            'edate'=>'required|date|after:sdate',
            'tradeInstruction'=>'required'
        ]);
        $updatedproduct->productName = $prodName->productName;
        $updatedproduct->variety = $request->variety;
        $updatedproduct->price = $request->price;
        $updatedproduct->quantity = $request->quantity;
       
        $images=array();
        if($files=$request->file('images')){
            foreach($files as $file){
                $name = str_random(5) .'.'. $file->getClientOriginalExtension();
                $file->move(public_path('images/Uploaded'),$name);
                $images[] = $name;
            }
        }
        //return $images;
        $updatedproduct->images = implode(',',$images);
        $updatedproduct->edate = $request->edate;
        $updatedproduct->tradeInstruction = $request->tradeInstruction;

        $bidders = postedproduct::find($request->productid)->bid;
        foreach($bidders as $bidder){
            user::find($bidder->user_id)->notify(new SaleEdited); //notify every bidder of the sale
        }

        session()->flash('message','Editing Sale Successfull');
        $updatedproduct->save();
        return redirect()->route('farmer.managesale',$request->productid);
    }
    // accepting bids
    public function acceptBid(Request $request){
        
        $acceptedBid = bid::find($request->id); 
        //updating the total quantity (total q - accepted q)
        $updateProduct = postedproduct::find($acceptedBid->postedproduct_id);  

        //sends notification
        if($acceptedBid->accepted != 1){
            user::find($acceptedBid->user_id)->notify(new BidAccepted);
            $updateProduct->quantity -= $acceptedBid->quantity;
        }
        
        $acceptedBid->accepted = 1;
        //$acceptedBid->updated_at = new dateTime; //UPDATE SANA NG UPDATED_AT
        session()->flash('message','Bid Accepted');
        $acceptedBid->save();
        $updateProduct->save();

        
    }
    

    //get the bidder pprofile
    public function getBidder(Request $request){
        $bidder = user::find($request->id);
        return response()->json($bidder);
    }

    //edit farmer's password
    public function editPassword()
    {
       $user = Auth::user(); //gets the user table
       return view('farmers.farmerEditPassword',compact('user'));
    }

    public function changePassword(Request $request)
    {
       $id = Auth::user()->id; //gets the user table
       $farmer = User::find($id);

       $this->validate($request,[
            'oldpassword' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',
        ]);
        
       if ( Hash::check($request->oldpassword,$farmer->password) ){
            $farmer->password = bcrypt($request->password);
            session()->flash('message','Your Password is Successfully changed'); //flash session
            $farmer->save();
            return redirect('/farmer/editprofile');
        }
        
        return redirect('/farmer/editprofile');
    }

    //cancel / delete sale
    public function cancelSale($id){
        $canceledSale = postedproduct::find($id);
        $bidders = postedproduct::find($id)->bid;
        foreach($bidders as $bidder){
            user::find($bidder->user_id)->notify(new SaleCanceled); //notify every bidder of the sale
        }

        $canceledSale->delete();

        session()->flash('message','Sale was Canceled successfully.');
        return redirect()->route('farmer.homepage');
    }

    
}