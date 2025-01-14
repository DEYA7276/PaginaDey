@extends('layout.main_template') 

@section('content')

<div class="mb-3">
    <button class="btn btn-primary">
        <a href="{{ route('clients.index') }}" class="text-white text-decoration-none">
            <i class="fa-solid fa-arrow-left"></i> Back to Client List
        </a>
    </button>
</div>

<h1 class="text-center mb-4">Client Details</h1>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Name: {{$client->name}}</h3>
                    <p><strong>Email:</strong> {{$client->email}}</p>
                    <p><strong>Phone:</strong> {{$client->phone ?? 'Not provided'}}</p>
                    <p><strong>Registration Date:</strong> {{$client->registration_date}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
