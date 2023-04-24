
    <div class="modal fade" id="typeAdd" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Kitap Türü Ekle</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body my-4">
                    <div class="row">
                    <form action="{{ route('store.type') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="type_name">Tür <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" required  name="type_name" id="type_name">
                        </div>
                        <button type="submit" class="btn btn-primary float-end storeType">Kaydet</button>
                        <button type="button" hidden class="btn btn-warning float-end updateType">Kaydet</button>
                    </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Tür</th>
                                    <th scope="col">İşlem</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($types as $type)
                                    <tr>
                                        <th>{{ $type->name }}</th>
                                        <td>
                                            <button type="button" id="editType" data-typeid="{{ $type->id }}" class="btn btn-outline-dark"> <i class="fa-regular fa-pen-to-square"></i> </button>
                                            <a href="{{ route('delete.book', $type->id) }}"
                                                onclick=" return confirm('Silmek istediğine emin misin?');"
                                                class="btn btn-outline-danger">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vazgeç</button>
                </div>
            </div>
        </div>
    </div>

