<?= $this->extend('template/administrator') ?>


<?= $this->section('content') ?>
<div class="main-content">
    <style type="text/css">
        #tabel-data tr th {
            white-space: nowrap;
        }

        #tabel-data tr td {
            white-space: nowrap;
        }
    </style>
    <div class="breadcrumb main-content d-flex justify-content-between">
        <div class="d-inline-block">
            <h1>User</h1>
            <ul>
                <li>Tabel User</li>
            </ul>
        </div>
        <div class="d-inline-block">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Input Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <!-- form -->
                            <?= $this->include('/user/create') ?>
                            <!-- endorm -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <a href="" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah</a>
    </div>
</div>
<div class="separator-breadcrumb border-top"></div>
<div class="row">
    <div class="card col-md-12">
        <div class="card-body">
            <table id="tabel-data" class="table table-bordered table-inverse table-hover table-responsive">
                <thead>
                    <tr>
                        <th>Aksi</th>
                        <th>nama</th>
                        <th>no telp</th>
                        <th>Email</th>
                        <th>username</th>
                        <th>password</th>
                        <th>create Time</th>
                        <th>create by</th>
                        <th>update Time</th>
                        <th>update by</th>
                        <th>Status</th>
                    </tr>

                </thead>
                <tbody id="tbl_data">

                </tbody>
            </table>
        </div>
    </div>
</div>

<!--begin::Modal-->
<?= $this->include('/user/update') ?>
<!--end::Modal-->

