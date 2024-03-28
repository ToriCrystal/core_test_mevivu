<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Admin\Http\Controllers\Home\HomeController::class, 'index']);

// login
Route::controller(App\Admin\Http\Controllers\Auth\LoginController::class)
->middleware('guest:admin')
->prefix('/login')
->as('login.')
->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/', 'login')->name('post');
});

Route::group(['middleware' => 'auth.admin:admin'], function(){

    //user
    Route::prefix('/manager-user')->as('user.')->group(function(){
        Route::controller(App\Admin\Http\Controllers\User\UserController::class)->group(function(){
            Route::get('/them', 'create')->name('create');
            Route::get('/', 'index')->name('index');
            Route::get('/sua/{id}', 'edit')->name('edit');
            Route::put('/sua', 'update')->name('update');
            Route::post('/them', 'store')->name('store');
            Route::delete('/xoa/{id}', 'delete')->name('delete');
        });
        // Route::get('/select-search', [AdminSearchController::class, 'selectSearch'])->name('selectsearch');
    });
    //admin
    Route::prefix('/manager-admin')->as('admin.')->group(function(){
        Route::controller(App\Admin\Http\Controllers\Admin\AdminController::class)->group(function(){
            Route::get('/them', 'create')->name('create');
            Route::get('/', 'index')->name('index');
            Route::get('/sua/{id}', 'edit')->name('edit');
            Route::put('/sua', 'update')->name('update');
            Route::post('/them', 'store')->name('store');
            Route::delete('/xoa/{id}', 'delete')->name('delete');
        });
        // Route::get('/select-search', [AdminSearchController::class, 'selectSearch'])->name('selectsearch');
    });

    //employee
    Route::prefix('/manager-employee')->as('employees.')->group(function(){
        Route::controller(App\Admin\Http\Controllers\Employee\EmployeeController::class)->group(function(){
            Route::get('/them', 'create')->name('create');
            Route::get('/', 'index')->name('index');
            Route::get('/sua/{id}', 'edit')->name('edit');
            Route::put('/sua', 'update')->name('update');
            Route::post('/them', 'store')->name('store');
            Route::delete('/xoa/{id}', 'delete')->name('delete');
        });
        // Route::get('/select-search', [AdminSearchController::class, 'selectSearch'])->name('selectsearch');
    });
    //Category
    Route::prefix('/categories')->as('category.')->group(function(){
        Route::controller(App\Admin\Http\Controllers\Blog\Category\CategoryController::class)->group(function(){
            Route::get('/add', 'create')->name('create');
            Route::get('/', 'index')->name('index');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/edit', 'update')->name('update');
            Route::post('/add', 'store')->name('store');
            Route::delete('/delete/{id}', 'delete')->name('delete');
        });
    });

    //Post
    Route::prefix('/posts')->as('post.')->group(function(){
        Route::controller(App\Admin\Http\Controllers\Blog\Post\PostController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/add', 'create')->name('create');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/edit', 'update')->name('update');
            Route::post('/add', 'store')->name('store');
            Route::delete('/delete/{id}', 'delete')->name('delete');
            Route::post('/action-multile-record', 'actionMultipleRecode')->name('action_multiple_record');
        });
    });


    //ckfinder
    Route::prefix('/quan-ly-file')->as('ckfinder.')->group(function(){
        Route::any('/connect', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
        ->name('connector');
        Route::any('/duyet', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
        ->name('browser');
    });
    Route::get('/dashboard', [App\Admin\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard');

    //auth
    Route::controller(App\Admin\Http\Controllers\Auth\ProfileController::class)
    ->prefix('/profile')
    ->as('profile.')
    ->group(function(){
        Route::get('/', 'index')->name('index');
        Route::put('/', 'update')->name('update');
    });

    Route::controller(App\Admin\Http\Controllers\Auth\ChangePasswordController::class)
    ->prefix('/password')
    ->as('password.')
    ->group(function(){
        Route::get('/', 'index')->name('index');
        Route::put('/', 'update')->name('update');
    });
    Route::post('/logout', [App\Admin\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');

    Route::prefix('/search')->as('search.')->group(function () {
        Route::prefix('/select')->as('select.')->group(function () {
            Route::get('/tag', [App\Admin\Http\Controllers\Blog\Tag\TagSearchSelectController::class, 'selectSearch'])->name('tag');
            // Route::get('/user', [App\Admin\Http\Controllers\User\UserSearchSelectController::class, 'selectSearch'])->name('user');
            // Route::get('/admin', [App\Admin\Http\Controllers\Admin\AdminSearchSelectController::class, 'selectSearch'])->name('admin');
        });
    });
});
