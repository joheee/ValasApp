<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValasController;
use Illuminate\Support\Facades\Route;

Route::middleware('isGuest')->group(function() {
    Route::get('/', [UserController::class,'login'])->name('guest.login');
    Route::post('/', [UserController::class,'handleLogin'])->name('guest.handleLogin');
});

Route::middleware('auth')->group(function() {
    Route::get('/handle-logout', [UserController::class,'handleLogout'])->name('auth.handleLogout');

    Route::middleware('isAdmin')->group(function() {
        Route::get('/admin-valas', [ValasController::class, 'valasRead'])->name('admin.valasRead');
        Route::get('/admin-valas-insert', [ValasController::class, 'valasInsert'])->name('admin.valasInsert');
        Route::post('/admin-valas-insert', [ValasController::class, 'handleValasInsert'])->name('admin.handleValasInsert');
        Route::get('/admin-valas-delete/{id}', [ValasController::class, 'handleValasDelete'])->name('admin.handleValasDelete');
        Route::get('/admin-valas-update/{id}', [ValasController::class, 'valasUpdate'])->name('admin.valasUpdate');
        Route::post('/admin-valas-update/{id}', [ValasController::class, 'handleValasUpdate'])->name('admin.handleValasUpdate');

        Route::get('/admin-customer', [CustomerController::class, 'customerRead'])->name('admin.customerRead');
        Route::get('/admin-customer-insert', [CustomerController::class, 'customerInsert'])->name('admin.customerInsert');
        Route::post('/admin-customer-insert', [CustomerController::class, 'handleCustomerInsert'])->name('admin.handleCustomerInsert');
        Route::get('/admin-customer-delete/{id}', [CustomerController::class, 'handleCustomerDelete'])->name('admin.handleCustomerDelete');
        Route::get('/admin-customer-update/{id}', [CustomerController::class, 'customerUpdate'])->name('admin.customerUpdate');
        Route::post('/admin-customer-update/{id}', [CustomerController::class, 'handleCustomerUpdate'])->name('admin.handleCustomerUpdate');

        Route::get('/admin-transaksi', [TransaksiController::class, 'transaksiRead'])->name('admin.transaksiRead');
        Route::get('/admin-transaksi-insert', [TransaksiController::class, 'transaksiInsert'])->name('admin.transaksiInsert');
        Route::post('/admin-transaksi-insert', [TransaksiController::class, 'handleTransaksiInsert'])->name('admin.handleTransaksiInsert');
        Route::get('/admin-transaksi-delete/{id}', [TransaksiController::class, 'handleTransaksiDelete'])->name('admin.handleTransaksiDelete');
        Route::get('/admin-transaksi-update/{id}', [TransaksiController::class, 'transaksiUpdate'])->name('admin.transaksiUpdate');
        Route::post('/admin-transaksi-update/{id}', [TransaksiController::class, 'handleTransaksiUpdate'])->name('admin.handleTransaksiUpdate');
    });

    Route::middleware('isSuperAdmin')->group(function() {
        Route::get('/super-admin-membership', [MembershipController::class, 'membershipRead'])->name('superAdmin.membershipRead');
        Route::get('/super-admin-membership-insert', [MembershipController::class, 'membershipInsert'])->name('superAdmin.membershipInsert');
        Route::post('/super-admin-membership-insert', [MembershipController::class, 'handleMembershipInsert'])->name('superAdmin.handleMembershipInsert');
        Route::get('/super-admin-membership-delete/{id}', [MembershipController::class, 'handleMembershipDelete'])->name('superAdmin.handleMembershipDelete');
        Route::get('/super-admin-membership-update/{id}', [MembershipController::class, 'membershipUpdate'])->name('superAdmin.membershipUpdate');
        Route::post('/super-admin-membership-update/{id}', [MembershipController::class, 'handleMemberpshipUpdate'])->name('superAdmin.handleMembershipUpdate');

        Route::get('/super-admin-transaksi', [TransaksiController::class, 'transaksiSuperAdmin'])->name('superAdmin.transaksiSuperAdmin');
    });
});
