@extends('layout.main_template') 

@section('content')

<div class="mb-3">
    <button class="btn btn-primary">
        <a href="{{ route('staff.index') }}" class="text-white text-decoration-none">
            <i class="fa-solid fa-arrow-left"></i> Back to Staff List
        </a>
    </button>
</div>

<h1 class="text-center mb-4">Staff Details</h1>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Name: {{$staff->name}}</h3>
                    <p><strong>Role:</strong> {{$staff->role}}</p>
                    <p><strong>Phone:</strong> {{$staff->phone ?? 'Not provided'}}</p>


                    @if ($staff->photo)
                        <div class="text-center mt-3">
                            <img src="{{ asset('image/staff/' . $staff->photo) }}" class="img-fluid rounded" alt="Photo">
                        </div>
                    @else
                        <p class="text-muted text-center mt-3">No se ha cargado una imagen para este empleado.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
