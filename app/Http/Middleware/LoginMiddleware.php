<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Route;
class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $a=explode('\\',Route::current()->GetActionName());
dd($a);
           // 1检测是否有登陆,session has是否有[]值 
            if($request->session()->has('id')){
                //需要中简介的操作在这里，获取控制器(url，后缀)$request->path(),
                //$request->is(规则);验证传入的请求路径和指定规则是否匹配,规则是数组的控制器名字  ('amids/*') *表示匹配所有
               
                    // echo $request->path(); //如何获取方法
                   
                    // echo $request->route()->getActionMethod();
                
                //echo session('id');获取单条SESSION的信息，session信息台多了
               $a= DB::select('select n.control,n.func from laravel_userinfo,laravel_rlinfo,laravel_level as n where n.lid=laravel_rlinfo.lid and laravel_userinfo.rid=laravel_rlinfo.rid and  laravel_userinfo.uid='.session('id'));
               //2为数组，
                       foreach($a as $k=>$v){
                            $pa[$v->control][]=$v->func;
                            if($v->func=='create'){
                                $pa[$v->control][]='store';
                            }
                            if($v->func=='edit'){
                                $pa[$v->control][]='update';
                            }
                       }

                        
                       //判断是否有/，GET  有，没有
                       $aa= strstr($request->path(),'/',true);
                       //当后面传ID的时候，需要ID
                       $bb=strstr($request->path(),'edit');
                       if($bb){
                            return $next($request);
                       }
                       
                       ;
                       // if(is_inst(strstr($request->path(),'/')){
                       //      return $next($request);
                       // }
                       // echo $request->path();
                       // echo '--';
                       // echo implode($aa.'/',$pa[$aa]);
                       //   dd(strstr(implode($aa.'/',$pa[$aa]),$request->path()));
                      if($aa){
                               if (strstr(implode($aa.'/',$pa[$aa]),$request->path())){
                                        return $next($request);
                                 }else{
                                    
                                    return redirect('/admis')->with('error','抱歉，你没有权限访问');
                                 }

                            }else{  
                                //
                                    if(in_array($request->path(),array_keys($pa)) )
                                          {
                                                            return $next($request);
                                           }else{
                                                return redirect('/admis')->with('error','抱歉，你没有权限访问');
                                           }
                                       
                                 }         
                
            }else{
                //没有返回登陆页面
                
                return response()->view('admis.login');
            }
    }

    //权限结合中简介的使用， 应该是访问的时候，先经过中简介，然后查询他是否含有这个方法的使用功能（即ID），
    //关键点是如何查询，如何关联。 给功能方法编号，给用户设定角色编号，角色拥有功能方法，（多个）
    //  user.id   用户角色role.id u.id     role.id->fun.id(固定) 当role.id拥有的某个方法时(传值),判断，
}
