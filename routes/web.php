<?php

use App\Http\Controllers\AdminAddOnController;
use App\Http\Controllers\AdminAdminsController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminFacilitiesController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminReservationController;
use App\Http\Controllers\AdminReviewController;
use App\Http\Controllers\AdminRoomController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\AdminVillaController;
use App\Http\Controllers\UserAddOnController;
use App\Http\Controllers\UserAuthControlller;
use App\Http\Controllers\UserCheckoutController;
use App\Http\Controllers\UserHomeCotroller;
use App\Http\Controllers\UserOrdersController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserRoomController;
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

Route::get('/', [UserHomeCotroller::class, 'index'])->name('home');

Route::get('login', [UserAuthControlller::class, 'login'])->name('login');
Route::get('register', [UserAuthControlller::class, 'register'])->name('register');
Route::post('register/store', [UserAuthControlller::class, 'store'])->name('register.store');
Route::post('register/auth', [UserAuthControlller::class, 'auth'])->name('auth');
Route::get('logout', [UserAuthControlller::class, 'logout'])->name('logout');

Route::get('forgot-password', [UserAuthControlller::class, 'forgotPassword'])->name('forgot-password');
Route::post('forgot-password/store', [UserAuthControlller::class, 'resetPassword'])->name('reset-password.store');
Route::get('reset-password/{token}', [UserAuthControlller::class, 'changePasswordIndex'])->name('reset-password');
Route::post('reset-password/store', [UserAuthControlller::class, 'changePassword'])->name('change-password');

Route::get('rooms/{id}', [UserRoomController::class, 'index'])->name('rooms');
Route::post('rooms/{id}/checkout', [UserRoomController::class, 'checkout'])->name('rooms.checkout');

Route::get('add-ons', [UserAddOnController::class, 'index'])->name('add-ons.index');
Route::post('add-ons/post', [UserAddOnController::class, 'post'])->name('add-ons.post');

Route::get('checkout', [UserCheckoutController::class, 'index'])->name('checkout');
Route::put('checkout/update', [UserCheckoutController::class, 'update'])->name('checkout.update');

Route::get('/profile', [UserProfileController::class, 'index'])->name('profile.index');
Route::put('/profile/update', [UserProfileController::class, 'update'])->name('profile.update');
Route::get('/profile/password', [UserProfileController::class, 'password'])->name('profile.password');
Route::put('/profile/password/update', [UserProfileController::class, 'passwordChange'])->name('profile.password.update');

