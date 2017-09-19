<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;
use App\farmproduct;
use App\postedproduct;
use App\User;
use App\bid;
use App\notification;
use App\varieties;
use App\tmpLookingtobuy;
use App\lookingtobuy;
use View;

class buyersController extends Controller
{

      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('buyer');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filterItems = farmproduct::all();
        $firstimg='';
        $sales=postedproduct::all(); //where statement 
        
        if($sales){
            $errormsg="No Sales Uploaded"; 
            return view('buyers.buyerHomepage',compact('sales','errormsg','filterItems'));
        }else
            return view('buyers.buyerHomepage',compact('sales','firstimg','filterItems'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showProduct($id)
    {
        $product = postedproduct::find($id);
        $owner= user::find($product->user_id);  //gets  the owner of the sale.
        $bids = postedproduct::find($product->id)->bid;
        //return $bids;
        // get users bid
        
        $myBid = user::find(Auth::user()->id)->bid->where('postedproduct_id', $product->id);

        if(count($bids)!=0){
            $myBid = bid::where([ 
                ['postedproduct_id','=',$product->id],
                ['user_id','=',Auth::user()->id]
                //['accepted','=',0],
            ])->get();
        }
        $totalProfit = 0;
        $images='';
        return view('buyers.buyerViewSale',compact('product','totalProfit','images','owner','bids','myBid'));
    }

    public function Bid(Request $request)
    {
         if($request->has('placeBid')){
            //return $request->all();
            $userid=Auth::user()->id;
            $bid = new Bid;//create new instance
            $this->validate($request,[
                'price'=>'required',
                'quantity'=>'required',
                'paymentoption'=>'required',
            ]);
            $bid->user_id = $userid;
            $bid->postedproduct_id = $request->postedproductid;
            $bid->quantity = $request->quantity;
            $bid->price = $request->price;
            $bid->accepted = 0;
            $bid->paymentoption = $request->paymentoption;

            session()->flash('message',' Your Bid was Successfully placed'); //flash session
            $bid->save();
            return redirect('/buyer/view-sale/'.$request->postedproductid);
            
        }
        if($request->has('editBid')){
            //return $request->bidQuantity;
            $editedBid = bid::find($request->bidId);
            //return $editedBid;
            // $this->validate($request,[
            //     'price'=>'required',
            //     'quantity'=>'required',
            //     'paymentoption'=>'required',
            // ]);
            $editedBid->price = $request->bidPrice;
            $editedBid->quantity = $request->bidQuantity;
            $editedBid->paymentOption = $request->bidpaymentoption;
            //$editedBid->updated_at = date('M j,Y');

            session()->flash('message',' Your Bid was Successfully Changed'); //flash session
            $editedBid->save();
            return redirect()->route('buyer.bid',$request->bidProductid);
            
        }
    }
    public function cancelBid($id){
        $bid = bid::find($id);
        $bid->delete();
        session()->flash('message','Your bid was successfully canceled');
        return redirect()->back();
    }

    public function lookingFor()
    {
        $farmProducts = farmproduct::all();
        $inputProducts = tmpLookingtobuy::all();
        $lookingfor = lookingtobuy::where('user_id',Auth::user()->id)->get();
        //return $lookingfor;
        return view('buyers.buyerLookingFor',compact('farmProducts','inputProducts','lookingfor'));
    }
    // for adding looking for
    public function addLookingForProduct(Request $request){
        
        $tmpLookingFor = new tmpLookingtobuy;
        $this->validate($request,['productName'=>'required']);
        $prodName = farmproduct::find($request->productName);
        $tmpLookingFor->productName = $prodName->productName;
        $tmpLookingFor->variety = $request->variety;
        $tmpLookingFor->save();
    }
     public function submitLookingForProduct(Request $request){ //submits the whole thread
        $products = tmpLookingtobuy::all();
        $lookingFor = new lookingtobuy;
        $this->validate($request,[
            'threadName'=>'required',
            'threadDescription'=>'required'
        ]);
        $lookingFor->user_id = Auth::user()->id;
        $lookingFor->title = $request->threadName;
        $prodArray = array();
        $varietyArray = array();
        foreach($products as $p){
            $prodArray[]= $p->productName ;
            $varietyArray[]= $p->variety;
        }
        $lookingFor->productName = implode(',',$prodArray);
        $lookingFor->variety = implode(',',$varietyArray);
        $lookingFor->detail = $request->threadDescription;
        $lookingFor->save();
        DB::table('tmp_lookingtobuys')->truncate();
        session()->flash('message','Your thread was successfully created;');
        return redirect('/buyer/looking-for');
    }
    public function cancelLookingFor(){ //cancel looking for
        DB::table('tmp_lookingtobuys')->truncate();
        return redirect()->route('buyer.homepage');
    }
    public function removeProduct($id){ //remove product on looking to buy
        $prods = tmpLookingtobuy::find($id);
        $prods->delete();
        return redirect('/buyer/looking-for#list');
    }


     public function joinedSales()
    {
        // $farmer = user::where('type','Farmer');
        // $farmername='';
        $myBids = user::find(Auth::user()->id)->bid;//pending bids;
        return view('buyers.buyerViewSales',compact('myBids'));
    }
     public function transactionHistory()
    {
        return view('buyers.buyerTransactionHistory');
    }

   
    //display the products when searched or filtered
    public function productSearchFilter(Request $request){
        $filterItems = farmproduct::all();
        $sales = postedproduct::all()->where('productName',$request->productName);
        $firstimg= '';
        session()->flash('message', 'Showing result(s) for '. $request->productName);
        return view('buyers.buyerHomepage',compact('sales','firstimg','filterItems'));
    }

    public function editProfile()
    {
       $userdetails=Auth::user(); //get user 
       return view('buyers.buyerEditProfile',compact('userdetails'));
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
        return redirect('/buyer');
    }

     //edit buyer's password
    public function editPassword()
    {
       $user = Auth::user(); //gets the user table
       return view('buyers.buyerEditPassword',compact('user'));
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
            return redirect()->route('buyer.homepage');
        }
        
        return redirect()->route('buyer.showchangepass');//refresh
    }

    
}
