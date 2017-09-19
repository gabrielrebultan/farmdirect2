<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\postedproduct;

class searchController extends Controller
{
    public function productSearch(){
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
