<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Studio Foto</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="website icon" type="png" href="{{ asset('images/logo 1.png') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body{
            font-family: 'Outfit';
            }
            .custom-header {
            background-color: #868686;
            padding: 10px;
            font-family: 'Outfit', sans-serif;
        }

        
        .background-container {
                background-image: url('{{ asset('images/gallery.png') }}');
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                color: #000000; /* Warna teks pada latar belakang gelap */
                padding: 100px ; /* Sesuaikan sesuai kebutuhan Anda */
                text-align: center;
            }
    
            .background-container h1 {
                font-size: 40px;
                font-family: 'Outfit';
                font-weight: bold;
                margin-bottom: 20px;
            }


        .nav-item p{
        margin-right: 35px;
        text-align: center;
        margin-top: 15px;
        }
        .nav-item .nav-link{
            color: black !important;
            font-weight: 500;
            font-size: 110%;
        }
        .nav-item{
            position: relative;
            left: 70px;
        }
        .nav-item i{
            margin-left: 13px;
        }

        .nav-icon{
            color: black !important;
            font-size: 130%;
            position: relative;
            right: 100px;
        }
        
/* CSS */
.navbar-brand img {
    max-height: 130px; /* Sesuaikan ukuran yang diinginkan */
    position: relative; left: 50%;
}

.navbar {
    height: 70px; /* Tinggi navbar konstan */
}

.content-container {
    background-color: #D4D4D4;
    padding: 20px;
    font-family: 'Outfit', sans-serif;
    height: 560px;
    position: relative;bottom: 
}

        
        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            height: 100%;
            margin-right: 60px;
            
        }

        .content-text {
            max-width: 50%;
        }

        .content-text h1 {
            font-size: 36px;
            font-weight: 600;
            margin-bottom: 50px;
        }

        .content-text p {
            font-size: 18px;
            line-height: 1.5;
            text-align: left; /* Mengatur teks menjadi rata kiri */
        }
        
        .search-container {
        display: none;
        }

        .search-container.active {
        display: block;
        }

        /* Style untuk kolom pencarian saat aktif */
.search-container.active {
    width: 170px; /* Atur lebar sesuai kebutuhan Anda */
    transition: width 0.3s; /* Efek transisi ketika lebar berubah */
    position: relative; right: 16%;
}

/* Style untuk input pencarian saat aktif */
.search-container.active input[name="query"] {
    width: 100%; /* Isi seluruh lebar kolom pencarian */
}


        
        
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light custom-navbar navbar-dark" style="background-color: #D4D4D4;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo polos 2.png') }}" alt="Logo Anda" >
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto" style="position: relative; left: 26%;">
                        <li class="nav-item">
                            <p><a class="nav-link" href="{{ url('/home') }}">Home</a></p>
                        </li>
                        <li class="nav-item">
                            <p><a class="nav-link" href="{{ url('/gallery') }}">Gallery</a></p>
                        </li>
                        <li class="nav-item">
                            <p><a class="nav-link" href="{{ url('/service')}}">Service</a></p>
                        </li>
                    </ul>
        
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-icon" href="{{ route('login') }}"><i class="fa-regular fa-user"></i></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa-regular fa-user"></i>
                                </a>
        
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
        
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <main>
            @yield('content')
        </main>
    </div>
    <script src="https://kit.fontawesome.com/b604af375e.js" crossorigin="anonymous"></script>

</body>
</html>
