@extends('main')
@section('content')
<div class="facilityPage">
<div class="container p_all">
@foreach ($facilities as $facility)
    <div id="{{$facility->id}}" class="card  mt-5">
        {{-- <img src="..." class="card-img-top" alt="A"> --}}
        <div class="card-body">
            <h5 class="card-title">{{$facility->title}}</h5>
            <p class="card-text">{{$facility->body}}</p>
        </div>
    </div>
@endforeach
</div>
</div>
@endsection