<script type="text/javascript">
    // var tabel = $('#tabel-data').DataTable();
    jQuery(document).ready(function() {

        table = jQuery('#tabel-data').dataTable({
            ajax: {
                url: "/user/dt_users",

                dataSrc: '',
                "type": "POST"

            },
            processing: true,
            serverSide: false,
            columns: [{
                    data: 'user_id',
                    searchable: false
                }, {
                    data: 'user_nama',
                },
                {
                    data: 'user_no_hp'
                },
                {
                    data: 'user_email'
                },
                {
                    data: 'username'
                },
                {
                    data: 'password'
                },
                {
                    data: 'created_time'
                },
                {
                    data: 'created_by'
                },
                {
                    data: 'updated_time'
                },
                {
                    data: 'updated_by'
                },
                {
                    data: 'status'
                },

            ],
            'autoWidth': false,

        });
    });
    $("#validasi_user").on('click', function() {
        $.ajax({
            url: "/user/validation",
            type: 'POST',
            dataType: 'json',
            data: $("#create_user").serialize(),

            success: function(data) {

                if (data !== 'sukses') {
                    // console.log(data.error.client_kode);
                    if (data.error) {
                        let d = data.error;
                        if (d.user_nama_create) {
                            $('#user_nama_create').addClass('is-invalid');
                            $(".user_create").html(d.user_nama_create);
                        } else {
                            $('#user_nama_create').removeClass('is-invalid');
                            $('#user_nama_create').addClass('is-valid');
                        }
                        if (d.user_no_hp_create) {
                            $('#user_no_hp_create').addClass('is-invalid');
                            $(".user_hp").html(d.user_no_hp_create);
                        } else {
                            $('#user_no_hp_create').removeClass('is-invalid');
                            $('#user_no_hp_create').addClass('is-valid');
                        }
                        if (d.user_email_create) {
                            $('#user_email_create').addClass('is-invalid');
                            $(".user_email").html(d.user_email_create);
                        } else {
                            $('#user_email_create').removeClass('is-invalid');
                            $('#user_email_create').addClass('is-valid');
                        }
                        if (d.username_create) {
                            $('#username_create').addClass('is-invalid');
                            $(".username").html(d.username_create);
                        } else {
                            $('#username_create').removeClass('is-invalid');
                            $('#username_create').addClass('is-valid');
                        }
                        if (d.password_create) {
                            $('#password_create').addClass('is-invalid');
                            $(".password").html(d.password_create);
                        } else {
                            $('#password_create').removeClass('is-invalid');
                            $('#password_create').addClass('is-valid');
                        }
                        if (d.status_create) {
                            $('#status_create').addClass('is-invalid');
                            $(".status").html(d.status_create);
                        } else {
                            $('#status_create').removeClass('is-invalid');
                            $('#status_create').addClass('is-valid');
                        }
                    }

                    // $(".password-error").html(data.password);
                } else {
                    // $('#user_nama').val("");
                    // $('#client_nama').val("");
                    // $('#client_website').val("");
                    // $('#client_no_telp').val("");
                    // $('#client_no_wa').val("");
                    // $('#client_email').val("");
                    $('.modal-body').modal('hide');
                    swal('Sukses!', data, 'success');
                    location.reload();

                }
            }
        })
    })

    function hapus(id) {
        swal({
            title: 'Peringatan!',
            text: 'Anda akan menghapus item yang dipilih?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            cancelButtonText: 'Tidak',
            confirmButtonText: 'Ya',
        }).then(function() {
            $.LoadingOverlay("show");
            $.post(('/user/delete/' + id), function(result, textStatus, xhr) {
                $.LoadingOverlay("hide");
                if (result.status > 0) {
                    // table.ajax.reload();
                    swal('Sukses!', result.msg, 'success');
                    window.location.reload();
                } else {
                    swal('Maaf!', 'Server dalam perbaikan.', 'error');
                }
            }, 'json');
        }, function(dismiss) {
            if (dismiss === 'cancel') {

            }
        });
    }

    function edit(id) {
        save_method = 'update';
        <?php header('Content-type: application/json'); ?>
        //Ajax Load data from ajax
        $.ajax({
            url: ('/user/get_tabel/' + id),
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                // console.log(data);
                $('[name="user_id_update"]').val(data.user_id);
                $('[name="user_nama_update"]').val(data.user_nama);
                $('[name="user_no_hp_update"]').val(data.user_no_hp);
                $('[name="username_update"]').val(data.username);
                $('[name="user_email_update"]').val(data.user_email);
                // $('[name="password_update"]').val(data.password);
                $('[name="status_update"]').val(data.status);
                $('#modal_update').modal('show'); // show bootstrap modal when complete loaded

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                alert('Error get data from ajax');
            }
        });
    }


    function update() {
        // ajax adding data to database
        $.ajax({
            url: '/user/hupdate',
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data) {

                    if (data !== 'sukses') {
                        // console.log(data.error.client_kode);
                        if (data.error) {
                            let d = data.error;
                            if (d.user_nama_update) {
                                $('#user_nama_update').addClass('is-invalid');
                                $(".nama_update").html(d.user_nama_update);
                            } else {
                                $('#user_nama_update').removeClass('is-invalid');
                                $('#user_nama_update').addClass('is-valid');
                            }
                            if (d.user_no_hp_update) {
                                $('#user_no_hp_update').addClass('is-invalid');
                                $(".user_hp_update").html(d.user_no_hp_update);
                            } else {
                                $('#user_no_hp_update').removeClass('is-invalid');
                                $('#user_no_hp_update').addClass('is-valid');
                            }
                            if (d.user_email_update) {
                                $('#user_email_update').addClass('is-invalid');
                                $(".user_email_update").html(d.user_email_update);
                            } else {
                                $('#user_email_update').removeClass('is-invalid');
                                $('#user_email_update').addClass('is-valid');
                            }
                            if (d.username_update) {
                                $('#username_update').addClass('is-invalid');
                                $(".username_update").html(d.username_update);
                            } else {
                                $('#username_update').removeClass('is-invalid');
                                $('#username_update').addClass('is-valid');
                            }
                            if (d.password_update) {
                                $('#password_update').addClass('is-invalid');
                                $(".password_update").html(d.password_update);
                            } else {
                                $('#password_update').removeClass('is-invalid');
                                $('#password_update').addClass('is-valid');
                            }
                            if (d.status_update) {
                                $('#status_update').addClass('is-invalid');
                                $(".status_update").html(d.status_update);
                            } else {
                                $('#status_update').removeClass('is-invalid');
                                $('#status_update').addClass('is-valid');
                            }
                        }

                        // $(".password-error").html(data.password);
                    } else {
                        // $('#client_kode').val("");
                        // $('#client_nama').val("");
                        // $('#client_website').val("");
                        // $('#client_no_telp').val("");
                        // $('#client_no_wa').val("");
                        // $('#client_email').val("");
                        $('#modal_update').modal('hide');
                        swal('Sukses!', data, 'success');
                        location.reload();

                    }
                }
                //  {
                //   //if success close modal and reload ajax table
                //   $('#modal_update').modal('hide');
                //   location.reload(); // for reload a page
                // },,
                ,
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
            }
        });
    }
</script>
<script src="/assets/js/plugins/bootstrap.bundle.min.js"></script>
<script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="/assets/js/scripts/script.min.js"></script>
<script src="/assets/js/scripts/sidebar.large.script.min.js"></script>
<?= $this->endSection() ?>