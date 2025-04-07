@extends('layouts.passport')
@section('content')
@section('title', 'Passport Create')
    <div class="container mt-5">
        <h1 class="mb-4">Passport ma'lumotlarini kiriting</h1>
        <form action="{{ route('passport.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="passport_number" class="form-label">Passport raqami</label>
                <input type="text" class="form-control" id="passport_number" name="passport_number" >
            </div>
            <div class="mb-3">
                <label for="issue_date" class="form-label">Berilgan sana</label>
                <input type="date" class="form-control" id="issue_date" name="issue_date" >
            </div>
            <div class="mb-3">
                <label for="expiry_date" class="form-label">Amal qilish muddati</label>
                <input type="date" class="form-control" id="expiry_date" name="expiry_date" >
            </div>
            <button type="submit" class="btn btn-primary">Saqlash</button>
        </form>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection