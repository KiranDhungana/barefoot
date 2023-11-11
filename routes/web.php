<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminhome'])->name('admin-home')->middleware('checkadmin');
Route::get('/admin/reg', [App\Http\Controllers\HomeController::class, 'register_user'])->name('register_user')->middleware('checkadmin');
Route::POST('/admin/reg', [App\Http\Controllers\HomeController::class, 'register'])->name('register')->middleware('checkadmin');
Route::POST('/admin-del/{id}', [App\Http\Controllers\HomeController::class, 'delete'])->name('user.destroy')->middleware('checkadmin');
Route::get('/admin-update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('user.update')->middleware('checkadmin');
Route::POST('/admin-update/{id}', [App\Http\Controllers\HomeController::class, 'update_info'])->name('user.update_info')->middleware('checkadmin');
Route::get('/add-notice', [App\Http\Controllers\HomeController::class, 'add_noticepage'])->name('add_notice')->middleware('checkadmin');
Route::POST('/add-notice', [App\Http\Controllers\HomeController::class, 'store'])->name('store')->middleware('checkadmin');
Route::get('/delete-notice', [App\Http\Controllers\HomeController::class, 'del_notice'])->name('del_notice')->middleware('checkadmin');
Route::get('/manageaccounts', [App\Http\Controllers\HomeController::class, 'manageaccounts'])->name('manageaccounts')->middleware('checkadmin');
Route::POST('/delete-notice/{id}', [App\Http\Controllers\HomeController::class, 'delete_notice'])->name('delete.notice')->middleware('checkadmin');
Route::POST('/manageaccounts', [App\Http\Controllers\HomeController::class, 'addaccounts'])->name('add.accounts')->middleware('checkadmin');
Route::get('/editaccounts', [App\Http\Controllers\HomeController::class, 'editaccounts'])->name('editaccounts')->middleware('checkadmin');
Route::POST('/account-del/{id}', [App\Http\Controllers\HomeController::class, 'accountdelete'])->name('account.destroy')->middleware('checkadmin');
Route::get('/account-update/{id}', [App\Http\Controllers\HomeController::class, 'accountupdate'])->name('account.update')->middleware('checkadmin');
Route::POST('/account-update/{id}', [App\Http\Controllers\HomeController::class, 'accountupdateform'])->name('account.update')->middleware('checkadmin');
Route::get('/account-view/{id}', [App\Http\Controllers\HomeController::class, 'accountview'])->name('account.view')->middleware('checkadmin');



//second controller
Route::get('/contact', [App\Http\Controllers\Secondcontroller::class, 'contactus'])->name('contact');
Route::POST('/contact', [App\Http\Controllers\Secondcontroller::class, 'mailsend'])->name('send_mail');
Route::get('/notice-home', [App\Http\Controllers\SecondController::class, 'notice_home'])->name('notice_home');
Route::get('/notice-home/{id}', [App\Http\Controllers\SecondController::class, 'notice_main'])->name('notice_main');
Route::get('/about-us', [App\Http\Controllers\SecondController::class, 'aboutus'])->name('about');
Route::get('/gallary', function () {

    return view('galary');
});