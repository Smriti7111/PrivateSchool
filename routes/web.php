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

Route::get('/','PagesController@viewIndex');
Route::get('gallery/photos/{album_id}/','PagesController@viewPhotos')->name('page.photos');
Route::get('/gallery','PagesController@viewGallery')->name('page.gallery');
Route::get('/index','PagesController@viewIndex')->name('page.index');
Route::get('/about','PagesController@viewAbout')->name('page.about');
Route::get('/notice','PagesController@viewNotice')->name('page.notice');
Route::get('/view_facilities','PagesController@viewFacility')->name('page.facility');
Route::get('/calendar','PagesController@viewCalendar')->name('page.calendar');
Route::get('/contactus','PagesController@viewContact')->name('page.contact');
Route::get('privacy/','PagesController@viewPrivacy')->name('page.policy');
Route::get('/alumni','PagesController@viewAlumni')->name('page.alumni');
Route::get('/home/success','PagesController@success')->name('page.success');
Route::get('/message','PagesController@viewMessage')->name('page.message');
Route::get('/view_events','PagesController@viewEvents')->name('page.events');
Route::get('/view_news','PagesController@viewNews')->name('page.news');
Route::get('/activities','PagesController@viewActivities')->name('page.activities');
Route::get('/news_events','PagesController@viewNewsEvents')->name('page.newsevents');
Route::get('/home', 'HomeController@index')->name('home');

//Alumni
Route::post('/alumni','Back\AlumniController@store')->name('alumni.store');
Route::resource('contactUs', 'Back\ContactusController');
Route::resource('facilities','Back\FacilityController');
Route::resource('newsletter', 'Back\NewsletterController');
Route::resource('events','Back\EventController');
Route::resource('news', 'Back\NewsController');
Route::resource('album', 'Back\AlbumController');
Route::resource('photos', 'Back\PhotosController');
Route::resource('activity', 'Back\ActivityController');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Auth::routes();

