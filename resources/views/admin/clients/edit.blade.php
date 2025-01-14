@extends('layout.main_template') 

@section('content')

@include('fragments.formstyle')
<h1>Edit Client</h1>
<button class="btn btn-secondary">
    <a href="{{ route('clients.index') }}" class="text-white text-decoration-none">
        <i class="fa-solid fa-users"></i> Clients
    </a>
</button>

<form action="{{ route('clients.update', $client->id_client) }}" method="POST">
@csrf
@method('PUT')
<label for="name">Client Name</label>
<input type="text" name="name" value="{{$client->name}}" required>

<label for="phone">Phone</label>
<input type="tel" name="phone" value="{{$client->phone}}" required>

<label for="email">Email</label>
<input type="email" name="email" value="{{$client->email}}" required>

<label for="registration_date">Registration Date</label>
<input type="datetime-local" name="registration_date" value="{{ \Carbon\Carbon::parse($client->registration_date)->format('Y-m-d\TH:i') }}" required>

<br>
<button type="submit">Update Client</button>
</form>

@endsection
