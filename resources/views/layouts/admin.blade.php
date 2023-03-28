<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="/icon.svg" type="image/svg+xml">
    
    <title>Deliveboo</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Fontawesome 6 cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">

        <header class="navbar navbar-dark sticky-top flex-md-nowrap p-2 shadow deliveboo-navbar">
            <a class="navbar-brand col-md-3 col-lg-2 my-2 container-logo" href="http://localhost:5174/">
                <img src="https://smallprintpizza.com.au/wp-content/uploads/deliveroo-logo.png" alt="logo deliveboo">
            </a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <input class="form-control form-control-dark search-bar" type="text" placeholder="Search">
            <div class="navbar nav">
                <div class="nav-item text-nowrap ms-2 ">
                    <a class="nav-link text-light login-button " href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </header>
        <div class="container-fluid ">
            <div class="row h-100">
                {{-- <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block navbar-dark sidebar collapse sidebar-deliveboo">
                    <div class="position-sticky pt-3"> 
                        <ul class="nav flex-column lista-link">
                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-viola' : '' }}" href="{{route('admin.dashboard')}}">
                                    <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.restaurants.index' ? 'bg-viola' : '' }}" href="{{route('admin.restaurants.index') }}">
                                    <i class="fa-solid fa-newspaper fa-lg fa-fw"></i> Ristoranti
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dishes.index' ? 'bg-viola' : '' }}" href="{{route('admin.dishes.index') }}">
                                    <i class="fa-solid fa-list fa-lg fa-fw"></i> Piatti
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.categories.index' ? 'bg-viola' : '' }}" href="{{route('admin.categories.index') }}">
                                    <i class="fa-solid fa-tag fa-lg fa-fw"></i> Categorie
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav> --}}
                <main class="p-0">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>


 
</body>
</html>
