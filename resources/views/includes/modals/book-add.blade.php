<form action="{{ route('store.book') }}" method="POST">
    @csrf
    <div class="modal fade" id="bookAdd" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Kitap Ekle</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body my-4">
                    <div class="row">

                        <div class="mb-4">
                            <label for="name">Kitap Adı</label>
                            <input type="text" class="form-control" required name="name" id="name">
                        </div>

                        <div class="mb-4 col-md-4">
                            <label for="type_id">Kitap Türü</label>
                            <select name="type_id" id="type_id" class="form-select" required>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4 col-md-4">
                            <label for="list_type_id">Listeleneceği Yer</label>
                            <select name="list_type_id" id="list_type_id" class="form-select" required>
                                @foreach ($list_types as $list)
                                    <option value="{{ $list->id }}">{{ $list->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4 col-md-4">
                            <label for="status">Listeleneceği Yer</label>
                            <select name="status" id="status" class="form-select" required>
                                @foreach ($statuses as $status)
                                    <option>{{ $status }}</option>
                                @endforeach
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
