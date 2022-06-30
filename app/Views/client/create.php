<form id="create">
  <!-- srsffield -->
  <div class="form-group">

    <input type="text" class="form-control" id="client_kode" name="client_kode" placeholder="Kode Customer">
    <div class="invalid-feedback kode">
    </div>
  </div>
  <div class="form-group">
    <input type="text" class="form-control " id="client_nama" name="client_nama" placeholder="Nama Customer">
    <div class="invalid-feedback nama"></div>
  </div>
  <div class="form-group">
    <input type="text" class="form-control  " id="client_website" name="client_website" placeholder="Website Customer">
    <div class="invalid-feedback website"></div>
  </div>
  <div class="form-group">
    <input type="text" class="form-control  " id="client_no_telp" name="client_no_telp" placeholder="No.telp Customer">
    <div class="invalid-feedback no_telp"></div>
  </div>

  <div class="form-group">
    <input type="text" class="form-control " id="client_no_wa" name="client_no_wa" placeholder="No.wa Customer">
    <div class="invalid-feedback no_wa"></div>
  </div>
  <div class="form-group">
    <input type="email" class="form-control " id="client_email" name="client_email" placeholder="Email Customer">
    <div class="invalid-feedback email"></div>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="client_keterangan" name="client_keterangan" placeholder="Keterangan">
    <div class="invalid-feedback keterangan"></div>
  </div>
  <div class="form-group">
    <input type="text" autocomplete="off" class="form-control datepicker" id="client_tgl_daftar" name="client_tgl_daftar" placeholder="Tanggal Pendaftaran">
    <div class="invalid-feedback daftar"></div>
  </div>
  <div class="form-group">
    <input type="hidden" class="form-control" id="create_by" name="update_by">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="status_create" name="status_create" placeholder="Status">
    <div class="invalid-feedback status"></div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" id="validasi" class="btn btn-primary">Submit</button>
    <script type="text/javascript">
      $(document).ready(function() {
        $('.datepicker').datepicker({
          orientation: "bottom",
          format: 'yyyy-mm-dd',
        });

        $('.select2').select2();
      });
    </script>
</form>