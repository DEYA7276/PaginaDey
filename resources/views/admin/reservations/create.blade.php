@extends('layout.main_template') 

@section('content')
@include('fragments.formstyle')
<h2>Create Reservation</h2>

<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@if ($errors->any())
    <div class="error">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<button class="btn btn-secondary">
    <a href="{{ route('reservations.index') }}" class="text-white text-decoration-none">
        <i class="fa-solid fa-list"></i> Reservations
    </a>
</button>

<form action="{{ route('reservations.store') }}" method="POST">
    @csrf
    <div>
        <label for="id_client">Client:</label>
        <select name="id_client" id="id_client" required>
            @foreach($clients as $client)
                <option value="{{ $client->id_client }}">{{ $client->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="id_table">Table:</label>
        <select name="id_table" id="id_table" required>
            @foreach($tables as $table)
                <option value="{{ $table->id_table }}">{{ $table->table_number }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="reservation_datetime">Reservation Date and Time:</label>
        <input type="datetime-local" name="reservation_datetime" id="reservation_datetime" value="{{ old('reservation_datetime') }}" required>
    </div>

    <div>
        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="pending">Pending</option>
            <option value="confirmed">Confirmed</option>
            <option value="canceled">Canceled</option>
        </select>
    </div>

    <div>
        <button type="submit">Save Reservation</button>
    </div>
</form>
@endsection
