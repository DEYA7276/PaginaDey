@extends('layout.main_template') 

@section('content')

@include('fragments.formstyle')
<h1>Edit Table</h1>
<button class="btn btn-secondary">
    <a href="{{ route('tables.index') }}" class="text-white text-decoration-none">
        <i class="fa-solid fa-table"></i> Tables
    </a>
</button>

<form id="tableEditForm" action="{{ route('tables.update', $table->id_table) }}" method="POST" novalidate>
@csrf
@method('PUT')

<div class="mb-3">
    <label for="table_number" class="form-label">Table Number</label>
    <input type="text" name="table_number" id="table_number" class="form-control" value="{{ $table->table_number }}" required readonly>
</div>

<div class="mb-3">
    <label for="capacity" class="form-label">Capacity</label>
    <input type="number" name="capacity" id="capacity" class="form-control" value="{{ $table->capacity }}" required>
</div>

<div class="mb-3">
    <label for="location" class="form-label">Location</label>
    <input type="text" name="location" id="location" class="form-control" value="{{ $table->location }}" required>
</div>

<div class="mb-3">
    <label for="staff" class="form-label">Staff</label>
    <select name="id_staff" id="id_staff" class="form-select" required>
        @foreach($member as $id => $name)
            <option value="{{ $id }}" {{ old('id_staff', $table->id_staff) == $id ? 'selected' : '' }}>{{ $name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <button type="submit" class="btn btn-primary">Update Table</button>
</div>
</form>

<script>
    document.getElementById('tableEditForm').addEventListener('submit', function(e) {
        let isValid = true;
        let errorMessages = [];

        const tableNumber = document.getElementById('table_number').value;
        if (!tableNumber || tableNumber.length < 1) {
            errorMessages.push('Table number is required.');
            isValid = false;
        }

        const capacity = document.getElementById('capacity').value;
        if (!capacity || capacity <= 0) {
            errorMessages.push('Capacity must be greater than 0.');
            isValid = false;
        }

        const location = document.getElementById('location').value;
        if (!location || location.length < 3) {
            errorMessages.push('Location must be at least 3 characters long.');
            isValid = false;
        }

        const staff = document.getElementById('id_staff').value;
        if (!staff) {
            errorMessages.push('Please select a staff member.');
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

            const form = document.getElementById('tableEditForm');
            form.parentNode.insertBefore(errorAlert, form);

            setTimeout(() => {
                errorAlert.remove();
            }, 5000);
        }
    });
</script>

@endsection
