@extends('main')
@section('content')
    <section class="contents p_all">
    <div class="container">
        <ul class="nav" id="myTab" role="tablist">
        {{--<div class="tab-select">--}}
            {{--<ul class="nav clearfix nav-pills tab-navigation justify-content-center">--}}
                {{--<li class="active">--}}
                    {{--<a href="#Events" data-toggle="tab" class="mr-3">Events </a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a  href="#News" data-toggle="tab" class="ml-3"> News </a>--}}
                {{--</li>--}}
            {{--</ul>--}}
            {{--</div>--}}
    <div class="container nav-title">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#events" role="tab" aria-controls="home" aria-selected="true">Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#news" role="tab" aria-controls="profile" aria-selected="false">News</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            {{--events content start--}}
            <div class="tab-pane fade show active mt-4" id="events" role="tabpanel" aria-labelledby="events-tab">
                <div class="row">
                    @foreach ($events as $event)
                        <div class="col-sm-3">
                            <div class="card individual-content">
                                <img src="images/event.jpg" class="card-img-top" alt="...">
                                <div class="card-body card-content">
                                    <h5 class="card-title">{{$event->title}}</h5>
                                    <hr>
                                    <p class="card-content-date">{{$event->creates_at}}</p>
                                    <p class="card-content-body">{{$event->body}}</p>
                                    <a class="readmorebtn gray" href="#">Read more>></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <a class="readmorebtn btn btn-primary mt-2" href="#">View All>></a>
            </div>
            {{--events content end--}}

            {{--news content start--}}

            <div class="tab-pane fade mt-4" id="news" role="tabpanel" aria-labelledby="news-tab">
                <div class="row">
                <div class="row">
                    @foreach ($news as $new)
                        <div style="width:580px;" class="col-sm-4">
                        <div class="card individual-content">
                            <div class="card-body card-content">
                                <h5 class="card-title">{{$new->title}}</h5>
                                <hr>
                                <p class="card-content-date">{{$new->created_at}}</p>
                                <p class="card-content-body">{{$new->body}}</p>
                                <a class="readmorebtn gray" href="#">Read more>></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                </div>
                <a class="readmorebtn btn btn-primary mt-2" href="#">View All>></a>
            </div>
        {{--news content end--}}
        </div>
    </div>
    </section>




@endsection
