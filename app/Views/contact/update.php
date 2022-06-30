<div class="d-inline-block">
    <div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Update Data kontak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form -->
                    <form id="form_update">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id_update" name="id_update">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_update" name="nama_update" placeholder="nama">
                            <div class="invalid-feedback nama_update"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nohp_update" name="nohp_update" placeholder="nomor hp">
                            <div class="invalid-feedback user_hp_update"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="email_update" name="email_update" placeholder="email">
                            <div class="invalid-feedback user_email_update"></div>
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="update()">UPDATE</button>
                        </div>
                        <!-- <button type="submit" class="btn btn-primary">UPDATE</button> -->
                    </form>
                    <!-- endorm -->
                </div>
            </div>
        </div>
    </div>
</div>