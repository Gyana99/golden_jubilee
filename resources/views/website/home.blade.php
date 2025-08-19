@extends('website.layout')

@section('title', 'Home | MyWebsite')

@section('content')
<div class="container">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">Welcome to MyWebsite</h1>
        <p class="lead">This is an eye-catching, fully responsive homepage.</p>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bi bi-award fs-1 text-primary"></i>
                    <h5 class="card-title mt-3">Our Mission</h5>
                    <p class="card-text">Delivering excellence with passion and innovation.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bi bi-people fs-1 text-success"></i>
                    <h5 class="card-title mt-3">Our Team</h5>
                    <p class="card-text">Professional experts in every domain to serve you.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bi bi-lightning fs-1 text-warning"></i>
                    <h5 class="card-title mt-3">Fast Service</h5>
                    <p class="card-text">Quick and reliable solutions for your needs.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
