@extends('main')
@section('style link')
<link rel="stylesheet" href="css/owl.carousel.min.css">
{{-- <link rel="stylesheet" href="css/lightgallery.min.css"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.0/css/lightgallery.min.css">
@endsection
@section('css code')
<style>

    /* .container-fluid{
        width:90% !important;
    } */
    .facilities .card:hover{
        box-shadow: 4px 3px 37px -20px rgba(0,0,0,1);
    }
    .facilities .card{
        transition:0.1s ease-in;
    }
    @media screen and (max-width: 992px){
      .owl-slider .owl-carousel .card{
        width:32rem !important;
      }
      @media screen and (max-width: 360px) {
        .facilities .container-fluid h1::before{
        margin-left:100px !important;
    }
    .upevents::before{
        margin-left:90px;
    }
      }
}
</style>
@endsection
@section('content')

{{-- modal --}}


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Notice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa rerum perferendis accusamus ut, neque dicta architecto autem modi consequuntur quos, amet temporibus, cupiditate atque doloribus iure numquam alias saepe recusandae.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
{{-- end modal --}}

{{-- session msg--}}


{{-- @if(Session::has('msg')) --}}
<div id="session" style="z-index:100; height:3em;" class="col-md-4 col-sm-5 float-right fade show" role="alert">
  {{-- {{Session::get('msg')}} --}}
  @include('flash::message')
</div>
{{-- @endif --}}
{{-- end session msg--}}

{{-- carousel start --}}
@include('frontend.partials._indexcarousel')
{{-- carousel end --}}



{{-- who we are div--}}
<div style=" width:90% !important;" class="container-fluid">
    <div class="row whoweare mt-3">
        <div class="col-md-12 mt-5">
            <h2>Who <span class="primary">We</span>  are</h2>
            <img class="whoweare-img float-left" src="{{ url('images/school.png')}}" alt="">
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquam aspernatur, beatae culpa cumque eos ex excepturi explicabo fugit harum iure magnam molestias mollitia necessitatibus nobis nulla obcaecati officia repudiandae sunt velit veniam vero voluptas? Amet expedita obcaecati qui repudiandae rerum. Aspernatur cupiditate delectus esse et expedita quasi, temporibus voluptatibus!</p>
            <a class="btn btn-primary readmorebtn" href="{{route('page.about')}}">Read More >></a>
        </div>
    </div>
    <hr>
</div>
{{-- end who we are div--}}

{{-- card carousel --}}
<div class="facilities">
    <div class="container">
    <h1 class="text-center mt-5  mb-3">Our Facilities</h1>
      <div class="owl-slider mt-3">
        <div id="carousel" class="owl-carousel">
        @foreach ($facilities as $facility)
            <div class="item">
                <a href="{{ url("view_facilities#$facility->id")}}">
                <div class="card" style="width: 18rem;">
                <img style="height:200px; object-fit:cover;" src="{{ url("images/$facility->featured_image")}}" alt="imagefacility">
                    <div class="card-body">
                    <h5 class="card-title">{{$facility->title}}</h5>
                    <p class="card-text">{{$facility->body}}</p>
                    <a class="readmorebtn gray"  href="{{ url("view_facilities#$facility->id")}}">Read more>></a>
                    </div>
                </div>
                </a>
            </div>
        @endforeach
          </div>
        </div>
        <a class="btn btn-primary mt-3 readmorebtn" href="{{ route('page.facility')}}">View All >></a>
        </div>
    </div>
    </div>
    {{-- card carousel end --}}



{{-- activities section --}}
<div class="container-fluid activities my-5">
<h2 class="text-center ourActivity">Our <span class="primary">Activities</span></h2>
    <div class="row">
    @foreach ($activities as $activity)
        <div class="col-md-3">
            <h3>{{ $activity->name}}</h3>
        <div class="Activityimgdiv">
            <img src="{{ url("images/$activity->featuredImage")}}" alt="">
        </div>
        </div>
    @endforeach
    </div>
<a class="btn btn-primary mt-3 readmorebtn" href="{{ route('page.activities')}}">View All >></a>
</div>
{{-- end activities section --}}

{{-- principal message div  --}}
<div style="width:90% !important;" class="container-fluid">
    <hr>
    <div class="row mt-3 ">
        <div class="col-md-9 mt-5 py-3 principalMsg">
            <h2>Principal <span class="primary">Message</span> </h2>
            <img class="whoweare-img float-right" src="{{ url('images/school.png')}}" alt="">
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquam aspernatur, beatae culpa cumque eos ex excepturi explicabo fugit harum iure magnam molestias mollitia necessitatibus nobis nulla obcaecati officia repudiandae sunt velit veniam vero voluptas? Amet expedita obcaecati qui repudiandae rerum. Aspernatur cupiditate delectus esse et expedita quasi, temporibus voluptatibus!</p>
            <a class="btn btn-primary readmorebtn" href="{{route('page.message')}}">Read More >></a>
        </div>
        <div class="col-md-3 mt-4">
            <div class="related-text">
                <h5>RELATED</h5>
                <ul class="related-links">
                <li><a href="{{ route('page.policy')}}">Privacy Policy</a></li>
                    <hr>
                <li><a href="{{route('page.newsevents') }}">News and Events</a></li>
                    <hr>
                <li><a href="{{ route('page.alumni')}}">Alumni</a></li>
                    <hr>
                <li><a href="{{ route('page.contact')}}">Contact Us</a></li>
                    <hr>
                </ul>
            </div>
        </div>
    </div>

</div>


{{-- light gallery --}}
<div class="container text-center">
    <h1 class="text-center mt-5 mb-3 galleryhome">Gallery</h1>
    <div class="demo-gallery mt-3">
      <ul id="lightgallery">
          @foreach ($photos as $photo)
          <li data-responsive="{{ url("images/$photo->featuredImage")}} 375, {{ url("images/$photo->featuredImage")}} 480, {{ url("images/$photo->featuredImage")}} 800" data-src="{{ url("images/$photo->featuredImage")}}"
            data-sub-html="<h4>Fading Light</h4><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>" data-pinterest-text="Pin it" data-tweet-text="share on twitter ">
              <a href="">
                <img class="img-responsive" src="{{ url("images/$photo->featuredImage")}}">
                <div class="demo-gallery-poster">
                  <img style="height:100px; width:100px; object-fit:cover;" src="{{ url("images/$photo->featuredImage")}}" alt="fsa">
                </div>
              </a>
            </li>
          @endforeach
      </ul>
      <span class="small">Click on any of the images to see lightGallery</span>
    </div>
<a class="btn btn-primary mt-3 readmorebtn" href="{{ route('page.gallery')}}">View All >></a>
</div>
{{-- end light gallery --}}

{{-- embed facebook page --}}
<div class="container-fluid my-4">
    <div class="row">
        <div class="col-md-7 offset-md-1">
            {{-- gallery start --}}
<div class="container">
    <h2 class="text-center mb-3 upevents">Our <span class="primary">Upcoming</span>  Events</h2>
      <div class="cards mt-3">
          <div class="card cardg" data-card="0">
            <img class="card-img-top" src="images/carousel1.jpg">
            <h5 class="card-title ml-2 mt-3">Event1</h5>
            <div class="card__detail p-2">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error tempore ipsam voluptate mollitia modi, quaerat minus et sapiente? Modi laboriosam iure, possimus vitae neque error delectus repellat cum. Nam, consequuntur.</p>
            </div>
          </div>
          <div class="card cardg" data-card="1">
              <img class="card-img-top" src="images/carousel2.jpg">
              <h5 class="card-title ml-2 mt-3">Event2</h5>
            <div class="card__detail px-2">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error tempore ipsam voluptate mollitia modi, quaerat minus et sapiente? Modi laboriosam iure, possimus vitae neque error delectus repellat cum. Nam, consequuntur.</p>
            </div>
          </div>
          <div class="card cardg" data-card="2">
              <img class="card-img-top" src="images/carousel3.jpg">
              <h5 class="card-title ml-2 mt-3">Event3</h5>
            <div class="card__detail p-2">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error tempore ipsam voluptate mollitia modi, quaerat minus et sapiente? Modi laboriosam iure, possimus vitae neque error delectus repellat cum. Nam, consequuntur.</p>
              </div>
          </div>
          {{-- <div class="card cardg" data-card="3">
              <img class="card-img-top" src="images/carousel1.jpg">
              <h5 class="card-title ml-2 mt-3">Event4</h5>
              <div class="card__detail p-2">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error tempore ipsam voluptate mollitia modi, quaerat minus et sapiente? Modi laboriosam iure, possimus vitae neque error delectus repellat cum. Nam, consequuntur.</p>
              </div>
          </div> --}}
        </div>
      </div>
    {{-- gallery end --}}
        </div>
        <div class="col-md-2 offset-md-1 mt-5">
            <div class="fb-page" data-href="https://www.facebook.com/csitan/" data-tabs="timeline" data-width="300px" data-height="380px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/csitan/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/csitan/">CSIT Association of Nepal</a></blockquote></div>
        </div>
    </div>
</div>
{{-- end embed facebook page --}}

@endsection
@section('js link')
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/lightgallery-all.min.js"></script>

@endsection
@section('js')
<script type="text/javascript">
// $(window).on('load',function(){
//     $('#exampleModalCenter').modal('show');
// });
$(document).ready(function(){
  $('.owl-carousel').owlCarousel({
    autoplay: true,
  lazyLoad: true,
  loop: true,
  margin: 20,
  responsiveClass: true,
  autoHeight: true,
  autoplayTimeout: 7000,
  smartSpeed: 800,
  nav: true,
  responsive: {
    0: {
      items: 1,
    },
    800: {
      items: 2
    },
    1100: {
      items:4,
      loop:false
    }
  }
  });
  $("#scrollTop").on("click",function(){
       $(window).scrollTop(0);
    });
  $('#lightgallery').lightGallery({
    pager: true
  });
  $(window).on("scroll",function(){
      $('.alert').fadeOut();
  });
});
</script>
@endsection
