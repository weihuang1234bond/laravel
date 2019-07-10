<?php

namespace App\Http\Controllers\Org;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入DB类
use DB;
use App\Http\Requests\StoreBlogPost;
use Hash;
class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		//短信验证注册类，获得客户手机号码，发送，保存，验证
		$aa=$request->all();
		$code=rand(1111,6666);
		$url='http://api.sms.cn/sms/?ac=send
				&uid=qq913635911&pwd=dadc3d233159c8d878d033dafe922f24&template=100006&mobile='.$aa['phone'].'&content={"code":"'.$code.'"}';
					//打开url地址的内容
			$info=file_get_contents($url);	
			//转换成JSON格式
			$data=json_decode($info,true);
			
			if($data['stat']==100){
						$array['status']=100;
						$array['info']="短信发送成功";
						$a=array('message'=>'短发发送成功','staus'=>1);
						return $a;
					}else{
						file_put_contents('demo.txt', $url);
						$array['status']=101;
						$array['info']="短信发送失败";
						echo '短信发送失败';
					}
		// var_dump($data);dd();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //先中间件判断是否有ID，没有则跳转到这里，注册，添加用户，或者不需要这个。
		
			echo 'create';
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
