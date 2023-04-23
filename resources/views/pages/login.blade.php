@extends('master')
@section('content')
    <div class="card mx-auto col-md-6  shadow-lg">
        <div class="card-header text-center bg-dark text-white py-4">
            <h1>Kullanıcı Girişi</h1>
        </div>
        <div class="card-body py-5">
            <div class="text-center">
                <h2>Kütüphane</h2>
            </div>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-group flex-nowrap my-4 w-75 mx-auto">
                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                    <input type="text" class="form-control form-control-lg" name="email" required placeholder="Email">
                </div>
                <div class="input-group flex-nowrap my-4 w-75 mx-auto">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" class="form-control form-control-lg" name="password" required placeholder="Şifre">
                </div>
                <div class=" text-center mt-3">
                    <button type="submit" class="btn btn-lg btn-dark px-5 w-75">Giriş Yap</button>
                </div>
            </form>
        </div>
    </div>
@endsection
