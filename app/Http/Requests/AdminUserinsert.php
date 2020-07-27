<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserinsert extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //表单效验授权
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *@设置效验规则
     * @return array
     */
    public function rules()
    {
        return [
            //
            'username'=>'required | unique:users',
            'password'=> ['required' ,'regex:/\w{6,18}/'],
            'repassword'=> ['required' ,'regex:/\w{6,18}/','same:password'],
            'email'=> 'required | email',
            'phone'=> ['required' ,'regex:/\d{11}/'],
        ];
    }
    //自定义错误信息
    public function messages(){
        return [
           'username.required' => '用户名不能为空',
            'username.unique' => '用户名不能重复',
            'password.required' => "密码不能为空",
            'password.regex' => '密码必须为6到18位字母数字下划线组成',
            'repassword.required' => "重复密码不能为空",
            'repassword.regex' => '重复密码必须为6到18位字母数字下划线组成',
             'repassword.same' => '两次密码不一致',
            'email.required' => "邮箱不能空",
            'email.email' => '邮箱格式错误',
            'phone.required' => "电话不能空",
            'phone.regex' => '电话格式错误',
        ];
    }
}
