<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LMS</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="icon" type="image/png" href="{{ asset('image/icon.png') }}">
        
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 8.5vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            #home{
                height:573px;
                background-image:url("{{ asset('image/background.jpg') }}");
                background-size:cover;
                background-repeat:no-repeat;
                position:relative;
            }

            #home .overlay{
                position:absolute;
                top:0;
                left:0;
                height:573px;
                background-color:rgba(41,41,41,0.7);
                width:100%;
            }
            
            #home .overlay h1{
                text-align:center;
                margin:13rem 0 0 0;
                color:#fff;
                font:normal 400 70px/normal serif;
            }

            #home .overlay h1 span{
                color:#3498db;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        @if (auth()->user()->type == 'member')
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ url('/lib') }}">Home</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        </div>
        
        <section id="home">
                <div class="overlay">
                    <h1><span>L</span>ibrary <span>M</span>anagment <span>S</span>ystem</h1>
                </div>
        </section>
    </body>
</html>
