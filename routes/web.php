<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
//use App\Http\Controllers\CartController;
//use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CommentController;
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

Route::get('admin/login', function(){
    return view('admin.users.login');
});
Route::get('admin/login_auth', [AuthController::class, 'login_auth'])->name('admin.login_auth');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('admin/register', [AuthController::class, 'register'])->name('admin.register');
Route::post('admin/register_auth', [AuthController::class, 'register_auth'])->name('admin.register_auth');


//Route::post('admin/login_auth', [AuthController::class, 'login_auth'])->name('admin.login_auth');

Route::middleware(['admin'])->name('admin.')->group(function () {
    //auth controller
//    Route::get('admin/register', [AuthController::class, 'register-auth'])->name('register');


    Route::get('admin/', [AdminController::class, 'index'])->name('index');
    Route::get('admin/create', [AdminController::class, 'create'])->name('create');
    Route::post('admin/store', [AdminController::class, 'store'])->name('store');
    Route::get('admin/show/{id}', [AdminController::class, 'show'])->name('show');
    Route::get('admin/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::patch('admin/update/{id}', [AdminController::class, 'update'])->name('update');
    Route::get('admin/block/{id}', [AdminController::class, 'block'])->name('block');
    Route::get('admin/edit_password/{id}', [AdminController::class, 'edit_password'])->name('edit_password');
    Route::post('admin/change_password/{id}', [AdminController::class, 'change_password'])->name('change_password');

    //food categories
    Route::get('admin/food_categories', [FoodCategoryController::class, 'index'])->name('food_categories.index');
    Route::get('admin/food_categories/create', [FoodCategoryController::class, 'create'])->name('food_categories.create');
    Route::post('admin/food_categories/store', [FoodCategoryController::class, 'store'])->name('food_categories.store');
    Route::get('admin/food_categories/edit/{id}', [FoodCategoryController::class, 'edit'])->name('food_categories.edit');
    Route::patch('admin/food_categories/update/{id}', [FoodCategoryController::class, 'update'])->name('food_categories.update');
    Route::get('admin/food_categories/delete/{id}', [FoodCategoryController::class, 'delete'])->name('food_categories.delete');
//foods
    Route::get('admin/foods/', [FoodController::class, 'index'])->name('foods.index');
    Route::get('admin/foods/create', [FoodController::class, 'create'])->name('foods.create');
    Route::post('admin/foods/store', [FoodController::class, 'store'])->name('foods.store');
    Route::get('admin/foods/show/{id}', [FoodController::class, 'show'])->name('foods.show');
    Route::get('admin/foods/edit/{id}', [FoodController::class, 'edit'])->name('foods.edit');
    Route::patch('admin/foods/update/{id}', [FoodController::class, 'update'])->name('foods.update');
    Route::get('admin/foods/delete/{id}', [FoodController::class, 'delete'])->name('foods.delete');

    ////Comments
    Route::get('admin/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::post('admin/allow_comment', [CommentController::class, 'allow_comment'])->name('comments.allow_comment');
    Route::post('admin/reply_comment', [CommentController::class, 'reply_comment'])->name('comments.reply_comment');

});

//user controller
Route::get('users', [UserController::class, 'index'])->name('user.index');
Route::get('users/all_foods', [UserController::class, 'all_foods'])->name('user.all_foods');

Route::post('user/assign_roles', [UserController::class, 'assign_roles'])->name('user.assign_roles');

Route::get('guest/index', [PageController::class, 'index'])->name('guest.index');
Route::get('guest/detail/{id}', [PageController::class, 'detail'])->name('guest.detail');
Route::get('guest/search', [PageController::class, 'search'])->name('guest.search');
Route::get('guest/show_category/{id}', [PageController::class, 'show_category'])->name('guest.show_category');

//comment
Route::post('guest/load_comment', [PageController::class, 'load_comment'])->name('guest.load_comment');
Route::post('guest/send_comment', [PageController::class, 'send_comment'])->name('guest.send_comment');


Route::get('guest/add_cart/{id}', [CartController::class, 'add_cart'])->name('guest.add_cart');
Route::get('guest/show_cart', [CartController::class, 'show_cart'])->name('guest.show_cart');
Route::get('guest/delete_cart/{id}', [CartController::class, 'delete_cart'])->name('guest.delete_cart');

Route::get('guest/order', [CartController::class,'order'])->name('guest.order');

Route::get('admin/transaction', [TransactionController::class, 'index'])->name('admin.transactions.index');
Route::post('guest/transaction/store', [TransactionController::class, 'store'])->name('guest.transaction.store');





