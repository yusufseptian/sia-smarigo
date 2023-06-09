<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php header("Content-Security-Policy: img-src 'self' blob: data: " . base_url()); ?>

    <title><?= $title ?> | <?= $sub_title ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?php base_url() ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php base_url() ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php base_url() ?>/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
        table th {
            text-align: center !important;
        }

        .cellFit {
            white-space: nowrap;
            width: 1% !important;
        }

        #loadContainer {
            background: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            position: fixed;
            height: 100vh;
            width: 100vw;
            top: 0;
            left: 0;
        }

        .loader {
            border: 16px solid #f3f3f3;
            /* Light grey */
            border-top: 16px solid #3498db;
            /* Blue */
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        if (session('log_auth')['role'] == 'ADMINISTRATOR') {
            echo $this->include('templates/sidebar');
        } elseif (session('log_auth')['role'] == 'GURU') {
            echo $this->include('templates/sidebar_guru');
        } elseif (session('log_auth')['role'] == 'ORTU') {
            echo $this->include('templates/sidebar_ortu');
        } elseif (session('log_auth')['role'] == 'SISWA') {
            echo $this->include('templates/sidebar_siswa');
        } ?>


        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once('navbar.php') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="alert alert-success mb-3 d-flex justify-content-between" role="alert">
                        <div class=""> <i class="fas fa-university"></i> <?= $sub_title ?>
                        </div>
                        <div id="addInfo"></div>
                    </div>

                    <div class="row">
                        <?= $this->renderSection('content') ?>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SIA-SMARIGO 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <!-- Bootstrap core JavaScript-->
    <script src="<?php base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php base_url() ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php base_url() ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php base_url() ?>/assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php base_url() ?>/assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php base_url() ?>/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php base_url() ?>/assets/js/demo/datatables-demo.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable();

        });

        function bacaGambar(input) {
            try {
                $('#gambar_load').attr('src', URL.createObjectURL(input.target.files[0]));
                tampilPreview();
            } catch (error) {

            }
        }

        function editGambar(input, target) {
            try {
                $(target).attr('src', URL.createObjectURL(input.target.files[0]));
            } catch (error) {

            }
        }

        function tampilPreview() {
            if ($('#foto').val() == '') {
                $('#pre').addClass('d-none');
            } else {
                $('#pre').removeClass('d-none');
            }
        }

        tampilPreview();

        $('#foto').change(function() {
            bacaGambar(this);
        });
        $("#listNotMemberSiswa").DataTable();
    </script>

    <?= $this->include('templates/partial/notif.php'); ?>
    <?= $this->renderSection('bottomScript') ?>
</body>

</html>