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
/***begin by xiong*/
//这是路由设置文件,用户在地址栏输入url地址并访问，路由将URL请求映射到指定控制器上，控制器与数据模型进行数据存取交互，
//数据读取完毕，控制器将数据传送给视图进行渲染，视图渲染完成，在浏览器上呈现给用户
/*******end********/

//Route::get('/', function () {
//    return view('welcome');   这是默认的路由
//});

//get表示该路由将会影响GET请求 name()为路由命名
Route::get('/', 'StaticPagesController@home')->name('home');  //当访问http://sample.test/时，会自动调用\app\Http\Controller\StaticPagesController控制器里的home方法
Route::get('/help', 'StaticPagesController@help')->name('help');//当访问http://sample.test/help时，会自动调用\app\Http\Controller\StaticPagesController控制器里的help方法
Route::get('/about', 'StaticPagesController@about')->name('about');
Route::get('/aaa', 'StaticPagesController@about')->name('aaa');  //此时访问http://sample.test/aaa时也能访问到about，在视图中{{ route('aaa') }}也行

Route::get('signup', 'UsersController@create')->name('signup');
Route::resource('users','UsersController'); //resource()接收两个参数，第一个参数为资源名称，第二个参数为控制器名称。
/*以上resource()相当于：
 * Route::get('/users', 'UsersController@index')->name('users.index');
Route::get('/users/{user}', 'UsersController@show')->name('users.show');
Route::get('/users/create', 'UsersController@create')->name('users.create');
Route::post('/users', 'UsersController@store')->name('users.store');
Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
Route::patch('/users/{user}', 'UsersController@update')->name('users.update');
Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');
 */