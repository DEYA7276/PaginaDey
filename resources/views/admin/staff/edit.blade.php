@extends('layout.main_template') 

@section('content')

@include('fragments.formstyle')
<h1>Edit Staff</h1>
<button class="btn btn-secondary">
    <a href="{{ route('staff.index') }}" class="text-white text-decoration-none">
        <i class="fa-solid fa-users"></i> Staff
    </a>
</button>

<!-- Asegúrate de incluir enctype para permitir la carga de archivos -->
<form action="{{ route('staff.update', $staff->id_staff) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

<label for="name">Staff Name</label>
<input type="text" name="name" value="{{ old('name', $staff->name) }}" required>

<label for="role">Role</label>
<input type="text" name="role" value="{{ old('role', $staff->role) }}" required>

<label for="phone">Phone</label>
<input type="tel" name="phone" value="{{ old('phone', $staff->phone) }}" required>

<!-- Campo para editar la foto -->
<div>
    <label for="photo">Photo:</label>
    <!-- Mostrar la foto actual si existe -->
    @if ($staff->photo)
        <div>
            <img src="{{ asset('storage/' . $staff->photo) }}" alt="Current photo" style="max-width: 100px; max-height: 100px;">
        </div>
    @endif
    <input type="file" name="photo" accept="image/*">
</div>

<br>
<button type="submit">Update Staff</button>

</form>

@endsection
