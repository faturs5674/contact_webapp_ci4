<!DOCTYPE html>
<html lang="en" dir="">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Customer Relationship Management</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
  <link href="/assets/css/themes/lite-purple.css" rel="stylesheet" />
  <link href="/assets/css/plugins/perfect-scrollbar.min.css" rel="stylesheet" />
  <link href="/assets/css/plugins/datatables.min.css" rel="stylesheet" />
  <link href="/assets/css/plugins/toastr.min.css" rel="stylesheet" />
  <link href="/assets/css/plugins/sweetalert2.min.css" rel="stylesheet" />
  <link href="/assets/datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" />
  <link href="/assets/css/plugins/select2.css" rel="stylesheet" />
  <link href="/assets/css/plugins/select2-bootstrap4.min.css" rel="stylesheet" />
  <link href="/assets/css/checkbox.css" rel="stylesheet" />
  <link href="/assets/fonts/fontawesome/css/solid.min.css" rel="stylesheet" />
  <script src="/assets/fonts/fontawesome/js/all.min.js"></script>
  <script src="/assets/js/plugins/jquery-3.3.1.min.js"></script>
  <script src="/assets/js/plugins/datatables.min.js"></script>
  <script src="/assets/js/plugins/loadingoverlay.min.js"></script>
  <script src="/assets/js/plugins/select2.min.js"></script>
  <script src="/assets/js/plugins/toastr.min.js"></script>
  <script src="/assets/js/plugins/sweetalert2.min.js"></script>
  <script src="/assets/datepicker/js/bootstrap-datepicker.min.js"></script>
  <style type="text/css">
    .main-header h3,
    .main-header .h3 {
      padding-top: 10px;
    }
  </style>
  <script type="text/javascript">
    $.fn.select2.defaults.set("theme", "bootstrap4");
    $.fn.datepicker.defaults.format = "YYYY-MM-DD";
    $.extend(true, $.fn.dataTable.defaults, {
      lengthMenu: [
        [10, 25, 50, 100, 500, 1000, -1],
        [10, 25, 50, 100, 500, 1000, "Semua"]
      ],
      processing: true,
      language: {
        "processing": "<div class='dt-loading'><img src='/assets/images/200.gif' /></div>",
      }
    });
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
  <script>
    WebFont.load({
      google: {
        "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
      },
      active: function() {
        sessionStorage.fonts = true;
      }
    });
  </script>
  <style type="text/css">
    body {
      font-family: 'Poppins', 'Roboto';
    }
  </style>
</head>
<div class="auth-layout-wrap" style="background-image: url(/assets/images/photo-wide-2.jpg);">
  <div class="auth-content" style="min-width: 300px !important;">
    <div class="card o-hidden">
      <div class="row">
        <div class="col-md-12">
          <div class="p-4">
            <div class="auth-logo text-center mb-4"><img style="width: unset !important;" src="" alt=""></div>
            <div style="text-align: center; font-size: 24px; font-weight: bold; margin-top: -17px; margin-bottom: -5px; color: #4f1f7f;">Customers</div>
            <div style="text-align: center; font-size: 21px; font-weight: bold; padding-bottom: 18px;"> Relationship Management</div>
            <!-- <h1 class="mb-3 text-18">Sign In</h1> -->
            <form id="form" method="post" action="/login/auth">
              <div class="form-group">
                <label>Username</label>
                <input required="" class="form-control form-control-rounded" autocomplete="off" name="username" type="text">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input required="" class="form-control form-control-rounded" autocomplete="off" name="password" type="password">
              </div>
              <br>
              <button type="submit" class="btn btn-rounded btn-primary btn-block mt-2">Sign In</button>
            </form>
            <div class="mt-3 text-center">
              <span>© 2019-2021 <br>Blitaris tekno</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- fotter end -->
</div>
</div>
<script src="/assets/js/plugins/bootstrap.bundle.min.js"></script>
<script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="/assets/js/scripts/script.min.js"></script>
<script src="/assets/js/scripts/sidebar.large.script.min.js"></script>
<script src="/assets/fonts/fontawesome/js/all.min.js"></script>
</body>

</html>


<script type="text/javascript">
  $('#form').submit(function(event) {
    // $.LoadingOverlay("show");
    $.post('/login/auth', $(this).serialize(), function(json, textStatus, xhr) {
      console.log(json);
      // swal('Sukses!', json.msg, 'success');
      // $.LoadingOverlay("hide");
      // $('#myModal').modal('hide');
      if (json.status == true) {
        swal('Sukses!', json.msg, 'success', 1000)

        window.location.href = "/", 2000;

        // </?php return redirect()->to('/home') ?>
      } else {
        swal('Maaf!', json.msg, 'error');
      }
    }, 'json');
    return false;
  });

  $('.modal-select2').select2();

  // function modal_daftar(t) {
  //   $('#myModal').modal('show');
  // }

  // function find_kelurahan(t) {
  //   $.LoadingOverlay("show");
  //   $.post('http://192.168.3.4/datalayanan/utils/desa_kelurahan_get', {
  //     'kecamatan_id': t.value
  //   }, function(json, textStatus, xhr) {
  //     $.LoadingOverlay("hide");
  //     $('#kelurahan').empty().select2({
  //       data: json.data
  //     });
  //   }, 'json');
  // }
</script>