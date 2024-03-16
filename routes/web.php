<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AddPointController;
use Illuminate\Support\Facades\DB;
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
//Clear route cache:
Route::get('/route-cache', function() {
 $exitCode = Artisan::call('route:cache');
 return 'Routes cache cleared';
});

//Clear config cache:
Route::get('/config-cache', function() {
 $exitCode = Artisan::call('config:cache');
 return 'Config cache cleared';
}); 

// Clear application cache:
Route::get('/clear-cache', function() {
 $exitCode = Artisan::call('cache:clear');
 return 'Application cache cleared';
});

// Clear view cache:F
Route::get('/view-clear', function() {
 $exitCode = Artisan::call('view:clear');
 return 'View cache cleared';
});

Route::get('/', function () {
    return view('welcome');
});
// login
Route::get('/superl0g1n','App\Http\Controllers\Admin\AdminLoginController@login');
Route::post('/authlogin','App\Http\Controllers\Admin\AdminLoginController@authLogin');
Route::get('/admin/dashboard','App\Http\Controllers\Admin\AdminController@dashboard');

// Member List
Route::get('/admin/member','App\Http\Controllers\Admin\MemberController@member');
Route::get('/admin/member/add','App\Http\Controllers\Admin\MemberController@addMember');
Route::get('/admin/member/detail/{member_id}','App\Http\Controllers\Admin\MemberController@detail');
Route::get('/admin/member/edit/{member_id}', 'App\Http\Controllers\Admin\MemberController@edit');
Route::post('/admin/member/update/', 'App\Http\Controllers\Admin\MemberController@update');
Route::post('/admin/member/filter/', 'App\Http\Controllers\Admin\MemberController@filter');

//create member
Route::get('/admin/create','App\Http\Controllers\Admin\CreateMemberController@index');
Route::get('/admin/create/{member_id}', 'App\Http\Controllers\Admin\CreateMemberController@memberCreateIndex');
Route::post('/admin/addmember','App\Http\Controllers\Admin\CreateMemberController@addMember');


//add point
Route::get('/admin/addpoints/','App\Http\Controllers\Admin\AddPointController@addPoint');
Route::post('/admin/addpoints/check-number/','App\Http\Controllers\Admin\AddPointController@showInfo');
Route::post('/admin/addpoints/pointAdd/','App\Http\Controllers\Admin\AddPointController@pointAdd');
Route::get('/admin/redeem/','App\Http\Controllers\Admin\AddPointController@redeem');
Route::post('/admin/redeem/redeempoint/','App\Http\Controllers\Admin\AddPointController@redeemInfo');
Route::post('/admin/redeem/pointRedeem/','App\Http\Controllers\Admin\AddPointController@pointRedeem');


//Export
Route::get('/admin/export/list', 'App\Http\Controllers\Admin\ExportController@export');
Route::post('/members/export', 'App\Http\Controllers\Admin\ExportController@exportData');

//logout
Route::get('/admin/logout','App\Http\Controllers\Admin\AdminController@logout');
Route::any('/','App\Http\Controllers\HomeController@indexNew');

// Redirect
Route::any('/home','App\Http\Controllers\HomeController@indexNew');



