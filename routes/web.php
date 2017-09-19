<?php


//=====================================================================================================================
//                                     Farm Direct Routes
//=====================================================================================================================

//=====================================================================================================================
//Unregistered User Routes
//=====================================================================================================================

// Route::get('user-registration','CustomRegisterController@showRegisterForm')->name('custom.register');// name will refer to the route in the action field of the form
// Route::post('user-registration','CustomRegisterController@register'); //post method when the form is submitted

Route::get('/test', function() {
    return view('unregistered.test');
});

Route::get('/homepage/recoveraccount', function() {
    return view('unregistered.recoveraccount');
});
//redirect after registration to display the instructions
Route::get('/fd-registration-requirements', function() {
    return view('unregistered.requirements');
});

Route::get('/view-product/{id}','HomeController@viewProduct');

Route::get('/sales', 'HomeController@sales');
Route::post('/sales', 'HomeController@productSearchFilter')->name('unregistered.searchfilter');

//=====================================================================================================================
//Farmer Routes
//====================================================================================================================


//for viewing farmers profile
Route::get('farmer/profile','farmersController@viewProfile');

//for adding sales
Route::get('farmer/add-sale','farmersController@create');
Route::post('farmer/add-sale','farmersController@store')->name('farmer.addsale');

// getting bidder profile
Route::get('/getBidder','farmersController@getBidder');

//for managing Sales
Route::get('farmer/manageSale/{id}','farmersController@manageSale')->name('farmer.managesale');
//for editing sale
Route::post('farmer/manageSale/{id}','farmersController@editSale')->name('farmer.editsale');
//canceling sale
Route::post('cancelsale/{id}','farmersController@cancelSale')->name('farmer.cancelsale');

//accept bid
Route::get('/acceptBid','farmersController@acceptBid');

//getAcceptedBids
Route::get('/getAcceptedBids','farmersController@getAcceptedBids');

//for editing profile
Route::get('/farmer/editprofile','farmersController@editProfile');//display the account
Route::post('/farmer/editprofile','farmersController@updateProfile')->name('farmer.editprofile');//update the acc

//change password: Farmer
Route::get('/farmer/change-password','farmersController@editPassword' )->name('farmer.showchangepass');
Route::post('/farmer/change-password','farmersController@changePassword' )->name('farmer.changepassword');

//for transaction History
Route::get('farmer/transaction-history','farmersController@transactionHistory');

//for lookedProducts
Route::get('farmer/looking-for','farmersController@lookedProducts');
//for viewing SPECIFIC lookedProducts
Route::get('farmer/looking-for/view/{id}','farmersController@lookedProductsSpecific')->name('farmer.viewLookingfor');



//homepage
Route::get('/farmer','farmersController@index')->name('farmer.homepage'); 



//=====================================================================================================================
//Buyer Routes
//=====================================================================================================================

Route::get('/buyer' ,'buyersController@index')->name('buyer.homepage'); //index

//for editing profile
Route::get('/buyer/editprofile','buyersController@editProfile');//display the account
Route::post('/buyer/editprofile','buyersController@updateProfile')->name('buyer.editprofile');//update the acc

Route::get('/buyer/transaction-history' , 'buyersController@transactionHistory');

Route::get('/buyer/my-sales' ,'buyersController@joinedSales' );

Route::get('/buyer/looking-for' , 'buyersController@lookingFor');

//change password: Buyer
Route::get('/buyer/change-password', 'buyersController@editPassword')->name('buyer.showchangepass');
Route::post('/buyer/change-password', 'buyersController@changePassword')->name('buyer.changepassword');


Route::get('/buyer/view-sale/{id}' , 'buyersController@showProduct')->name('buyer.viewsale');
Route::post('/buyer/view-sale/{id}' ,'buyersController@Bid')->name('buyer.bid');
//cancel bid
Route::get('cancelbid/{id}' ,'buyersController@cancelBid')->name('buyer.cancelbid');

//filter home by searching
Route::post('/buyer' , 'buyersController@productSearchFilter')->name('buyer.search/filter');

//adding looking to buy
Route::get('/addLookingToBuy', 'buyersController@addLookingForProduct');
//submit looking to buy
Route::post('/buyer/looking-for', 'buyersController@submitLookingForProduct')->name('buyer.postLookingfor');
//cancel looking to buy
Route::get('/cancelLookingfor', 'buyersController@cancelLookingFor')->name('buyer.cancelLookingfor');
//remove product entered for Looking to buy
Route::get('/removeProduct/{id}', 'buyersController@removeProduct')->name('buyer.removeproduct');


//=====================================================================================================================
//Admin Routes
//=====================================================================================================================


//Homepage
Route::get('/admin/home' ,'adminController@index')->name('systempersonnel.homepage');

//Users
Route::get('/admin/users' , 'adminController@userList');
Route::get('/admin/registrants' , 'adminController@registrants');
Route::get('/admin/deactivatedusers' , 'adminController@deactivatedUsers');
Route::post('/admin/registrants/{users}','adminController@activateRegistrants');
Route::post('/admin/users/{users}','adminController@deactivateUsers');
Route::get('/admin/edit-user/{userid}' , 'adminController@editUser');
Route::post('/admin/edit-user/{userid}','adminController@updateUser');

//Feedbacks
Route::get('/admin/feedbacks' ,'adminController@feedbacks' );

//Farm Products
Route::get('/admin/farm-products' , 'adminController@farmproducts');
Route::get('/admin/add-farm-products' , 'adminController@addFarmproducts');
Route::post('/admin/add-farm-products', 'adminController@store'); 
// ->name('admin.AddNewFarmProducts')
Route::get('/admin/edit-farm-products/{farmproduct}' , 'adminController@editFarmproducts');
Route::get('/admin/edit-farm-products/{farmproduct}/{variety}', 'adminController@deleteVariety');
Route::delete('/admin/farm-products/{farmproduct}', 'adminController@deleteFarmProducts');
// Route::match(['put', 'patch'], '/admin/{admin}', 'adminController@update')->name('admin.EditFarmProducts');
Route::post('/admin/{admin}', 'adminController@update');

//Sales
Route::get('/admin/sales', 'adminController@viewSales');
Route::get('/admin/add-sale','adminController@addSale' );
Route::get('/admin/edit-sale','adminController@editSale' );

//Looking to buy
Route::get('/admin/looking-to-buy/','adminController@lookingToBuy');

//Reports
Route::get('/admin/reports/','adminController@reports');


//====================================================================================================
//Super Admin Routes
//====================================================================================================

Route::get('/fd-sAdmin' ,'adminController@index')->name('superadmin.homepage');


//registration of sys personnel
Route::get('/fd-sAdmin/system-personnel-registration', 'Auth\adminRegisterController@registrationForm');
Route::post('/fd-sAdmin/system-personnel-registration', 'Auth\adminRegisterController@Register')->name('admin.register');


//Login routes

Auth::routes();

Route::get('/', 'HomeController@index')->name('user');

//search autocomplete route
Route::get('/search-product', 'HomeController@searchProduct');
// getting variety
Route::get('/productVariety','varietyDependencyController@productVariety');