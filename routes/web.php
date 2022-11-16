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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::name('department.')
    ->prefix('/department')
    ->group(function (){
        Route::get('/', 'DepartmentController@index')->name('index');    
        Route::post('/register', 'DepartmentController@register')->name('register');    
        Route::post('/{departmentId}/update', 'DepartmentController@update')->name('update');    
        Route::get('/{departmentId}/delete', 'DepartmentController@delete')->name('delete');    
        Route::name('service.')
        ->prefix('/{departmentId}/service')
        ->group(function (){
            Route::get('/', 'ServiceController@index')->name('index');
            Route::post('/register', 'ServiceController@register')->name('register');
            Route::post('/{serviceId}/update', 'ServiceController@update')->name('update');
            Route::get('/{serviceId}/delete', 'ServiceController@delete')->name('delete');
        });
    });

    Route::name('patient.')
    ->prefix('/patient')
    ->group(function (){
        Route::get('/', 'PatientController@index')->name('index');
        Route::post('/register', 'PatientController@register')->name('register');
        Route::post('/{patientId}/update', 'PatientController@update')->name('update');
        Route::post('/{patientId}/add-service', 'PatientController@addService')->name('addservice');
        Route::post('/verify', 'PatientController@verify')->name('verify');
        Route::get('/{patientId}/delete', 'PatientController@delete')->name('delete');
        Route::get('/{patientId}/service', 'PatientController@service')->name('service');
    });

    Route::name('staff.')
    ->prefix('/staff')
    ->group(function (){
        Route::get('/', 'StaffController@index')->name('index');
        Route::post('/register', 'StaffController@register')->name('register');
        Route::post('/{staffId}/update', 'StaffController@update')->name('update');
        Route::get('/{staffId}/delete', 'StaffController@delete')->name('delete');
        Route::name('service.')
        ->prefix('/{staffId}/service')
        ->group(function (){
            Route::get('/', 'StaffServiceController@index')->name('index');
            Route::post('/register', 'StaffServiceController@register')->name('register');
            Route::post('/{serviceId}/update', 'StaffServiceController@update')->name('update');
            Route::get('/{serviceId}/delete', 'StaffServiceController@delete')->name('delete');
        });
    });
});    
