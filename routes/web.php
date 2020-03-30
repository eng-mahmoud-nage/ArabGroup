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

Auth::routes(['register' => false]);

Route::resource('home', 'HomeController');

Route::group(['middleware' => ['auth:admin'], 'prefix' => 'admin'], function (){

Route::get('/dash', function () {
    return view('admin.dashboard');
});


Route::resource('admins', 'AdminController');
Route::get('/changeStatus', 'AdminController@changeStatus');
Route::resource('user', 'UserController');
Route::resource('category', 'CategoryController');
Route::resource('books', 'BookController');
Route::get('/favourite', 'BookController@favourite');
Route::resource('setting', 'SettingController');
Route::resource('country', 'CountryController');
Route::resource('city', 'CityController');
Route::resource('agent', 'AgentController');
Route::resource('dists', 'DistController');
Route::resource('fair', 'FairController');
Route::resource('news', 'NewController');
Route::delete('destroyImage', 'NewController@destroyImage');
Route::resource('booklist', 'BookListController');
Route::resource('maillist', 'MailListController');
Route::resource('contact', 'ContactController');

// Route::resource('region', 'RegionController');
Route::resource('order', 'OrderController');
Route::resource('bookorder', 'BookOrderController');

});

Route::group(['prefix' => 'fronts', 'namespace' => 'Front'], function (){
    //auth for user 
    Route::get('/user-login', function () {
        // dd(url()->full());
        return view('front.auth.login');
    });    
    Route::get('/user-register', function () {
        return view('front.auth.register');
    });    

    Route::post('/user-logins', 'AuthController@login');
    Route::post('/user-registers', 'AuthController@register');

    Route::get('/welcome', function () {
        return view('front.welcome.welcome');
    });


    // under authentication
    Route::group(['middleware' => 'auth:web'], function (){

    Route::post('/user-profile/{id}', 'AuthController@profile');
    Route::get('/user-logout', function(){
        auth()->logout();
        return redirect(url('fronts/welcome'));
    });


Route::get('/books', 'MainController@books');

Route::get('/book/{id}', 'MainController@book');

Route::get('/news', 'MainController@news');
Route::get('/new/{id}', 'MainController@new');

Route::get('/dists', 'MainController@dists');
Route::get('/agents', 'MainController@agents');
Route::get('/new-book', 'MainController@new');

// governorates
Route::get('/country', 'MainController@country');
Route::get('/city', 'MainController@city');

// cart

Route::resource('/items', 'ItemsController');
Route::post('/item', 'ItemsController@store');
Route::resource('/cart', 'ItemsController');

});

});






