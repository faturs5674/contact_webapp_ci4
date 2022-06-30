<div class="d-inline-block">
    <div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data kontak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form -->
                    <form id="form">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_create" name="nama_create" placeholder="nama">
                            <div class="invalid-feedback nama_create"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nohp_create" name="nohp_create" placeholder="nomor hp">
                            <div class="invalid-feedback hp_create"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="email_create" name="email_create" placeholder="email">
                            <div class="invalid-feedback email_create"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="create_submit">create</button>
                        </div>
                        <!-- <button type="submit" class="btn btn-primary">UPDATE</button> -->
                    </form>
                    <!-- endorm -->
                </div>
            </div>
        </div>
    </div>
</div>