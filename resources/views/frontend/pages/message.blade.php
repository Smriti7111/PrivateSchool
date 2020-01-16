@extends('main')
@section('content')
    <section class="sub_banner_wrap" style="background-image: url('{{ url('/images/aboutbanner.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="sub_banner_hdg">
                        <h1>Principal's Message</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

<div class="container">
<div class="row pt-5">
    <div class="col-md-8">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias autem cupiditate dolorem, ea eum expedita explicabo fugiat incidunt magnam modi nisi nobis placeat qui quos ratione? Asperiores cum cumque deleniti nemo praesentium quod tempora! Delectus, excepturi fugit hic ipsum porro quis tempore velit voluptate. Animi delectus deleniti dignissimos eligendi exercitationem harum labore laboriosam saepe sed vitae. Cumque inventore necessitatibus nihil praesentium quae quod sit ut. Aliquam asperiores consequuntur repudiandae tempore.</p>
    </div>

    <div class="col-md-4">
        <div class="related-text">
            <h5>RELATED</h5>
            <ul class="related-links">
                <li><a href="{{ route('page.about') }}">Who We Are</a></li>
                <hr>
            <li><a href="{{ route('page.policy')}}">Privacy Policy</a></li>
                <hr>
            <li><a href="{{route('page.newsevents') }}">News and Events</a></li>
                <hr>
            <li><a href="{{ route('page.gallery')}}">Gallery</a></li>
                <hr>
            </ul>
        </div>
    </div>
</div>
</div>
@endsection
