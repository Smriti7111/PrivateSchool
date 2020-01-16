<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $table='newsletters';
    protected $fillable = ['email'];
    public $rules = [
        'email' => 'required|string|unique:newsletters',
    ];
}
