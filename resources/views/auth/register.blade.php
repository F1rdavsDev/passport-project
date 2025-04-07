@extends('layouts.auth')
@section('content')
@section('title', 'Register')
    <div class="auth-container">
        <h2 class="text-center mb-4">Ro'yxatdan o'tish</h2>
        <form action="{{route('users.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Foydalanuvchi nomi</label>
                <input type="text" class="form-control" id="username" name="name" >
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Elektron pochta</label>
                <input type="email" class="form-control" id="email" name="email" >
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Parol</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Parolni tasdiqlang</label>
                <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" >
            </div>
            <button type="submit" class="btn btn-primary w-100">Ro'yxatdan o'tish</button>
        </form>
        <p class="mt-3 text-center">Hisobingiz bormi? <a href="{{route('login')}}">Kirish</a></p>
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
    
