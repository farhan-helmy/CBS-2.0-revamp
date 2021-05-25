@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Appointment Records</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html">Appointment Records</a>
                            </li>
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
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- basic table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>Appointment ID</th>
                                        <th>Name</th>
                                        <th>Patient ID</th>
                                        <th>Panel ID</th>
                                        <th>Panel</th>
                                        <th>Date Time</th>
                                        <th>Complaint</th>
                                        <th>Fee (RM)</th>
                                        <th>Resit no</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($appointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->id }}</td>
                                        @foreach($appointment->patients as $patient)
                                        <td>{{ $patient->name }}</td>
                                        <td>{{ $patient->id }}</td>
                                        <td>{{ $patient->panel->id }}</td>
                                        <td>{{ $patient->panel->company_name }}</td>
                                        @endforeach
                                        <td>{{ $appointment->date_time }}</td>
                                        <td>{{ $appointment->complaints }}</td>
                                        <td>{{ $appointment->treatment_fee }}</td>
                                        <td>{{ $appointment->resit_no }}</td>
                                        <td><a href="{{route('appointment.edit', ['appointment' => $appointment->id])}}" class="btn btn-rounded btn-success">EDIT</a> <a href="{{route('appointment.show', ['appointment' => $appointment->id])}}"><button class="btn btn-rounded btn-danger">VIEW</button></a></td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- order table -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
</div>

@endsection