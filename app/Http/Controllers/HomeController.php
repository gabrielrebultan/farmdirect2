<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\user;
use App\farmproduct;
use App\postedproduct;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

         $this->middleware('unregistereduser');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('unregistered.homepage');
    }
    public function sales()
    {
        $fproducts = farmproduct::all();
        $firstimg='';
        $sales = postedproduct::all(); //where statement 
        return view('unregistered.sales',compact('firstimg','sales','fproducts'));
    }

    //display the products when searched or filtered
    public function productSearchFilter(Request $request){
        $fproducts = farmproduct::all();
        $firstimg= '';
        $sales = postedproduct::where('productName',$request->productName)->get();
        //return $sales;
        session()->flash('message', 'Showing result(s) for '. $request->productName);
        return view('unregistered.sales',compact('sales','firstimg','fproducts'));
    }
    public function viewProduct($id)
    {
        $sale = postedproduct::find($id); //where statement 
        $images="";
        $farmer = user::where('id',$sale->user_id)->get();
       
        $bids = postedproduct::find($id)->bid;
        //return $bids;
        
        return view('unregistered.viewbid',compact('sale','farmer','images','bids'));
    }

    //function for retreiving search intelisense
    public function searchProduct(Request $request){

        $searchKey = $request->term;
        $products = farmproduct::where('productName','LIKE','%'.$searchKey.'%')->get();
        $result='';
        
        if(count($products)==0){
            $result[] = 'No matches found.';
        }else{
            foreach($products as $product){
                $result[] = $product->productName;
            }
        }
        return $result;
    }
    

    
    
}
