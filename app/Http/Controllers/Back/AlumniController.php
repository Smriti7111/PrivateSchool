<?php

namespace App\Http\Controllers\Back;

use App\Alumni;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function store(Request $request)
    {

        $this->validate($request,[
            'name' => 'required|max:225',
            'batch' => 'required',
            'email' => 'required|unique:alumnis',
            'mobile' => 'required|min:10',
            'address' =>'required|max:100',
            'message' =>'required'
        ]);
        $alumni = new Alumni;

        $alumni->fill($request->all());
        $alumni->name = $request->name;
        $alumni->batch = $request->batch;
        $alumni->email = $request->email;
        $alumni->mobile = $request->mobile;
        $alumni->address = $request->address;
        $alumni->message = $request->message;
        $alumni->save();
//
//        $request->session()->flash('msg','Your data has been successfully stored');

        flash('Your data has been successfully stored','success');

        return view('frontend.pages.index');
    }
}
