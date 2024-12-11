<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController as ControllersDashboardController;

//admin
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\VehicleController;
use Illuminate\Routing\Router;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//login
// Route::group(['prefix' => 'auth'], function (){
  Route::get('register', [AuthController::class, 'register']);
  Route::post('register', [AuthController::class, 'create_user']);
  Route::get('login', [AuthController::class, 'login'])->name('login');
  Route::post('login', [AuthController::class, 'login_post'])->name('login_post');
  Route::get('logout', [AuthController::class, 'logout'])->name('logout');
  // Route::get('forget', [AuthController::class, 'forger']);
  Route::get('profile', [Authcontroller::class, 'profile']);
  Route::post('profile', [Authcontroller::class, 'profile_post'])->name('profile_post');
  //thay đổi mật khẩu
  Route::get('change_password', [Authcontroller::class, 'change_password']);
  Route::post('change_password', [Authcontroller::class, 'change_post'])->name('change_post');
  //lấy lại mật khẩu
  Route::get('forget', [Authcontroller::class, 'forget']);
  Route::post('forget', [Authcontroller::class, 'forget_post'])->name('forget_post');
  // mật khâủ mới     
  Route::get('reset', [Authcontroller::class, 'reset']);
  Route::post('reset', [Authcontroller::class, 'reset_post'])->name('reset_post');
  //kiểm tra email có tồn tại chưa
  Route::post('/check-email', [AuthController::class, 'checkEmail']);
  // });


//trang chu
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::prefix('home')->group(function () {
  Route::get('/', [HomeController::class, 'index'])->name('home');
});
Route::get('contact', [HomeController::class, 'contact']);
Route::get('contact', [HomeController::class, 'showContactForm'])->name('contact.form');
Route::post('contact/send', [HomeController::class, 'sendContact'])->name('contact.send');
Route::get('booking', [HomeController::class, 'booking']);
Route::get('booking',[HomeController::class,'showBookingForm'])->name('booking.form');
Route::post('booking/send', [HomeController::class, 'sendBooking'])->name('booking.send');
Route::get('blog', [HomeController::class, 'blog']);
Route::get('blogdetail/{id}', [HomeController::class, 'blogdetail'])->name('blogdetail');
Route::post('blog/send-comment', [HomeController::class, 'sendCommentBlog'])->name('blog.comment.send');


// trang quản trị
// đăng nhập admin
Route::group(['middleware' => 'auth'], function () {

  Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin');
  });

  // vai trò admin
  Route::group(['middleware' => 'admin'], function () {
    
    //người dùng users
    Route::get('/add-user', [UserController::class, 'add_user']);
    Route::post('/save-user', [UserController::class, 'save_user']);
    Route::get('/all-user', [UserController::class, 'all_user']);
    Route::get('/delete-user/{UserID}', [UserController::class, 'delete_user']);
    Route::get('/edit-user/{user_id}', 'App\Http\Controllers\Admin\UserController@edit_user');
    Route::post('/update-user/{user_id}', 'App\Http\Controllers\Admin\UserController@update_user')->name('update_user');
  });
  //ql phản hồi
  Route::get('/add-contact', [ContactController::class, 'add_contact']);
  Route::post('/save-contact', [ContactController::class, 'save_contact']);
  Route::get('/all-contact', [ContactController::class, 'all_contact']);
  Route::get('/delete-contact/{contactID}', [ContactController::class, 'delete_contact']);
  Route::get('/edit-contact/{contact_id}', 'App\Http\Controllers\Admin\ContactController@edit_contact');
  Route::post('/update-contact/{contact_id}', 'App\Http\Controllers\Admin\ContactController@update_contact')->name('update_contact');
  //khachdang
  Route::get('/add-customer', [CustomerController::class, 'add_customer']);
  Route::post('/save-customer', [CustomerController::class, 'save_customer']);
  Route::get('/all-customer', [CustomerController::class, 'all_customer']);
  Route::get('/delete-customer/{customerID}', [CustomerController::class, 'delete_customer']);
  Route::get('/edit-customer/{customer_id}', 'App\Http\Controllers\Admin\CustomerController@edit_customer');
  Route::post('/update-customer/{customer_id}', 'App\Http\Controllers\Admin\CustomerController@update_customer')->name('update_customer');
  //ql xe
  Route::get('/add-vehicle', [VehicleController::class, 'add_vehicle']);
  Route::post('/save-vehicle', [VehicleController::class, 'save_vehicle']);
  Route::get('/all-vehicle', [VehicleController::class, 'all_vehicle']);
  Route::get('/delete-vehicle/{vehicleID}', [VehicleController::class, 'delete_vehicle']);
  Route::get('/edit-vehicle/{vehicle_id}', 'App\Http\Controllers\Admin\VehicleController@edit_vehicle');
  Route::post('/update-vehicle/{vehicle_id}', 'App\Http\Controllers\Admin\VehicleController@update_vehicle')->name('update_vehicle');
  //ql đặt chỗ
  Route::get('/add-reservation', [ReservationController::class, 'add_reservation']);
  Route::post('/save-reservation', [ReservationController::class, 'save_reservation']);
  Route::get('/all-reservation', [ReservationController::class, 'all_reservation']);
  Route::get('/delete-reservation/{reservationID}', [ReservationController::class, 'delete_reservation']);
  Route::get('/edit-reservation/{reservation_id}', 'App\Http\Controllers\Admin\ReservationController@edit_reservation');
  Route::post('/update-reservation/{reservation_id}', 'App\Http\Controllers\Admin\ReservationController@update_reservation')->name('update_reservation');
  Route::post('/update-status/{id}', [ReservationController::class, 'updateStatus']);
  //ql lịch sử của xe
  Route::get('/add-log', [LogController::class, 'add_log']);
  Route::post('/save-log', [LogController::class, 'save_log']);
  Route::get('/all-log', [LogController::class, 'all_log']);
  Route::get('/delete-log/{logID}', [LogController::class, 'delete_log']);
  Route::get('/edit-log/{log_id}', 'App\Http\Controllers\Admin\LogController@edit_log');
  Route::post('/update-log/{log_id}', 'App\Http\Controllers\Admin\LogController@update_log')->name('update_log');
});
