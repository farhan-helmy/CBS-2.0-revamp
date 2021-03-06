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
                    Edit Patient
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
                        <h1 class="card-title">Update Here</h1>
                        <form class="mt-3 form-horizontal" method="POST" action="{{ route('patient.update', ['user' => $user->id]) }}">
                            @method('PUT')
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <label class="col-md-2 text-right">Name</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 text-right">NRIC</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="nric" value="{{$user->nric}}" placeholder="xxxxxxxxxx">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 text-right">Gender</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="gender">
                                                <option selected>{{$user->gender}}</option>
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
                                            <input type="text" class="form-control" name="phone_no" value="0{{$user->phone_no}}" placeholder="xxxxxxxxxx">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 text-right">Address</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <textarea type="text" class="form-control" rows="3" value="" name="address" placeholder="">{{$user->address}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 text-right">Next of kin phone.no</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="next_of_kin_phone_no" value="{{$user->next_of_kin_phone_no}}" placeholder="xxxxxxxxxx">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 text-right">Next of kin details</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="next_of_kin" value="{{$user->next_of_kin}}" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 text-right">Worker Number</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="worker_no" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 text-right">Panel</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="panel_id">
                                                <option selected value="{{$user->panel->id}}">{{$user->panel->company_name}}</option>
                                                @foreach($panels as $panel)
                                                <option value="{{$panel->id}}">{{$panel->company_name}}</option>
                                                @endforeach
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