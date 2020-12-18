<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::get('users', 'UserController@index')->name('users.index');
        Route::post('users', 'UserController@store')->name('users.store');
        Route::get('users/create', 'UserController@create')->name(
            'users.create'
        );
        Route::get('users/{user}', 'UserController@show')->name('users.show');
        Route::get('users/{user}/edit', 'UserController@edit')->name(
            'users.edit'
        );
        Route::put('users/{user}', 'UserController@update')->name(
            'users.update'
        );
        Route::delete('users/{user}', 'UserController@destroy')->name(
            'users.destroy'
        );
        Route::get('roles', 'RoleController@index')->name('roles.index');
        Route::post('roles', 'RoleController@store')->name('roles.store');
        Route::get('roles/create', 'RoleController@create')->name(
            'roles.create'
        );
        Route::get('roles/{role}', 'RoleController@show')->name('roles.show');
        Route::get('roles/{role}/edit', 'RoleController@edit')->name(
            'roles.edit'
        );
        Route::put('roles/{role}', 'RoleController@update')->name(
            'roles.update'
        );
        Route::delete('roles/{role}', 'RoleController@destroy')->name(
            'roles.destroy'
        );
        Route::get('permissions', 'PermissionController@index')->name(
            'permissions.index'
        );
        Route::post('permissions', 'PermissionController@store')->name(
            'permissions.store'
        );
        Route::get('permissions/create', 'PermissionController@create')->name(
            'permissions.create'
        );
        Route::get(
            'permissions/{permission}',
            'PermissionController@show'
        )->name('permissions.show');
        Route::get(
            'permissions/{permission}/edit',
            'PermissionController@edit'
        )->name('permissions.edit');
        Route::put(
            'permissions/{permission}',
            'PermissionController@update'
        )->name('permissions.update');
        Route::delete(
            'permissions/{permission}',
            'PermissionController@destroy'
        )->name('permissions.destroy');
    });
