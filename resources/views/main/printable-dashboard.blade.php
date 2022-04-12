<html>
<head>
    <script src="/js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">



    <!-- Latest compiled JavaScript -->
    <script src="/js/bootstrap/bootstrap.min.js"></script>
    <title>@yield('title')</title>

    @yield('cssHere')



    <script type="text/javascript" src="/js/loader.js"></script>


    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Work',     11],
                ['Eat',      2],
                ['Commute',  2],
                ['Watch TV', 2],
                ['Sleep',    7]
            ]);

            var options = {
                'height':500,
                'width':500,
                title: 'Patients Daily Activities'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>






    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        @if($wrecords->first())
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Day', 'Anxiety', 'Well Being','Stress','Agitation'],
                    @foreach($wrecords as $wrecord)

                ['{{substr($wrecord->created_at,5,-9)}}',{{$wrecord->anxiety}},{{$wrecord->well_being}},{{$wrecord->stress}},{{$wrecord->agitation}}],
                {{--['Feb{{rand(1, 30)}}',  1,      6,5,7],--}}
                {{--['Feb{{rand(1, 30)}}',  1,      6,5,7],--}}


                @endforeach

            ]);

            var options = {
                title: 'Wellness Chart',
                curveType: 'function',
                'width':1000,
                'height':300,
                legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
        @else

        @endif

    </script>

    <style>
        @media print{
            .no-print{
                display: none;
            }
        }
    </style>


</head>

<body>
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4" >

                <!-- Profile Image -->

                <div class="z-depth-right-5 m-b-25 p-5" >
                    <p class="f-16 color-default bg-primary p-2 m-0" >{{$patient->name}}</p>
                    <div class="p-2 outline-primary bg-light">
                        <p>{{$patient->sex}}</p>
                        <p>{{$patient->dob}}</p>
                        <p>{{$patient->id_no}}</p>
                    </div>
                </div>


            </div>
            <div class="col-md-8">
                <div class="z-depth-right-5 m-b-25 p-5 outline-primary " >

                    <p class="f-16 color-default bg-primary p-2 m-0" >Data Analytics</p>
                    <div class="">



                            <div class="" > <div id="curve_chart" style="height:400px"></div></div>
                            <br>
                            <div class="" >
                                <table class="table">
                                    <thead>
                                    <th>ID</th>
                                    <th>Time of Panic Attack</th>
                                    </thead>
                                    <tbody>
                                    @foreach($panicAttacks as $panicAttack)
                                        <tr>
                                            <td>{{$panicAttack->id}}</td>
                                            <td>{{$panicAttack->created_at}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>

        </div>



    <style>
        body {
            font: 13px/1.3 'Lucida Grande',sans-serif;
            color: #666;
        }

        .chart {
            display: table;
            table-layout: fixed;
            width: 60%;
            max-width: 700px;
            height: 200px;
            margin: 0 auto;
            background-image: linear-gradient(to top, rgba(0, 0, 0, 0.1) 2%, rgba(0, 0, 0, 0) 2%);
            background-size: 100% 50px;
            background-position: left top;
        }
        .chart li {
            position: relative;
            display: table-cell;
            vertical-align: bottom;
            height: 200px;
        }
        .chart span {
            margin: 0 1em;
            display: block;
            background: rgba(209, 236, 250, 0.75);
            animation: draw 1s ease-in-out;
        }
        .chart span:before {
            position: absolute;
            left: 0;
            right: 0;
            top: 100%;
            padding: 5px 1em 0;
            display: block;
            text-align: center;
            content: attr(title);
            word-wrap: break-word;
        }

        @keyframes draw {
            0% {
                height: 0;
            }
        }

    </style>
<script>
    window.print()
</script>
</body>
</html>
