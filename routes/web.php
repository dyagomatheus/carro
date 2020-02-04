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

Route::get('/register', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/sync', 'HomeController@balance')->name('sync.balance');

Route::get('profile', 'UserController@profile')->name('user.profile');
Route::put('profile/update', 'UserController@profileUpdate')->name('user.profile.update');
Route::get('user/add', 'UserController@add')->name('user.add');
Route::post('user/add/store', 'UserController@addUser')->name('user.add.store');
Route::get('user/delete/{id}', 'UserController@destroy')->name('user.delete');

Route::get('transaction/list', 'TransactionController@myTransactions')->name('transaction.list');
Route::get('transaction/sales', 'TransactionController@sales')->name('transaction.sales');
Route::get('transaction/transfers', 'TransactionController@transfers')->name('transaction.transfers');
Route::post('transaction/extract', 'TransactionController@extract')->name('transaction.extract');
Route::post('transaction/extract/sales', 'TransactionController@extractSales')->name('transaction.extract.sales');
Route::post('transaction/extract/transfers', 'TransactionController@extractTransfers')->name('transaction.extract.transfers');

Route::get('transaction', 'TransactionController@index')->name('transaction.index')->middleware(['check.admin']);
Route::post('transaction/import', 'TransactionController@import')->name('transaction.import')->middleware(['check.admin']);
Route::get('transaction/create', 'TransactionController@create')->name('transaction.create')->middleware(['check.admin']);
Route::post('transaction/store', 'TransactionController@store')->name('transaction.store')->middleware(['check.admin']);
Route::get('transaction/debit', 'TransactionController@debit')->name('transaction.debit')->middleware(['check.admin']);
Route::post('transaction/debit/store', 'TransactionController@debitStore')->name('transaction.debitStore')->middleware(['check.admin']);

Route::resource('client', 'ClientController')->middleware(['check.admin']);
Route::resource('user', 'UserController')->middleware(['check.admin']);
Route::resource('car', 'CarController');
Route::get('car/delete/{id}', 'CarController@destroy')->name('car.delete')->middleware(['check.admin']);

//services
Route::resource('service', 'ServiceController');
Route::post('service/search', 'ServiceController@searchCar')->name('services.searchCar');
Route::get('service/performed/car/{id}', 'ServiceController@performed')->name('services.performed');

Route::resource('sale', 'SaleController');
Route::post('sale/create', 'SaleController@create')->name('sale.create');
Route::get('sale/show/{id}', 'SaleController@show')->name('sale.show');
Route::any('view/sale', 'SaleController@view')->name('view.sale');
Route::post('sale/cancel', 'SaleController@cancel')->name('sale.cancel');
Route::post('sale/done', 'SaleController@done')->name('sale.done');
});