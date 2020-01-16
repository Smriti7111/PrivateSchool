<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table="albums";
    protected $primaryKey = 'album_id';
    protected $fillable=['album_name','album_description'];
    // public $rules=[
    //     'album_name'=>'required|string',
    //     'album_description'=>'required|string'
    // ];
}
