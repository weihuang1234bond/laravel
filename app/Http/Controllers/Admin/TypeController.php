<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //类别控制器,这只是单单获取所有的数据，给数据做排序
		$data=DB::table('type')->get();
		$data=json_decode($data,true);
		//var_dump($data);
		//做函数才能更好的获取
				function aaa($data,$pid,$level,$path){
					static $arr='';
						foreach($data as $k=>$v){
								//先把3个顶级的排最前面								
										if($v['catid']==$pid){
												//从0开始，加入等级，路径，这里有个问题，2个2级类，第二个不显示
												
														$v['level']=$level;
														if($v['catid']=0){
															$v['path']=$path;
														}else{
															$v['path']=$path.$v['id'].',';
														}														
														$arr[$v['id']]=$v;
														//这里还要继续循环，不是等于一次就够了， 
	
											aaa($data,$v['id'],$level+1,$v['path']);
					
									}
						
						} 
						return $arr;
				}
				$hah=aaa($data,0,0,'0,');
				//var_Dump($hah);
				
		return view('/admis/type',['hah'=>$hah]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		echo 'create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
    }
}
