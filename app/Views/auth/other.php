<?= $this->extend('templates/login'); ?>
<?= $this->section('content'); ?>
<div class="row bg-white  mt-5 border border-primary rounded pb-3">
    <div class="col-12 p-0 text-black">
        <img src="<?= base_url('assets/img/bg-login.jpg') ?>" class="img-fluid w-100 mb-3 rounded-top" style="height: 80px; object-fit: cover;">
        <div class="mx-2 mb-4 text-center">
            <h2 class="font-weight-bold">Login Form</h2>
            <h5 class="text-primary font-weight-bold">SIA SMA PGRI 1 GOMBONG</h5>
        </div>
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
                <label for="role">Masuk sebagai</label>
                <select class="form-control" id="cmbRole" name="cmbRole" required>
                    <option value="" selected>-- Role ---</option>
                    <option value="Guru">Guru</option>
                    <option value="Siswa">Siswa</option>
                    <option value="Ortu">Ortu</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>