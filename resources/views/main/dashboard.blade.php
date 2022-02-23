@extends('layouts.base')

@section('cssHere')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


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
                title: 'Patients Daily Activities'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>






    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Month', 'False Alets', 'Actual Panic Attacks'],
                ['Jan',  10,      4],
                ['Feb',  1,      6],
                ['Mar',  6,       10],
                ['Apr',  10,      4],
                ['May',  10,      4],
                ['Jun',  6,       12],
                ['Jul',  10,      5]
            ]);

            var options = {
                title: 'Panic Attack Frequency',
                curveType: 'function',
                legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
    </script>

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3" >

                <!-- Profile Image -->

                <div class="z-depth-right-5 m-b-25 p-5" >
                    <p class="f-16 color-default bg-primary p-2 m-0" >Patient name</p>
                    <div class="p-2 outline-primary bg-light">
                        <p>Patient Sex</p>
                        <p>Patient Age</p>
                        <p>Other Data</p>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="z-depth-right-5 m-b-25 p-5 outline-primary " >

                    <p class="f-16 color-default bg-primary p-2 m-0" >Data Analytics</p>
                    <div class="">
                        <ul class="nav nav-tabs p-5" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Chart 1</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Chart 2</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-ta1b" data-bs-toggle="tab" data-bs-target="#profile1" type="button" role="tab" aria-controls="profile" aria-selected="false">Chart 3</button>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><ul class="chart">
                                    <li>
                                        <span style="height:5%" title="Anxiety"></span>
                                    </li>
                                    <li>
                                        <span style="height:70%" title="Well Being"></span>
                                    </li>
                                    <li>
                                        <span style="height:50%" title="Stress"></span>
                                    </li>
                                    <li>
                                        <span style="height:15%" title="Aggitation"></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane fade m-x-5" id="profile" role="tabpanel" aria-labelledby="profile-tab"> <div id="curve_chart"></div></div>
                            <br>
                            <div class="tab-pane fade m-x-5" id="profile1" role="tabpanel" aria-labelledby="profile-tab1"><div id="piechart"></div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="z-depth-right-5 m-b-25 p-5" >
                    <p class="f-16 color-default bg-primary p-2 m-0" >Action Tab</p>
                    <div class="p-2 outline-primary bg-light">
                        <button type="button" class="btn btn-primary btn-sm">Print Data</button>
                        <button type="button" class="btn btn-success btn-sm">Other Action</button>
                        <button type="button" class="btn btn-success btn-sm">Full Screen</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
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
@endsection
