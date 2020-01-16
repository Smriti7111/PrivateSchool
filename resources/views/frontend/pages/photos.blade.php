@extends('main')
@section('style link')
<link rel="stylesheet" href="{{ url('css/lightgallery.min.css')}}">
@endsection
@section('content')
{{-- light gallery --}}
<div class="container text-center">
    <h1 class="text-center galleryhome">Gallery</h1>
    <div class="demo-gallery">
      <ul id="lightgallery">
          @foreach ($photos as $photo)
          @if ($photo->featuredImage!=Null)
          <li data-responsive="{{ url("images/$photo->featuredImage")}} 375, {{ url("images/$photo->featuredImage")}} 480, {{ url("images/$photo->featuredImage")}} 800" data-src="{{ url("images/$photo->featuredImage")}}"
            data-sub-html="<h4>Fading Light</h4><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>" data-pinterest-text="Pin it" data-tweet-text="share on twitter ">
              <a href="">
                <img class="img-responsive" src="{{ url("images/$photo->featuredImage")}}">
                <div class="demo-gallery-poster">
                  <img style="height:100px; width:100px; object-fit:cover;" src="{{ url("images/$photo->featuredImage")}}" alt="fsa">
                </div>
              </a>
            </li>
          @endif
          @endforeach
      </ul>
      <span class="small">Click on any of the images to see lightGallery</span>
    </div>
</div>
{{-- end light gallery--}}
@endsection
@section('js link')
<script src="{{ url('js/lightgallery-all.min.js')}}"></script>
@endsection
@section('js')
<script type="text/javascript">
$(document).ready(function(){
  $('#lightgallery').lightGallery({
    pager: true
  });
});
</script>
@endsection
