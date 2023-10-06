<?php

use App\Http\Controllers\emp\EmpsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\service\ServiceLogController;
use App\Http\Controllers\technician\technician_feedback;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::get('/clearcache', function () {
    Artisan::call('optimize:clear');

    return 'Application cache has been cleared';
});

Route::get('/configcache', function () {
    Artisan::call('config:cache');

    return 'Application cache configed';
});

Route::get('/routecache', function () {
    Artisan::call('route:cache');

    return 'Application route configed';
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/test', [HomeController::class, 'test'])->name('test');
    Route::get('/gal', [HomeController::class, 'gal'])->name('gal');
    Route::get('/getdata', [HomeController::class, 'getedate'])->name('getdata');
    Route::get('/lout', [HomeController::class, 'lout'])->name('lout');

    //----------------------------------------------------------------------
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // EMP
    Route::get('/goEmp', [EmpsController::class, 'index'])->name('goEmp');
    Route::post('/store-emp', [EmpsController::class, 'store'])->name('store-emp');
    Route::get('/get-emp-data', [EmpsController::class, 'getData'])->name('get-emp-data');
    Route::get('/update-emp-status', [EmpsController::class, 'updateEmpStatus'])->name('update-emp-status');
    Route::get('/destroy-emp', [EmpsController::class, 'destroy'])->name('destroy-emp');
    Route::get('/contact-index', [EmpsController::class, 'contacts'])->name('contact-index');

    //Services
    Route::get('/FirstCall-index', [ServiceLogController::class, 'FirstCall'])->name('FirstCall-index');
    Route::get('/serviceTechAddindex/{id}', [ServiceLogController::class, 'TechAdd'])->name('serviceTechAddindex');
    Route::Post('/service-log-store', [ServiceLogController::class, 'store'])->name('service-log-store');
    Route::get('/get-log-data', [ServiceLogController::class, 'getData'])->name('get-log-data');
    Route::get('/get-outlet_code', [ServiceLogController::class, 'getOutletCode'])->name('get-outlet_code');
    Route::get('/get-outlet_detais', [ServiceLogController::class, 'getOutletdetails'])->name('get-outlet_detais');

    //inservicee addt
    Route::Post('/log-Techstore', [ServiceLogController::class, 'Techstore'])->name('service-log-Techstore');
    Route::get('/log-getTechList', [ServiceLogController::class, 'getTechList'])->name('service-log-getTechList');
    Route::get('/CloseOpenTask', [ServiceLogController::class, 'CloseOpenTask'])->name('service-log-CloseOpenTask');

    //tech feedback
    Route::get('/goTechfeedback', [technician_feedback::class, 'index'])->name('goTechfeedback');
    Route::get('/getLogdetails', [technician_feedback::class, 'getLogdetails'])->name('getLogdetails');
    Route::post('/store-titem', [technician_feedback::class, 'store'])->name('store-titem');
    Route::get('/getfeedbackist', [technician_feedback::class, 'getfeedbackist'])->name('getfeedbackist');
});
