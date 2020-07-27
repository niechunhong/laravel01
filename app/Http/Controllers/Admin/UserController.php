<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;//用于密码加密
use App\Http\Requests\AdminUserinsert;//导入AdminUserinsert效验类
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *'request'=>$request->all() 追加搜索分页
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      //获取要搜索的关键词
        $k = $request->input('keywords');
        $data = Db::table("users")->where('username','like',"%".$k."%")->paginate(2);
        return view("Admin.User.index",['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.User.add");
    }

    /**
     * Store a newly created resource in storage.
     *AdminUserinsert 效验类
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserinsert $request)
    {
        $data = $request->except(['repassword','_token']);
        $data['password'] = Hash::make($data['password']);//密码加密
        $data['token'] = str_random(50);
//        dd($data);
        if(DB::table('users')->insert($data)){
//            with可以设置session信息
            return redirect('/adminusers')->with('success','添加成功');
        }else{
            return redirect('/adminusers/create')->with('error','添加失败');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table("users")->where('id','=',$id)->first();
        return view("Admin.User.edit",["user"=>$user]);
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
        $data = $request->except(['_token','_method']);
        if(DB::table("users")->where('id','=',$id)->update($data)){
            return redirect("/adminusers")->with('success',"修改成功");
        }else{
            return redirect("/adminusers/{$id}/edit")->with("error","修改失败");
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
         $id = $id;
         if(DB::table("users")->where('id','=',$id)->delete()){
             return redirect("/adminusers")->with('success','删除成功');
         }else{
             return redirect("/adminusers")->with('error','删除失败');
         }
    }

}
