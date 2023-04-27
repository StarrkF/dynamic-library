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
                                <div class="mb-3">
                                    <label for="type_id">Kitap Türü <span class="text-danger">*</span></label>
                                    <select id="draw_byType" required class="form-select form-select-sm draw-select">
                                        <option value="">Seçim Yap</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="list_type_id">Listeleneceği Yer</label>
                                    <select id="draw_byListType" class="form-select form-select-sm draw-select" >
                                        <option value="">Seçim Yap</option>
                                        @foreach ($list_types as $key => $list)
                                            <option value="{{ $key }}">{{ $list }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="status">Durum</label>
                                    <select id="draw_byStatus" class="form-select form-select-sm draw-select" >
                                        <option value="">Seçim Yap</option>
                                        @foreach ($statuses as $key => $status)
                                            <option value="{{ $key }}">{{ $status }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="in_library">Kütüphanede</label>
                                    <select id="draw_byLibrary" class="form-select form-select-sm draw-select" >
                                           <option value="">Seçim Yap</option>
                                            @foreach ($libraries as $key => $library)
                                                <option value="{{ $key }}">{{ $library }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card card-result text-center drawResult h-100" hidden>
                                    <div class="card-header">
                                        <h3>Seçilen Kitap</h3>
                                    </div>
                                    <div class="card-body d-flex flex-column gap-3 align-items-center justify-content-center">
                                    </div>
                                </div>
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
