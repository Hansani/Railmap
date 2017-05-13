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


//common
Route::get('/log-in', function () {
    return view('common.log_in.main');
});

Route::post('/login', 'AuthController@login');
Route::get('logout', 'AuthController@logout');

Route::get('/change-password', function () {
    return view('common.change_password.main');
});

Route::get('/profile', 'AuthController@viewProfile');

//administrator
Route::get('/administrator', function () {
    return view('administrator.main');
});

Route::get('/employee-manager', 'EmployeeController@UpdateEmployee');
Route::post('submit-employee-manager' , 'EmployeeController@addEmployee');

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

Route::get('/train-manager', 'TrainController@loadTrain');
Route::post('/submit-train', 'TrainController@submitTrain');
Route::post('delete-train', 'TrainController@deleteTrain');
Route::get('/load-train-station', 'TrainController@loadTrainStation');
Route::post('/submit-train-station', 'TrainController@trainStation');

Route::get('/station-manager', 'StationController@loadStation');
Route::post('/submit-station', 'StationController@submitStation');
Route::post('/delete-station', 'StationController@deleteStation');

Route::get('/reservation-manager', 'ReservationController@loadReservation');
Route::get('/view-reservation', 'ReservationController@viewReservation');
Route::get('/accept-reservation', 'ReservationController@acceptReservation');

Route::get('/line-details', 'LineController@loadLines');
Route::post('submit-line-details', 'LineController@submitLine');
Route::post('delete-line-details', 'LineController@deleteLine');
//Auth::routes();
//
//Route::get('/home', 'HomeController@index');
