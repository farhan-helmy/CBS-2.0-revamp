@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">User Show</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html">User Show</a>
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
                        <h4 class="mb-0 text-white"></h4>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title text-white">Details</h3>
                        <p class="card-text">Name: {{$user->name}}</p>
                        <p class="card-text">NRIC: {{$user->nric}}</p>
                        <p class="card-text">Gender: {{$user->gender}}</p>
                        <p class="card-text">Phone number: {{$user->phone_no}}</p>
                        <p class="card-text">Next of kin: {{$user->next_of_kin}}</p>
                        <h3 class="card-title text-white">Panel</h3>
                        <p class="card-text">Panel name: {{$user->panel->company_name}}</p>
                        <a href="{{route('doctor.index')}}" class="btn btn-primary">Back</a>
                        <a href="{{route('doctor.destroy', ['user' => $user->id])}}" class="btn btn-primary">Delete</a>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>

@endsection