<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Http\Requests\SHopPost;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //商品的控制器，
			//这边本来是catid=catid的，但是没有做类别的添加，select中是指定选择字段OR生成新字段，AS
		//$res=DB::table('shop')->join('type','shop.catid','=','type.id')->get();
		 $res=DB::table('shop')->leftjoin('type','shop.catid','=','type.id')->select('shop.name as nname','type.name','shop.img','shop.price','shop.id as uid')->get();
		 
		
		
			return view('/admis/shop_index',['res'=>$res,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
				$data=DB::table('type')->get();
				$data=json_decode($data,true);
					$res=AdmisController::type($data,0,0,'0,');
				return view('/admis/shop',['res'=>$res]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SHopPost $request)
    {
        //文件上传
		$data=$request->except('_token');
		//var_dump($data);
		
		$data['img']=$request->file('img')->store('upload');
		
		if(DB::table('shop')->insert($data)){
			return redirect('/shop')->with('sucess','添加成功');
		}else{
			return redirect('/shop/create')->with('sucess','添加失败');
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
        //修改，
			$data=DB::table('type')->get();
				$data=json_decode($data,true);
					$res=AdmisController::type($data,0,0,'0,');
					
			$re=DB::table('shop')->where('id','=',$id)->get();
			 // var_dump($re);dd();
			
				return view('/admis/shop_upda',['res'=>$res,'re'=>$re]);
		
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
		//判断是否有文件上传，没有则普通修改，有的话还要删除之前的那个照片
			if($request->hasfile('img')){
				$data=$request->except('_token');
				unset($data['_method']);
				//这里的照片有鬼，先删除文件夹里的照片
				$uu=DB::table('shop')->where('id','=',$id)->get();
				$uu=json_decode($uu,true);
				
				$a=Storage::delete($uu[0]['img']);
				//var_dump($a);
				$data['img']=$request->file('img')->store('upload');
					
				if(DB::table('shop')->where('id','=',$id)->update($data)){
					return redirect('/shop')->with('sucess','修改成功');
				}else{
					return redirect('/shop')->with('sucess','修改失败');	
				}
			}else{
				
				

				$data=$request->except('_token');
				unset($data['img']);
				unset($data['_method']);
				// var_dump($data);
					// dd();
				if(DB::table('shop')->where('id','=',$data['id'])->update($data)){
					return redirect('/shop')->with('sucess','修改成功');
				}else{
					return redirect('/shop')->with('sucess','修改失败');
				}
			}
    }

    /**
     * Remove the specified resource from storage.
     *'update shop set name='
				.$request->name.',catid='.$request->catid.',price='.$request->price
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
		echo 'es';
    }
}
