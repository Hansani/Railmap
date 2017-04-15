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
    return view('welcome');
});

Route::get('/log-in', function () {
    return view('common.log_in.main');
});

//common
Route::get('/change-password', function () {
    return view('common.change_password.main');
});

Route::get('/profile', function () {
    return view('common.profile.main');
});

//administrator
Route::get('/administrator', function () {
    return view('administrator.main');
});

Route::get('/employee-manager', function () {
    return view('administrator.employee_manager.main');
});

Route::get('/view-employee', function () {
    return view('/administrator.view_employee.main');
});

Route::get('/view-progress', function () {
    return view('administrator.view_progress.view_trains.main');
});

Route::get('/view-stations', function () {
    return view('administrator.view_progress.view_stations.main');
});

Route::get('/view-train-schedule', function () {
    return view('administrator.view_progress.view_train_schedule.main');
});

Route::get('/view-reservation-progress', function () {
    return view('administrator.view_progress.reservation_progress.main');
});

//employee
Route::get('/employee', function () {
    return view('employee.main');
});

Route::get('/train-manager', function () {
    return view('employee.train_manager.main');
});

Route::get('/station-manager', function () {
    return view('employee.station_manager.main');
});

Route::get('reservation-manager', function () {
    return view('employee.reservation_manager.reservation_requests.main');
});

Route::get('/view-reservation', function () {
    return view('employee.reservation_manager.view_reservation.main');
});

Route::get('/line-details', function () {
    return view('employee.line_details.main');
});