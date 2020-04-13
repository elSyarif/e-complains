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
  return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::resource('tiket', 'TiketController');
// for admin
Route::resource('/users', 'UserController');
Route::get('/list-user', 'UserController@index')->name('list.user');
Route::get('/data-user', 'UserController@dataTable')->name('data.user');
Route::get('/edit-user-{id}', 'UserController@edit')->name('edit.user');
Route::get('/create-user', 'UserController@create')->name('create.user');
Route::get('/update-user-{id}', 'UserController@create')->name('update.user');


// for costumer
Route::get('/table', 'HistoryController@dataTable')->name('table.history');
Route::get('/tiket-history', 'HistoryController@index')->name('tiket-history');
Route::get('/time-status-{id}', 'TimelineController@index')->name('time.status');
Route::get('/data-status', 'TimelineController@dataStatus')->name('data.status');
Route::get('/list-status', 'TimelineController@timeline')->name('list.status');

// untuk Menampikan Notifikasi
Route::get('/getTiket', 'PesanController@getTiket')->name('getTiket');
Route::get('/getMemo', 'PesanController@getMemo')->name('getMemo');
Route::get('/getAproval', 'PesanController@getAproval')->name('getAproval');
Route::get('/getProduct', 'PesanController@getProduct')->name('getProduct');

// profile
Route::get('/user-profile', 'UserController@profile')->name('profile');

// Tiket Ceate
Route::resource('/tiket', 'tiketController');
Route::get('/tiket-create', 'tiketController@create')->name('tiket.create');

// memo
Route::resource('/memo', 'MemoController');

Route::get('memo-{id}', 'MemoController@edit')->name('memo.edit');

Route::get('/create-memo', 'MemoController@create')->name('create-memo');
Route::get('/list-memo', 'MemoController@index')->name('list.memo');
Route::get('/tiket-list', 'MemoController@list')->name('list.tiket');
Route::get('/list-tiket', 'MemoController@dataTable')->name('list.tiket');
Route::get('/list-compain', 'MemoController@dataTableList')->name('list.complain');

// result tiket
Route::get('/result-inspeck', 'TiketController@result')->name('result.inspeck');
Route::get('/result-table', 'TiketController@resultTable')->name('result.table');
Route::get('/result-show-{id}', 'TiketController@show')->name('result.show');
Route::get('/result-insert-{id}', 'TiketController@edit')->name('result.insert');
Route::get('/result-update-{id}', 'TiketController@update')->name('result.update');

// memo detal notif
Route::get('/detail-memo-{id}', 'MemoController@show')->name('detail.memo');

// inspek
Route::resource('/produck', 'InspekController');
Route::get('/inspek', 'inspekController@index')->name('inspek');
Route::get('/list-inspek', 'inspekController@dataTable')->name('list.inspek');


// laporan
Route::get('/laporan-tiket', 'LaporanController@index')->name('laporan-tiket');
Route::get('/chart-report', 'LaporanController@chart')->name('chart-report');
Route::get('/laporan-table', 'LaporanController@resultTable')->name('laporan.table');
Route::get('/tiket-pdf', 'LaporanController@tiketPdf')->name('tiket.pdf');
Route::post('/export-pdf', 'LaporanController@exportPdf')->name('export.pdf');
Route::get('/download-pdf', 'LaporanController@downloadPdf')->name('download.pdf');

Route::get('/chart-data', 'LaporanController@chartData')->name('chart.data');
Route::get('/datasets', 'LaporanController@datasets')->name('datasets');

Route::get('/test', 'ChartDataController@getMonthData')->name('test');

// update status tiket

Route::post('update-status', 'PesanController@update_status')->name('update-status');
Route::get('/to-user', 'UserController@load')->name('to-user');

// pmqa
Route::resource('/pmqa', 'PmqaController');
Route::get('/pmqa-cek', 'PmqaController@index')->name('pmqa-cek');
Route::get('/pmqa-edit-{id}', 'PmqaController@edit')->name('pmqa.edit');
Route::get('/pmqa-list', 'PmqaController@dataTable')->name('pmqa.list');
// pmqa cek prodk dari bagain produksi
Route::get('/produck-cek', 'PmqaController@cekProduck')->name('produck.cek');
Route::get('/pmqa-produck', 'PmqaController@pmqaProduck')->name('pmqa.produck');
Route::get('/pmqa-result-{id}', 'PmqaController@show')->name('pmqa.result');

// history memo
Route::get('/history-memo', 'HistoryController@getHistory')->name('history-memo');
Route::get('/list-memo-history', 'HistoryController@listHistory')->name('list-memo-history');
Route::get('/history-memo-{id}', 'HistoryController@historyMemo')->name('history.timememo');