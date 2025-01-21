@extends('layout.main_template')

@section('content')
@include('fragments.formstyle')
<h2>Crear Personal</h2>

<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@if ($errors->any())
    <div class="alert alert-danger" id="errorAlert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<button class="btn btn-secondary">
    <a href="{{ route('staff.index') }}" class="text-white text-decoration-none">
        <i class="fa-solid fa-list"></i> Personal
    </a>
</button>

<form id="staffForm" action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Nombre:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <div class="mb-3">
        <label for="role" class="form-label">Rol:</label>
        <input type="text" name="role" id="role" class="form-control" value="{{ old('role') }}" required>
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Teléfono:</label>
        <input type="tel" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required>
    </div>

    <div class="mb-3">
        <label for="photo" class="form-label">Foto:</label>
        <input type="file" name="photo" id="photo" accept="image/*" class="form-control" required>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Guardar Personal</button>
    </div>
</form>

<script>
    document.getElementById('staffForm').addEventListener('submit', function(e) {
        let isValid = true;
        let errorMessages = [];

        const name = document.getElementById('name').value;
        if (!name || name.length < 3) {
            errorMessages.push('El nombre debe tener al menos 3 caracteres.');
            isValid = false;
        }

        const role = document.getElementById('role').value;
        if (!role || role.length < 3) {
            errorMessages.push('El rol debe tener al menos 3 caracteres.');
            isValid = false;
        }

        const phone = document.getElementById('phone').value;
        const phonePattern = /^[0-9]{10}$/;
        if (!phonePattern.test(phone)) {
            errorMessages.push('El teléfono debe ser un número válido de 10 dígitos.');
            isValid = false;
        }

        const photo = document.getElementById('photo').files[0];
        if (!photo) {
            errorMessages.push('La foto es obligatoria.');
            isValid = false;
        } else {
            const allowedExtensions = ['image/jpeg', 'image/png', 'image/jpg'];
            if (!allowedExtensions.includes(photo.type)) {
                errorMessages.push('La foto debe ser una imagen JPG, JPEG o PNG.');
                isValid = false;
            }
            if (photo.size > 2 * 1024 * 1024) {
                errorMessages.push('La foto no puede pesar más de 2MB.');
                isValid = false;
            }
        }

        if (!isValid) {
            e.preventDefault();
            let errorAlert = document.createElement('div');
            errorAlert.classList.add('alert', 'alert-danger');
            let errorList = document.createElement('ul');
            errorMessages.forEach(msg => {
                let li = document.createElement('li');
                li.textContent = msg;
                errorList.appendChild(li);
            });
            errorAlert.appendChild(errorList);

            const form = document.getElementById('staffForm');
            form.parentNode.insertBefore(errorAlert, form);

            setTimeout(() => {
                errorAlert.remove();
            }, 5000);  
        }
    });
</script>

@endsection
