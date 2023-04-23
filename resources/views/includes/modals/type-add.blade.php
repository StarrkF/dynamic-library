<form action="{{ route('store.type') }}" method="POST">
    @csrf
    <div class="modal fade" id="typeAdd" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Kitap Türü Ekle</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body my-4">
                    <div class="row">

                        <div class="mb-4">
                            <label for="type_name">Tür <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" required  name="type_name" id="type_name">
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
