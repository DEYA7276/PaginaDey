@extends('layout.main_template')

@section('content')
@include('fragments.formstyle')
<h2>Create Staff</h2>

<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@if ($errors->any())
    <div class="error">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<button class="btn btn-secondary">
    <a href="{{ route('staff.index') }}" class="text-white text-decoration-none">
        <i class="fa-solid fa-list"></i> Staff
    </a>
</button>

<!-- Aquí añadimos el atributo enctype para permitir la carga de archivos -->
<form action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
    </div>

    <div>
        <label for="role">Role:</label>
        <input type="text" name="role" id="role" value="{{ old('role') }}" required>
    </div>

    <div>
        <label for="phone">Phone:</label>
        <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" required>
    </div>

    <div>
        <label for="photo">Photo:</label>
        <input type="file" name="photo" id="photo" accept="image/*">
    </div>

    <div>
        <button type="submit">Save Staff</button>
    </div>
</form>
@endsection
