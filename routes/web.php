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

$router->group(['prefix' => 'planes'], function($router) {
    $router->get('', 'PlansController@index')->name('plans-index');
    $router->get('editar/{id}', 'PlansController@edit')->name('plans-edit');
    $router->get('nuevo', 'PlansController@create')->name('plans-create');
    $router->get('paginado', 'PlansController@paginate')->name('plans-paginate');
    $router->post('guardado', 'PlansController@store')->name('plans-store');
    $router->put('actualizado/{plan}', 'PlansController@update')->name('plans-update');
    $router->get('eliminado/{id}', 'PlansController@destroy')->name('plans-delete');
});

$router->group(['prefix' => 'negocios'], function($router) {
    $router->get('', 'BusinessController@index')->name('business-index');
    $router->get('editar/{id}', 'BusinessController@edit')->name('business-edit');
    $router->get('nuevo', 'BusinessController@create')->name('business-create');
    $router->get('paginado', 'BusinessController@paginate')->name('business-paginate');
    $router->post('guardado', 'BusinessController@store')->name('business-store');
    $router->put('actualizado/{category}', 'BusinessController@update')->name('business-update');
    $router->get('eliminado/{id}', 'BusinessController@destroy')->name('business-delete');
});