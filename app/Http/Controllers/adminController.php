<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\farmproduct;
use App\variety;
use App\user;
use App\postedproduct;
use DB;

class adminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('admin.adminDashboard');
    }
    public function userList()
    {
        $users = user::all()->where('activated',1);
        return view('admin.adminUsers',compact('users'));
    }
    public function registrants()
    {
        $registrants = user::all()->where('activated',0);
        return view('admin.adminRegistrants',compact('registrants'));
    }
    public function activateRegistrants($id){
        $registrants = user::find($id);
        $registrants->activated = 1;
        $registrants->save();
        return redirect('admin/users');

    }
    public function deactivateUsers($id){
        $userToDeactivate = user::find($id);
        $userToDeactivate->activated = 0;
        $userToDeactivate->save();
        return redirect('admin/users');
    }
    public function deactivatedUsers()
    {
        $deactivateds = user::all()->where('activated',0);
        return view('admin.adminDeactivatedUsers',compact('deactivateds'));
    }
    public function feedbacks()
    {
        return view('admin.adminFeedback');
    }
    public function farmproducts()
    {
        $farmproducts = farmproduct::all();
        // $farmproducts = farmproduct::all()->variety;
        // $farmvarieties = variety::all();
        // $farmvarieties = DB::table('varieties')->where('farmproduct_id',1)->get();
        // $farmvarieties = farmproduct::find(1)->variety;
        return view('admin.adminFarmProducts',compact('farmproducts','farmvarieties'));
    }
    public function addFarmproducts()
    {
        return view('admin.adminAddNewFarmProducts');
    }
    public function editFarmproducts($id)
    {
        $farmprod = farmproduct::find($id);
        $varnames = DB::table('varieties')->where('farmproduct_id',$id)->get();
        return view('admin.adminEditFarmProducts',compact('farmprod','varnames'));
    }
    public function update(Request $request, $id){
        $farmproduct = farmproduct::find($id);
        $this->validate($request, [
                'productName'=>'required',
            ]);
        $farmproduct->productName = $request->productName;
        $farmproduct->save();
        //old code para sa edit
        // $variety = variety::find(DB::table('varieties')->where('farmproduct_id',$id)->value('id'));
        $variety = new variety;
        $variety->variety = $request->variety;
        $variety->farmproduct_id = $id;
        $variety->save();
        return redirect('admin/farm-products');
    }
    public function store(Request $request)
    {
        $farmproduct = new farmproduct;
        $this->validate($request, [
                'productName'=>'required|unique:farmproducts',
            ]);
        $farmproduct->productName = $request->productName;
        $farmproduct->save();
        $variety = new variety;
        $variety->variety = $request->variety;
        // $var1=$request->productName;
        $variety->farmproduct_id = DB::table('farmproducts')->where('productName',$farmproduct->productName)->value('id');
        $variety->save();
        return redirect('admin/farm-products');
    }
    public function deleteFarmProducts($id){
        DB::table('varieties')->where('farmproduct_id',$id)->delete();
        $farmproducts = farmproduct::find($id);
        $farmproducts->delete();
        return redirect('admin/farm-products');
    }
    public function deleteVariety($id, $ids){
        $farmvariety = variety::find($ids);
        return $farmvariety;
        // $farmvariety->delete();
        // return redirect('admin/edit-farm')

    }
    
    public function viewSales()
    {
        // $farmers = DB::table('users')->where('type','farmer')->get();
        $farmers = user::all()->where('type','Farmer');
        //$farmers = postedproduct::all()->user()->where('type','Farmer');
        // $postedsales = postedproduct::all();
        return view('admin.adminViewSales',compact('farmers','postedsales'));
    }
    public function addSale()
    {
       return view('admin.adminAddSale');
    }
    public function editSale()
    {
       return view('admin.adminEditSale');
    }

    public function lookingToBuy()
    {
        $buyers = user::where('type','buyer')->get();
        return view('admin.adminViewLookingToBuy',compact('buyers'));
    }

    public function editUser($id)
    {
        $users=user::find($id);
        return view('admin.adminEditUserProfile',compact('users'));
    }
    public function updateUser(Request $request, $id){
        
        $users = user::find($id);
        $this->validate($request, [
                'fname'=>'required',
                'lname'=>'required',
                'email'=>'required',
            ]);
        $users->fname = $request->fname;
        $users->middleinitial = $request->middleinitial;
        $users->lname = $request->lname;
        $users->contactno = $request->contactno;
        $users->email = $request->email;
        $users->save(); 
        return redirect('admin/users');
    }

    public function reports()
    {
        $farmproducts = farmproduct::all();
        return view('admin.adminReports', compact('farmproducts'));
    }


    
}


