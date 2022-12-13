<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\register;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
    
// });
Route::middleware('auth:sanctum')->group(function(){
route::post('logout',[register::class,'logout']);
});
route::post('signup',[register::class,'insert_reg']);
route::post('login',[register::class,'login']);
route::get('get_users',[register::class,'get_users']);
