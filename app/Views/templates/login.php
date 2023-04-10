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
                <div class="row bg-white  mt-5 border border-primary rounded pb-3">
                    <div class="col-12 p-0 text-black">
                        <img src="<?= base_url('assets/img/bg-login.jpg') ?>" class="img-fluid w-100 mb-3 rounded-top" style="height: 80px; object-fit: cover;">
                        <h3 class="mx-2 mb-3 font-weight-bold">Login Form</h3>
                        <form action="" style="width: 400px;" class="px-3">
                            <div class="form-group">
                                <!-- <label for="txtUsername">Username</label> -->
                                <input type="email" class="form-control" id="txtUsername" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <!-- <label for="txtPw">Password</label> -->
                                <input type="password" class="form-control" id="txtPw" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="role">Masuk sebagai</label>
                                <select class="form-control" id="role">
                                    <option value="" selected>-- Role ---</option>
                                    <option value="">.....</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>