<?php

use App\Http\Controllers\admin\admin_product;
use App\Http\Controllers\admin\admin_user;
use App\Http\Controllers\admin\admin_order;
use App\Http\Controllers\member\logincontrol;
use App\Http\Controllers\member\signupcontrol;
use App\Http\Controllers\member\indexcontrol;
use App\Http\Controllers\admin\adminhome;
use App\Http\Controllers\member\cart_member;
use App\Http\Controllers\member\order_history;
use App\Http\Controllers\updateprofile;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


################### test ########################



#######################INDEX not login can use##########################
Route::get('/buyer/login', [logincontrol::class, 'login'])->name('login_page');    #login page member
Route::get('/buyer/signup', [signupcontrol::class, 'signup']);

############################################################################
Route::get('/', [indexcontrol::class, 'index'])->name('index'); #home page member
Route::get('/buyer/allmenu', [indexcontrol::class, 'product_allmenu'])->name('allmenu');
Route::get('/buyer/sidedish', [indexcontrol::class, 'product_sidedish'])->name('sidedish');
Route::get('/buyer/friedrice', [indexcontrol::class, 'product_friedrice'])->name('friedrice');
Route::get('/buyer/drink', [indexcontrol::class, 'product_drink'])->name('drink');
Route::get('/buyer/sweet', [indexcontrol::class, 'product_sweet'])->name('sweet');
Route::get('/buyer/snackbox', [indexcontrol::class, 'product_snackbox'])->name('snackbox');
Route::get('/buyer/noodle', [indexcontrol::class, 'product_noodle'])->name('noodle');
############    TOP SELLER ###############
Route::get('/buyer/top_sell/sidedish', [indexcontrol::class, 'top_side_dish'])->name('topsellall');
Route::get('/buyer/top_sell/noodle', [indexcontrol::class, 'top_noodle'])->name('topnoodle');
Route::get('/buyer/top_sell/friedrice', [indexcontrol::class, 'top_fried_rice'])->name('topfriedrice');
Route::get('/buyer/top_sell/sweet', [indexcontrol::class, 'top_sweet'])->name('topsweet');
Route::get('/buyer/top_sell/snackbox', [indexcontrol::class, 'top_snackbox'])->name('topsnackbox');
Route::get('/buyer/top_sell/drink', [indexcontrol::class, 'top_drink'])->name('topdrink');

#######################INDEX not login can use##########################


####################### ONLY USER ###################################
Route::middleware([ 
    'user',  
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    #######################buy page catalog###################################

    ####################cart################################
    Route::get('/cart', [cart_member::class, 'index'])->name('cartpage');
    Route::get('/buyer/cart/{id}', [indexcontrol::class, 'cart_manage'])->name('getcartdata');
    Route::get('/buyer/cartplus/{id}', [cart_member::class, 'increase'])->name('cartplus');
    Route::get('/buyer/cartminus/{id}', [cart_member::class, 'decrease'])->name('cartminus');
    Route::get('/buyer/cartdel/{id}', [cart_member::class, 'delcart'])->name('delcart');
    Route::get('/buyer/cartinput/{id}/{quantity}/{session_name}', [cart_member::class, 'qtyinput'])->name('inputqty');
    Route::get('/buyer/checkout', [cart_member::class, 'checkoutbill'])->name('checkbill');
    Route::get('/buyer/history', [order_history::class, 'index'])->name('getorderhistory');
    Route::get('/buyer/historyinfo/{id}', [order_history::class, 'viewinfo_bill'])->name('billview');
  
});

//user and admin
Route::middleware([ 
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {    #signup page member

    Route::get('/user/profile', [UserProfileController::class, 'show'])->name('profile.show');
    //update profile
    Route::post('/updateprofile', [updateprofile::class, 'update_profile'])->name('updateprofile'); 
});


########################## ONLY ADMIN  ######################
Route::middleware([ 
    'admin',
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/admin', [adminhome::class, 'index'])->name('adminhome');
    Route::get('/admin/adminproduct', [admin_product::class, 'index'])->name('indexproduct');
    Route::post('/admin/adminproduct/add', [admin_product::class, 'add_product'])->name('addproduct');
    Route::get('/admin/adminproductinfo/{id}', [admin_product::class, 'product_info'])->name('productinfo');
    Route::post('/admin/adminproductedit', [admin_product::class, 'product_edit'])->name('productedit');
    Route::get('/admin/adminproductdel/{id}', [admin_product::class, 'product_del'])->name('productdel');
    Route::get('/admin/admingetidproduct/{id}', [admin_product::class, 'getproduct_id'])->name('getproduct');
    ########################USER ADMIN ###############################
    Route::get('/admin/adminuser', [admin_user::class, 'index'])->name('adminuser');
    Route::get('/admin/adminuserinfo/{id}', [admin_user::class, 'user_info'])->name('userinfo');
    Route::get('/admin/adminuseredit/{id}', [admin_user::class, 'usereditpage'])->name('useredit');
    Route::get('/admin/adminuserdel/{id}', [admin_user::class, 'user_del'])->name('userdel');
    Route::get('admin/rolechange/admin/{id}', [admin_user::class, 'admin_role'])->name('adminrole');
    Route::get('admin/rolechange/user/{id}', [admin_user::class, 'user_role'])->name('userrole');
    Route::get('/admin/orderhistory', [admin_order::class, 'index'])->name('admin_order');
    Route::get('/admin/adminorderhistoryinfo/{id}', [admin_order::class, 'info'])->name('admin_order_info');
});
#######################tester_webpage############################









