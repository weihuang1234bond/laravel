<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入DB类
use DB;
use App\Http\Requests\StoreBlogPost;
use Hash;
class LideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		//显示所有的用户信息。
			//获取请求信息，再函数中要声明Request,$requests input 获取指定参数， all获取所有
			$requ=$request->input('keyword');
		$user=DB::table('test')->where('name','like','%'.$requ.'%')->paginate(1);
		
			//这里有点奇怪，返回的是数组形式，但是一般不是要遍历才可以直接使用值的吗，
		return view('admis.User',['user'=>$user,'request'=>$request->all()]);
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //先中间件判断是否有ID，没有则跳转到这里，注册，添加用户，或者不需要这个。
		
			return view('admis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {
        //执行添加s
		// var_dump($request);
		$data=$request->only('name','password');
		$data['password']=Hash::make($data['password']);
			if(DB::table('test')->insert($data)){
					return	redirect('/user');
					//添加成功可以弹出显示，后面->with('success','数据添加成功')，数据存在SEEION中le
					//再显示页面判断是否session['success']是否有值， 有值输出。
			}else{
				return redirect('/user/create');
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
        //
		echo 'edit';
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
        //
		echo 'upda';
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
