<html>
<head>
    <script src="/js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">



    <!-- Latest compiled JavaScript -->
    <script src="/js/bootstrap/bootstrap.min.js"></script>
    <title>@yield('title')</title>

    @yield('cssHere')


</head>

<body>
@yield('modals')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Toggle button -->
        <button
            class="navbar-toggler"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="{{route('home')}}">
                <h4>Panic Desk</h4>
            </a>
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{route('patients')}}">Patients</a>
                </li>
                @endauth

            </ul>
            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">

            <!-- Icon -->
            @guest
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Log In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">Register</a>
                </li>

            </ul>
            @endguest
            @auth
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">{{auth()->user()->name}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}">Log Out</a>
                </li>

            </ul>
            @endauth

        </div>
        <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
</nav>

@yield('content')
@yield('scripts')
</body>
</html>
