@extends('master')
@section('css')
    @vite('resources/css/home.css')
@endsection
@section('content')
    <div class="container-md">
        <div class="card shadow-lg">
            <div class="card-header d-flex justify-content-evenly">
                <h1>Kütüphane</h1>
                <h1>{{ Auth::user()->name }}</h1>
            </div>
            <div class="card-body py-5">
                <div class="row g-5 py-5">

                    <a href="{{ route('get.book', 3) }}" class="col-md-6">
                        <div class="custom-card shadow-lg">
                            <div class="custom-card-overlay"></div>
                            <img src="https://images.unsplash.com/photo-1575936123452-b67c3203c357?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8&w=1000&q=80"
                                class="card-img-top" alt="...">
                            <h3 class="custom-card-title text-center">Annem</h3>
                        </div>
                    </a>

                    <a href="{{ route('get.book', 1) }}" class="col-md-6">
                        <div class="custom-card shadow-lg">
                            <div class="custom-card-overlay"></div>
                            <img src="https://images.unsplash.com/photo-1575936123452-b67c3203c357?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8&w=1000&q=80"
                                class="card-img-top" alt="...">
                            <h3 class="custom-card-title text-center">Kitaplarım</h3>
                        </div>
                    </a>

                    <a href="{{ route('get.book', 2) }}" class="col-md-6">
                        <div class="custom-card shadow-lg">
                            <div class="custom-card-overlay"></div>
                            <img src="https://images.unsplash.com/photo-1575936123452-b67c3203c357?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8&w=1000&q=80"
                                class="card-img-top" alt="...">
                            <h3 class="custom-card-title text-center">Alınacak</h3>
                        </div>
                    </a>

                    <a href="{{ route('get.book') }}" class="col-md-6">
                        <div class="custom-card shadow-lg">
                            <div class="custom-card-overlay"></div>
                            <img src="https://images.unsplash.com/photo-1575936123452-b67c3203c357?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8&w=1000&q=80"
                                class="card-img-top" alt="...">
                            <h3 class="custom-card-title text-center">Tümü</h3>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>
@endsection
