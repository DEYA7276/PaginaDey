@extends('layout.main_template') 

@section('content')
@include('fragments.formstyle')
<h2>Create Table</h2>

<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@if ($errors->any())
    <div class="error">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<button class="btn btn-secondary">
    <a href="{{ route('tables.index') }}" class="text-white text-decoration-none">
        <i class="fa-solid fa-list"></i> Tables
    </a>
</button>

<form action="{{ route('tables.store') }}" method="POST">
    @csrf
    <div>
        <label for="table_number">Table Number:</label>
        <input type="text" name="table_number" id="table_number" value="{{ old('table_number') }}" required>
    </div>

    <div>
        <label for="capacity">Capacity:</label>
        <input type="number" name="capacity" id="capacity" value="{{ old('capacity') }}" required>
    </div>

    <div>
        <label for="location">Location:</label>
        <input type="text" name="location" id="location" value="{{ old('location') }}" required>
    </div>

    <div>
        <label for="staff">Staff:</label>
        <select name="id_staff" id="id_staff" required>
            @foreach($member as $id => $name)
                <option value="{{ $id }}" {{ old('id_staff') == $id ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
        
    </div>

    <div>
        <button type="submit">Save Table</button>
    </div>
</form>
@endsection
