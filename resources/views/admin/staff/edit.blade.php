@extends('layout.main_template')

@section('content')

@include('fragments.formstyle')
<h1>Editar Personal</h1>
<button class="btn btn-secondary">
    <a href="{{ route('staff.index') }}" class="text-white text-decoration-none">
        <i class="fa-solid fa-users"></i> Personal
    </a>
</button>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('staff.update', $staff->id_staff) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="mb-3">
    <label for="name" class="form-label">Nombre del Personal:</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $staff->name) }}" required>
</div>

<div class="mb-3">
    <label for="role" class="form-label">Rol:</label>
    <input type="text" name="role" id="role" class="form-control" value="{{ old('role', $staff->role) }}" required>
</div>

<div class="mb-3">
    <label for="phone" class="form-label">Teléfono:</label>
    <input type="tel" name="phone" id="phone" class="form-control" value="{{ old('phone', $staff->phone) }}" required>
</div>

<div class="mb-3">
    <label for="photo" class="form-label">Foto:</label>
    @if ($staff->photo)
        <div>
            <img src="{{ asset('storage/' . $staff->photo) }}" alt="Current photo" style="max-width: 100px; max-height: 100px;">
        </div>
    @endif
    <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
</div>

<button type="submit" class="btn btn-primary">Actualizar Personal</button>

</form>

@endsection
