<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <title>TEC PRC</title>

    <link rel="icon" type="image/png" href="{{ asset('storage/image/logo.jpeg') }}">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <a class="navbar-brand" style="width: 5%;" href="/">
        <img style="width: 100%; margin: -12px; margin-left: 1em;" src="{{ asset('storage/image/logo.jpeg') }}">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse laynav" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">

            @auth
                <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] == '/home') ? 'active' : ''; ?>">
                    <a class="nav-link" href="/home">Home</a>
                </li>
                <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] == '/register') ? 'active' : ''; ?>">
                    <a class="nav-link" href="/register">Register</a>
                </li>
                <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] == '/register/toggle') ? 'active' : ''; ?>">
                    <a class="nav-link" href="/register/toggle">Registration-Toggle</a>
                </li>
                <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] == '/edit') ? 'active' : ''; ?>
                <?php echo ($_SERVER['REQUEST_URI'] == '/edit/member') ? 'active' : ''; ?>">
                    <a class="nav-link" href="/edit">Edit</a>
                </li>
                <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] == '/delete') ? 'active' : ''; ?>
                <?php echo ($_SERVER['REQUEST_URI'] == '/delete/member') ? 'active' : ''; ?>">
                    <a class="nav-link" href="/delete">Delete</a>
                </li>

                @if(auth()->user()->member->role == 'Master Admin')
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/edit/member/role">Edit-Role</a>
                    </li>
               @endif
            @endauth

        </ul>
    </div>

    @if($_SERVER['REQUEST_URI'] != '/register')

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        @auth
                            <h6>{{ Auth::user()->member->name }}</h6>

                            @if(auth()->user()->member->role == 'Master Admin')
                                <h6 style="margin-left: 5px;"> [ Master Admin ]</h6>

                            @elseif(auth()->user()->member->role == 'Admin')
                                <h6 style="margin-left: 5px;"> [ Admin ]</h6>

                            @endif
                        @else
                            <li class="nav-item">
                                <a href="/login" class="nav-link">Login</a>
                            </li>
                        @endauth
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/logout"
                           onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="/logout" method="POST" class="d-none">
                                @csrf
                        </form>

                    </div>
                </li>
            </ul>
        </div>

    @else
        @if(!auth()->check())
            <div class="collapse navbar-collapse laynav" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                </ul>
            </div>

        @else
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->member->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/logout"
                               onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="/logout" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </li>
                </ul>
            </div>
        @endif

    @endif


</nav>



<div class="container">

    @yield('page-content')
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<style>
    /* Remove spinner for WebKit (Chrome, Safari) */
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Remove spinner for Firefox */
    input[type="number"] {
        -moz-appearance: textfield;
    }
</style>


</body>
</html>
