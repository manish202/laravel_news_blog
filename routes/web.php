<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\MyCustomAuthController;
use App\Http\Controllers\MyUiController;

Route::get('/',[MyUiController::class,"getHomePage"]);
Route::get('/category/{id?}',[MyUiController::class,"getCategoryPage"])->name('category');
Route::get('/post/{id?}',[MyUiController::class,"getPostPage"])->name('post');
Route::get('/author/{id?}',[MyUiController::class,"getAuthorPage"])->name('author');
Route::get('/search/{term?}',[MyUiController::class,"getSerachPage"])->name('search');

Route::get('/admin',[MyCustomAuthController::class,"isAlreadyLogin"])->name('admin.login');
Route::post('/admin',[MyCustomAuthController::class,"login"])->name('admin.login');
Route::get('/admin/logout',[MyCustomAuthController::class,"logout"])->name('admin.logout');

Route::middleware('auth_for_user')->group(function(){
    Route::get('/admin/blog_posts',[PostsController::class,"getPosts"])->name('admin.blog_posts');
    Route::get('/admin/add_post',[PostsController::class,"addPostWithCat"])->name('admin.add_post');
    Route::post('/admin/add_post_data',[PostsController::class,"addPost"])->name('admin.add_post_data');
    Route::get('/admin/edit_post/{id?}',[PostsController::class,"editPostForm"])->name('admin.edit_post');
    Route::put('/admin/edit_post_data',[PostsController::class,"editPostData"])->name('admin.edit_post_data');
    Route::get('/admin/del_post/{id?}',[PostsController::class,"deletePost"])->name('admin.del_post');
});

Route::middleware('auth_for_admin')->group(function(){
    Route::get('/admin/categories',[CategoryController::class,"getCategories"])->name('admin.categories');
    Route::view('/admin/add_cat','admin.add_cat')->name('admin.add_cat');
    Route::post('/admin/add_cat_data',[CategoryController::class,"addCategory"])->name('admin.add_cat_data');
    Route::get('/admin/edit_cat/{id?}',[CategoryController::class,"editCategoryForm"])->name('admin.edit_cat');
    Route::put('/admin/edit_cat_data',[CategoryController::class,"editCategoryData"])->name('admin.edit_cat_data');
    Route::get('/admin/del_cat/{id?}',[CategoryController::class,"deleteCategory"])->name('admin.del_cat');

    Route::get('/admin/users',[UsersController::class,"getUsers"])->name('admin.users');
    Route::view('/admin/add_user','admin.add_user')->name('admin.add_user');
    Route::post('/admin/add_user_data',[UsersController::class,"addUser"])->name('admin.add_user_data');
    Route::get('/admin/edit_user/{id?}',[UsersController::class,"editUserForm"])->name('admin.edit_user');
    Route::put('/admin/edit_user_data',[UsersController::class,"editUserData"])->name('admin.edit_user_data');
    Route::get('/admin/del_user/{id?}',[UsersController::class,"deleteUser"])->name('admin.del_user');
});