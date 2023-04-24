<form action="{{ route('update.book', $book->id) }}" method="POST">
    @csrf
    <div class="modal fade" id="bookUpdate{{ $book->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Kitap Güncelle</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    @csrf
                    <div class="row">

                        <div class="mb-4 col-md-6">
                            <label for="name">Kitap Adı <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" required name="name" value="{{ $book->name }}" id="name">
                        </div>

                        <div class="mb-4 col-md-6">
                            <label for="author">Yazar Adı <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" required  name="author" value="{{ $book->author }}" id="author">
                        </div>

                        <div class="mb-4 col-md-6">
                            <label for="publisher">Yayın Evi</label>
                            <input type="text" class="form-control"  name="publisher" value="{{ $book->publisher }}" id="publisher">
                        </div>

                        <div class="mb-4 col-md-6">
                            <label for="page_count">Sayfa Sayısı</label>
                            <input type="number" class="form-control"  name="page_count" value="{{ $book->page_count }}" id="page_count">
                        </div>

                        <div class="mb-4 col-md-6">
                            <label for="buy_date">Satın Alma Tarihi</label>
                            <input type="date" class="form-control" value="{{ $book->buy_date }}"  name="buy_date" id="buy_date">
                        </div>

                        <div class="mb-4 col-md-6">
                            <label for="read_date">Okunma Tarihi</label>
                            <input type="date" class="form-control" value="{{ $book->read_date }}" name="read_date" id="read_date">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="type_id">Kitap Türü</label>
                            <select name="type_id" id="type_id" class="form-select" required>
                                <option value="">Seçim Yap</option>
                                @foreach ($types as $type)
                                    <option {{ $book->type_id == $type->id ? 'selected' : '' }} value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="list_type_id">Listeleneceği Yer</label>
                            <select name="list_type_id" id="list_type_id" class="form-select" required>
                                <option value="">Seçim Yap</option>
                                @foreach ($list_types as $list)
                                    <option {{ $book->list_type_id == $list['id'] ? 'selected' : '' }} value="{{ $list['id'] }}">{{ $list['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="status">Durum</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="">Seçim Yap</option>
                                @foreach ($statuses as $status)
                                    <option {{ $book->status == $status['id'] ? 'selected' : '' }} value="{{ $status['id'] }}" >{{ $status['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4 col-md-6">
                            <label for="in_library">Kütüphanede</label>
                            <select name="in_library" id="in_library" class="form-select" >
                                <option value="">Seçim Yap</option>
                                <option {{ $book->status == 1 ? 'selected' : '' }} value="1">Evet</option>
                                <option {{ $book->status == 0 ? 'selected' : '' }} value="0">Hayır</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vazgeç</button>
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
            </div>
        </div>
    </div>
</form>
