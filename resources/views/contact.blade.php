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
                    <a href="/contact" class="nav-link">Contact</a>
                </li>


            </ul>
        </div>
    </nav>
    <header>
        <h1 class="text-center text-primary">TEC Programming & Robotics Club</h1>
    </header>

    <img class="img-fluid card-body" src="{{ asset('storage/image/contact_Info.png') }}" alt="Club Image">


    <footer class="text-center text-white" style="background-color: #f1f1f1;">
        <!-- Grid container -->
        <div class="container pt-4">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a
                    class="btn btn-link btn-floating btn-lg text-dark m-1"
                    href="https://www.facebook.com/TECPRC"
                    role="button"
                    target="_blank"
                    data-mdb-ripple-color="dark"
                ><i class="fab fa-facebook-f"></i
                    ></a>

                <!-- Google -->
                <a
                    class="btn btn-link btn-floating btn-lg text-dark m-1"
                    href="mailto:tecprc.ru@gmail.com"
                    role="button"
                    target="_blank"
                    data-mdb-ripple-color="dark"
                ><i class="fab fa-google"></i
                    ></a>

                <!-- Linkedin -->
                <a
                    class="btn btn-link btn-floating btn-lg text-dark m-1"
                    href="https://www.linkedin.com/company/tec-prc/"
                    role="button"
                    target="_blank"
                    data-mdb-ripple-color="dark"
                ><i class="fab fa-linkedin"></i
                    ></a>
                <!-- Github -->
                <a
                    class="btn btn-link btn-floating btn-lg text-dark m-1"
                    href="https://github.com/IsrakAhmed"
                    role="button"
                    target="_blank"
                    data-mdb-ripple-color="dark"
                ><i class="fab fa-github"></i
                    ></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2024 Copyright:
            <a class="text-dark" target="_blank" href="https://israkahmed.github.io/Portfolio/">Israk Ahmed</a>
        </div>
        <!-- Copyright -->
    </footer>

    <script src="https://kit.fontawesome.com/ed33ad0b5a.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <style>
        .btn-floating i:hover {
            color: #007bff; /* Change the color to blue on hover */
        }
    </style>

</body>
</html>
