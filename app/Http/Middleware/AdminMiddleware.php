<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Route;
class AdminMiddleware
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
      if (auth()->guard('admin')->guest()) {
             if ($request->ajax() || $request->wantsJson()) {
               return response('Unauthorized.', 401);
             } else {
                 return redirect()->guest('admin/login');
             }
         }
 
         return $next($request);

    //权限结合中简介的使用， 应该是访问的时候，先经过中简介，然后查询他是否含有这个方法的使用功能（即ID），
    //关键点是如何查询，如何关联。 给功能方法编号，给用户设定角色编号，角色拥有功能方法，（多个）
    //  user.id   用户角色role.id u.id     role.id->fun.id(固定) 当role.id拥有的某个方法时(传值),判断，
}
