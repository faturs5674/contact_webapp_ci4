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

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">
        <div class="main-header">
            <div class="logo">
                <img src="/assets/images/logo.png" alt="">
            </div>
            <div class="menu-toggle">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="d-flex align-items-center">
                <h3>Customer Relationship Management</h3>
            </div>
            <div style="margin: auto"></div>
            <div class="header-part-right">
                <!-- Notificaiton -->
                <div class="dropdown">

                    <!-- Notification dropdown -->

                </div>
                <!-- Notificaiton End -->
                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div class="user col align-self-end">
                        <img src="/assets/images/faces/1.jpg" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="dropdown-header">


                                <?php if (session()->get('logged_in')) : ?>
                                    <i class="i-Lock-User mr-1" value="" name="admin"><?= session()->get('username') ?></i>
                                    <a class="dropdown-item" href="/login/logout">Sign out</a>
                                <?php else : ?>
                                    <i class="i-Lock-User mr-1" value="" name="admin">user</i>
                                    <a class="dropdown-item" href="/login">Sign in</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="side-content-wrap">
            <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
                <ul class="navigation-left">
                    <li class="nav-item"><a class="nav-item-hold" href="/"><i class="nav-icon fas fa-user"></i><span class="nav-text">Dashboard</span></a>
                        <div class="triangle"></div>
                    </li>
                    <!-- </?php $sidebar = new \App\Models\M_sidebar(); ?>
                    </?php foreach ($sidebar->get_list() as $key => $value) : ?>
                        </?php if ($value->childs > 1) : ?>
                            <li class="nav-item" id="</?php echo $value->sidebar_kode ?>" data-item="</?php echo "childNav-$value->sidebar_id" ?>"><a class="nav-item-hold" href="#"><i class="nav-icon </?php echo $value->sidebar_icon ?>"></i><span class="nav-text"></?php echo $value->sidebar_nama ?></span></a>
                                <div class="triangle"></div>
                            </li>
                        </?php else : ?>
                            <li class="nav-item" id="</?php echo $value->sidebar_kode ?>"><a class="nav-item-hold" href="</?php echo $value->sidebar_href ?>"><i class="nav-icon </?php echo $value->sidebar_icon ?>"></i><span class="nav-text"></?php echo $value->sidebar_nama ?></span></a>
                                <div class="triangle"></div>
                            </li>
                        </?php endif ?>
                    </?php endforeach ?> -->
                </ul>
            </div>
            <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true" style="z-index: 9999;">
                <!-- </?php foreach ($sidebar->get_list() as $key => $value) : ?>
                    </?php if ($value->childs > 1) : ?>
                        <ul class="childNav" data-parent="</?php echo "childNav-$value->sidebar_id" ?>">
                            </?php foreach ($sidebar->get_childs($value->sidebar_id) as $key => $childs) : ?>
                                <li class="nav-item" id="</?php echo $value->sidebar_kode ?>"><a href="</?php echo $childs->sidebar_href ?>"><i class="nav-icon </?php echo $childs->sidebar_icon ?>"></i><span class="item-name"></?php echo $childs->sidebar_nama ?></span></a></li>
                            </?php endforeach ?>
                        </ul>
                    </?php endif ?>
                </?php endforeach ?> -->

            </div>
            <div class="sidebar-overlay"></div>
        </div>
        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <?= $this->renderSection('content') ?>
            </div><!-- Footer Start -->
            <div class="flex-grow-1"></div>
            <div class="app-footer">
                <div class="footer-bottom pt-3 d-flex flex-column flex-sm-row align-items-center">
                    <a class="btn btn-primary text-white btn-rounded" href="https://themeforest.net/item/gull-bootstrap-laravel-admin-dashboard-template/23101970" target="_blank"><i class="i-Administrator"></i> Kabupaten Blitar</a>
                    <span class="flex-grow-1"></span>
                    <div class="d-flex align-items-center">
                        <img class="logo" src="/assets/images/logo.png" alt="">
                        <div>
                            <p class="m-0">&copy; <?php echo date('Y') ?> Geographic Information System</p>
                            <p class="m-0">All rights reserved</p>
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
    <script type="text/javascript">
        $('#sidebar-pencarian-input').keyup(function(event) {
            if (this.value.length > 1) {
                $('#cari-loading').LoadingOverlay("show");
                $.post('/client/search', {
                    'cari': this.value
                }, function(data, textStatus, xhr) {
                    $('#cari-loading').LoadingOverlay("hide");
                    $('#section-cari').html(data);
                });
            } else {
                $('#section-cari').html('');
            }
        });
    </script>
</body>


</html>