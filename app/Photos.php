<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    protected $table="photos";
    protected $primaryKey = 'photo_id';
    protected $fillable=['name','description'];
    // public $rules=[
    //     'album_id'=>'required',
    //     'name'=>'required|string',
    //     'description'=>'required|string',
    //     'featuredImage'=>'nullable'
    // ];
}
