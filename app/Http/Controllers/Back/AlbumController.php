<?php

namespace App\Http\Controllers\Back;

use App\Album;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $album=Album::all();
        return view('backend.albums.list')->withList( $album);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Album $album)
    {
        $this->validate($request,array(
            'album_name' => 'required|max:255',
            'album_description'=>'required',
        ));
        //store to database
        if($request->hasFile('featuredImage')){
            $file = $request->file('featuredImage');
            $filenameWithExt = $request->file('featuredImage')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('featuredImage')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $file->move('images',$fileNameToStore);
            $album->featuredImage=$fileNameToStore;
        } else {
            $album->featuredImage = '';
        }
        $album->fill($request->except(['id']));
        $album->save();
        $request->session()->flash('msg', 'You album has been successfully created');
        return redirect()->route('album.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit($album_id)
    {
        $album=Album::find($album_id);
        return view('backend.albums.create')->withEdit($album->find($album_id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$album_id)
    {
        $this->validate($request,array(
            'album_name' => 'required',
            'album_description'=>'required',
        ));
        $album =Album::find($album_id);
        // $album->title=$request->input('album_name');
        // $album->body=$request->input('album_description');
        if($request->hasFile('featuredImage')){
            $file = $request->file('featuredImage');
            $filenameWithExt = $request->file('featuredImage')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('featuredImage')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $file->move('images',$fileNameToStore);
            $album->featuredImage=$fileNameToStore;
        } else {
            $album->featuredImage = '';
        }
        $album->fill($request->except(['album_id']));
        $album->save();
        return redirect()->route('album.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy($album_id)
    {
        $album=Album::find($album_id);
        $album->delete();
        session()->flash('success','The album was deleted successfully');
        return redirect()->route('album.index');
    }
}
