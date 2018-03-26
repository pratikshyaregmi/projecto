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

use Illuminate\Support\Facades\Mail;


View::share('c', App\Category::latest()->get()); // c stands for category
View::share('blog', App\blog::all());
View::share('user', App\user::all());

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');
Route::get('/blog/bin', 'BlogController@bin');
Route::get('/blog/bin/{id}/restore', 'BlogController@restore');
Route::delete('/blog/bin/{id}/destroyBlog', 'BlogController@destroyBlog');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/blog', 'BlogController@index');
Route::get('/blog/create', 'BlogController@create');
Route::post('/blog', 'BlogController@store');
Route::get('/blog/{slug}', 'BlogController@show');
Route::get('/blog/{id}/edit', 'BlogController@edit');
Route::patch('/blog/{id}', 'BlogController@publish');
Route::patch('/blog/{id}/publish', 'BlogController@publish');
Route::patch('/blog/{id}', 'BlogController@update');
Route::delete('/blog/{id}', 'BlogController@destroy');

Route::get('admin', 'AdminController@index');
Route::resource('categories', 'CategoryController');
Route::resource('media', 'PhotosController');
Route::get('userslist', 'UserController@userslist');
Route::resource('users', 'UserController');
Route::get('contact', 'MailController@contact');
Route::post('contact/send', 'MailController@send');
Route::get('/{username?}', array('as' => 'show', 'uses' => 'UserController@show'));
