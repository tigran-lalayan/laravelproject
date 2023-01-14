<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\AdminUsersProfileController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
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




Route::get('/', 'HomeController@index');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/contact', [ContactController::class, 'index'])->name('contacts');
Route::post('/contact', [ContactController::class, 'store'])->name('contact_store');

Route::get('/about', [AboutController::class, 'index'])->name('about');


Auth::routes();

// Admin routes
Route::middleware(['auth', 'is_admin'])->group(function() {
    Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('admin_profile');
    Route::get('/admin/users', [AdminUsersController::class, 'index'])->name('admin_users');
    Route::get('/admin/users/{user}', [AdminUsersProfileController::class, 'show'])->name('admin_user_profile');
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin_dashboard');
    Route::post('admin_update_profile', [AdminProfileController::class, 'update'])->name('admin_update_profile');
    Route::post('/admin/users/{user}/promote', [AdminUsersProfileController::class, 'promote'])->name('admin_promote_user');
    Route::get('/admin/users/{user}/promote', [AdminUsersProfileController::class, 'promote'])->name('admin_promote_user');

    Route::post('admin_promote_user', [AdminUsersProfileController::class, 'promote'])->name('admin_promote_user');

    Route::match(['get', 'post'], 'admin/news', [AdminNewsController::class, 'index'])->name('admin_news_index');
    Route::get('admin/news/{id}/edit', [AdminNewsController::class, 'edit'])->name('admin_news_edit');
    Route::get('admin/news/create', [AdminNewsController::class, 'create'])->name('admin_news_create');
    Route::post('admin/news', [AdminNewsController::class, 'store'])->name('admin_news_store');
    Route::delete('admin/news/{id}', [AdminNewsController::class, 'destroy'])->name('admin_news_destroy');
    Route::put('admin/news/{id}', [AdminNewsController::class, 'update'])->name('admin_news_update');



    Route::get('/admin/faq', [AdminFaqController::class, 'Index'])->name('admin_faq_index');
    Route::get('admin/faq/create', [AdminFaqController::class, 'create'])->name('admin_faq_create');
    Route::post('/admin/faq', [AdminFaqController::class, 'Store'])->name('admin_faq_store');
    Route::get('/admin/faq/{id}/edit', [AdminFaqController::class, 'Edit'])->name('admin_faq_edit');
    Route::put('/admin/faq/{id}', [AdminFaqController::class, 'Update'])->name('admin_faq_update');
    Route::delete('/admin/faq/{id}', [AdminFaqController::class, 'Delete'])->name('admin_faq_delete');



    Route::get('/admin/category', [AdminCategoryController::class, 'Index'])->name('admin_category_index');
    Route::get('admin/category/create', [AdminCategoryController::class, 'create'])->name('admin_category_create');
    Route::post('/admin/category', [AdminCategoryController::class, 'Store'])->name('admin_category_store');
    Route::get('/admin/category/{id}/edit', [AdminCategoryController::class, 'Edit'])->name('admin_category_edit');
    Route::put('/admin/category/{id}', [AdminCategoryController::class, 'Update'])->name('admin_category_update');
    Route::delete('/admin/category/{id}', [AdminCategoryController::class, 'Delete'])->name('admin_category_delete');


    Route::get('/contacts', [AdminContactController::class, 'index'])->name('admin_contacts');
    Route::delete('/contacts/{id}', [AdminContactController::class, 'destroy'])->name('admin_contacts_destroy');

});


// User routes
Route::middleware(['auth'])->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/users', [UsersController::class, 'index'])->name('users');
    Route::post('update_profile', [ProfileController::class, 'update'])->name('update_profile');
    Route::get('/user/{user}/profile', [UserProfileController::class, 'show'])->name('user_profile');

});
