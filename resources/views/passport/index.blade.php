@extends('layouts.passport')
@section('title', 'Home')
@section('content')
<div class="container mt-5">
        <h1 class="mb-4">Xush kelibsiz!</h1>
        <p>Passport ma'lumotlaringizni kiritish yoki ko'rish uchun quyidagi tugmalardan foydalaning:</p>
        <div class="mt-4">
            @if($passport) 
                <!-- Agar pasport mavjud bo'lsa, pasportni ko'rsatish -->
                <a href="{{ route('passport.show', $passport->id) }}" class="btn btn-secondary">
                    <i class="fas fa-eye"></i> Passport ma'lumotlarini ko'rish
                </a>
            @else 
                <!-- Agar pasport mavjud bo'lmasa, yangi pasport yaratish -->
                <p class="text-danger">Pasport ma'lumotlaringiz mavjud emas!</p>
                <a href="{{ route('passport.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> Passport ma'lumotlarini kiriting
                </a>
            @endif
        </div>
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