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
                    Edit Appointment
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
                        <form class="mt-3 form-horizontal" method="POST" action="{{ route('appointment.update', ['appointment' => $appointment->id]) }}">
                            @method('PUT')
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <label class="col-md-2 text-right">Complaint</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="complaints" value="{{$appointment->complaints}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 text-right">Treatment</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="treatment" value="{{$appointment->treatment}}" >
                                        </div>
                                    </div>
                                </div>
                
                                <div class="row">
                                    <label class="col-md-2 text-right">Medication</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="medication" value="{{$appointment->medication}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 text-right">Treatment Fee</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="treatment_fee" value="{{$appointment->treatment_fee}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 text-right">Resit_no</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="resit_no" value="{{$appointment->resit_no}}">
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