Route::get('orders', [UserOrdersController::class, 'index'])->name('orders');
Route::get('invoice/{id}', [UserOrdersController::class, 'invoice'])->name('invoice');
Route::post('invoice/{id}', [UserOrdersController::class, 'payment'])->name('invoice.payment');
Route::put('invoice/{id}/update', [UserOrdersController::class, 'update'])->name('update');
Route::get('invoice/{id}/cancel', [UserOrdersController::class, 'cancel'])->name('cancel');
Route::post('invoice/{id}/rating', [UserOrdersController::class, 'rating'])->name('rating');

Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin.login.index');
Route::post('/admin/login/auth', [AdminLoginController::class, 'auth'])->name('admin.login.auth');
Route::get('/admin/login/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::get('/admin', [AdminDashboardController::class, 'index'])->name('dashboard');

Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile.index');
Route::put('/admin/profile/update', [AdminProfileController::class, 'update'])->name('admin.profile.update');
Route::put('/admin/profile/password', [AdminProfileController::class, 'password'])->name('admin.profile.password');

Route::get('/admin/users', [AdminUsersController::class, 'index'])->name('admin.users.index');
Route::post('/admin/users', [AdminUsersController::class, 'search'])->name('admin.users.search');
Route::get('/admin/users/edit/{id}', [AdminUsersController::class, 'edit'])->name('admin.users.edit');
Route::put('/admin/users/edit/{id}/update', [AdminUsersController::class, 'update'])->name('admin.users.update');

Route::get('/admin/facilities', [AdminFacilitiesController::class, 'index'])->name('admin.facilities.index');
Route::post('/admin/facilities', [AdminFacilitiesController::class, 'search'])->name('admin.facilities.search');
Route::get('/admin/facilities/add', [AdminFacilitiesController::class, 'add'])->name('admin.facilities.add');
Route::post('/admin/facilities/store', [AdminFacilitiesController::class, 'store'])->name('admin.facilities.store');
Route::get('/admin/facilities/edit/{id}', [AdminFacilitiesController::class, 'edit'])->name('admin.facilities.edit');
Route::put('/admin/facilities/edit/{id}/update', [AdminFacilitiesController::class, 'update'])->name('admin.facilities.update');
Route::delete('/admin/facilities/edit/{id}/delete', [AdminFacilitiesController::class, 'delete'])->name('admin.facilities.delete');

Route::get('/admin/admins', [AdminAdminsController::class, 'index'])->name('admin.admins.index');
Route::get('/admin/admins/add', [AdminAdminsController::class, 'add'])->name('admin.admins.add');
Route::post('/admin/admins/store', [AdminAdminsController::class, 'store'])->name('admin.admins.store');
Route::get('/admin/admins/edit/{id}', [AdminAdminsController::class, 'edit'])->name('admin.admins.edit');
Route::put('/admin/admins/edit/{id}/update', [AdminAdminsController::class, 'update'])->name('admin.admins.update');
Route::delete('/admin/admins/edit/{id}/delete', [AdminAdminsController::class, 'delete'])->name('admin.admins.delete');

Route::get('/admin/villa', [AdminVillaController::class, 'index'])->name('admin.villa.index');
Route::put('/admin/villa', [AdminVillaController::class, 'update'])->name('admin.villa.update');

Route::get('/admin/villa/rooms', [AdminRoomController::class, 'index'])->name('admin.villa.rooms.index');
Route::post('/admin/villa/rooms', [AdminRoomController::class, 'search'])->name('admin.villa.rooms.search');
Route::get('/admin/villa/rooms/add', [AdminRoomController::class, 'add'])->name('admin.villa.rooms.add');
Route::post('/admin/villa/rooms/store', [AdminRoomController::class, 'store'])->name('admin.villa.rooms.store');
Route::get('/admin/villa/rooms/edit/{id}', [AdminRoomController::class, 'edit'])->name('admin.villa.rooms.edit');
Route::put('/admin/villa/rooms/edit/{id}/update', [AdminRoomController::class, 'update'])->name('admin.villa.rooms.update');

Route::get('/admin/addons', [AdminAddOnController::class, 'index'])->name('admin.addons.index');
Route::post('/admin/addons/rooms', [AdminAddOnController::class, 'search'])->name('admin.addons.search');
Route::get('/admin/addons/add', [AdminAddOnController::class, 'add'])->name('admin.addons.add');
Route::post('/admin/addons/store', [AdminAddOnController::class, 'store'])->name('admin.addons.store');
Route::get('/admin/addons/edit/{id}', [AdminAddOnController::class, 'edit'])->name('admin.addons.edit');
Route::put('/admin/addons/edit/{id}/update', [AdminAddOnController::class, 'update'])->name('admin.addons.update');
Route::delete('/admin/addons/edit/{id}/delete', [AdminAddOnController::class, 'delete'])->name('admin.addons.delete');

Route::get('/admin/reservations', [AdminReservationController::class, 'index'])->name('admin.reservations.index');
Route::post('/admin/reservations', [AdminReservationController::class, 'search'])->name('admin.reservations.search');
Route::get('/admin/reservations/export', [AdminReservationController::class, 'export'])->name('admin.reservations.export');
Route::get('/admin/reservations/download', [AdminReservationController::class, 'download'])->name('admin.reservations.download');
Route::get('/admin/reservations/detail/{id}', [AdminReservationController::class, 'detail'])->name('admin.reservations.detail');
Route::get('/admin/reservations/detail/{id}/complete', [AdminReservationController::class, 'complete'])->name('admin.reservations.complete');

Route::get('/admin/reviews', [AdminReviewController::class, 'index'])->name('admin.reviews.index');
Route::post('/admin/reviews', [AdminReviewController::class, 'search'])->name('admin.reviews.search');
Route::get('/admin/reviews/{id}/delete', [AdminReviewController::class, 'delete'])->name('admin.reviews.delete');