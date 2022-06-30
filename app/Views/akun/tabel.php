<?= $this->extend('template/administrator'); ?>
<?= $this->section('content'); ?>
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
                <li>Tabel Akun</li>
            </ul>
        </div>
        <div class="d-inline-block">

        </div>
        <a href="" class="btn btn-success" data-toggle="modal" data-target="#modal_create"><i class="fa fa-plus"></i> Tambah</a>
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
                        <th>username</th>
                        <th>Email</th>
                        <th>no telp</th>

                    </tr>

                </thead>
                <tbody id="tbl_data">

                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->include('/akun/create'); ?>
<?= $this->include('/akun/update') ?>
<script type="text/javascript">
    jQuery(document).ready(function() {
        table = $('#tabel-data').dataTable({
            ajax: {
                url: "/akun/read",
                dataSrc: '',
                "type": "POST"
            },
            processing: true,
            serverSide: false,
            columns: [{
                data: 'id',
                searchable: false
            }, {
                data: 'nama'
            }, {
                data: 'username'
            }, {
                data: 'email'
            }, {
                data: 'nohp'
            }],
            'autowidth': false,
        });
    });
    $('#create_submit').on('click', function() {
        $.ajax({
            url: "/akun/create",
            type: 'POST',
            dataType: 'json',
            data: $('#form').serialize(),
            success: function(data) {
                if (data !== 'sukses') {
                    if (data.error) {
                        let d = data.error;
                        if (d.nama_create) {
                            $('#nama_create').addClass('is-invalid');
                            $('.nama_create').html(d.nama_create);
                        } else {
                            $('#nama_create').removeClass('is_invalid');
                            $('.nama_create').addClass('is_valid');
                        }
                        if (d.username_create) {
                            $('#username_create').addClass('is-invalid');
                            $('.username_create').html(d.username_create);
                        } else {
                            $('#username_create').removeClass('is_invalid');
                            $('.username_create').addClass('is_valid');
                        }
                        if (d.password_create) {
                            $('#password_create').addClass('is-invalid');
                            $('.password_create').html(d.password_create);
                        } else {
                            $('#password_create').removeClass('is_invalid');
                            $('.password_create').addClass('is_valid');
                        }
                        if (d.nohp_create) {
                            $('#nohp_create').addClass('is-invalid');
                            $('.nohp_create').html(d.nohp_create);
                        } else {
                            $('#nohp_create').removeClass('is_invalid');
                            $('.nohp_create').addClass('is_valid');
                        }
                        if (d.email_create) {
                            $('#email_create').addClass('is-invalid');
                            $('.email_create').html(d.email_create);
                        } else {
                            $('#email_create').removeClass('is_invalid');
                            $('.email_create').addClass('is_valid');
                        }
                    }
                } else {
                    $('.modal-body').modal('hide');
                    swal('Sukses', data, 'success');
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
            $.post(('/akun/delete/' + id), function(result, textStatus, xhr) {
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
        $('#modal_update').modal('show');
        save_method = 'update';
        <?php header('Contact-type: application/json
        '); ?>
        $.ajax({
            url: ('/akun/edit/' + id),
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                // console.log(data);
                $('[name="id_update"]').val(data.id);
                $('[name="nama_update"]').val(data.nama);
                $('[name="username_update"]').val(data.username);
                $('[name="password_update]').val(data.password);
                $('[name="nohp_update"]').val(data.nohp);
                $('[name="email_update"]').val(data.email);
            },
            error: function(jqXHR, textStatus, errorThrow) {
                console.log(jqXHR);
                alert('error get data from ajax')
            }
        });
    }

    function update() {
        $.ajax({
            url: '/contact/update',
            type: 'POST',
            data: $('#form_update').serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data !== 'sukses') {
                    if (data.error) {
                        let d = data.error;
                        if (d.nama_update) {
                            $('#nama_update').addClass('is-invalid');
                            $('.nama_update').html(d.nama_update);
                        } else {
                            $('#nama_update').removeClass('is-invalid');
                            $('.nama_update').addClass('is-valid');
                        }
                        if (d.nohp_update) {
                            $('#nohp_update').addClass('is-invalid');
                            $('.nohp_update').html(d.nohp_update);
                        } else {
                            $('#nohp_update').removeClass('is-invalid');
                            $('.nohp_update').addClass('is-valid');
                        }
                        if (d.username_update) {
                            $('#username_update').addClass('is-invalid');
                            $('.username_update').html(d.username_update);
                        } else {
                            $('#username_update').removeClass('is-invalid');
                            $('.username_update').addClass('is-valid');
                        }
                        if (d.password_update) {
                            $('#password_update').addClass('is-invalid');
                            $('.password_update').html(d.password_update);
                        } else {
                            $('#password_update').removeClass('is-invalid');
                            $('.password_update').addClass('is-valid');
                        }
                        if (d.email_update) {
                            $('#email_update').addClass('is-invalid');
                            $('.email_update').html(d.email_update);
                        } else {
                            $('#email_update').removeClass('is-invalid');
                            $('.email_update').addClass('is-valid');
                        }
                    }
                } else {
                    $('#modal_update').modal('hide');
                    swal('Sukses!', data, 'success');
                    location.reload();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('error adding/update data');
            }
        });
    }
</script>
<?= $this->endSection(); ?>