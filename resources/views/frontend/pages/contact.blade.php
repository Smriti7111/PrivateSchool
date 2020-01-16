@extends('main')
@section('content')

{{--container start--}}
<div class="container">
    <div class="col-12 pt-5">
        <div class="row">
            <h3>Contact Form</h3>
        </div>
    </div>
{{--contact us form--}}
    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['route' => ['contactUs.store'],'method'=>'POST']) !!}
            <div class="row">
                <div class="col-md-6">
                    {!! Form::label('fullname','Fullname') !!}
                    {!! Form::text('fullname',null,array('class' => 'form-control','required'=>'')) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::label('email','Email:') !!}
                    {!! Form::email('email',null,array('class' =>'form-control','required'=>'')) !!}
                </div>
            </div>
            {!! Form::label('phone','Phone:') !!}
            {!! Form::text('phone',null,array('class' => 'form-control','required'=>'')) !!}
            {!! Form::label('subject','Subject:') !!}
            {!! Form::text('subject',null,array('class' => 'form-control','required'=>'')) !!}
            {!! Form::label('message','Message:') !!}
            {!! Form::textarea('message',null,array('class' => 'form-control','required'=>'')) !!}
            {!! Form::submit('Send message', array('class' => 'btn btn-sm btn-primary readmorebtn my-4' )) !!}
            {!! Form::close() !!}
        </div>
{{--contact us form end--}}

{{--contact info start--}}
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-address contact-text">
                            <div class="d-inline"><i class="fas fa-map-marked-alt"></i></div>
                            <div class="d-inline contact-address">Address</div>
                            <p>Kalimati, Kathmandu</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="contact-pobox contact-text">
                            <div class="d-inline"><i class="fas fa-fax"></i></div>
                            <div class="d-inline contact-pobox">GPO Box:</div>
                            <p>GPO Box: 2222, Nepal</p>
                        </div>
                    </div>
                 </div>

                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-phone contact-text">
                            <div class="d-inline"><i class="fas fa-phone-alt"></i></div>
                            <div class="d-inline contact-phone">Phone</div>
                            <p>01-4556789</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="contact-email contact-text">
                            <div class="d-inline"><i class="fas fa-envelope"></i></div>
                            <div class="d-inline contact-email">Email</div>
                            <p>info@whatever.edu.np</p>
                        </div>
                    </div>
                </div>

                <hr>

            </div>

{{--contact info end--}}

{{--map start--}}
<div class="col">
    <h5>How to find us</h5>

    <div class="mapouter">
        <div class="gmap_canvas">
            <iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=patan%20multiple%20campus&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            <a href="https://www.instazilla.net"></a>
        </div>
    </div>
</div>

{{--map end--}}
    </div>
</div>
{{--container end--}}
@endsection
