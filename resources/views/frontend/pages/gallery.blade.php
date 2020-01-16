@extends('main')
@section('style link')
@endsection
@section('content')
<div class="container album text-center">
    <h1 class="galleryhome">Gallery</h1>
    <div class="row">
        @foreach ($albums as $album)
            <div class="col-md-3  mb-5">
                <div class="card">
                    <div class="titleDiv">
                    <h3>{{ $album->album_name }}</h3>
                    {{-- <p>{{ }}</p> --}}
                    <a class="btn btn-primary btn-sm mt-5" href="{{ route('page.photos',$album->album_id)}}">Show Photos</a>
                    </div>
                    <img src="{{ url("images/$album->featuredImage")}}" alt="">
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
@section('js link')
@endsection
@section('js')
<script type="text/javascript">

</script>
@endsection
