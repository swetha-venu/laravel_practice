<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\crud;
use App\Http\Controllers\register;

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
Route::view('category','category');
route::post('category',[crud::class,'insert_category']);
route::get('category',[crud::class,'cat_det']);
route::get('del_cat/{Id}',[crud::class,'del_cat']);
route::get('upd1_cat/{Id}',[crud::class,'upd1_cat']);
route::post('upd2_cat/{Id}',[crud::class,'upd2_cat']);

route::view('product','product');
Route::get('product_cat',[crud::class,'pcat']);
route::post('product',[crud::class,'insert_product']);
route::get('product',[crud::class,'show_prod']);
route::get('upd1_prod/{Id}',[crud::class,'upd1_prod']);
route::post('upd2_prod/{Id}',[crud::class,'upd2_prod']);
route::get('del_prod/{Id}',[crud::class,'delete_prod']);

route::view('customer','customer');
route::post('customer',[crud::class,'insert_customer']);
route::get('customer',[crud::class,'show_customer']);
route::get('upd1_cust/{Id}',[crud::class,'upd1']);
route::post('upd2_cust/{Id}',[crud::class,'upd2']);
route::get('del_cust/{Id}',[crud::class,'delete_customer']);

route::view('sales','sales');
Route::get('get_product',[crud::class,'get_product']);
route::get('get_customer',[crud::class,'get_customer']);
route::post('sales',[crud::class,'insert_invoice']);

route::view('report','report');
route::get('get_detail',[crud::class,'cus_with_sale']);
route::get('get_count',[crud::class,'sale_count']);
route::get('no_sale',[crud::class,'cus_no_sale']);
route::get('pro_count',[crud::class,'pro_count']);
route::get('sales_det',[crud::class,'sale_cust']);

route::view('regform','regform');
route::post('regform',[register::class,'insert_reg']);