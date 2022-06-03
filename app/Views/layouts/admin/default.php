<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mayana Favacho | Dashboard</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="<?= base_url('public/assets/plugins/fontawesome-free/css/all.min.css') ?>">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="<?= base_url('public/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">

    <link rel="stylesheet" href="<?= base_url('public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">

    <link rel="stylesheet" href="<?= base_url('public/assets/plugins/jqvmap/jqvmap.min.css') ?>">

    <link rel="stylesheet" href="<?= base_url('public/assets/dist/css/adminlte.min.css?v=3.2.0') ?>">

    <link rel="stylesheet" href="<?= base_url('public/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">

    <link rel="stylesheet" href="<?= base_url('public/assets/plugins/daterangepicker/daterangepicker.css') ?>">

    <link rel="stylesheet" href="<?= base_url('public/assets/plugins/summernote/summernote-bs4.min.css') ?>">
    <script nonce="969bbda7-72b8-48e7-9510-eb543a86afb1">
        (function(w, d) {
            ! function(a, e, t, r) {
                a.zarazData = a.zarazData || {}, a.zarazData.executed = [], a.zaraz = {
                    deferred: []
                }, a.zaraz.q = [], a.zaraz._f = function(e) {
                    return function() {
                        var t = Array.prototype.slice.call(arguments);
                        a.zaraz.q.push({
                            m: e,
                            a: t
                        })
                    }
                };
                for (const e of ["track", "set", "ecommerce", "debug"]) a.zaraz[e] = a.zaraz._f(e);
                a.addEventListener("DOMContentLoaded", (() => {
                    var t = e.getElementsByTagName(r)[0],
                        z = e.createElement(r),
                        n = e.getElementsByTagName("title")[0];
                    for (a.zarazData.c = e.cookie, n && (a.zarazData.t = e.getElementsByTagName("title")[0].text), a.zarazData.w = a.screen.width, a.zarazData.h = a.screen.height, a.zarazData.j = a.innerHeight, a.zarazData.e = a.innerWidth, a.zarazData.l = a.location.href, a.zarazData.r = e.referrer, a.zarazData.k = a.screen.colorDepth, a.zarazData.n = e.characterSet, a.zarazData.o = (new Date).getTimezoneOffset(), a.zarazData.q = []; a.zaraz.q.length;) {
                        const e = a.zaraz.q.shift();
                        a.zarazData.q.push(e)
                    }
                    z.defer = !0, z.referrerPolicy = "origin", z.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a.zarazData))), t.parentNode.insertBefore(z, t)
                }))
            }(w, d, 0, "script");
        })(window, document);
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <?= $this->include('layouts/admin/nav') ?>
        <?= $this->include('layouts/admin/sidebar') ?>

        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <section class="content">
                <?= $this->renderSection('content') ?>
            </section>

        </div>

        <?= $this->include('layouts/admin/footer') ?>

        <aside class="control-sidebar control-sidebar-dark">

        </aside>

    </div>

    <script src="<?= base_url('public/assets/plugins/jquery/jquery.min.js') ?>"></script>

    <script src="<?= base_url('plugins/jquery-ui/jquery-ui.min.js') ?>"></script>

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <script src="<?= base_url('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <script src="<?= base_url('public/asseets/plugins/chart.js/Chart.min.js') ?>"></script>

    <script src="<?= base_url('public/assets/plugins/sparklines/sparkline.js') ?>"></script>

    <script src="<?= base_url('public/assets/plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>

    <script src="<?= base_url('public/assets/plugins/jquery-knob/jquery.knob.min.js') ?>"></script>

    <script src="<?= base_url('public/assets/plugins/moment/moment.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/plugins/daterangepicker/daterangepicker.js') ?>"></script>

    <script src="<?= base_url('public/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>

    <script src="<?= base_url('public/assets/plugins/summernote/summernote-bs4.min.js') ?>"></script>

    <script src="<?= base_url('public/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>

    <script src="<?= base_url('public/assets/dist/js/adminlte.js?v=3.2.0') ?>"></script>

    <script src="<?= base_url('public/assets/dist/js/demo.js') ?>"></script>

    <script src="<?= base_url('public/assets/dist/js/pages/dashboard.js') ?>"></script>
</body>

</html>