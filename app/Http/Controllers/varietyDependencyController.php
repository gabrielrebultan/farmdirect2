<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\farmproduct;

class varietyDependencyController extends Controller
{
     //for product variety dependency
    public function productVariety(Request $request){
        $varieties=farmproduct::find($request->id)->variety;
        //$varieties = variety::select('variety','id')->where('farmproduct_id',$request->id)->take(100)->get();
        //where statement == if farmproduct_id will match the selected item's id
        return response()->json($varieties);
    }

}
