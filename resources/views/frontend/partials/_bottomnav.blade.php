<nav class="navbar navbar-expand-lg navbar-color navbar-dark bottomnav">
    <a class="navbar-brand" href="#">School Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        <a class="{{ Request::is('index') ? 'active nav-link' :'nav-link'}}" href="{{ url('/index')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            About
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('page.about') }}">Who We Are</a>
            <a class="dropdown-item" href="{{ route('page.message') }}">Principal's Message</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('page.policy') }}">Privacy Policy</a>
            <a class="dropdown-item" href="{{ route('page.alumni') }}">Alumni</a>
          </div>
        </li>
        <li class="nav-item">
        <a class="{{ Request::is('news_events') ? 'active nav-link' :'nav-link'}}" href="{{ route('page.newsevents')}}">News & Events</a>
        </li>
        <li class="nav-item">
        <a class="{{ Request::is('gallery') ? 'active nav-link' :'nav-link'}}" href="{{ route('page.gallery')}}">Gallery</a>
        </li>
        <li class="nav-item">
        <a class="{{ Request::is('calendar') ? 'active nav-link' :'nav-link'}}" href="{{ route('page.calendar')}}">Calendar</a>
        </li>
        <li class="nav-item">
            <a class="{{ Request::is('contactus') ? 'active nav-link' :'nav-link'}}" href="{{ route('page.contact')}}">Contact Us</a>
        </li>
      </ul>
    </div>
  </nav>
