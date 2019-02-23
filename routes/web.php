<?php
use App\Theme;
use Illuminate\Support\Facades\Input;
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
    if(Input::get('query')){
        $query = Theme::where('theme', Input::get('query'))
        ->orWhere('theme', 'like', '%' . Input::get('query') . '%')->paginate(3);
        return view('index')->with('themes',$query);
    }else{
        $themes = Theme::orderBy('theme','asc')->paginate(3);
        return view('index')->with('themes',$themes);
    }
});

Route::post('login', [ 'as' => 'login', 'uses' => 'SessionController@store']);
//Route::post('login', 'SessionController@store');
Route::get('logout', 'SessionController@destroy');
Route::post('theme','ThemeController@store')->middleware('auth');
Route::get('login','UserController@create');
Route::get('register','UserRegister@create');
Route::post('register','UserRegister@store');
Route::get('posts/create','PostController@create')->middleware('auth');
Route::get('posts/{id}','PostController@postsByTheme');
Route::get('posts/show/{id}','PostController@show');
//Route::resource('posts','PostController');
Route::post('posts/store','PostController@store')->middleware('auth');
Route::post('posts/answer','AnswerController@store')->middleware('auth');
Route::get('posts/answer','AnswerController@store');
Route::post('themes/update/{id}','ThemeController@update');
//Route::get('theme/update/{id}','ThemeController@edit');
Route::delete('posts/delete/{id}','PostController@delete');


