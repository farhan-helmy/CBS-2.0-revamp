@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">
                    Add User
                </h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">

                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>Done save</p>
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <div class="mx-auto col-sm-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Add User Here</h1>
                        <form class="mt-3 form-horizontal" method="POST" action="{{route('doctor.store')}}">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <label class="col-md-2 text-right">Name</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 text-right">NRIC</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="nric" placeholder="xxxxxxxxxx">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 text-right">Gender</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="gender">
                                                <option selected>Choose...</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 text-right">Phone no.</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="phone_no" placeholder="xxxxxxxxxx">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 text-right">Address</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <textarea type="text" class="form-control" rows="3" name="address" placeholder=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 text-right">Next of kin phone.no</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="next_of_kin_phone_no" placeholder="xxxxxxxxxx">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 text-right">Next of kin details</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="next_of_kin" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 text-right">Password</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="">
                                        </div>
                                    </div>
                                </div>
            
                                <div class="row">
                                    <label class="col-md-2 text-right">User Type</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="usertype">
                                                <option value="1">Doctor</option>
                                                <option value="2">Staff</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-rounded btn-primary">SUBMIT</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
@endsection