<?php
	namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入DB类
use DB;
use App\Http\Requests\StoreBlogPost;
use Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		echo 'index';
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
			if(DB::table('laravel_user')->insert($data)){
					return	redirect('/user');
					//添加成功可以弹出显示，后面->with('success','数据添加成功')，数据存在SEEION中le
					//再显示页面判断是否session['success']是否有值， 有值输出。
			}else{
				return redirect('/user/create');
		
		}
		//如何分配角色，先在系统中添加一个超级，只有1个，然后在显示页面可以添加定位，2个表搞定，
		//
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
?>