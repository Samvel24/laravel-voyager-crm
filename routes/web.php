<?php

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

/* cuando se solicite la pagina voyager.crm.localhost/register entonces se llama a la funcion create de LeadController
    y dentro de esta ultima  se llama a la vista 'register'.
    Dicho de otra forma, cuando se desea invocar al formulario de registro se manda a llamar al metodo create
*/
Route::get('/register', 'LeadController@create');
// despues de lo anterior llamamos al metodo store para que almacene un Lead capturado por el formulario (post)
Route::post('/register', 'LeadController@storeByForm');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
