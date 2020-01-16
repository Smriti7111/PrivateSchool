<?php

namespace App\Http\Controllers\Back;

use App\Album;
use App\Photos;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photo=Photos::all();
        return view('backend.photos.list')->withList($photo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.photos.create')->withAlbums(Album::pluck('album_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Photos $photo)
    {
        $this->validate($request,array(
            'name' => 'required|max:255',
            'description'=>'required',
        ));
        if($request->hasFile('featuredImage')){
            $file = $request->file('featuredImage');
            $filenameWithExt = $request->file('featuredImage')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('featuredImage')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $file->move('images',$fileNameToStore);
            $photo->featuredImage=$fileNameToStore;
        } else {
            // return $request;
            $photo->featuredImage = '';
        }
        $photo->album_id=implode($request->get('album_name'));
        $photo->fill($request->except(['photo_id']));
        $photo->save();
        $request->session()->flash('msg', 'You event has been successfully posted');
        return redirect()->route('photos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photos  $photos
     * @return \Illuminate\Http\Response
     */
    public function show(Photos $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photos  $photos
     * @return \Illuminate\Http\Response
     */
    public function edit($photo_id)
    {
        $photo=Photos::find($photo_id);
        return view('backend.photos.create')->withEdit($photo->find($photo_id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photos  $photos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$photo_id)
    {
        $this->validate($request,array(
            'name' => 'required',
            'description'=>'required',
        ));
        $photo = Photos::find($photo_id);
        if($request->hasFile('featuredImage')){
            $file = $request->file('featuredImage');
            $filenameWithExt = $request->file('featuredImage')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('featuredImage')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $file->move('images',$fileNameToStore);
            $photo->featuredImage=$fileNameToStore;
        } else {
            $photo->featuredImage = '';
        }
        $photo->fill($request->except(['photo_id']));
        $photo->album_id=$request->input('album_id');
        // $photo->name=$request->input('name');
        // $photo->description=$request->input('description');
        // $photo->featuredImage=$request->input('featuredImage');
        $photo->save();
        return redirect()->route('photos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photos  $photos
     * @return \Illuminate\Http\Response
     */
    public function destroy($photo_id)
    {
        $photo=Photos::find($photo_id);
        $photo->delete();
        session()->flash('success','The post was deleted successfully');
        return redirect()->route('photos.index');
    }
}
