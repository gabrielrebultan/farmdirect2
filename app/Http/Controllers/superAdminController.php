<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class superAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('superadmin');
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function userList()
    {
        return view('superadmin.superadminUsers');
    }

    public function registrants()
    {
        return view('superadmin.superadminRegistrants');
    }

    public function deactivatedUsers()
    {
        return view('superadmin.superadminDeactivatedUsers');
    }
    public function feedbacks()
    {
        return view('superadmin.superadminFeedback');
    }
    public function farmproducts()
    {
        return view('superadmin.superadminFarmProducts');
    }
    public function addFarmproducts()
    {
        return view('superadmin.superadminAddNewFarmProducts');
    }

     public function viewSales(){
        return view('admin.adminViewSales');
    }
    public function addSales(){
       return view('admin.adminAddSale');

    }

    public function lookingToBuy(){
        return view('admin.adminViewLookingToBuy');
    }
     
     
   
}
