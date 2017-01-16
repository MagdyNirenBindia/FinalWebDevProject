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
    return view('auth/login');
});


Route::get('/RegisterPage.php', function () {
    return view('RegisterPage');
});


Route::get('/testHome', function () {
    return view('TestHome');
});

Route::get('/BrowseEvents', function () {
    return view('TestBrowseEvents');
});

Route::get('/Example.blade.php', function () {
    return view('Example');
});

Route::get('/data', 'EventsController@index');


Route::get('/viewFeedback',function(){
  return view('ViewFeedback');
});
Route::get('/createEvent', 'EventsController@showCreateEvent');
Route::get('/browseEvent', 'EventsController@showBrowseEvents');
Route::post('/createEvent', 'EventsController@doCreateEvent');

Route::post('/createReview', 'FeedbackController@submitFeedback');

Route::post('/feedback', 'FeedbackController@showFeedback');
Route::post('/viewParticipants', 'HomeController@showParticipants');

Route::post('/attendEvent','AttendEventsController@doAttendEvent');

Route::get('/testAjax', 'EventsController@getData');

Route::post('/viewEvent','EventsController@displayEvent');

Auth::routes();
Route::get('/home', 'HomeController@index');
//Route::get('/logout',function(){
  //  return view('auth/login');
//});
Route::get('/logout', 'HomeController@doLogout');
?>
