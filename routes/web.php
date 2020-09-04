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

Route::group([
    'middleware'    => ['web'],
    'domain'        => config('payment_system_admin.app.url'),
], function() {

    Auth::routes();

    Route::get('logout', 'Auth\LoginController@logout', function () {
        return abort(404);    });


});

Route::group([
    'middleware'    => ['web', 'auth'],
    'domain'        => config('payment_system_admin.app.url'),
], function() {

    /*Dashboard*/
    Route::get('/', 'DashboardController@index')->name('payment_system_admin:dashboard.index');
    /*Clients*/
    Route::get('/clients', 'ClientController@index')->name('payment_system_admin:clients.index');
    Route::get('/clients/add_form', 'ClientController@showAddForm')->name('payment_system_admin:clients.show_add_form');
    Route::post('clients/add', 'ClientController@add')->name('payment_system_admin:clients.add');
    Route::get('/clients/edit_form/{client_id}', 'ClientController@showEditForm')->name('payment_system_admin:clients.show_edit_form');
    Route::post('/clients/edit', 'ClientController@edit')->name('payment_system_admin:clients.edit');
    Route::get('/clients/delete', 'ClientController@delete')->name('payment_system_admin:clients.delete');
    /*Gateways*/
    Route::get('/gateways', 'GatewayController@index')->name('payment_system_admin:gateways.index');
    Route::get('/gateways/add_form', 'GatewayController@showAddForm')->name('payment_system_admin:gateways.show_add_form');
    Route::post('gateways/add', 'GatewayController@add')->name('payment_system_admin:gateways.add');
    Route::get('/gateways/edit_form/{gateway_id}', 'GatewayController@showEditForm')->name('payment_system_admin:gateways.show_edit_form');
    Route::post('/gateways/edit', 'GatewayController@edit')->name('payment_system_admin:gateways.edit');
    Route::get('/gateways/delete', 'GatewayController@delete')->name('payment_system_admin:gateways.delete');
    /*Transactions*/
    Route::get('/transactions', 'TransactionController@index')->name('payment_system_admin:transactions.index');
    Route::get('/transactions/details/{transaction_id}', 'TransactionController@showDetails')->name('payment_system_admin:transactions.show_details');
    /*Finance*/
    Route::get('/finance/payouts', 'FinanceController@payouts')->name('payment_system_admin:finance.payouts');
    Route::get('/finance/payouts_request', 'FinanceController@payoutRequests')->name('payment_system_admin:finance.payout_requests');
    Route::get('/finance/payouts_request/process/{payout_id}', 'FinanceController@payoutRequestsProcess')->name('payment_system_admin:finance.payout_requests_process');
    Route::get('/finance/balance', 'FinanceController@balance')->name('payment_system_admin:finance.balance');
    /*Users*/
    Route::get('/admin_users', 'AdminUserController@index')->name('payment_system_admin:admin_users.index');
    Route::get('/admin_users/do_mailing', 'AdminUserController@do_mailing')->name('payment_system_admin:admin_users.do_mailing');
});
