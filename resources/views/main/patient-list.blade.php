@extends('layouts.base')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card p-5">
                <div class="z-depth-right-5 m-b-25 outline-primary " >

                    <p class="f-16 color-default bg-primary p-2 m-0" >Patients List</p>
                </div>

                <div class="card-body">
                    <a href="#" class="btn btn-info btn-sm">Add Patient</a>
                    <table class="table">
                        <thead>
                        <th>Patient Name</th>
                        <th>DOB</th>
                        <th>Sex</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        <td>name</td>
                        <td>DOB</td>
                        <td>Sex</td>
                        <td>ID Number</td>
                        <td><a href="{{route('dashboard')}}" class="btn btn-primary">View</a></td>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
@endsection

