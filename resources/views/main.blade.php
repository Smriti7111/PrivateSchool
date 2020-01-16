<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <link rel="stylesheet" href="{{url('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"  crossorigin="anonymous" />
    @yield('style link')
    <link href="{{ url('css/font-awesome.min.css')}}" rel="stylesheet"  crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="css/font-awesome.min.css"> --}}
    <title>{{config('app.name')}}</title>
    @yield('css code')
</head>
@include('frontend.partials._topnav')
@include('frontend.partials._bottomnav')
{{--<div class="row mt-3">--}}
    {{--@include('frontend.partials._messages')--}}
{{--</div>--}}

<body>
@include('flash::message')
    @yield('content')
</body>
@include('frontend.partials._footer')
<script src="{{url('js/jquery.js')}}"></script>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="{{url('js/bootstrap.min.js')}}"></script>
@yield('js link')
<script src="{{url('js/script.js')}}"></script>
@yield('js')
</html>

