<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//FRONTEND
Route::get('/', ['uses' => 'PagesController@index']);
Route::get('/aboutus', ['uses' => 'Front\About\AboutController@index']);
Route::get('/contactus', ['uses' => 'Front\Contact\ContactController@index']);
Route::get('/privacypolicy', ['uses' => 'Front\Privacypolicy\PrivacypolicyController@index']);
Route::get('/register', ['uses' => 'Front\Register\RegisterController@index']);
Route::post('/userregister', 'Front\Register\RegisterController@create');
Route::get('/login', ['uses' => 'Front\Login\LoginController@index']);
Route::post('user/login', 'Auth\UserController@login')->name('front.login.submit');
Route::get('user/logout', ['uses' => 'PagesController@userLogout']);
Route::get('/forgotpassword', ['uses' => 'Front\Losspassword\LosspasswordController@index']);
Route::get('/changepassword/{id}', ['uses' => 'Front\Losspassword\LosspasswordController@changepassword']);
Route::post('/sendpassword', 'Front\Losspassword\LosspasswordController@sendpassword');
Route::post('/submitchangepassword', 'Front\Losspassword\LosspasswordController@submitchangepassword');
Route::get('/allcategories/{id}', ['uses' => 'Front\Category\CategoryController@index']);
Route::get('/allproducts/{id}', ['uses' => 'Front\Product\ProductController@index']);
Route::get('/product_details/{id}', ['uses' => 'Front\Product\ProductDetailsController@index']);
Route::get('/cart', 'Front\Cart\CartController@index');
Route::post('/cart', 'Front\Cart\CartController@store');
Route::post('/showpricing', 'Front\Cart\CartController@showpricing');
Route::post('/deleteproduct', 'Front\Cart\CartController@destroy');
Route::post('/updateproduct', 'Front\Cart\CartController@update');
//!--FrontEnd--!//
//BACKEND ADMIN
Route::get('/admin', ['uses' => 'Admin\AdminpagesController@index']);
Route::get('/admin/login', ['uses' => 'Admin\Login\AdminloginController@index']);
Route::get('/admin/adminlogin', 'Auth\AuthorController@showLoginForm');
Route::post('/login', 'Auth\AuthorController@login')->name('admin.login.submit');
Route::get('admin/logout', 'Admin\AdminpagesController@adminLogout');
Route::get('/admin/profile', 'Admin\Profile\AdminprofileController@index');
Route::post('/admin/profileupdate/{id}', 'Admin\Profile\AdminprofileController@update');
Route::get('/admin/product/allproducts', 'Admin\Product\AdminproductController@index');
Route::get('/admin/category/allcategories', 'Admin\Category\AdmincategoryController@index');
Route::get('/admin/category/createcategory', 'Admin\Category\AdmincategoryController@create');
Route::get('/admin/category/editcategory/{id}', 'Admin\Category\AdmincategoryController@edit');
Route::post('/admin/storecategory', 'Admin\Category\AdmincategoryController@store');
Route::post('/admin/updatecategory/{id}', 'Admin\Category\AdmincategoryController@update');
Route::get('/admin/deletecategory/{id}', 'Admin\Category\AdmincategoryController@destroy');
Route::get('/admin/category/allsubcategories', 'Admin\Subcategory\AdminsubcategoryController@index');
Route::get('/admin/category/createsubcategory', 'Admin\Subcategory\AdminsubcategoryController@create');
Route::get('/admin/category/editsubcategory/{id}', 'Admin\Subcategory\AdminsubcategoryController@edit');
Route::post('/admin/storesubcategory', 'Admin\Subcategory\AdminsubcategoryController@store');
Route::post('/admin/updatesubcategory/{id}', 'Admin\Subcategory\AdminsubcategoryController@update');
Route::get('/admin/deletesubcategory/{id}', 'Admin\Subcategory\AdminsubcategoryController@destroy');
Route::get('/admin/product/createproduct', 'Admin\Product\AdminproductController@create');
Route::get('/admin/product/editproduct/{id}', 'Admin\Product\AdminproductController@edit');
Route::post('/admin/storeproduct', 'Admin\Product\AdminproductController@store');
Route::post('/admin/updateproduct/{id}', 'Admin\Product\AdminproductController@update');
Route::get('/admin/deleteproduct/{id}', 'Admin\Product\AdminproductController@destroy');
Route::get('/admin/product/allproofs', 'Admin\Productproof\AdminproductproofController@index');
Route::get('/admin/product/createproductproof', 'Admin\Productproof\AdminproductproofController@create');
Route::post('/admin/product/storeproductproof', 'Admin\Productproof\AdminproductproofController@store');
Route::get('/admin/product/editproductproof/{id}', 'Admin\Productproof\AdminproductproofController@edit');
Route::post('/admin/product/updateproductproof/{id}', 'Admin\Productproof\AdminproductproofController@update');
Route::get('/admin/product/deleteproductproof/{id}', 'Admin\Productproof\AdminproductproofController@destroy');
Route::get('/admin/product/allaccessories', 'Admin\Productaccessories\AdminproductaccessoriesController@index');
Route::get('/admin/product/createproductaccessories', 'Admin\Productaccessories\AdminproductaccessoriesController@create');
Route::post('/admin/product/storeproductaccessories', 'Admin\Productaccessories\AdminproductaccessoriesController@store');
Route::get('/admin/product/editproductaccessories/{id}', 'Admin\Productaccessories\AdminproductaccessoriesController@edit');
Route::post('/admin/product/updateproductaccessories/{id}', 'Admin\Productaccessories\AdminproductaccessoriesController@update');
Route::get('/admin/product/deleteproductaccessories/{id}', 'Admin\Productaccessories\AdminproductaccessoriesController@destroy');
Route::get('/admin/product/allwarranty', 'Admin\Productwarranty\AdminproductwarrantyController@index');
Route::get('/admin/product/createproductwarranty', 'Admin\Productwarranty\AdminproductwarrantyController@create');
Route::post('/admin/product/storeproductwarranty', 'Admin\Productwarranty\AdminproductwarrantyController@store');
Route::get('/admin/product/editproductwarranty/{id}', 'Admin\Productwarranty\AdminproductwarrantyController@edit');
Route::post('/admin/product/updateproductwarranty/{id}', 'Admin\Productwarranty\AdminproductwarrantyController@update');
Route::get('/admin/product/deleteproductwarranty/{id}', 'Admin\Productwarranty\AdminproductwarrantyController@destroy');
Route::get('/admin/variation/allvariationcategories', 'Admin\Productvariationcategory\AdminproductvariationcategoryController@index');
Route::get('/admin/variation/createvariationcategory', 'Admin\Productvariationcategory\AdminproductvariationcategoryController@create');
Route::get('/admin/variation/editvariationcategory/{id}', 'Admin\Productvariationcategory\AdminproductvariationcategoryController@edit');
Route::post('/admin/variation/storevariationcategory', 'Admin\Productvariationcategory\AdminproductvariationcategoryController@store');
Route::post('/admin/variation/updatevariationcategory/{id}', 'Admin\Productvariationcategory\AdminproductvariationcategoryController@update');
Route::get('/admin/variation/deletevariationcategory/{id}', 'Admin\Productvariationcategory\AdminproductvariationcategoryController@destroy');
Route::get('/admin/variation/allproductvariation', 'Admin\Productvariation\AdminproductvariationController@index');
Route::get('/admin/variation/createproductvariation', 'Admin\Productvariation\AdminproductvariationController@create');
Route::post('/admin/variation/storeproductvariation', 'Admin\Productvariation\AdminproductvariationController@store');
Route::get('/admin/variation/editproductvariation/{id}', 'Admin\Productvariation\AdminproductvariationController@edit');
Route::post('/admin/variation/updateproductvariation/{id}', 'Admin\Productvariation\AdminproductvariationController@update');
Route::get('/admin/variation/deleteproductvariation/{id}', 'Admin\Productvariation\AdminproductvariationController@destroy');

