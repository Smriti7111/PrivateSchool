<?php

namespace App\Http\Controllers;

use App\Alumni;
use App\Event;
use App\News;
use App\Facility;
use App\Album;
use App\Photos;
use App\Activity;
use Illuminate\Http\Request;
class PagesController extends Controller
{
    public function viewGallery(){
        return view('frontend.pages.gallery')
        ->withAlbums(Album::all());

    }
    public function viewFacility(){
        return view('frontend.pages.facility')->with('facilities',Facility::all());
    }
    public function viewContact(){
        return view('frontend.pages.contact');
    }
    public function viewIndex(){
        return view('frontend.pages.index')
        ->with('facilities',Facility::all())
        ->with('events',Event::all())
        ->with('news',News::all())
        ->with('activities',Activity::orderBy('id','desc')->take(4)->get())
        ->with('photos',Photos::orderBy('photo_id','desc')->take(4)->get());
    }
    public function viewAbout()
    {
        return view('frontend.pages.about');
    }
    public function viewPhotos($album_id)
    {
        $photos=Photos::select('featuredImage')->where('album_id',$album_id)->get();
        return view('frontend.pages.photos')->withPhotos($photos);
    }
    public function success(Request $request){
        $request->session()->flash('msg','You have been successfully subscribed to our newsletter.');
        return redirect()->route('page.index');
    }
    public function viewMessage()
    {
        return view('frontend.pages.message');
    }
    public function viewAlumni()
    {
        $alumnis = Alumni::all();
        return view('frontend.pages.alumni',compact('alumnis'));
    }

    public function viewNotice(){
        return view('frontend.pages.notice');
    }
    public function viewPrivacy(){
        return view('frontend.pages.privacypolicy');
    }
    public function viewNewsEvents(){
        return view('frontend.pages.news_events')->with('events',Event::all())->with('news',News::all());
    }
    public function viewCalendar(){
        return view('frontend.pages.calendar');
    }
    public function viewEvents(){
        return view('frontend.pages.events');
    }
    public function viewNews(){
        return view('frontend.pages.news');
    }
    public function viewActivities(){
        return view('frontend.pages.activity');
    }
}
