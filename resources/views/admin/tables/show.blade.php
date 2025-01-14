@extends('layout.main_template') 

@section('content')

<div class="mb-3">
    <button class="btn btn-primary">
        <a href="{{ route('tables.index') }}" class="text-white text-decoration-none">
            <i class="fa-solid fa-arrow-left"></i> Back to Table List
        </a>
    </button>
</div>

<h1 class="text-center mb-4">Table Details</h1>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Table Number: {{$table->table_number}}</h3>
                    <p><strong>Capacity:</strong> {{$table->capacity}}</p>
                    <p><strong>Location:</strong> {{$table->location}}</p>
                    <p><strong>Assigned Staff:</strong> {{$table->staff->name ?? 'Not assigned'}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
