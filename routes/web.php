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

$router->group(['prefix' => 'categorias'], function($router) {
    $router->get('', 'CategoriesController@index')->name('categories-index');
    $router->get('editar/{id}', 'CategoriesController@edit')->name('categories-edit');
    $router->get('nuevo', 'CategoriesController@create')->name('categories-create');
    $router->get('paginado', 'CategoriesController@paginate')->name('categories-paginate');
    $router->post('guardado', 'CategoriesController@store')->name('categories-store');
    $router->put('actualizado/{category}', 'CategoriesController@update')->name('categories-update');
    $router->get('eliminado/{id}', 'CategoriesController@destroy')->name('categories-delete');
});