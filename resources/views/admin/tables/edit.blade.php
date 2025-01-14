@extends('layout.main_template') 

@section('content')

@include('fragments.formstyle')
<h1>Edit Table</h1>
<button class="btn btn-secondary">
    <a href="{{ route('tables.index') }}" class="text-white text-decoration-none" enctype="multipart/form-data">
        <i class="fa-solid fa-table"></i> Tables
    </a>
</button>

<form action="{{ route('tables.update', $table->id_table) }}" method="POST">
@csrf
@method('PUT')

<label for="table_number">Table Number</label>
<input type="text" name="table_number" value="{{ $table->table_number }}" required>

<label for="capacity">Capacity</label>
<input type="number" name="capacity" value="{{ $table->capacity }}" required>

<label for="location">Location</label>
<input type="text" name="location" value="{{ $table->location }}" required>

<div>
    <label for="staff">Staff:</label>
    <select name="id_staff" id="id_staff" required>
        @foreach($member as $id => $name)
            <option value="{{ $id }}" {{ old('id_staff', $table->id_staff) == $id ? 'selected' : '' }}>
                {{ $name }}
            </option>
        @endforeach
    </select>
</div>

<br>
<button type="submit">Update Table</button>
</form>

@endsection
