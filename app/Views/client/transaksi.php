<div class="d-inline-block">
    <div class="modal fade" id="modal_transaksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/clienttransaksi/ctransaksi/">

                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" id="startdate" name="client_transaksi_date_start" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#startdate" autocomplete="off" placeholder="start transaksi" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" id="durasisewa" name="client_transaksi_date_finish" class="form-control " autocomplete="off" placeholder="Durasi Sewa" required />
                            </div>
                        </div>
                        <div class="form-group">

                            <input type="hidden" class="form-control" id="client_id_transaksi" name="client_id_transaksi">
                        </div>
                        <div class="form-group">

                            <input type="hidden" class="form-control" id="email_setting" name="email_setting">
                        </div>
                        <div class="form-group">

                            <input type="hidden" class="form-control" id="wa_setting" name="wa_setting">
                        </div>
                        <div class="form-group">

                            <input type="hidden" class="form-control" id="perpanjangan" name="perpanjangan">
                        </div>
                        <div class="form-group">

                            <input type="hidden" class="form-control" id="updated_by" name="updated_by">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="status_tarsaksi" name="status">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <script>
                    function setDateRangePicker(input1, input2) {
                        $(input1).datepicker({
                            format: "yyyy-mm-dd",
                            useCurrent: false,
                        });
                        $(input1).on("change.datetimepicker", function(e) {
                            $(input2).val("");
                            $(input2).datepicker("minDate", e.date);
                        });
                        $(input2).datepicker({
                            format: "yyyy-mm-dd",
                            useCurrent: false,
                        });
                    }
                </script>
                <script>
                    $(document).ready(function() {
                        setDateRangePicker("#startdate", "#enddate");
                    });
                </script>

            </div>
        </div>
    </div>
</div>
</div>
</div>