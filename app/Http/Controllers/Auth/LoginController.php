<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('gust.admin')->except('logout');//gust.admin 是另外一个中简介
    }

    //Guard 定义了用户在每个请求中如何实现认证，Laravel 通过 session guard 来维护 Session 存储的状态和 Cookie。
    //在 Laravel 的底层实现中，通过Provider存取数据，通过 Guard 存储用户认证信息，前者主要和数据库打交道，后者主要和 Session 打交道（API 例外）
    // public function login(Request $request) {
    //           $user = $this->validate($request, [
    //                 'name' => 'required|max:50',
    //                 'password' => 'required|min:5',
    //               ]);    
    //               if (Auth::guard('admin')->attempt($user)) { // 登陆验证
    //                     return redirect()->route('admin.index');
    //                   } else {
    //                    session()->flash('danger', '很抱歉，您的用户名和密码不匹配');
    //                     return redirect()->back()->withInput($request->input());
    //           } 
    //     }


    /**
      * 显示后台登录模板
      */
     public function showLoginForm()
     {
         return view('admin.login');
     }


        protected function guard()
    {
        //发返回用户的验证信息，guard-name 要在配置文件中出现  provider 对应的是USER
        return Auth::guard('admin');
    }
        //验证字段
         public function username()
              {
                  return 'name';
              }
}
