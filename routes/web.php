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

//Route::get('/', function () {
//    return view('index');
//});

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/admin/index', 'AdminController@index')->name('admin.index');
Route::get('/admin/exportList', 'AdminController@exportList')->name('admin.exportList');
Route::post('/admin/updateStatus', 'AdminController@updateStatus')->name('admin.updateStatus');
Route::post('/admin/auditStatus', 'AdminController@auditStatus')->name('admin.auditStatus');

Route::get('/member/index', 'MemberController@index')->name('member.index');
Route::get('/member/signUp', 'MemberController@signUp')->name('member.signUp');
Route::get('/member/corpInfo', 'MemberController@corpInfo')->name('member.corpInfo');
Route::get('/member/projectInfo', 'MemberController@projectInfo')->name('member.projectInfo');
Route::get('/member/projectPhoto', 'MemberController@projectPhoto')->name('member.projectPhoto');
Route::get('/member/projectTeam', 'MemberController@projectTeam')->name('member.projectTeam');
Route::post('/member/projectTeamEdit', 'MemberController@projectTeamEdit')->name('member.projectTeamEdit');
Route::post('/member/projectPhotoEdit', 'MemberController@projectPhotoEdit')->name('member.projectPhotoEdit');
Route::post('/member/corpInfoEdit', 'MemberController@corpInfoEdit')->name('member.corpInfoEdit');
Route::post('/member/projectInfoEdit', 'MemberController@projectInfoEdit')->name('member.projectInfoEdit');
Route::post('/uploadFile', 'FileController@uploadFile')->name('uploadFile');

