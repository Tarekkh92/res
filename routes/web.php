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

Route::get('/', 'PagesController@index');
Route::get('/admin', 'PagesController@admin')->middleware('restrictAdmin');;
Route::resource('/feedbacks','FeedbacksController');
Route::resource('/getRes','GetAverageController');
Route::get('/feedbacks/create/{num?}','FeedbacksController@create');
Route::resource('/anoymouseFeedbacks','AnonymousController');
// Route::get(' /anonymousFeedbacks/create/{num?} ','AnonymousController@create')->middleware('restrictAdmin');;
Route::get(' /anonymousFeedbacks/create/{num?} ',function($num=null){
    Session::put('fid',$num);

    return view('Anonymous.feedbacks.create');
});
Route::get('/success', 'PagesController@loading');
Route::resource('/todaysFeedback','TodaysFeedbackController')->middleware('restrictAdmin');
Route::resource('/tokens','TokenController')->middleware('restrictAdmin');
Route::resource('/averages','AverageDailyController')->middleware('restrictAdmin');
Route::resource('/validate','TokenValidityController')->middleware('restrictAdmin');
// Route::get('/validate/{a?}','TokenValidityController@index');

Route::get(' /validate/index/{num?} ',function($num=null){
    Session::put('code',$num);

    return view('inc.token');
})->middleware('restrictAdmin');

Route::resource('/adminTokens','AdminTokenController')->middleware('restrictUser');
Route::resource('/adminAverages','AdminAverageController')->middleware('restrictUser');
Route::resource('/adminFeedbacks','AdminFeedbacksController')->middleware('restrictUser');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get ('locale/{lang?}',function($lang=null){
    App::setlocale($lang);
    Session::put('applocale',$lang);
    //return view('feedbacks.create');
    return redirect('/');
});

Route::get ('add',function($lang=null){
    // Session::put('applocale',$lang);
    App::setlocale(Session::get('applocale'));

    return view('feedbacks.create');
});

Route::get('/phpinfo', function(){
    phpinfo();
})->middleware('restrictAdmin');


// Route::get('setlocale/{locale}', function ($locale) {
//     if (in_array($locale, \Config::get('app.locales'))) {
//       Session::put('locale', $locale);
//     }
//     return redirect()->back();
//   });

// Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);

// Route::post('/language', array(
//     'before' => 'csrf',
//     'as' => 'language-chooser',
//     'uses' => 'LanguageController@index'
//   ));
// Route::post('/language-chooser','LanguageController@changeLanguage');
// Route::post('language/',array(
//     'before'=>'csrf',
//     'as'=>'language-chooser',
//     'uses'=>'LanguageController@changeLanguage',

// )
// );
