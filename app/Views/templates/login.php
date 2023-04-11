<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?> | <?= $sub_title ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?php base_url() ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="<?php base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="<?php base_url() ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php base_url() ?>/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body style="background-color: azure;">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <div class="container-fluid mt-5">
            <div class="d-flex justify-content-center">
                <?= $this->renderSection('content'); ?>
            </div>
        </div>
    </div>
    <?php if (session('wrongData')) : ?>
        <script>
            setTimeout(function() {
                $("#alert").fadeOut("1000");
            }, 1500);
        </script>
    <?php endif ?>
</body>

<?= $this->include('templates/partial/notif'); ?>

</html>