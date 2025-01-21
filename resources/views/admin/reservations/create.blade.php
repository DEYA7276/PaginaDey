@extends('layout.main_template')

@section('content')
@include('fragments.formstyle')
<h2>Crear Reserva</h2>

<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<button class="btn btn-secondary">
    <a href="{{ route('reservations.index') }}" class="text-white text-decoration-none">
        <i class="fa-solid fa-list"></i> Reservas
    </a>
</button>

<form id="reservationForm" action="{{ route('reservations.store') }}" method="POST" novalidate>
    @csrf

    <div class="mb-3">
        <label for="id_client" class="form-label">Cliente:</label>
        <select name="id_client" id="id_client" class="form-select" required>
            @foreach($clients as $client)
                <option value="{{ $client->id_client }}">{{ $client->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="id_table" class="form-label">Mesa:</label>
        <select name="id_table" id="id_table" class="form-select" required>
            @foreach($tables as $table)
                <option value="{{ $table->id_table }}">{{ $table->table_number }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="reservation_datetime" class="form-label">Fecha y Hora de Reserva:</label>
        <input type="datetime-local" name="reservation_datetime" id="reservation_datetime" value="{{ old('reservation_datetime') }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Estado:</label>
        <select name="status" id="status" class="form-select" required>
            <option value="pending">Pendiente</option>
            <option value="confirmed">Confirmada</option>
            <option value="canceled">Cancelada</option>
        </select>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Guardar Reserva</button>
    </div>
</form>

<script>
    document.getElementById('reservationForm').addEventListener('submit', function(e) {
        let isValid = true;
        let errorMessages = [];

        const client = document.getElementById('id_client').value;
        if (!client) {
            errorMessages.push('Por favor seleccione un cliente.');
            isValid = false;
        }

        const table = document.getElementById('id_table').value;
        if (!table) {
            errorMessages.push('Por favor seleccione una mesa.');
            isValid = false;
        }

        const reservationDatetime = document.getElementById('reservation_datetime').value;
        if (!reservationDatetime) {
            errorMessages.push('Por favor seleccione una fecha y hora para la reserva.');
            isValid = false;
        }

        const status = document.getElementById('status').value;
        if (!status) {
            errorMessages.push('Por favor seleccione un estado.');
            isValid = false;
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

            const form = document.getElementById('reservationForm');
            form.parentNode.insertBefore(errorAlert, form);
            return;
        }

        const reservationDatetimeValue = new Date(reservationDatetime);
        const formData = new FormData();
        formData.append('id_table', table);
        formData.append('reservation_datetime', reservationDatetime);

        fetch("{{ route('reservations.check_availability') }}", {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (!data.available) {
                e.preventDefault();
                alert('La mesa ya está reservada en este rango de tiempo. Por favor, seleccione otro horario.');
            } else {
                document.getElementById('reservationForm').submit();
            }
        })
        .catch(error => {
            console.error('Error al verificar disponibilidad de la mesa:', error);
            alert('Hubo un error al verificar la disponibilidad de la mesa.');
        });
    });
</script>

@endsection
