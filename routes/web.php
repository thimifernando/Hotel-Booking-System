<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MyBlogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SenterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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


Route::get('/',[IndexController::class, 'index']) ->name('index');
Route::get('/senter', [SenterController::class, 'senter'])->name('senter');
Route::get('/about', [AboutController::class, 'about'])->name('about');


Route::get('/contacts', [ContactController::class, 'create'])->name('contact');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

Route::get('/booking', [BookingController::class, 'create'])->name('booking');
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');


Route::get('/team', function () {
    return view('team');
});
Route::get('/testimonial', function () {
    return view('testimonial');
});
Route::get('/room',[RoomController::class, 'index'])->name('room');


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/user', [AuthController::class, 'create'])->name('user.create'); 

Route::post('/user/store', [AuthController::class, 'store'])->name('user.store');







Route::group(['middleware'=>['auth']],function(){
  
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');    
   Route::get('profile',[ProfileController::class,'index'])->name('profile');
   Route::post('user/update',[AuthController::class,'update'])->name('user.update');
   Route::get('user/edit',[AuthController::class,'edit'])->name('user.edit');
   



   

    Route::get('myblog/', [MyBlogController::class, 'index'])->name('myblog.index');
    Route::get('myblog/add', [MyBlogController::class, 'create'])->name('myblog.create');
    Route::post('myblog/store', [MyBlogController::class, 'store'])->name('myblog.store');
    Route::get('myblog/view', [MyBlogController::class, 'show'])->name('myblog.show');
    Route::get('myblog/edit', [MyBlogController::class, 'edit'])->name('myblog.edit');
    Route::post('myblog/update', [MyBlogController::class, 'update'])->name('myblog.update');
    
 
    Route::get('myblog/destroy', [MyBlogController::class, 'destroy'])->name('myblog.destroy');

    Route::group(['middleware' => ['auth', 'auth.role:ADMIN']], function () {
        
        Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
        Route::get('blog/add', [BlogController::class, 'create'])->name('blog.create');
        Route::post('blog/store', [BlogController::class, 'store'])->name('blog.store');
        Route::get('blog/view', [BlogController::class, 'show'])->name('blog.show');
        Route::get('blog/edit', [BlogController::class, 'edit'])->name('blog.edit');
        Route::post('blog/status', [BlogController::class, 'status'])->name('blog.status');
        Route::post('blog/update', [BlogController::class, 'update'])->name('blog.update'); 
        Route::get('blog/destroy', [BlogController::class, 'destroy'])->name('blog.destroy');

        // Route::get('booking/', [BookingController::class, 'index'])->name('booking.index');
  
        Route::get('/booking/index', [BookingController::class, 'index'])->name('booking.index');

        Route::get('contact/', [ContactController::class, 'index'])->name('contact.index');
        Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
     

    });



});





