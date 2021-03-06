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
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes(['verify' => true]);
Route::group(['prefix' => 'admin',
                'middleware' => ['auth','AdminCheck']], function () {
          // Route::get('/users/{id}/detail', 'Admin\UserController@detailProfile')->name('detail');
           Route::get('/users/destroy/{id}', 'Admin\UserCrudController@destroy')->name('admin.user_destroy');
           Route::get('/users-list', 'Admin\UserCrudController@usersList')->name('admin.user-list');
           Route::get('/verifyUser', ['uses' => 'Admin\AdminController@showUserVerifyList', 'as' => 'admin.verifyUsers']);
           Route::get('/verifyUser/{id}','Admin\AdminController@verifyUser');
           Route::get('/rejectUser/{id}','Admin\AdminController@rejectUser');
           Route::get('mailbox', 'Admin\MailboxController@create')->name('admin.mailbox');;
           Route::post('mailbox', 'Admin\MailboxController@send');
           Route::get('mailbox/{user}', 'Admin\MailboxController@userEmail');
    });
Route::middleware ('auth')->group (function () {
    Route::get('/users', 'Admin\UserCrudController@index')->name('admin.user');
Route::get('/users/{id}/detail', 'Admin\UserController@detailProfile')->name('detail');
Route::get('/user/birthdays', 'Admin\UserController@birthdays')->name('admin.user.birthdays');
Route::get('/user/birthdays/calendar', 'Admin\UserController@index')->name('admin.user.birthdays.calendar');
Route::get('/profile', 'Admin\UserController@viewProfile')->name('admin.profile');
Route::post('/user/{id}/saveProfilePicture', 'Admin\UserController@saveProfilePicture')->name('admin.profile_update');
Route::put('/user/update-profile/{id}','Admin\UserController@updateprofile')->name('admin.update-profile');
Route::get('/user/contact', 'Admin\UserController@viewContact')->name('admin.contact');
Route::resource('customsearch', 'CustomSearchController');
Route::get('/user/birthdays/month', 'HomeController@birthdaysByMonth')->name('admin.user.birthdays.month');
//Route::get('/user/birthdays/month', 'HomeController@birthdaysByMonth')->name('admin.user.birthdays.month');

    });

Route::prefix('avatar')->middleware('auth:web')->group(function(){LUICroppie::routes();});
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
Route::get('activate/{token}', 'Auth\RegisterController@activate')->name('activate');


Route::view ('/legal', 'legal');
Route::view ('/privacy', 'privacy');
Route::view ('/faq', 'faq');



