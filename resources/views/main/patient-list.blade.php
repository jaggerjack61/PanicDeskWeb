@extends('layouts.base')

@section('modals')
    <div class="modal fade" id="addPatientModal">
        <form role="form" action="{{route('store-patient')}}" method="POST">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="z-depth-right-5 m-b-25">
                        <p class="f-16 color-default bg-primary p-2 m-0" >Add Patient
                                </p>
                    </div>

                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="First and Last name" required>
                            </div>
                            <div class="form-group">
                                <label for="code">D.O.B</label>
                                <input type="date" class="form-control text-uppercase" id="dob" name="dob"  required>
                            </div>
                            <div class="form-group">
                                <label>Sex</label>
                                <select id="sex" name="sex" class="form-control">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">ID Number</label>
                                <input type="text" class="form-control" name="id" id="id" placeholder="xx-xxxxxxxxx-x-xx" required>
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

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card p-5">
                <div class="z-depth-right-5 m-b-25 outline-primary " >

                    <p class="f-16 color-default bg-primary p-2 m-0" >Patients List</p>
                </div>

                <div class="card-body">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addPatientModal">New Patient</button>
                    <table class="table">
                        <thead>
                        <th>Patient Name</th>
                        <th>DOB</th>
                        <th>Sex</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach ($patients as $patient)
                            <tr>
                        <td>{{$patient->name}}</td>
                        <td>{{$patient->dob}}</td>
                        <td>{{$patient->sex}}</td>
                        <td>{{$patient->id_no}}</td>

                        <td><a href="{{route('dashboard',$patient->id)}}" class="btn btn-primary">View</a></td>
                            </tr>
                        @endforeach
                        @empty($patients)
                            <p>no data</p>
                        @endempty
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
@endsection

