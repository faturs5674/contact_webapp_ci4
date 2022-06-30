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
      <h1>Customers</h1>
      <ul>
        <li>Tabel Customers</li>
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
              <?= $this->include('/client/create') ?>
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
            <th>Client code</th>
            <th>Client nama</th>
            <th>Client website</th>
            <th>Client no telp</th>
            <th>Client no WA</th>
            <th>Client email</th>
            <th>Client keterangan</th>
            <th>Client tgl daftar</th>
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
<?= $this->include('/client/update') ?>
<?= $this->include('/client/transaksi') ?>

<!--end::Modal-->


<script type="text/javascript">
  // var tabel = $('#tabel-data').DataTable();
  jQuery(document).ready(function() {

    table = jQuery('#tabel-data').dataTable({
      ajax: {
        url: "/Client/dt_users",

        dataSrc: '',
        "type": "POST"

      },
      processing: true,
      serverSide: false,
      columns: [{
          data: 'client_id',
          searchable: false
        }, {
          data: 'client_kode',
        },
        {
          data: 'client_nama'
        },
        {
          data: 'client_website'
        },
        {
          data: 'client_no_telp'
        },
        {
          data: 'client_no_wa'
        },
        {
          data: 'client_email'
        },
        {
          data: 'client_keterangan'
        },
        {
          data: 'client_tgl_daftar'
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

    jQuery('#form-delete').submit(function(event) {
      jQuery.LoadingOverlay("show");
      jQuery.post('/client/delete/',
        jQuery(this).serialize(),
        function(response, textStatus, xhr) {
          jQuery.LoadingOverlay("hide");
          if (response.status == true) {
            toastr.success(response.msg);
            setTimeout(function() {
              window.location.reload();
            }, 2000);
          } else {
            toastr.error(response.msg);
          }
        }, "json");
      return false;

    });
  });
  $("#validasi").on('click', function() {
    $.ajax({
      url: "/client/validation",
      type: 'POST',
      dataType: 'json',
      data: $("#create").serialize(),
      success: function(data) {

        if (data !== 'sukses') {
          // console.log(data.error.client_kode);
          if (data.error) {
            let d = data.error;
            if (d.client_kode) {
              $('#client_kode').addClass('is-invalid');
              $(".kode").html(d.client_kode);
            } else {
              $('#client_kode').removeClass('is-invalid');
              $('#client_kode').addClass('is-valid');
            }
            if (d.client_nama) {
              $('#client_nama').addClass('is-invalid');
              $(".nama").html(d.client_nama);
            } else {
              $('#client_nama').removeClass('is-invalid');
              $('#client_nama').addClass('is-valid');
            }
            if (d.client_website) {
              $('#client_website').addClass('is-invalid');
              $(".website").html(d.client_website);
            } else {
              $('#client_website').removeClass('is-invalid');
              $('#client_website').addClass('is-valid');
            }
            if (d.client_no_telp) {
              $('#client_no_telp').addClass('is-invalid');
              $(".no_telp").html(d.client_no_telp);
            } else {
              $('#client_no_telp').removeClass('is-invalid');
              $('#client_no_telp').addClass('is-valid');
            }
            if (d.client_no_wa) {
              $('#client_no_wa').addClass('is-invalid');
              $(".no_wa").html(d.client_no_wa);
            } else {
              $('#client_no_wa').removeClass('is-invalid');
              $('#client_no_wa').addClass('is-valid');
            }
            if (d.client_email) {
              $('#client_email').addClass('is-invalid');
              $(".email").html(d.client_email);
            } else {
              $('#client_email').removeClass('is-invalid');
              $('#client_email').addClass('is-valid');
            }
            if (d.client_keterangan) {
              $('#client_keterangan').addClass('is-invalid');
              $(".keterangan").html(d.client_keterangan);
            } else {
              $('#client_ketetangan').removeClass('is-invalid');
              $('#client_ketetangan').addClass('is-valid');
            }
            if (d.client_tgl_daftar) {
              $('#client_tgl_daftar').addClass('is-invalid');
              $(".daftar").html(d.client_tgl_daftar);
            } else {
              $('#client_tgl_daftar').removeClass('is-invalid');
              $('#client_tgl_daftar').addClass('is-valid');
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
          $('#client_kode').val("");
          $('#client_nama').val("");
          $('#client_website').val("");
          $('#client_no_telp').val("");
          $('#client_no_wa').val("");
          $('#client_email').val("");
          // $('.modal-body').modal('hide');
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
      $.post(('/client/delete/' + id), function(result, textStatus, xhr) {
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
      url: ('/client/get_tabel/' + id),
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        console.log(data);
        $('[name="client_id_update"]').val(data.client_id);
        $('[name="client_kode_update"]').val(data.client_kode);
        $('[name="client_nama_update"]').val(data.client_nama);
        $('[name="client_website_update"]').val(data.client_website);
        $('[name="client_no_telp_update"]').val(data.client_no_telp);
        $('[name="client_no_wa_update"]').val(data.client_no_wa);
        $('[name="client_email_update"]').val(data.client_email);
        $('[name="client_keterangan_update"]').val(data.client_keterangan);
        $('[name="datepicker_update"]').val(data.client_tgl_daftar);
        $('[name="status_update"]').val(data.status);


        $('#modal_update').modal('show'); // show bootstrap modal when complete loaded

      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        alert('Error get data from ajax');
      }
    });
  }

  function transaksi(id) {
    //Ajax Load data from ajax
    $.ajax({
      url: ('/client/get_tabel/' + id),
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        console.log(data);
        $('[name="client_id_transaksi"]').val(data.client_id);
        $('[name="wa_setting"]').val(data.client_no_wa);
        $('[name="email_setting"]').val(data.client_email);
        $('[name="perpanjangan"]').val(data.client_keterangan);
        $('[name="status"]').val(data.status);


        $('#modal_transaksi').modal('show');

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
      url: '/client/hupdate',
      type: "POST",
      data: $('#form').serialize(),
      dataType: "JSON",
      success: function(data) {

          if (data !== 'sukses') {
            // console.log(data.error.client_kode);
            if (data.error) {
              let d = data.error;
              if (d.client_kode) {
                $('#client_kode_update').addClass('is-invalid');
                $(".kode_update").html(d.client_kode);
              } else {
                $('#client_kode_update').removeClass('is-invalid');
                $('#client_kode_update').addClass('is-valid');
              }
              if (d.client_nama) {
                $('#client_nama_update').addClass('is-invalid');
                $(".nama_update").html(d.client_nama);
              } else {
                $('#client_nama_update').removeClass('is-invalid');
                $('#client_nama_update').addClass('is-valid');
              }
              if (d.client_website) {
                $('#client_website_update').addClass('is-invalid');
                $(".website_update").html(d.client_website);
              } else {
                $('#client_website_update').removeClass('is-invalid');
                $('#client_website_update').addClass('is-valid');
              }
              if (d.client_no_telp) {
                $('#client_no_telp_update').addClass('is-invalid');
                $(".no_telp_update").html(d.client_no_telp);
              } else {
                $('#client_no_telp_update').removeClass('is-invalid');
                $('#client_no_telp_update').addClass('is-valid');
              }
              if (d.client_no_wa) {
                $('#client_no_wa_update').addClass('is-invalid');
                $(".no_wa_update").html(d.client_no_wa);
              } else {
                $('#client_no_wa_update').removeClass('is-invalid');
                $('#client_no_wa_update').addClass('is-valid');
              }
              if (d.client_email) {
                $('#client_email_update').addClass('is-invalid');
                $(".email_update").html(d.client_email);
              } else {
                $('#client_email_update').removeClass('is-invalid');
                $('#client_email_update').addClass('is-valid');
              }
              if (d.client_keterangan_update) {
                $('#client_keterangan_update').addClass('is-invalid');
                $(".keterangan_update").html(d.client_keterangan_update);
              } else {
                $('#client_keterangan_update').removeClass('is-invalid');
                $('#client_keterangan_update').addClass('is-valid');
              }
              if (d.client_tgl_daftar) {
                $('#datepicker_update').addClass('is-invalid');
                $(".datepicker1").html(d.client_tgl_daftar);
              } else {
                $('#datepicker_update').removeClass('is-invalid');
                $('#datepicker_update').addClass('is-valid');
              }
              if (d.status) {
                $('#status_update').addClass('is-invalid');
                $(".status_update").html(d.status);
              } else {
                $('#status_update').removeClass('is-invalid');
                $('#status_update').addClass('is-valid');
              }
            }

            // $(".password-error").html(data.password);
          } else {
            $('#client_kode').val("");
            $('#client_nama').val("");
            $('#client_website').val("");
            $('#client_no_telp').val("");
            $('#client_no_wa').val("");
            $('#client_email').val("");
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
</div>
<<?= $this->endSection() ?>