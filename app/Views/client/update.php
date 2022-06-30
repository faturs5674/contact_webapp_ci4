<div class="d-inline-block">
  <div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Update Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- form -->
          <form id="form">
            <div class="form-group">
              <input type="hidden" class="form-control" id="client_id_update" name="client_id_update">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="client_kode_update" name="client_kode_update">
              <div class="invalid-feedback kode_update"></div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="client_nama_update" name="client_nama_update">
              <div class="invalid-feedback nama_update"></div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="client_website_update" name="client_website_update">
              <div class="invalid-feedback website_update"></div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="client_no_telp_update" name="client_no_telp_update">
              <div class="invalid-feedback no_telp_update"></div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="client_no_wa_update" name="client_no_wa_update">
              <div class="invalid-feedback no_wa_update"></div>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" id="client_email_update" name="client_email_update">
              <div class="invalid-feedback email_update"></div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="client_keterangan_update" name="client_keterangan_update">
              <div class="invalid-feedback keterangan_update"></div>
            </div>
            <div class="form-group">
              <input type="text" id="datepicker_update" name="datepicker_update" class="form-control datepicker" autocomplete="off" />
              <div class="invalid-feedback datepicker1"></div>
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

              <!-- <button type="submit" class="btn btn-primary">UPDATE</button> -->
          </form>
          <!-- endorm -->
        </div>

      </div>
    </div>
  </div>
</div>
</div>
</div>