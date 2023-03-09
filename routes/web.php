<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChartOfAccountController;
use App\Http\Controllers\CodeRoomController;
use App\Http\Controllers\DamagedGoodController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GoodController;
use App\Http\Controllers\GoodEntryController;
use App\Http\Controllers\GoodLoanController;
use App\Http\Controllers\GoodOutController;
use App\Http\Controllers\IssuedGoodController;
use App\Http\Controllers\ReturnedGoodController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\PurchaseRequestController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarehouseController;
use App\Models\GoodEntry;
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


Route::get('/', [DashboardController::class, 'index'])
    ->middleware(['auth', 'admin', 'verified'])
    ->name('dashboard');

Route::resource('user', UserController::class)
    ->middleware(['auth', 'admin', 'verified']);

Route::get('/qrcode', [QrCodeController::class], 'index');

// Route::get('/good/{detail}', [GoodController::class, 'detail'])
//     ->name('good.detail')
//     ->middleware(['auth', 'admin', 'verified']);

Route::resource('good', GoodController::class)
    ->middleware(['auth', 'admin', 'verified']);

Route::resource('category', CategoryController::class)
    ->middleware(['auth', 'admin', 'verified']);

Route::resource('sub_category', SubCategoryController::class)
    ->middleware(['auth', 'admin', 'verified']);

Route::resource('gallery', GalleryController::class)
    ->middleware(['auth', 'admin', 'verified']);

Route::resource('code_room', CodeRoomController::class)
    ->middleware(['auth', 'admin', 'verified']);

Route::resource('room', RoomController::class)
    ->middleware(['auth', 'admin', 'verified']);

Route::resource('supplier', SupplierController::class)
    ->middleware(['auth', 'admin', 'verified']);

Route::resource('employee', EmployeeController::class)
    ->middleware(['auth', 'admin', 'verified']);

Route::resource('chart_of_account', ChartOfAccountController::class)
    ->middleware(['auth', 'admin', 'verified']);

Route::get('/pic', [GuestController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('pic');

Route::resource('warehouse', WarehouseController::class)
    ->middleware(['auth', 'verified']);

Route::resource('good_loan', GoodLoanController::class)
    ->middleware(['auth', 'verified']);

Route::get('/summary_report', [GoodEntryController::class, 'summary'])
    ->middleware(['auth', 'verified'])
    ->name('summary_report');

Route::get('summary_report/export_pdf', [GoodEntryController::class, 'summary_pdf'])
    ->middleware(['auth', 'verified'])
    ->name('summary_pdf');

Route::get('/depreciation_report', [GoodEntryController::class, 'depreciation'])
    ->middleware(['auth', 'verified'])
    ->name('depreciation_report');

Route::get('/good_entries/{good_entry}depreciation_edit', [GoodEntryController::class, 'depreciation_edit'])
    ->middleware(['auth', 'verified'])
    ->name('depreciation_edit');

Route::resource('good_entry', GoodEntryController::class)
    ->middleware(['auth', 'verified']);

Route::resource('good_out', GoodOutController::class)
    ->middleware(['auth', 'verified']);

Route::resource('damaged_good', DamagedGoodController::class)
    ->middleware(['auth', 'verified']);

Route::resource('issued_good', IssuedGoodController::class)
    ->middleware(['auth', 'verified']);

Route::resource('returned_good', ReturnedGoodController::class)
    ->middleware(['auth', 'verified']);

Route::get('/purchase/order', [PurchaseRequestController::class, 'order'])
    ->name('purchase.order')
    ->middleware(['auth', 'verified']);

Route::resource('request', PurchaseRequestController::class)
    ->middleware(['auth', 'verified']);

// Route::get('/summary_report', [ReportController::class, 'summary'])
//     ->middleware(['auth', 'verified'])
//     ->name('summary_report');

require __DIR__ . '/auth.php';
