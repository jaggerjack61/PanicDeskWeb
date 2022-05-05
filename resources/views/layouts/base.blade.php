<html>
<head>
    <script src="/js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">



    <!-- Latest compiled JavaScript -->
    <script src="/js/bootstrap/bootstrap.min.js"></script>
    <title>@yield('title')</title>

    @yield('cssHere')

    <style>
        @media print{
            .no-print{
                display: none;
            }
        }

        .talk-bubble {
            margin: 40px;
            display: inline-block;
            position: relative;
            width: 200px;
            height: auto;
            background-color: yellow;
        }
        .border{
            border: 8px solid #666;
        }
        .round{
            border-radius: 30px;
            -webkit-border-radius: 30px;
            -moz-border-radius: 30px;

        }

        /* Right triangle placed top left flush. */
        .tri-right.border.left-top:before {
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
            left: -40px;
            right: auto;
            top: -8px;
            bottom: auto;
            border: 32px solid;
            border-color: #666 transparent transparent transparent;
        }
        .tri-right.left-top:after{
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
            left: -20px;
            right: auto;
            top: 0px;
            bottom: auto;
            border: 22px solid;
            border-color: yellow transparent transparent transparent;
        }

        /* Right triangle, left side slightly down */
        .tri-right.border.left-in:before {
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
            left: -40px;
            right: auto;
            top: 30px;
            bottom: auto;
            border: 20px solid;
            border-color: #666 #666 transparent transparent;
        }
        .tri-right.left-in:after{
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
            left: -20px;
            right: auto;
            top: 38px;
            bottom: auto;
            border: 12px solid;
            border-color: yellow yellow transparent transparent;
        }

        /*Right triangle, placed bottom left side slightly in*/
        .tri-right.border.btm-left:before {
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
            left: -8px;
            right: auto;
            top: auto;
            bottom: -40px;
            border: 32px solid;
            border-color: transparent transparent transparent #666;
        }
        .tri-right.btm-left:after{
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
            left: 0px;
            right: auto;
            top: auto;
            bottom: -20px;
            border: 22px solid;
            border-color: transparent transparent transparent yellow;
        }

        /*Right triangle, placed bottom left side slightly in*/
        .tri-right.border.btm-left-in:before {
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
            left: 30px;
            right: auto;
            top: auto;
            bottom: -40px;
            border: 20px solid;
            border-color: #666 transparent transparent #666;
        }
        .tri-right.btm-left-in:after{
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
            left: 38px;
            right: auto;
            top: auto;
            bottom: -20px;
            border: 12px solid;
            border-color: yellow transparent transparent yellow;
        }

        /*Right triangle, placed bottom right side slightly in*/
        .tri-right.border.btm-right-in:before {
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
            left: auto;
            right: 30px;
            bottom: -40px;
            border: 20px solid;
            border-color: #666 #666 transparent transparent;
        }
        .tri-right.btm-right-in:after{
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
            left: auto;
            right: 38px;
            bottom: -20px;
            border: 12px solid;
            border-color: yellow yellow transparent transparent;
        }
        /*
            left: -8px;
          right: auto;
          top: auto;
            bottom: -40px;
            border: 32px solid;
            border-color: transparent transparent transparent #666;
            left: 0px;
          right: auto;
          top: auto;
            bottom: -20px;
            border: 22px solid;
            border-color: transparent transparent transparent lightyellow;

        /*Right triangle, placed bottom right side slightly in*/
        .tri-right.border.btm-right:before {
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
            left: auto;
            right: -8px;
            bottom: -40px;
            border: 20px solid;
            border-color: #666 #666 transparent transparent;
        }
        .tri-right.btm-right:after{
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
            left: auto;
            right: 0px;
            bottom: -20px;
            border: 12px solid;
            border-color: yellow yellow transparent transparent;
        }

        /* Right triangle, right side slightly down*/
        .tri-right.border.right-in:before {
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
            left: auto;
            right: -40px;
            top: 30px;
            bottom: auto;
            border: 20px solid;
            border-color: #666 transparent transparent #666;
        }
        .tri-right.right-in:after{
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
            left: auto;
            right: -20px;
            top: 38px;
            bottom: auto;
            border: 12px solid;
            border-color: yellow transparent transparent yellow;
        }

        /* Right triangle placed top right flush. */
        .tri-right.border.right-top:before {
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
            left: auto;
            right: -40px;
            top: -8px;
            bottom: auto;
            border: 32px solid;
            border-color: #666 transparent transparent transparent;
        }
        .tri-right.right-top:after{
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
            left: auto;
            right: -20px;
            top: 0px;
            bottom: auto;
            border: 20px solid;
            border-color: yellow transparent transparent transparent;
        }

        /* talk bubble contents */
        .talktext{
            padding: 1em;
            text-align: left;
            line-height: 1.5em;
        }
        .talktext p{
            /* remove webkit p margins */
            -webkit-margin-before: 0em;
            -webkit-margin-after: 0em;
        }
    </style>


</head>

<body>
@yield('modals')
<nav class="navbar navbar-expand-lg navbar-light bg-light no-print">
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
