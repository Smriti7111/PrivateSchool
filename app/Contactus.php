<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactus extends Model
{
    protected $table='contactus';
    protected $fillable = ['fullname','email','phone','subject','message'];
    public $rules = [
    	'fullname' =>'required|string',
        'email' => 'required|string|unique:contactus',
        'phone' => 'required|string',
        'subject' => 'required|string',
        'message'=>'required|string'
    ];
}
