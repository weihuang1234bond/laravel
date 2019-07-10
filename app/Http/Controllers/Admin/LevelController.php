<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入DB类
use DB;


class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		//这里是管理员列表。可以对下属管理员进行显示角色分配。
        $res=DB::table('laravel_userinfo')->join('laravel_role','laravel_role.rid','=','laravel_userinfo.rid')
        ->select('laravel_userinfo.uid','laravel_userinfo.name','laravel_role.role')->paginate(5);
        
		return view('admis.level_index',['res'=>$res]);
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加管理员,需要把等级返过去。
            $res=DB::select('select * from laravel_role where rid>1');
         
		      
			return view('admis.level_create',['res'=>$res]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //执行添加 
		
        //分别向2个表添加信心
        $a=DB::table('laravel_user')->insertGetId(['username'=>$_POST['username'],'password'=>$_POST['password']]);
        if($a){
                if(DB::table('laravel_userinfo')->insert(['uid'=>$a,'rid'=>$_POST['catid'],'name'=>$_POST['name']])){
                    return redirect('/level');
                        }else{
                            return redirect('/level/create');
                        }
        }else{
                    return redirect('/level/create');
                }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
		echo 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res=DB::select('select rl.lid,u.rid,u.name,laravel_level.control,laravel_level.func,laravel_level.levelname from laravel_userinfo as u,laravel_rlinfo as rl,laravel_level where laravel_level.lid=rl.lid and u.rid=rl.rid and u.uid='.$id);
        $re=DB::table('laravel_role')->get();
        
            foreach($res as $v){
                $lala[$v->control][]=$v->func;
                $sm[$v->control][]=$v->levelname;
                $mei[$v->control][]=$v->lid;
                

            }

            
		return view('admis.level_update',['lala'=>$lala,'re'=>$re,'res'=>$res,'sm'=>$sm,'mei'=>$mei]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //修改数据。获取到所有的数据，$request->all 获取所有的参数，->input 单个参数，only([])一部分参数，except除了x之外的
        //->has是否有某个参数，
		$req=$request->except('_token');
        $info=DB::table('laravel_usreinfo')->where('id','=',$id)->update(['rid'=>$req->rid,'name'=>$req->name]);
        //权限列表先删除，后修改，
        $de=DB::delete('delete from laravel_rlinfo where uid ='.$id);

        //遍历含有levelname的数组，在功能体中插入数据DB::table('lravel_rlinfo')->insert(['rid'=>$request->rid,'levelname'=>$v,'uid'=>$id])
        if($info && $de )
        {
            redirect('/level');
        }else
        {
            redirect('/level/'.$id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
		echo 'destroy';
    }
}
