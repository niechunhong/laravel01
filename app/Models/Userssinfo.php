<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userssinfo extends Model
{
    protected $table = "user_info";
    protected $primaryKey = "id";
    public $timestamps = false;//
    /**
     *可以被批量被赋值的属性
     */
    protected $fillable = ['hobby','sex','userss_id'];
}
