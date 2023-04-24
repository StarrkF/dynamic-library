@extends('master')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3>Kitaplar</h3>
                <a href="{{ route('logout') }}" class="btn btn-danger">Çıkış Yap</a>
            </div>

        </div>
        <div class="card-body">
            <div class="d-flex flex-column flex-md-row justify-content-between">
                <div class="d-flex gap-2 flex-column flex-md-row justify-start">
                    <div class="mb-4">
                        <button type="button" class="btn btn-dark px-5 w-100" data-bs-toggle="modal" data-bs-target="#bookAdd">
                            Kitap Ekle
                        </button>
                        @include('includes.modals.book-add')
                    </div>
                    <div class="mb-4">
                        <button type="button" class="btn btn-dark px-5 w-100" data-bs-toggle="modal" data-bs-target="#typeAdd">
                            Kitap Türü Ekle
                        </button>
                        @include('includes.modals.type-add')
                    </div>
                    <div class="mb-4">
                        <button type="button" class="btn btn-dark px-5 w-100" data-bs-toggle="modal" data-bs-target="#bookChart">
                            Verileri Göster
                        </button>
                        @include('includes.modals.book-chart')
                    </div>
                </div>

                <div class="d-flex gap-3 justify-end">
                    <div class="input-group mb-4">
                        <input type="text" class="form-control" id="search" placeholder="Search">
                        <button class="btn btn-outline-dark" type="button" id="searchButton">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Filtreler</div>
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row gap-4 align-items-end">
                        <div class="mb-4 w-100">
                            <label for="perPage">Listele</label>
                            <select id="perPage" class="form-select form-filter" required>
                                <option>25</option>
                                <option selected>50</option>
                                <option>100</option>
                                <option>200</option>
                            </select>
                        </div>
                        <div class="mb-4 w-100">
                            <label for="byStatus">Durum</label>
                            <select id="byStatus" class="form-select form-filter" required>
                                <option value="">Filtreyi Temizle</option>
                                @foreach ($statuses as $status)
                                    <option value="{{ $status['id'] }}">{{ $status['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4 w-100">
                            <label for="byType">Kitap Türü</label>
                            <select id="byType" class="form-select form-filter" required>
                                <option value="">Filtreyi Temizle</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4 w-100">
                            <label for="byListType">Listelenecek Yer</label>
                            <select id="byListType" class="form-select form-filter" required>
                                <option value="">Filtreyi Temizle</option>
                                @foreach ($list_types as $list)
                                    <option value="{{ $list['id'] }}">{{ $list['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4 w-100">
                            <label for="byLibrary">Kütüphanede</label>
                            <select id="byLibrary" class="form-select form-filter" required>
                                <option value="">Filtreyi Temizle</option>
                                <option value="1">Evet</option>
                                <option value="0">Hayır</option>
                            </select>
                        </div>
                        <div class="mb-4 w-100">
                            <button type="button" class="btn btn-outline-danger clearUrl">Temizle</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">
                                <i role="button" id="asc" class="orderBy fa-solid fa-arrow-up fa-xs"></i>
                                <i role="button" id="desc" class="orderBy fa-solid fa-arrow-down fa-xs"></i>
                                ID
                            </th>
                            <th scope="col">Kitap</th>
                            <th scope="col">Yazar</th>
                            <th scope="col">Yayıncı</th>
                            <th scope="col">Sayfa</th>
                            <th scope="col">Tür</th>
                            <th scope="col">Satın Alma</th>
                            <th scope="col">Okunma</th>
                            <th scope="col">Listelenecek Yer</th>
                            <th scope="col">Durum</th>
                            <th scope="col">Kütüphanede</th>
                            <th scope="col">İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <th>{{ $book->id }}</th>
                                <td>{{ $book->name }}</td>
                                <td>
                                    <a href="{{ route('get.author-book', $book->author_slug) }}">{{ $book->author }}</a>
                                </td>
                                <td>{{ $book->publisher }}</td>
                                <td>{{ $book->page_count }}</td>
                                <td>{{ $book->type->name }}</td>
                                <td>{{ $book->list_type }}</td>
                                <td>{{ $book->buy_date }}</td>
                                <td>{{ $book->read_date }}</td>
                                <td>{{ $book->status }}</td>
                                <td>{{ $book->in_library }}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal"
                                        data-bs-target="#bookUpdate{{ $book->id }}">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                    <a href="{{ route('delete.book', $book->id) }}"
                                        onclick=" return confirm('Silmek istediğine emin misin?');"
                                        class="btn btn-outline-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                            @include('includes.modals.book-update')
                        @endforeach
                    </tbody>
                </table>
                {{ $books->links('pagination::bootstrap-5', ['paginator' => $books->appends(request()->query()), 'showing' => __('pagination.showing_from_to_of_results')]) }}
            </div>
        </div>
    </div>
@endsection
@section('js')
    @vite('resources/js/pages/books.js')
@endsection
