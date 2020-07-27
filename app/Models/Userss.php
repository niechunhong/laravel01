<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userss extends Model
{
    protected $table = "userss";
    //设置是否需要自动维护时间戳 created_at updated_at
    public $timestamps = true;
    protected $fillable = ['name','password','status'];
    public function getStatusAttribute($value){
        $status=[0=>"禁用",1=>"开启",2=>"审核中"];
        return $status[$value];
    }
    /**
     * 用于关联会员详情模块
     * userss_id,模型之间关联的字段
     * hasOne 一对一关联
     */
    public function info(){
        return $this->hasOne('App\Models\Userssinfo','userss_id');
    }
    //获取与会员关联的地址信息(1对多)
    public function userssaddress(){
        return $this->hasMany('App\Models\Userssaddress','userss_id');
    }
}
