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

Route::get('/', 'TaskController@kontak');

Route::get('/tambahkontak', 'TaskController@tambahkontak')->name('tambah.kontak');
Route::post('/prosestambah', 'TaskController@prosestambah')->name('proses.tambah');

Route::get('/editcontact/{kontak}', 'TaskController@editkontak')->name('edit.kontak');
Route::patch('/editcontact/{kontak}', 'TaskController@prosesedit')->name('proses.edit');

Route::delete('/deletecontact/{kontak}', 'TaskController@hapuskontak')->name('hapus.kontak');