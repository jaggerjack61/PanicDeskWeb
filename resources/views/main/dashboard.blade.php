@extends('layouts.base')

@section('modals')
    <div class="modal fade" id="addWellnessDataModal">
        <form role="form" action="{{route('store-wellness')}}" method="POST">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="z-depth-right-5 m-b-25">
                        <p class="f-16 color-default bg-primary p-2 m-0" >Add Wellness Data
                        </p>
                    </div>

                    <div class="modal-body">
                        <div class="card-body">
                            <input type="hidden" value="{{$patient->id}}" name="patient_id">
                            <div class="form-group">
                                <label for="title">Anxiety on Scale of 1 to 10</label>
                                <input type="number" class="form-control" min="1" max="10"name="anxiety" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Well being on Scale of 1 to 10</label>
                                <input type="number" class="form-control" min="1" max="10"name="well_being" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Stress on Scale of 1 to 10</label>
                                <input type="number" class="form-control" min="1" max="10"name="stress" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Agitation on Scale of 1 to 10</label>
                                <input type="number" class="form-control" min="1" max="10"name="agitation" required>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
        </form>
        <!-- /.modal-dialog -->
    </div>
@endsection

@section('cssHere')
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

@endsection

@section('content')
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

                    <div class="z-depth-right-5 m-b-25 p-5" >
                        <p class="f-16 color-default bg-primary p-2 m-0" >Action Tab</p>
                        <div class="p-2 outline-primary bg-light">

                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addWellnessDataModal">Add Wellness Data</button>


                            <a href="{{route('store-panic',$patient->id)}}"  class="btn btn-success btn-sm">Add Panic Attack</a>

                            <button type="button" class="btn btn-primary btn-sm">Print Data</button>

                        </div>
                    </div>
            </div>
            <div class="col-md-8">
                <div class="z-depth-right-5 m-b-25 p-5 outline-primary " >

                    <p class="f-16 color-default bg-primary p-2 m-0" >Data Analytics</p>
                    <div class="">
                        <ul class="nav nav-tabs p-5" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Daily Wellness</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Wellness over Time</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-ta1b" data-bs-toggle="tab" data-bs-target="#profile1" type="button" role="tab" aria-controls="profile" aria-selected="false">Panic Attacks</button>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent" style="height:800px">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    @if($wrecordNew)
                                    <ul class="chart">
                                    <li>
                                        <span style="height:{{$wrecordNew->anxiety}}0%" title="Anxiety"></span>
                                    </li>
                                    <li>
                                        <span style="height:{{$wrecordNew->well_being}}0%" title="Well Being"></span>
                                    </li>
                                    <li>
                                        <span style="height:{{$wrecordNew->stress}}0%" title="Stress"></span>
                                    </li>
                                    <li>
                                        <span style="height:{{$wrecordNew->agitation}}0%" title="Agitation"></span>
                                    </li>
                                </ul>
                                @else
                                    <ul class="chart">
                                        <li>
                                            <span style="height:0%" title="Anxiety"></span>
                                        </li>
                                        <li>
                                            <span style="height:0%" title="Well Being"></span>
                                        </li>
                                        <li>
                                            <span style="height:0%" title="Stress"></span>
                                        </li>
                                        <li>
                                            <span style="height:0%" title="Agitation"></span>
                                        </li>
                                    </ul>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"> <div id="curve_chart" style="height:400px"></div></div>
                            <br>
                            <div class="tab-pane fade" id="profile1" role="tabpanel" aria-labelledby="profile-tab1">
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
