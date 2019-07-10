<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdmisController extends Controller
{
    //默认显示
		public function index(){
			session()->flush();
			return view('admis/index');
		}
		
		static function	type($data,$pid,$level,$path){

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
	
											AdmisController::type($data,$v['id'],$level+1,$v['path']);
					
									}						
						} 
						return $arr;
		}
}
