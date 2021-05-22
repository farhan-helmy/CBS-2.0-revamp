@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Panel Show</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html">Panel Show</a>
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
                        <h4 class="mb-0 text-white">Panel #{{$panel->id}}</h4>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title text-white">Details</h3>
                        <p class="card-text">Panel Company Name: {{$panel->company_name}}</p>
                        <p class="card-text">Panel Company Details: {{$panel->company_details}}</p>
                        <p class="card-text">Max Coverage (RM): {{$panel->max_coverage}}</p>
                        <p class="card-text">Payback Period (days): {{$panel->payback_period}}</p>
                        <a href="{{route('panel.index')}}" class="btn btn-primary">Back</a>
                        <a href="{{route('panel.destroy', ['panel' => $panel->id])}}" class="btn btn-primary">Delete</a>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>

@endsection