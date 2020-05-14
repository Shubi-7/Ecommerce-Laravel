<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('index');
// });


// Frontend Routes
Route::get('/','HomeController@index');
Route::get('/product_by_category/{category_id}','HomeController@show_product_by_category');
Route::get('/product_by_category_home/{category_id}','HomeController@show_product_by_category_home');


Route::get('/view_product/{product_id}','HomeController@product_details_by_id');

//.........add to cart route.................................
Route::post('/add-to-cart','CartController@add_to_cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
Route::post('/update-cart','CartController@update_cart');

//.......... checkout route.........
Route::get('/login-check','CheckoutController@login_check');
Route::post('/customer_registration','CheckoutController@customer_registration');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save_shiping_details','CheckoutController@save_shiping_details');
Route::post('/customer_login','CheckoutController@customer_login');
Route::get('/customer_logout','CheckoutController@customer_logout');
Route::get('/payment','CheckoutController@payment');
Route::post('/order-place','CheckoutController@order_place');
Route::get('/order-manage','CheckoutController@order_manage');
Route::get('/view-order/{order_id}','CheckoutController@view_order');






// Backend Routes



Route::get('/logout','SuperAdminController@logout');
Route::get('/admin', 'AdminController@index');
Route::get('dashboard','AdminController@show_dashboard');
Route::post('/admin_dashboard','AdminController@dashboard');


//Category Related Route
Route::get('/add-category','CategoryController@index');
Route::get('/all-category','CategoryController@all_category');
Route::get('/save-category','CategoryController@save_category');
Route::get('/edit-category/{category_id}','CategoryController@edit_category');
Route::get('/update-category/{category_id}','CategoryController@update_category');
Route::get('/delete-category/{category_id}','CategoryController@delete_category');
Route::get('/unactive-category/{category_id}','CategoryController@unactive_category');
Route::get('/active-category/{category_id}','CategoryController@active_category');


//Manufacture or brand releated routes here!
Route::get('/all-manufacture','ManufactureController@all_manufacture');
Route::get('/add-manufacture','ManufactureController@add_manufacture');
Route::get('/save-manufacture','ManufactureController@save_manufacture');

Route::get('/edit-manufacture/{manufacture_id}','ManufactureController@edit_manufacture');
Route::get('/update-manufacture/{manufacture_id}','ManufactureController@update_manufacture');

Route::get('/delete-manufacture/{manufacture_id}','ManufactureController@delete_manufacture');

Route::get('/unactive-manufacture/{manufacture_id}','ManufactureController@unactive_manufacture');
Route::get('/active-manufacture/{manufacture_id}','ManufactureController@active_manufacture');




//products  related routes.....................................................

Route::get('/add-product','productsController@add_product');

Route::post('/save-product','productsController@save_product');
Route::get('/all-product','productsController@all_product');

Route::get('/unactive-product/{product_id}','productsController@unactive_product');
Route::get('/active-product/{product_id}','productsController@active_product');
Route::get('/delete-product/{product_id}','productsController@delete_product');
Route::get('/edit-product/{product_id}','productsController@edit_product');
Route::post('/update-product/{product_id}','productsController@update_product');

//slider  related routes......................................................

Route::get('/add-slider','SliderController@add_slider');
Route::post('/save-slider','SliderController@save_slider');
Route::get('/all-slider','SliderController@all_slider');
Route::get('/unactive-slider/{product_id}','SliderController@unactive_slider');
Route::get('/active-slider/{product_id}','SliderController@active_slider');

Route::get('/delete-slider/{slider_id}','SliderController@delete_slider');


