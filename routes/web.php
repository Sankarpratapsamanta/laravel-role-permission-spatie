<?php


use Spatie\Permission\Models\Role;
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


// Route::get('/login','LoginController');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('blogs','BlogController');
Route::resource('users','UserController');


Route::get('/add-roles',function(){
    $roles=[
        ['name' => 'admin','guard_name'=>'web'],
        ['name' => 'author','guard_name'=>'web'],
        ['name' => 'manager','guard_name'=>'web'],

    ];
    $role = Role::insert($roles);

    return "success";
});

// 'middleware'=>'role:admin'
Route::group([],function(){
    //Roles
Route::get('/roles','RolesController@index');
Route::get('/roles/create','RolesController@create');
Route::post('/roles','RolesController@store');
Route::get('/roles/{id}/edit','RolesController@edit');
Route::patch('/roles/{id}','RolesController@update');
Route::delete('/roles/{id}','RolesController@delete');
Route::get('/roles/{id}/assign-permission','RolesController@assignPermissionView');
Route::post('/roles/{id}/assign-permission','RolesController@assignPermissionStore');



//Permissions
Route::get('/permissions','PermissionController@index');
Route::get('/permissions/create','PermissionController@create');
Route::post('/permissions','PermissionController@store');
Route::get('/permissions/{id}/edit','PermissionController@edit');
Route::patch('/permissions/{id}','PermissionController@update');
Route::delete('/permissions/{id}','PermissionController@delete');
Route::get('/permissions-group/create','PermissionController@createPermissionGroup');

Route::post('/permissions-group/create','PermissionController@storePermissionGroup');

});


Route::group(['prefix' => 'store'], function () {
  Route::get('/login', 'StoreAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'StoreAuth\LoginController@login');
  Route::post('/logout', 'StoreAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'StoreAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'StoreAuth\RegisterController@register');

  Route::post('/password/email', 'StoreAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'StoreAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'StoreAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'StoreAuth\ResetPasswordController@showResetForm');
});

Auth::routes();