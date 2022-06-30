<div class="d-inline-block">
    <div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Update Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form -->
                    <form id="form">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="user_id_update" name="user_id_update">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="user_nama_update" name="user_nama_update">
                            <div class="invalid-feedback nama_update"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="user_no_hp_update" name="user_no_hp_update">
                            <div class="invalid-feedback user_hp_update"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="user_email_update" name="user_email_update">
                            <div class="invalid-feedback user_email_update"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="username_update" name="username_update">
                            <div class="invalid-feedback username_update"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="password_update" name="password_update" placeholder="kosongkan pasword jika tidak inggin mengubah">
                            <div class="invalid-feedback password_update"></div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="updated_by_update" name="updated_by_update">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="status_update" name="status_update">
                            <div class="invalid-feedback status_update"></div>
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