@extends('layout.main_template') 

@section('content')

<div class="mb-3">
    <button class="btn btn-primary">
        <a href="{{ route('reservations.index') }}" class="text-white text-decoration-none">
            <i class="fa-solid fa-arrow-left"></i> Back to Reservation List
        </a>
    </button>
</div>

<h1 class="text-center mb-4">Reservation Details</h1>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Client: {{$reservation->client->name}}</h3>
                    <p><strong>Table Number:</strong> {{$reservation->table->table_number}}</p>
                    <p><strong>Reservation Date and Time:</strong> {{$reservation->reservation_datetime}}</p>
                    <p><strong>Status:</strong> {{$reservation->status}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
