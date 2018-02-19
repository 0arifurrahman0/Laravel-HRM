<?php


Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('user', 'AdminUserController', ['parameters' => [
//     'user' => 'admin_user'
// ]]);



Route::group(['prefix' => 'employee'], function () {
	Route::resource('department', 'EmployeeDepartmentController');
	Route::resource('designation', 'EmployeeDesignationController');
	Route::resource('type', 'EmployeeTypeController');
	Route::resource('shift', 'EmployeeWorkingShiftController');
	Route::resource('salary-rule', 'EmployeeSalaryRuleController');
	Route::resource('pay-scale', 'EmployeePayScaleController');
	Route::resource('attendance', 'EmployeeAttendanceController');
});

Route::resource('employee', 'EmployeeController');

Route::group(['prefix' => 'customer'], function () {
	Route::resource('group', 'CustomerGroupController');
	Route::resource('accounts', 'CustomerAccountsController');
	Route::get('balance', 'CustomerAccountsController@balance');
	Route::post('balance', 'CustomerAccountsController@balanceSheet');
	Route::get('print/{id}', 'CustomerAccountsController@print');
	Route::resource('borrow', 'CustomerBorrowController');
});

Route::resource('customer', 'CustomerController');
Route::resource('branch', 'BranchController');
Route::get('calculator', 'CustomerAccountsController@calculator');
Route::post('calculator', 'CustomerAccountsController@calResult');


// Route::group(['middleware' => 'guest'], function () {

//     Route::group(['prefix' => 'auth'], function () {
//         Route::get('login', 'Auth\Login@create')->name('login');
//         Route::post('login', 'Auth\Login@store');

//         Route::get('forgot', 'Auth\Forgot@create')->name('forgot');
//         Route::post('forgot', 'Auth\Forgot@store');

//         //Route::get('reset', 'Auth\Reset@create');
//         Route::get('reset/{token}', 'Auth\Reset@create')->name('reset');
//         Route::post('reset', 'Auth\Reset@store');
//     });
// });

// Route::resource('employee', '')
