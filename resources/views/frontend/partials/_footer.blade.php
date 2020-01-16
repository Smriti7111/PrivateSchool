<footer class="mt-5">
<div class="container">
    <div class="row pt-5">
        <div class="col-md-3 firstcol">
            <h3 class="text-white">Logo of Imaginary Academy</h3>
            <ul>
                <li class="d-inline">
                    <a href=""><i class="fab fa-facebook-square fa-lg"></i></a>
                </li>
                <li class="d-inline">
                    <a href=""><i class="fab fa-instagram fa-lg"></i></a>
                </li>
                <li class="d-inline">
                    <a href=""><i class="fab fa-youtube fa-lg"></i></a>
                </li>
            </ul>
            <div class="verticalLine"></div>
        </div>
        <div class="col-md-3 secondcol">
            <h4 class="white d-block">Navigation Links</h4>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link" href="{{ route('page.index')}}"><span class=" ml-2">Home</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('page.about')}}"><span class="ml-2">About us</span></a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link" href="{{ route('page.gallery')}}">
                    <span class=" ml-2">Gallery</span>
                </a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link" href="{{ route('page.calendar')}}">
                    <span class=" ml-2">Calendar</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-3 thirdcol">
            <h4 class="white d-block">Newsletter</h4>\
            {{-- {!! Form::open(['route' => ['newsletter.store'],'method'=>'POST']) !!}
            {!! Form::email('email',null,array('class' =>'form-control p-2 bg-light rounded newsletter','required'=>'')) !!}
            {!! Form::button('<i class="fa fa-paper-plane fa-lg "></i>', array('type' => 'submit','class' => 'btn btn-sm btn-primary readmorebtn my-4' )) !!}
            {!! Form::close() !!} --}}
            <form method="POST" action="{{ route('newsletter.store')}}">
                @csrf
                <input class="p-2 bg-light rounded newsletter" name="email" type="email" placeholder="Enter your email here">
                <button type="submit"><i class="fa fa-paper-plane fa-lg"></i></button>
            </form>
        </div>
        <div class="col-md-3 fourcol">
            <h4 class="white d-block">Contact us</h4>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link" href="#"><i class="fa fa-map-marker fa-lg"></i><span class=" ml-2">Chakupat,PatanDhoka</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-phone fa-lg"></i><span class="ml-2">9860206666</span></a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link" href="#">
                    <i class="fa fa-envelope fa-lg"></i><span class=" ml-2">info@imaginary.edu.np</span>
                </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#">
                    <i class="fa fa-clock fa-lg"></i> <span class=" ml-2"> GPO Box: 8322, Nepal</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

{{-- scroll-over --}}
<button id="scrollTop" class="scrollover mr-3">
        <i class="fas fa-chevron-up"></i>
</button>
{{--end scroll-over --}}
<div class="row bottomFooter py-3 mt-5">
    <div class="container">
        <div class="col-md-6">
                Copyright@2020 All Rights Reserved
        </div>
        <div class="col-md-6">

        </div>
    </div>
</div>
{{-- <div  class="row py-3 mt-5 bg-light bottomFooter">
    <div class="container bottomFooter">
        <div class="col-md-6">
            Copyright@2020 All Rights Reserved
        </div>
        <div class="col-md-6">

        </div>
    </div>
</div> --}}
</footer>
