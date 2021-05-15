@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Patient Show</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html">Patient Show</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card text-white bg-dark">
                    <div class="card-header">
                        <h4 class="mb-0 text-white">ID #{{$appointment->patients[0]->id}}</h4>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title text-white">Treatments</h3>
                        <p class="card-text">Date and time: {{$appointment->date_time}}</p>
                        <p class="card-text">Complaints: {{$appointment->complaints}}</p>
                        <p class="card-text">Treatment: {{$appointment->treatment}}</p>
                        <p class="card-text">Medication: {{$appointment->medication}}</p>
                        <p class="card-text">Treatment Fee: {{$appointment->treatment_fee}}</p>
                        <p class="card-text">Resit no: {{$appointment->resit_no}}</p>
                        <a href="{{route('appointment.records')}}" class="btn btn-primary">Back</a>
                        <a href="{{route('appointment.delete', ['user' => $appointment->patients[0]->id, 'appointment' => $appointment->id ])}}" class="btn btn-primary">Delete</a>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>

@endsection