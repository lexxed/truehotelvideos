<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Store CSRF token for AJAX calls -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" id="bulma" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.2/css/bulma.min.css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Favicon and Apple Icons -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
</head>
<body>
@include('partials.analytics')


  <nav class="nav has-shadow" id="top">
    <div class="container">
      <div class="nav-left">
        <a class="nav-item" href="../index.html">
          <img src="../images/bulma.png" alt="Description">
        </a>
      </div>
      <span class="nav-toggle">
        <span></span>
        <span></span>
        <span></span>
      </span>
      <div class="nav-right nav-menu">
        <a class="nav-item is-tab is-active">
          Home
        </a>
        <a class="nav-item is-tab">
          Features
        </a>
        <a class="nav-item is-tab">
          Team
        </a>
        <a class="nav-item is-tab">
          Help
        </a>
        <span class="nav-item">
          <a class="button">
            Log in
          </a>
          <a class="button is-info">
            Sign up
          </a>
        </span>
      </div>
    </div>
  </nav>


    @yield('content')


<footer class="footer">
  <div class="container">
    <div class="has-text-centered">
      <p>
        <strong>Truehotelvideos</strong> by <a href="{{ url('/') }}">© Copyright 2017,</a>
      </p>
      <p>
        <a class="icon" href="https://github.com/jgthms/bulma">
          <i class="fa fa-github"></i>
        </a>
      </p>
    </div>
  </div>
</footer>    

<!-- JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script async type="text/javascript" src="{{ asset('js/bulma.js') }}"></script>

@yield('extra-js')

</body>
</html>
