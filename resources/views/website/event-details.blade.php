@extends('website.layout')

@section('title', 'Events | MyWebsite')

@section('content')

<style>
    .event-card {
        position: relative;
        border-radius: 12px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.15);
    }

    .card-body {
        font-size: 0.9rem;
    }

    @media (max-width: 768px) {
        .card-body {
            font-size: 0.85rem;
        }
    }
</style>

<div class="container py-5">
    <div class="row g-4">

        {{-- Ongoing Events --}}
        @foreach($ongoing as $event)
        <div class="col-md-4 col-sm-6">
            <div class="card event-card border-success shadow h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="card-title text-success fw-bold mb-0">{{ $event->heading }}</h5>
                        <span class="badge bg-success">Ongoing</span>
                    </div>
                    <p class="card-text small">{{ $event->about }}</p>
                    <p class="mb-1"><i class="bi bi-calendar-event"></i>
                        <strong>Start:</strong> {{ \Carbon\Carbon::parse($event->start_datetime)->format('d M Y H:i') }}
                    </p>
                    <p class="mb-1"><i class="bi bi-clock"></i>
                        <strong>End:</strong> {{ \Carbon\Carbon::parse($event->end_datetime)->format('d M Y H:i') }}
                    </p>
                    <p class="mb-0"><i class="bi bi-geo-alt"></i>
                        <strong>Location:</strong> {{ $event->location }}
                    </p>
                </div>
            </div>
        </div>
        @endforeach

        {{-- Upcoming Events --}}
        @foreach($upcoming as $event)
        <div class="col-md-4 col-sm-6">
            <div class="card event-card border-primary shadow h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="card-title text-primary fw-bold mb-0">{{ $event->heading }}</h5>
                        <span class="badge bg-primary">Upcoming</span>
                    </div>
                    <p class="card-text small">{{ $event->about }}</p>
                    <p class="mb-1"><i class="bi bi-calendar-event"></i>
                        <strong>Start:</strong> {{ \Carbon\Carbon::parse($event->start_datetime)->format('d M Y H:i') }}
                    </p>
                    <p class="mb-1"><i class="bi bi-clock"></i>
                        <strong>End:</strong> {{ \Carbon\Carbon::parse($event->end_datetime)->format('d M Y H:i') }}
                    </p>
                    <p class="mb-0"><i class="bi bi-geo-alt"></i>
                        <strong>Location:</strong> {{ $event->location }}
                    </p>
                </div>
            </div>
        </div>
        @endforeach

        {{-- Completed Events --}}
        @foreach($completed as $event)
        <div class="col-md-4 col-sm-6">
            <div class="card event-card border-danger shadow h-100 opacity-75">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="card-title text-danger fw-bold mb-0">{{ $event->heading }}</h5>
                        <span class="badge bg-danger">Completed</span>
                    </div>
                    <p class="card-text small">{{ $event->about }}</p>
                    <p class="mb-1"><i class="bi bi-calendar-event"></i>
                        <strong>Start:</strong> {{ \Carbon\Carbon::parse($event->start_datetime)->format('d M Y H:i') }}
                    </p>
                    <p class="mb-1"><i class="bi bi-clock"></i>
                        <strong>End:</strong> {{ \Carbon\Carbon::parse($event->end_datetime)->format('d M Y H:i') }}
                    </p>
                    <p class="mb-0"><i class="bi bi-geo-alt"></i>
                        <strong>Location:</strong> {{ $event->location }}
                    </p>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>


@endsection
