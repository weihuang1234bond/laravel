<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use DB;


class HomeController extends Controller
{
    //默认显示
		public function index(CaptchaBuilder $request){
			
			return view('home/index');
		}
		
		public function login(){
			
			return view('home/login');
		}
		
		//验证码
	static public function captcha()
    {
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
        //把内容存入session
        Session(['milkcaptcha'=>$phrase]);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
       $builder->output();
    } 

    //后台登陆
    public function loginn(){
            //查询数据是否有该值，
                //var_dump($_GET);
                $res=DB::table('laravel_user')->select('id')->where('username','=',$_GET['name'])->first();
                // dd($res);
                
                //这里res是对象，不会错
                if($res){
                   session(['name'=>$_GET['name']]);
                   session(['id'=>$res->id]);
                    
                    //后台admis.index'
                    return redirect()->back();
                }else{
                    alert('账号或密码错误');
                }
        }
}
