@extends('layouts.base')
@section('content')
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="img/doc.jpg" class="img-fluid"
                         alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="post" action="{{route('register-new-user')}}">
                        @csrf
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <h4>Register</h4>

                        </div>

                        <div class="divider d-flex align-items-center my-4">

                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input required type="text" id="form3Example3" name="name" class="form-control form-control-lg"
                                   placeholder="Enter your full name." />
                            <label class="form-label" for="form3Example3">Full Name</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input required type="text" id="form3Example3" name="email" class="form-control form-control-lg"
                                   placeholder="Enter your full name." />
                            <label class="form-label" for="form3Example3">Email</label>
                        </div>

                        <!-- Password input -->


                        <div class="form-outline mb-3">
                            <input required type="password" id="form3Example4" name="password" class="form-control form-control-lg"
                                   placeholder="Enter password" />
                            <label class="form-label" for="form3Example4">Password</label>
                        </div>
                        <div class="form-outline mb-3">
                            <input required type="password" id="form3Example4" class="form-control form-control-lg"
                                   placeholder="Confirm password" />
                            <label class="form-label" for="form3Example4">Password</label>
                        </div>



                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="login.html"
                                                                                                class="link-danger">Log In</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- Copyright -->

    </section>
@endsection
