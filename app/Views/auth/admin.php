<?= $this->extend('templates/login'); ?>
<?= $this->section('content'); ?>
<div class="row bg-white  mt-5 border border-primary rounded pb-3">
    <div class="col-12 p-0 text-black">
        <img src="<?= base_url('assets/img/bg-login.jpg') ?>" class="img-fluid w-100 mb-3 rounded-top" style="height: 80px; object-fit: cover;">
        <h3 class="mx-2 mb-3 font-weight-bold">Login Form</h3>
        <form action="<?= base_url('auth/login') ?>" method="post" style="width: 400px;" class="px-3">
            <?php if (session('wrongData')) : ?>
                <div class="alert alert-danger my-2" role="alert" id="alert">
                    <?= session('wrongData') ?>
                </div>
            <?php endif ?>
            <div class="form-group">
                <!-- <label for="txtUsername">Username</label> -->
                <input type="text" name="txtUsername" class="form-control" id="txtUsername" placeholder="Username" required>
            </div>
            <div class="form-group">
                <!-- <label for="txtPw">Password</label> -->
                <input type="password" name="txtPassword" class="form-control" id="txtPassword" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="hidden" name="cmbRole" value="Administrator">
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>