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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//all header(frontend page)routes start from here
Route::get('/','Frontend\FrontendController@index');
Route::get('aboutUs','Frontend\FrontendController@AboutUs')->name('aboutUs');
Route::get('contactUs','Frontend\FrontendController@ContactUs')->name('contactUs');
Route::get('shoppingCart','Frontend\FrontendController@ShoppingCart')->name('shoppingCart');
Route::post('Contact.Store','Frontend\FrontendController@Store')->name('Contact.Store');
// group middleware start from here
Route::group(['middleware' => ['test']], function () {
//all header(backend page)routes start from here
Route::prefix('users')->group(function () {
Route::get('/all','Backend\UserController@index')->name('users.all');
Route::get('/create','Backend\UserController@create')->name('users.create');
Route::post('/store','Backend\UserController@store')->name('users.store');
Route::get('/edit/{id}','Backend\UserController@edit')->name('users.edit');
Route::post('/update/{id}','Backend\UserController@update')->name('users.update');
Route::get('/destroy/{id}','Backend\UserController@destroy')->name('users.destroy');
});

// Profile Routes start from here
Route::prefix('profile')->group(function () {
Route::get('/user','Backend\ProfileController@index')->name('profile.user');
Route::post('/store','Backend\ProfileController@store')->name('profile.store');
Route::get('/edit','Backend\ProfileController@edit')->name('profile.edit');
Route::post('/update','Backend\ProfileController@update')->name('profile.update');
Route::get('/change-password','Backend\ProfileController@ChangePassword')->name('change.password');
Route::post('/update-password','Backend\ProfileController@UpdatePassword')->name('update.password');

});



//Logo routes start from here
Route::prefix('logos')->group(function () {
Route::get('/view','Backend\LogoController@index')->name('logos.view');
Route::get('/create','Backend\LogoController@create')->name('logos.create');
Route::post('/store','Backend\LogoController@store')->name('logos.store');
Route::get('/edit/{id}','Backend\LogoController@edit')->name('logos.edit');
Route::post('/update/{id}','Backend\LogoController@update')->name('logos.update');
Route::get('/destroy/{id}','Backend\LogoController@destroy')->name('logos.destroy');
});

//Sliders routes start from here
Route::prefix('sliders')->group(function () {
Route::get('/view','Backend\SliderController@index')->name('sliders.view');
Route::get('/create','Backend\SliderController@create')->name('sliders.create');
Route::post('/store','Backend\SliderController@store')->name('sliders.store');
Route::get('/edit/{id}','Backend\SliderController@edit')->name('sliders.edit');
Route::post('/update/{id}','Backend\SliderController@update')->name('sliders.update');
Route::get('/destroy/{id}','Backend\SliderController@destroy')->name('sliders.destroy');
});



//contact routes start from here
Route::prefix('contacts')->group(function () {
Route::get('/view','Backend\ContactController@index')->name('contacts.view');
Route::get('/create','Backend\ContactController@create')->name('contacts.create');
Route::post('/store','Backend\ContactController@store')->name('contacts.store');
Route::get('/edit/{id}','Backend\ContactController@edit')->name('contacts.edit');
Route::post('/update/{id}','Backend\ContactController@update')->name('contacts.update');
Route::get('/destroy/{id}','Backend\ContactController@destroy')->name('contacts.destroy');
});

//about routes start from here
Route::prefix('about')->group(function () {
Route::get('/view','Backend\AboutController@index')->name('about.view');
Route::get('/create','Backend\AboutController@create')->name('about.create');
Route::post('/store','Backend\AboutController@store')->name('about.store');
Route::get('/edit/{id}','Backend\AboutController@edit')->name('about.edit');
Route::post('/update/{id}','Backend\AboutController@update')->name('about.update');
Route::get('/destroy/{id}','Backend\AboutController@destroy')->name('about.destroy');
});
//category routes start from here
Route::prefix('category')->group(function () {
Route::get('/view','Backend\CategoryController@index')->name('category.view');
Route::get('/create','Backend\CategoryController@create')->name('category.create');
Route::post('/store','Backend\CategoryController@store')->name('category.store');
Route::get('/edit/{id}','Backend\CategoryController@edit')->name('category.edit');
Route::post('/update/{id}','Backend\CategoryController@update')->name('category.update');
Route::get('/destroy/{id}','Backend\CategoryController@destroy')->name('category.destroy');
});
//category routes start from here
Route::prefix('brand')->group(function () {
Route::get('/view','Backend\BrandController@index')->name('brand.view');
Route::get('/create','Backend\BrandController@create')->name('brand.create');
Route::post('/store','Backend\BrandController@store')->name('brand.store');
Route::get('/edit/{id}','Backend\BrandController@edit')->name('brand.edit');
Route::post('/update/{id}','Backend\BrandController@update')->name('brand.update');
Route::get('/destroy/{id}','Backend\BrandController@destroy')->name('brand.destroy');
});
//color routes start from here
Route::prefix('color')->group(function () {
Route::get('/view','Backend\ColorController@index')->name('color.view');
Route::get('/create','Backend\ColorController@create')->name('color.create');
Route::post('/store','Backend\ColorController@store')->name('color.store');
Route::get('/edit/{id}','Backend\ColorController@edit')->name('color.edit');
Route::post('/update/{id}','Backend\ColorController@update')->name('color.update');
Route::get('/destroy/{id}','Backend\ColorController@destroy')->name('color.destroy');
});
//color routes start from here
Route::prefix('size')->group(function () {
Route::get('/view','Backend\SizeController@index')->name('size.view');
Route::get('/create','Backend\SizeController@create')->name('size.create');
Route::post('/store','Backend\SizeController@store')->name('size.store');
Route::get('/edit/{id}','Backend\SizeController@edit')->name('size.edit');
Route::post('/update/{id}','Backend\SizeController@update')->name('size.update');
Route::get('/destroy/{id}','Backend\SizeController@destroy')->name('size.destroy');
});
//product routes start from here
Route::prefix('product')->group(function () {
Route::get('/view','Backend\ProductController@index')->name('product.view');
Route::get('/create','Backend\ProductController@create')->name('product.create');
Route::post('/store','Backend\ProductController@store')->name('product.store');
Route::get('/edit/{id}','Backend\ProductController@edit')->name('product.edit');
Route::post('/update/{id}','Backend\ProductController@update')->name('product.update');
Route::get('/destroy/{id}','Backend\ProductController@destroy')->name('product.destroy');
});

//User Email route
Route::prefix('email')->group(function () {
Route::get('user-email.view','Frontend\FrontendController@UserEmailView')->name('user-email.view');
Route::get('/user-email.destroy/{id}','Frontend\FrontendController@destroy')->name('user-email.destroy');
});
});
// group middleware End here
