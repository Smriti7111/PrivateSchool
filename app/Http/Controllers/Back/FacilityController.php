<?php

namespace App\Http\Controllers\Back;

use App\Facility;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facility=Facility::all();
        return view('backend.facilities.list')->withList($facility);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.facilities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Facility $facility)
    {
        $this->validate($request,array(
            'title' => 'required|max:255',
            'body'=>'required',
        ));
        if($request->hasFile('featured_image')){
            $file = $request->file('featured_image');
            $filenameWithExt = $request->file('featured_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('featured_image')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $file->move('blog-featured-image',$fileNameToStore);
            $facility->featured_image=$fileNameToStore;
        } else {
            // return $request;
            $facility->featured_image = '';
        }
        $facility->fill($request->except(['id']));
        $facility->save();
        $request->session()->flash('msg', 'You event has been successfully posted');
        return redirect()->route('facilities.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facility=Facility::find($id);
        return view('backend.facilities.create')->withEdit($facility->find($id));
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
        $this->validate($request,array(
            'title' => 'required',
            'body'=>'required',
        ));
        $facility = Facility::find($id);
        $facility->title=$request->input('title');
        $facility->body=$request->input('body');
        if($request->hasFile('featured_image')){
            $file = $request->file('featured_image');
            $filenameWithExt = $request->file('featured_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('featured_image')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $file->move('images',$fileNameToStore);
            $facility->featured_image=$fileNameToStore;
        } else {
            $facility->featured_image = '';
        }
        $facility->save();
        return redirect()->route('facilities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facility=Facility::find($id);
        $facility->delete();
        session()->flash('success','The post was deleted successfully');
        return redirect()->route('facilities.index');
    }
}