Route::get('/admin/variation/allvariationtitle', 'Admin\Variation\VariationController@index');
Route::get('/admin/variation/createvariationtitle', 'Admin\Variation\VariationController@create');
Route::post('/admin/variation/storevariationtitle', 'Admin\Variation\VariationController@store');
Route::get('/admin/variation/editvariationtitle/{id}', 'Admin\Variation\VariationController@edit');
Route::post('/admin/variation/updatevariationtitle/{id}', 'Admin\Variation\VariationController@update');
Route::get('/admin/variation/deletevariationtitle/{id}', 'Admin\Variation\VariationController@destroy');


Route::get('/admin/resellercode/allresellercode', 'Admin\Resellercode\AdminresellerController@index');
Route::get('/admin/resellercode/createresellercode', 'Admin\Resellercode\AdminresellerController@create');
Route::get('/admin/resellercode/editresellercode/{id}', 'Admin\Resellercode\AdminresellerController@edit');
Route::post('/admin/storeresellercode', 'Admin\Resellercode\AdminresellerController@store');
Route::post('/admin/updateresellercode/{id}', 'Admin\Resellercode\AdminresellerController@update');
Route::get('/admin/deleteresellercode/{id}', 'Admin\Resellercode\AdminresellerController@destroy');

Route::get('/admin/user/allusers', 'Admin\User\AdminUserController@index');
Route::get('/admin/user/viewuser/{id}', 'Admin\User\AdminUserController@view');

