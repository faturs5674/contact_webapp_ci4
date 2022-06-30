<form id="create_user">
  <!-- srsffield -->
  <div class="form-group">
    <input type="text" class="form-control" id="user_nama_create" name="user_nama_create" placeholder="nama">
    <div class="invalid-feedback user_create"> </div>
  </div>
  <div class="form-group">
    <input type="text" class="form-control " id="user_no_hp_create" name="user_no_hp_create" placeholder="no telp">
    <div class="invalid-feedback user_hp"></div>
  </div>
  <div class="form-group">
    <input type="text" class="form-control  " id="user_email_create" name="user_email_create" placeholder="email">
    <div class="invalid-feedback user_email"></div>
  </div>
  <div class="form-group">
    <input type="text" class="form-control  " id="username_create" name="username_create" placeholder="username">
    <div class="invalid-feedback username"></div>
  </div>
  <div class="form-group">
    <input type="text" class="form-control " id="password_create" name="password_create" placeholder="password">
    <div class="invalid-feedback password"></div>
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
    <button type="button" id="validasi_user" class="btn btn-primary">Submit</button>
  </div>
</form>