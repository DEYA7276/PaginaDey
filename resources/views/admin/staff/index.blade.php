@extends('layout.main_template') 

@section('content')

@include('fragments.formstyle')

<style>
    button {
        width: 100%;
        padding: 8px 16px;
        margin-block-start: 32px;
        border: 1px solid #000;
        border-radius: 5px;
        display: block;
        color: white;
        background-color: #000;
    }

    h3 {
        width: 100%;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
        display: inline-block;
    }

    h2 {
        font-family: 'Arial', sans-serif;
        font-weight: bold;
    }

    .btn i {
        margin-right: 5px;
    }

    .table th, .table td {
        vertical-align: middle;
    }

    .table th {
        text-align: center;
    }

    .table td {
        text-align: center;
    }

    .d-flex {
        margin-bottom: 20px;
    }

    .photo-img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 50%;
    }
</style>

<div class="container mt-5">
    <h2 class="text-center mb-4">Staff List</h2>

    <div class="d-flex justify-content-around mb-4">
        <a href="{{ route('staff.create') }}" class="btn btn-success">
            <i class="fa-solid fa-plus"></i> Add Staff
        </a>
    </div>

    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Photo</th> <!-- Nueva columna para la foto -->
                <th>Name</th>
                <th>Role</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staff as $member)
                <tr>
                    <!-- Mostrar la foto -->
                    <td><img src="{{ asset('image/staff/'.$member->photo) }}" width="60" alt="{{ $member->name }}"></td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->role }}</td>
                    <td>{{ $member->phone ?? 'Not provided' }}</td>
                    <td>
                        <a href="{{ route('staff.show', $member->id_staff) }}" class="btn btn-info btn-sm">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('staff.edit', $member->id_staff) }}" class="btn btn-warning btn-sm">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <a href="{{ route('staff.destroyConfirm', $member->id_staff) }}" class="btn btn-danger btn-sm">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-4">
        {{ $staff->links('pagination::bootstrap-4') }}
    </div>
</div>

@endsection
