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
                        <h4 class="mb-0 text-white">Patient #{{$user->id}}</h4>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title text-white">Treatments</h3>
                        <p class="card-text">Date and time: {{$user->appointment->date_time}}</p>
                        <p class="card-text">Complaints: {{$user->appointment->complaints}}</p>
                        <p class="card-text">Treatment: {{$user->appointment->treatment}}</p>
                        <p class="card-text">Medication: {{$user->appointment->medication}}</p>
                        <p class="card-text">Treatment Fee: {{$user->appointment->treatment_fee}}</p>
                        <p class="card-text">Resit no: {{$user->appointment->resit_no}}</p>
                        <a href="{{route('appointment.records')}}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>

@endsection