
<div class="modal fade" id="modalDraw" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-fullscreen-lg-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Kura</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card shadow-lg">
                    <div class="card-header text-center"><h3>Kura yapmak istediklerini seç</h3></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check form-switch mb-4">
                                    <input class="form-check-input draw-switch" type="checkbox" data-name="Kitap Türü" role="switch" id="check_type">
                                    <label for="check_type">Kitap Türü</label>
                                </div>
                                <div class="form-check form-switch mb-4">
                                    <input class="form-check-input draw-switch" type="checkbox" data-name="Listelenecek Yer" role="switch" id="check_listtype">
                                    <label for="check_listtype">Listelenecek Yer</label>
                                </div>
                                <div class="form-check form-switch mb-4">
                                    <input class="form-check-input draw-switch" type="checkbox" data-name="Durum" role="switch" id="check_status">
                                    <label for="check_status">Durum</label>
                                </div>
                                <div class="form-check form-switch mb-4">
                                    <input class="form-check-input draw-switch" type="checkbox" data-name="Kütüphanede" role="switch" id="check_library">
                                    <label for="check_library">Kütüphanede</label>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <ul class="list-group" id="draw-list">
                                </ul>
                            </div>
                        </div>

                        <div class="card card-result" hidden>
                            <div class="card-header"><h4>Kura Sonuçları</h4></div>
                            <div class="card-body">
                                <ul class="list-group" id="draw-result">
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" id="getDraw" disabled class="btn btn-dark">Kura Çek</button>
            </div>
        </div>
    </div>
</div>
