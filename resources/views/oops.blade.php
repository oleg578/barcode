@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><b>Oops,</b> an error has occurred</div>
                <div class="card-body">
                    <div class="alert alert-danger"><b>{{ $errormsg }}</b></div>
                    <a href="/" class="btn btn-link">Try again...</a>
                </div>
            </div>
        </div>
    </div>
    @endsection