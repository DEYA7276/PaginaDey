@extends('layout.main_template')

@section('content')
@include('fragments.formstyle')
<h2>Crear Cliente</h2>

<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@if ($errors->any())
    <div class="error">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<button class="btn btn-secondary">
    <a href="{{ route('clients.index') }}" class="text-white text-decoration-none">
        <i class="fa-solid fa-list"></i> Clientes
    </a>
</button>


<form id="clientForm" action="{{ route('clients.store') }}" method="POST" novalidate>
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
    </div>

    <div>
        <label for="phone">Phone:</label>
        <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" required>
    </div>

    <div>
        <button type="submit">Guardar Cliente</button>
    </div>
</form>

<script>
    document.getElementById('clientForm').addEventListener('submit', function(e) {
        let isValid = true;
        let errorMessages = [];

       
        const name = document.getElementById('name').value;
        if (!name || name.length < 3) {
            errorMessages.push('El nombre debe tener al menos 3 caracteres.');
            isValid = false;
        }

        
        const email = document.getElementById('email').value;
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!emailPattern.test(email)) {
            errorMessages.push('Por favor ingrese un correo electrónico válido.');
            isValid = false;
        }

        
        const phone = document.getElementById('phone').value;
        const phonePattern = /^\+?[1-9]\d{1,14}$/;
        if (!phonePattern.test(phone)) {
            errorMessages.push('Por favor ingrese un número de teléfono válido.');
            isValid = false;
        }

        
        if (!isValid) {
            e.preventDefault();
            alert('Errores de validación:\n\n' + errorMessages.join('\n'));
        }
    });
</script>

@endsection
