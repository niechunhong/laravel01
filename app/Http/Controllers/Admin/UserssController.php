<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
 //导入userss模型类
use App\Models\Userss;
class UserssController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $k = $request->input("keywords");

        $data = Userss::where("name",'like','%'.$k.'%')->paginate(2);
//      dd($data);
        return view("Admin.Userss.index",['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.Userss.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token','repassword']);
        $data['password'] = Hash::make($data['password']);//密码加密
//      dd($data);

        if(Userss::create($data)){
            return redirect('/adminuserss')->with('success','添加成功');
        }else{
            return redirect('/adminuserss/create')->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *$info 获取会员的详情信息
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info = Userss::find($id)->info;
        return view("Admin.Userss.info",['info'=>$info]);
    }
   //会员收货地址
    public function address($id){
        $address = Userss::find($id)->userssaddress;
        return view("Admin.Userss.address",['address'=>$address]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Userss::find($id);
        return view("Admin.Userss.edit",['user'=>$user]);
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
        $data=$request->except(['_token','_method']);
        //密码加密 $data['password']=Hash::make($data['password']);
        if(Userss::where("id","=",$id)->update($data)){
            return redirect("/adminuserss")->with('success',"修改成功");
        }else{
            return redirect("/adminuserss/$id",'数据修改失败');
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
        if(Userss::destroy($id)){
        return redirect("/adminuserss")->with('success','数据删除成功');
     }else{
        return redirect("/adminuserss")->with('error','数据删除失败');
      }
    }

}
