@extends('main')
@section('content')

{{--container start--}}
<div class="container">
    <div class="col-12 pt-5">
        <div class="row">
            <h3>Alumni Registration Form</h3>
        </div>
    </div>
{{--contact us form--}}
    <div class="row">
        <div class="col-md-8">
            {{ Form::open(['method'=>'post', 'route'=>'alumni.store']) }}
            <form class="mt-3" action="{{route('alumni.store')}}" method="post">
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        {{Form::label('name','Full Name')}}
                        {{Form::text('name',null,['class'=>'form-control','required'])}}
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="batch">S.L.C. Batch</label>
                        <select name="batch" id="batch" class="form-control"></select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-6">
                        {{ Form::label('email','Email') }}
                        {{ Form::text('email',null,['class'=>'form-control','required']) }}
                    </div>

                    <div class="form-group col-sm-6">
                        {{Form::label('mobile','Mobile No.')}}
                        {{ Form::text('mobile',null,['class'=>'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('address','Address') }}
                    {{ Form::textarea('address',null,['class' =>'form-control','required','rows'=>'3']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('message','Message') }}
                    {{ Form::textarea('message',null,['class' =>'form-control','required','rows'=>'3']) }}
                </div>

                <div class="form-group">
                    <button type="submit" value="submit" class="btn btn-dark">Send Message</button>
                </div>
            {{ Form::close() }}
        </div>
{{--contact us form end--}}
    </div>
</div>
{{--container end--}}

@endsection
