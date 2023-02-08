<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TenantController;
use App\Http\Controllers\Admin\LandlordController;
use App\Http\Controllers\Admin\LeaseController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);


Route::group(['middleware' => ['auth', 'admin']], function () {
    
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });   
    
    
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);


    Route::get('/role-register', [App\Http\Controllers\Admin\DashboardController::class, 'registered']);

    Route::get('/role-edit/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'registeredit']);
    Route::put('/role-register-update/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'registerupdate']);
    Route::delete('/role-delete/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'registerdelete']);

    Route::get('/tenant-register', [App\Http\Controllers\Admin\TenantController::class, 'index']);
    Route::get('/tenants/pdf', [App\Http\Controllers\Admin\TenantController::class, 'export_pdf']);
    Route::post('/save-tenant', [App\Http\Controllers\Admin\TenantController::class, 'store']);
    Route::get('/tenant-edit/{id}', [App\Http\Controllers\Admin\TenantController::class, 'edit']);
    Route::put('/tenant-update/{id}',[App\Http\Controllers\Admin\TenantController::class, 'update']);
    Route::delete('/tenant-delete/{id}',[App\Http\Controllers\Admin\TenantController::class, 'delete']);
    

    Route::get('/landlord-register', [App\Http\Controllers\Admin\LandlordController::class, 'index']);
    Route::get('/landlords/pdf', [App\Http\Controllers\Admin\LandlordController::class, 'export_pdf']);
    Route::post('/save-landlord', [App\Http\Controllers\Admin\LandlordController::class, 'store']);
    Route::get('/landlord-edit/{id}', [App\Http\Controllers\Admin\LandlordController::class, 'edit']);
    Route::put('/landlord-update/{id}',[App\Http\Controllers\Admin\LandlordController::class, 'update']);
    Route::delete('/landlord-delete/{id}',[App\Http\Controllers\Admin\LandlordController::class, 'delete']);

    Route::get('/lease-register', [App\Http\Controllers\Admin\LeaseController::class, 'index']);
    Route::get('/leases/pdf', [App\Http\Controllers\Admin\LeaseController::class, 'export_pdf']);
    Route::post('/save-lease', [App\Http\Controllers\Admin\LeaseController::class, 'store']);
    Route::get('/lease-edit/{id}', [App\Http\Controllers\Admin\LeaseController::class, 'edit']);
    Route::put('/lease-update/{id}', [App\Http\Controllers\Admin\LeaseController::class, 'update']);
    Route::delete('/lease-delete/{id}', [App\Http\Controllers\Admin\LeaseController::class, 'delete']);
    Route::get('/send-email/{user}', [App\Http\Controllers\Admin\MailController::class, 'sendEmail']);

    Route::get('/property-register', [App\Http\Controllers\Admin\PropertyController::class, 'index']);
    Route::get('/properties/pdf', [App\Http\Controllers\Admin\PropertyController::class, 'export_pdf']);
    Route::post('/save-property', [App\Http\Controllers\Admin\PropertyController::class, 'store']);
    Route::get('/property-edit/{id}', [App\Http\Controllers\Admin\PropertyController::class, 'edit']);
    Route::put('/property-update/{id}',[App\Http\Controllers\Admin\PropertyController::class, 'update']);
    Route::delete('/property-delete/{id}',[App\Http\Controllers\Admin\PropertyController::class, 'delete']);

    Route::get('/unit-register', [App\Http\Controllers\Admin\UnitController::class, 'index']);
    Route::get('/units/pdf', [App\Http\Controllers\Admin\UnitController::class, 'export_pdf']);
    Route::post('/save-unit', [App\Http\Controllers\Admin\UnitController::class, 'store']);
    Route::get('/unit-edit/{id}', [App\Http\Controllers\Admin\UnitController::class, 'edit']);
    Route::put('/unit-update/{id}',[App\Http\Controllers\Admin\UnitController::class, 'update']);
    Route::delete('/unit-delete/{id}',[App\Http\Controllers\Admin\UnitController::class, 'delete']);

    Route::get('/payment-register', [App\Http\Controllers\Admin\PaymentController::class, 'index']);
    Route::get('/payment/pdf', [App\Http\Controllers\Admin\PaymentController::class, 'export_pdf']);
    Route::post('/save-payment', [App\Http\Controllers\Admin\PaymentController::class, 'store']);
    Route::get('/payment-edit/{id}', [App\Http\Controllers\Admin\PaymentController::class, 'edit']);
    Route::put('/payment-update/{id}',[App\Http\Controllers\Admin\PaymentController::class, 'update']);
    Route::delete('/payment-delete/{id}',[App\Http\Controllers\Admin\PaymentController::class, 'delete']);

});

