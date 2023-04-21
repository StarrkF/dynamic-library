@extends('master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Kitaplar</h3>
        </div>
        <div class="card-body">
            <div class="my-4">
                <button type="button" class="btn btn-outline-dark px-5" data-bs-toggle="modal" data-bs-target="#bookAdd">
                    Kitap Ekle
                </button>
                @include('includes.modals.book-add')
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kitap Adı</th>
                            <th scope="col">Tür</th>
                            <th scope="col">Durum</th>
                            <th scope="col">İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <th>{{ $book->id }}</th>
                                <td>{{ $book->name }}</td>
                                <td>{{ $book->type->name }}</td>
                                <td>{{ $book->status }}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#bookUpdate{{ $book->id }}">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                    <a href="{{ route('delete.book', $book->id) }}" onclick=" return confirm('Silmek istediğine emin misin?');" class="btn btn-outline-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                            @include('includes.modals.book-update')
                        @endforeach
                    </tbody>
                </table>

                <div class="my-4">
                    <button type="button" class="btn btn-outline-dark px-5" data-bs-toggle="modal" data-bs-target="#bookChart">
                        Verileri Göster
                    </button>
                    @include('includes.modals.book-chart')
                </div>

            </div>
        </div>
    </div>
@endsection
@section('js')
@vite('resources/js/chart.js')
@endsection
