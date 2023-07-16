<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BooksLibrary</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-color: white;
                height: 100vh;
            }
            #hero {
                width: 100%;
                height: 100vh;
                background: url(https://wallpapercave.com/wp/wp9502467.jpg) top center;
                background-size: cover;
                position: relative;
            }
            #hero::before {
                content: "";
                background: rgba(0, 0, 0, 0.4);
                position: absolute;
                bottom: 0;
                top: 0;
                left: 0;
                right: 0;
            }
            #hero h1 {
                margin: 0;
                font-size: 48px;
                font-weight: 700;
                line-height: 56px;
                color: #fff;
                font-family: "Poppins", sans-serif;
            }
            #hero h2 {
                color: #eee;
                margin: 10px 0 0 0;
                font-size: 24px;
            }
            #hero a {
                font-family: "Raleway", sans-serif;
                font-weight: 500;
                font-size: 15px;
                letter-spacing: 1px;
                display: inline-block;
                padding: 10px 35px;
                border-radius: 50px;
                transition: 0.5s;
                margin-top: 30px;
                border: 2px solid #fff;
                color: #fff;
                text-decoration: none;
            }
            #hero a:hover {
                color: #fff;
                text-decoration: none;
                background-color: black
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="{{ url('/') }}">Books<b>Library</b> <i class="fas fa-book-open"></i></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                  @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/home') }}" class="nav-link">Home</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Log in</a>
                            </li>
                          @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Register</a>
                            </li>
                        @endif
                      @endauth
                  @endif
                </ul>
              </div>
            </div>
          </nav>
        <section id="hero" class="d-flex justify-content-center align-items-center">
        <div class="position-relative" data-aos="zoom-in" data-aos-delay="100">
            <h1>Are You Decided what to read?</h1>
            <h2>explore our library and have fun</h2>
            <a href="{{ route('register') }}" class="btn-get-started">Join Us Now</a>
        </div>
    </section>
    </body>
</html>
