<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\LoginController;
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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::middleware(['guest'])->group(function () {
  Route::get('/login', [LoginController::class, 'login'])->name('login');
  Route::post('/loginpost', [LoginController::class, 'loginPost']);
});

Route::group(['middleware' => ['level:admin,cashier', 'auth']], function () {
  Route::get('/', [DashboardController::class, 'dashboard']);
  Route::resource('/supplier', SupplierController::class);
  Route::resource('/customer', CustomerController::class);
  Route::resource('/category', CategoryController::class);
  Route::resource('/unit', UnitController::class);
  Route::resource('/item', ItemController::class);
  Route::resource('/user', UserController::class);
  Route::get('/stock-in', [StockController::class, 'stockIn'])->name('stock-in');
  Route::get('/stock-out', [StockController::class, 'stockOut'])->name('stock-out');
  Route::get('/stock-in/add', [StockController::class, 'stockInAdd'])->name('stock-in.add');
  Route::get('/stock-out/add', [StockController::class, 'stockOutAdd'])->name('stock-out.add');
  Route::post('/stock-in', [StockController::class, 'stockInStore'])->name('stock-in.store');
  Route::post('/stock-out', [StockController::class, 'stockOutStore'])->name('stock-out.store');
  Route::delete('/stock-in/{id}', [StockController::class, 'stockInDestroy'])->name('stock-in.destroy');
  Route::delete('/stock-out/{id}', [StockController::class, 'stockOutDestroy'])->name('stock-out.destroy');
  Route::get('/sale',[SaleController::class, 'index'])->name('sale.index');
  Route::post('/sale',[SaleController::class, 'saleProcess'])->name('sale.store');
  Route::get('/page-invoice/{id}', [SaleController::class, 'printInvoice'])->name('sale.page-invoice');
  Route::get('/sale-report', [SaleController::class, 'report'])->name('sale.report');
  Route::get('/stock-report', [StockController::class, 'report'])->name('stock.report');
  Route::post('/sale-filter', [SaleController::class, 'dateFilter'])->name('sale.filter');
  Route::post('/sale-pdf', [SaleController::class, 'salePdf'])->name('sale.pdf');
  Route::post('/stock-pdf', [StockController::class, 'stockPdf'])->name('stock.pdf');
  Route::post('/filter-report', [StockController::class, 'filterReport'])->name('stock.filter');
  Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
  Route::post('/profile-update', [DashboardController::class, 'profileUpdate'])->name('profile.update');
  Route::get('/configuration', [DashboardController::class, 'configuration'])->name('configuration');
  Route::post('/configuration_update', [DashboardController::class, 'configuration_update'])->name('configuration_update');

});

Route::get('/logout', [LoginController::class, 'logout']);
