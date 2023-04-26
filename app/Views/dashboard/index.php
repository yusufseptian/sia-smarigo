<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>

<div class="col-sm-12">
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading font-weight-bold">Selamat Datang</h4>
        <p>Selamat Datang <b><?= session('log_auth')['role'] == 'ADMINISTRATOR' ? $user[0]['username'] : $user[0]['nama'] ?></b> di Sistem Informasi Akademik SMA PGRI 1 Gombong, Anda Login sebagai
            <b>
                <?php if (session('log_auth')['role'] == 'ADMINISTRATOR') {
                    echo 'Admin';
                } elseif (session('log_auth')['role'] == 'GURU') {
                    echo 'Guru';
                } elseif (session('log_auth')['role'] == 'ORTU') {
                    echo 'Orang Tua';
                } elseif (session('log_auth')['role'] == 'SISWA') {
                    echo 'Siswa';
                } ?>
            </b>
        </p>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="font-weight-bold">Pengumuman</h4>
                </div>
                <div class="card-body">
                    <img class="w-100 rounded mb-3 img-fluid" style="height: 350px; object-fit: cover;" src="<?= base_url() . 'assets/img/megawati.jpg' ?>" alt="">
                    <ul class="list-group">
                        <?php foreach ($pengumuman as $key => $value) : ?>
                            <li class="list-group-item list-group-item-primary" data-toggle="modal" data-target="#pengumuman<?= $value['id'] ?>">
                                <label for="cek"><?= $value['judul'] ?></label>
                                <i class="fa fa-angle-right float-right fa-2x" id="cek"></i>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<?php foreach ($pengumuman as $key => $value) { ?>
    <div class="modal fade" id="pengumuman<?= $value['id'] ?>" tabindex="-1" aria-labelledby="pengumumanLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary" style="color: #fff !important;">
                    <h5 class="modal-title" id="pengumumanLabel"><?= $value['judul'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= $value['pengumuman'] ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?= $this->endsection() ?>