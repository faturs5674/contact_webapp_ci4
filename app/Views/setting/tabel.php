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
      <h1>Layanan</h1>
      <ul>
        <li>Tabel Transaksi</li>
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

              <!-- endorm -->
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- <a href="" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah</a> -->
  </div>
</div>
<div class="separator-breadcrumb border-top"></div>
<div class="row">
  <div class="card col-md-12">
    <div class="card-body">
      <table id="tabel-data" class="table table-bordered table-inverse table-hover table-responsive">
        <thead>
          <tr>
            <th scope="col">set incvoice cooldown</th>
            <th scope="col">email</th>
            <th scope="col">wa</th>
            <th scope="col">keterangan</th>
            <th>Aksi</th>

          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>
  <div id="waktu"></div>
</div>

<!--begin::Modal-->
<div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <form id="form-delete" method="post" action="/setting/tampilsatu">
        <div class="modal-body">
          <div id="modal-body-update">
            <table>
              <tr>
                <td>durasi sewa</td>
                <td>:</td>
                <td name="set_invoice_cooldown"></td>
              </tr>
              <tr>
                <td>email</td>
                <td>:</td>
                <td name="set_email"></td>
              </tr>
              <tr>
                <td>wa</td>
                <td>:</td>
                <td name="set_wa"></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-google">website</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--end::Modal-->


<script type="text/javascript">
  jQuery(document).ready(function() {
    // $.ajax({
    //   url: 'clienttransaksi/get/1'
    // });
    table = jQuery('#tabel-data').dataTable({
      ajax: {
        url: "/restful",
        dataSrc: '',
        "type": "GET"
      },
      processing: true,
      serverSide: false,
      columns: [{
          data: 'set_invoice_cooldown'
        }, {
          data: 'set_email'
        }, {
          data: 'set_wa'
        },
        {
          data: 'set_keterangan_perpanjangan'
        }, {
          data: 'id'
        }
      ],
      'autoWidth': false,
    });
  });

  function detail(t) {
    $.LoadingOverlay("show");
    $.ajax({
      url: '/clienttransaksi/get/' + t
    });
    $.ajax({
      url: ('/restful/' + t),
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        $.LoadingOverlay("hide");
        // console.log(data[0]);
        // $('[name="id"]').text(data[0].id);
        $('[name="set_invoice_cooldown"]').text(data[0].set_invoice_cooldown + " hari");
        $('[name="set_wa"]').text(data[0].set_wa);
        $('[name="set_email"]').text(data[0].set_email);
        // $('[name="keterangan"]').text(data[0].set_keterangan_perpanjangan);
        $('#modal_update').modal('show'); // show bootstrap modal when complete loaded

      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        alert('Error get data from ajax');
      }
    });
  }
</script>
<?= $this->endSection() ?>