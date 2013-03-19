<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::get('/', function()
{
	return View::make('home.index');
});

Route::controller('home');
Route::controller('search');

/*
 * Datasets
 */
Route::get('dataset/view/(:num)', 'dataset@index');
Route::get('datasets', 'dataset@index');
Route::get('dataset/(:num)', 'dataset@view'); 
Route::get('dataset/view/(:num)', 'dataset@view');
Route::get('dataset/fullview/(:num)', 'dataset@fullview');
Route::get('dataset/add', 'dataset@add');
Route::post('dataset/add', 'dataset@add');
Route::get('dataset/edit/(:num)', 'dataset@edit');
Route::post('dataset/edit/(:num)', 'dataset@edit');
Route::get('admin/dataset/delete/(:num)', 'dataset@delete');
Route::post('admin/dataset/delete/(:num)', 'dataset@delete');

/*
 * Users
 */
//Unauthenticated
Route::get('login', 'user@login');
Route::post('login', 'user@login');
Route::get('logout', 'user@logout');

//Authenticated
Route::get('profile', 'user@profile');
Route::post('profile', 'user@profile');

//Admin
Route::get('admin/users', 'user@admin_index');
Route::get('admin/user/add', 'user@admin_add');
Route::post('admin/user/add', 'user@admin_add');
Route::get('admin/user/view/(:num)', 'user@admin_view');
Route::get('admin/user/edit/(:num)', 'user@admin_edit');
Route::post('admin/user/edit/(:num)', 'user@admin_edit');
Route::get('admin/user/delete/(:num)', 'user@admin_delete');
Route::post('admin/user/delete/(:num)', 'user@admin_delete');


/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('403', function()
{
	return Response::error('403');
});

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});

Route::filter('admin', function()
{
	if (Auth::guest()) 
		return Redirect::to('login');
	elseif (!Auth::user()->admin){
		return Response::error('403');
	}
});


//Admin routes
//Attach the auth filter to all admin/* paths
Route::filter('pattern: admin/*', 'auth');
Route::filter('pattern: admin/*', 'admin');
Route::filter('pattern: admin/*', 'auth');
Route::filter('pattern: admin/*', 'admin');

//Authenticated routes
Route::filter('pattern: dataset/add', 'auth');
Route::filter('pattern: dataset/edit/*', 'auth');
Route::filter('pattern: profile', 'auth');


