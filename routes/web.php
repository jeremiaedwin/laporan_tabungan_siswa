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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/test_template', function () {
         return view('admin/layout/app');
     });

Route::get('/test', function () {
         return view('admin/test/test');
     });
Auth::routes();



// route admin
Route::group(['middleware' => ['auth', 'checkRole:admin']],function(){
	//setoran
	Route::resource('/admin-setor', 'Admin\SetorController');
	Route::get('/admin/test', 'Admin\SetorController@test');
	Route::get('/admin/{id}/test', 'Admin\SetorController@test_total');
	Route::post('/admin-setor/search', 'Admin\SetorController@search');
	Route::get('/setoran/cetak_pdf', 'Admin\SetorController@cetak_pdf');

	//penarikan
	Route::resource('/admin-tarik', 'Admin\TarikController');
	Route::post('/admin-tarik/search', 'Admin\TarikController@search');
	Route::get('/admin-tarik/cetak_pdf', 'Admin\TarikController@cetak_pdf');

	//dashboard
	Route::resource('/dashboard', 'Admin\DashboardController');

	//profile
	Route::resource('/admin-profile', 'Admin\ProfileController');
	Route::get('/admin-profile/{id}/cetak_pdf', 'Admin\ProfileController@cetak_pdf');

	//Akun
	Route::resource('/akun', 'Admin\AkunController');

	//tahun ajaran
	Route::get('/tahun_ajaran', 'Admin\TahunController@create');
	Route::post('/tahun_ajaran', 'Admin\TahunController@store');
	Route::post('/tahun_ajaran/{id}/update', 'Admin\TahunController@update');

	//rekap
	Route::get('/admin-rekap/{id}/create', 'Admin\RekapController@create');
	Route::post('/admin-rekap', 'Admin\RekapController@store');
	Route::get('/admin-rekap', 'Admin\RekapController@index');
	Route::get('/admin-rekap/{id}', 'Admin\RekapController@show');
});

//route user
Route::group(['middleware' => ['auth', 'checkRole:user']],function(){
	Route::get('/setoran', 'publik\SetorController@index');
	Route::get('/penarikan', 'publik\TarikController@index');
	//profile
	Route::get('/profile/{id}', 'publik\ProfileController@show');
	Route::post('/profile-update/{id}', 'publik\ProfileController@update');

	//cetak pdf
	Route::get('/setoran/{id}/cetak_pdf', 'publik\SetorController@cetak_pdf');
	Route::get('/penarikan/{id}/cetak_pdf', 'publik\TarikController@cetak_pdf');

	//rekap
	Route::resource('/rekap', 'publik\RekapController');
});

//route user/admin
Route::group(['middleware' => ['auth', 'checkRole:admin,user']],function(){
	Route::get('/home', 'HomeController@index')->name('home');
});