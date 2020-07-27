<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userssaddress extends Model
{
    //定义与模型关联的数据表
    protected $table="address";
//主键
    protected $primaryKey="id";
//设置是否需要自动维护时间戳 created_at updated_at
 public $timestamps =false;
    /**
     * 可以被批量赋值的属性。
     ** @var array
     */
    protected $fillable = ['name','phone','userss_id','huo'];
}
