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

// Route::get("/", function () {
    // return view("welcome");
// });
//p1是路径，P2是方法，当匹配到路由规则p1，就会执行函数里的内内容


		//控制器，如果方法太多，可以使用资源控制器，
	
		Route::get("admis","Admin\AdmisController@index");
	Route::group(['middleware'=>'login'],function(){
		//用户界面
		
		
		Route::resource("/user","Admin\LideController");
		//商品界面
		Route::resource("/shop","Admin\ShopController");				
		//权限模块
		Route::resource("/level","Admin\LevelController");
	});
	//类别界面
	

	
		Route::resource("/type","Admin\TypeController");
	
	//前台页面，是用资源还是？
	Route::get("/home","Home\HomeController@index");
	//注册
	//Route::get("/home/login","Home\HomeController@login");
	Route::resource("/code","Org\CodeController");
	Route::get("/home/captcha","Home\HomeController@captcha");
	//登陆
	Route::get("/home/loginn","Home\HomeController@loginn");

	//路由组结合中间介使用，因为所有的功能都需要去验证有没有SESSION
	// Route::greoup(["middleware"=>"login"],function(){
	// 		Route::get("test","Admin\ShopController");
	// 		Route::get("lal","Admin\ShopController");

	// });


	//专门的后台登陆控制器
	Route::get("/adminlogin","Home\HomeController@loginn");


//验证路由
Auth::routes();

	Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth:admin'], function(){
  // 这个group里的路由必须通过我们定义的 auth:admin 进行验证
	

	
});
