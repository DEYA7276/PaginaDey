@extends('layout.main_template') 

@section('content')

@include('fragments.formstyle')
<h1>Editar Cliente</h1>

<button class="btn btn-secondary">
    <a href="{{ route('clients.index') }}" class="text-white text-decoration-none">
        <i class="fa-solid fa-users"></i> Clientes
    </a>
</button>

<form id="clientForm" action="{{ route('clients.update', $client->id_client) }}" method="POST" novalidate>
    @csrf
    @method('PUT')

    <label for="name">Nombre del Cliente</label>
    <input type="text" name="name" value="{{ old('name', $client->name) }}" required>

    <label for="phone">Teléfono</label>
    <input type="tel" name="phone" value="{{ old('phone', $client->phone) }}" required>

    <label for="email">Correo Electrónico</label>
    <input type="email" name="email" value="{{ old('email', $client->email) }}" required>

    <label for="registration_date">Fecha de Registro</label>
    <input type="datetime-local" name="registration_date" value="{{ \Carbon\Carbon::parse($client->registration_date)->format('Y-m-d\TH:i') }}" required>

    <br>
    <button type="submit">Actualizar Cliente</button>
</form>

<script>
    document.getElementById('clientForm').addEventListener('submit', function(e) {
        let isValid = true;
        let errorMessages = [];

        
        const name = document.querySelector('input[name="name"]').value;
        if (!name || name.length < 3) {
            errorMessages.push('El nombre debe tener al menos 3 caracteres.');
            isValid = false;
        }

      
        const email = document.querySelector('input[name="email"]').value;
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!emailPattern.test(email)) {
            errorMessages.push('Por favor ingrese un correo electrónico válido.');
            isValid = false;
        }

        
        const phone = document.querySelector('input[name="phone"]').value;
        const phonePattern = /^\+?[1-9]\d{1,14}$/;
        if (!phonePattern.test(phone)) {
            errorMessages.push('Por favor ingrese un número de teléfono válido.');
            isValid = false;
        }

        const registrationDate = document.querySelector('input[name="registration_date"]').value;
        if (!registrationDate) {
            errorMessages.push('La fecha de registro es obligatoria.');
            isValid = false;
        }

        
        if (!isValid) {
            e.preventDefault();
            alert('Errores de validación:\n\n' + errorMessages.join('\n'));
        }
    });
</script>

@endsection
