<div class="modal fade" id="modalDraw" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-fullscreen-lg-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Kura</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card shadow-lg">
                    <div class="card-header text-center">
                        <h3>Kura yapmak istediklerini seç</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                {{-- <div class="form-check form-switch mb-3">
                                    <input class="form-check-input draw-switch" type="checkbox" data-name="Kitap Türü" role="switch" id="check_type">
                                    <label for="check_type">Kitap Türü</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input draw-switch" type="checkbox" data-name="Listelenecek Yer" role="switch" id="check_listtype">
                                    <label for="check_listtype">Listelenecek Yer</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input draw-switch" type="checkbox" data-name="Durum" role="switch" id="check_status">
                                    <label for="check_status">Durum</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input draw-switch" type="checkbox" data-name="Kütüphanede" role="switch" id="check_library">
                                    <label for="check_library">Kütüphanede</label>
                                </div> --}}
                                <div class="mb-3">
                                    <label for="type_id">Kitap Türü <span class="text-danger">*</span></label>
                                    <select name="type_id" id="draw_type_id" required class="form-select form-select-sm draw-select">
                                        <option value="">Seçim Yap</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="list_type_id">Listeleneceği Yer</label>
                                    <select name="list_type_id" id="draw_list_type_id" class="form-select form-select-sm draw-select" >
                                        <option value="">Seçim Yap</option>
                                        @foreach ($list_types as $list)
                                            <option value="{{ $list['id'] }}">{{ $list['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="status">Durum</label>
                                    <select name="status" id="draw_status" class="form-select form-select-sm draw-select" >
                                        <option value="">Seçim Yap</option>
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status['id'] }}">{{ $status['name']  }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="in_library">Kütüphanede</label>
                                    <select name="in_library" id="draw_in_library" class="form-select form-select-sm draw-select" >
                                           <option value="">Seçim Yap</option>
                                           <option value="1">Evet</option>
                                           <option value="0">Hayır</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <ul class="list-group" id="draw-list">
                                </ul>
                            </div>
                        </div>

                        <div class="card card-result text-center drawResult" hidden>
                            <div class="card-header">
                                <h4>Seçilen Kitap</h4>
                            </div>
                            <div class="card-body">
                                <h2></h2>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" id="getDraw" class="btn btn-dark">Kura Çek</button>
            </div>
        </div>
    </div>
</div>
