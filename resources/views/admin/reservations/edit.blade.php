@extends('layout.main_template') 

@section('content')

@include('fragments.formstyle')
<h1>Edit Reservation</h1>
<button class="btn btn-secondary">
    <a href="{{ route('reservations.index') }}" class="text-white text-decoration-none">
        <i class="fa-solid fa-calendar-check"></i> Reservations
    </a>
</button>

<form action="{{ route('reservations.update', $reservation->id_reservation) }}" method="POST">
@csrf
@method('PUT')
<label for="id_client">Client</label>
<select name="id_client" id="id_client" required>
    @foreach($clients as $client)
        <option value="{{ $client->id_client }}" {{ $client->id_client == $reservation->id_client ? 'selected' : '' }}>
            {{ $client->name }}
        </option>
    @endforeach
</select>

<label for="id_table">Table</label>
<select name="id_table" id="id_table" required>
    @foreach($tables as $table)
        <option value="{{ $table->id_table }}" {{ $table->id_table == $reservation->id_table ? 'selected' : '' }}>
            {{ $table->table_number }}
        </option>
    @endforeach
</select>

<label for="reservation_datetime">Reservation Date and Time</label>
<input type="datetime-local" name="reservation_datetime" value="{{ \Carbon\Carbon::parse($reservation->reservation_datetime)->format('Y-m-d\TH:i') }}" required>

<label for="status">Status</label>
<select name="status" id="status" required>
    <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>Pending</option>
    <option value="confirmed" {{ $reservation->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
    <option value="canceled" {{ $reservation->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
</select>

<br>
<button type="submit">Update Reservation</button>
</form>

@endsection
