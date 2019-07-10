<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SHopPost extends FormRequest
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
				
				'img'=>'required'
        ];
    }
	
	public function messages(){
		return [
				//错误信息规则
				
				'img.required'=>'图片不能为空'

				
				];
	}
}
