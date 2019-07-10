<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
			//改为TRUE
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //验证规则
				'name'=>'required|regex:/\w{4,8}/|unique:test',
				'password'=>'required|regex:/\w{4,8}/',
				'repassword'=>'required|regex:/\w{4,8}/|same:password',
				'img'=>'required',
				'phone'=>'required|regex:/\d{11,11}/|unique:test'
        ];
    }
	
	public function messages(){
		return [
				//错误信息规则
				'name.required'=>'用户名不能为空',
				'name.regex'=>'用户名必须是4~8为的数字和字母',
				'name.unique'=>'用户已存在',
				'password.required'=>'密码不能为空',
				'password.regex'=>'密码必须是4~8为的数字和字母',
				'repassword.required'=>'重复密码不能为空',
				'repassword.regex'=>'密码必须是4~8为的数字和字母',
				'repassword.same'=>'两次密码必须一致',
				'phone.required'=>'手机不能为空',
				'phone.regex'=>'手机号码必须为11位',
				'phone.unique'=>'手机已存在',
				
				

				
				];
	}
}
