<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>TEC PRC</title>

    <link rel="icon" type="image/png" href="{{ asset('storage/image/logo.jpeg') }}">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em;
        }

        section {
            margin: 20px;
        }

        h1 {
            color: #fff;
        }

        p {
            line-height: 1.6;
            color: #666;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <a class="navbar-brand" style="width: 5%;" href="/">
            <img style=" margin: -12px; margin-left: 1em;" src="{{ asset('storage/image/logo.jpeg') }}">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse laynav" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

                @auth
                    <li class="nav-item">
                        <a href="/home" class="nav-link">Home</a>
                    </li>

                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link">Login</a>
                    </li>

                    <li class="nav-item">
                        <a href="/register" class="nav-link">Register</a>
                    </li>

                @endauth

                <li class="nav-item">
                    <a href="/about" class="nav-link">About</a>
                </li>

                <li class="nav-item">
                    <a href="/rules-regulations" class="nav-link">Rules</a>
                </li>

                <li class="nav-item">
                    <a href="/contact" class="nav-link">Contact</a>
                </li>


            </ul>
        </div>
    </nav>
    <header>
        <h1 class="text-center text-primary">TEC Programming & Robotics Club</h1>
    </header>

    <section>
        <h2 style="text-align:center;">Welcome to our Club!</h2>
        <p style="text-align:center;">
            We are a passionate community dedicated to exploring and advancing technology, programming, and robotics.
            Join us in the exciting journey of innovation and learning.
        </p>


        <img style="padding-left:30px;" src="{{ asset('storage/image/club-image.jpg') }}" alt="Club Image">

        <div class="card p-4 bg-light d-flex align-items-center justify-content-center">
            <h2 class="text-primary mb-4">What We Offer</h2>
            <ul class="list-unstyled fw-bold">
                <li>Programming workshops</li>
                <li>Programming contests</li>
                <li>Robotics competitions</li>
                <li>Collaborative coding projects</li>
                <li>Networking opportunities</li>
                <li>And much more!</li>
            </ul>
        </div>

    </section>

    <footer class="footer mt-auto pt-2 pb-3">
        <div class="container text-center">
            <p class="mt-2" style="margin-bottom: 0.5px">© 2024 Israk Ahmed. All rights reserved.</p>
            <a href="https://israkahmed.github.io/Portfolio/">Developed by: Israk Ahmed</a>
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
