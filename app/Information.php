<?php

namespace App;

 use Illuminate\Database\Eloquent\Model;

//use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Information extends Model
{
    //private $connection = 'mongodb';
    protected $table = 'information';

    protected $fillable = ['name','email','telephone','msg'];

   	protected $primarykey = 'id';

}
