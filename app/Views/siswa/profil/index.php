<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>
<div class="col">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center py-3">
                        <h3 class="font-weight-bolder text-gray-900"><?= $dt_siswa['nama'] ?></h3>
                        <h6 class="font-italic">@<?= $dt_siswa['username'] ?></h6>
                    </div>
                    <img src="<?= base_url('foto_siswa/') . $dt_siswa['photo'] ?>" class="w-100" style="height: 200px;object-fit: scale-down;">
                    <div class="row mt-3 text-center">
                        <div class="col-6">
                            <div class="small font-italic text-gray-500">NIS</div>
                            <h6><?= $dt_siswa['nis'] ?></h6>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-title h3 font-weight-bold text-gray-900">Profil Siswa</div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtnis">NIS</label>
                                <input type="number" min="1" class="form-control px-4" value="<?= $dt_siswa['nis'] ?>" id="txtnip" disabled>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtusername">Nama Siswa</label>
                                <input type="text" class="form-control px-4" value="<?= $dt_siswa['nama'] ?>" id="txtnama" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="txtalamat">Alamat</label>
                                <input type="text" min="1" class="form-control px-4" value="<?= $dt_siswa['alamat'] ?>" id="txtalamat" disabled>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtNohp">Nomor Telepon</label>
                                <input type="text" class="form-control px-4" name="no_hp" value="<?= $dt_siswa['no_hp'] ?>" id="txtno" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Jenis Kelamin</label>
                                <div class="d-flex">
                                    <div class="form-check ml-3">
                                        <input class="form-check-input" type="radio" id="jk_L" <?= ($dt_siswa['gender'] == "Laki-Laki") ? "checked" : '' ?> value="Laki-Laki" name="gender" disabled>
                                        <label class="form-check-label" for="jk_L">Laki-laki</label>
                                    </div>
                                    <div class="form-check pl-5">
                                        <input class="form-check-input" type="radio" id="jk_P" <?= ($dt_siswa['gender'] == "Perempuan") ? "checked" : '' ?> value="Perempuan" name="gender" disabled>
                                        <label class="form-check-label" for="jk_P">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Tempat / Tanggal Lahir</label>
                                <div class="row">
                                    <div class="col pr-1">
                                        <input type="text" class="form-control" name="tempat_lahir" value="<?= $dt_siswa['tempat_lahir'] ?>" id="txttempatlahir" disabled>
                                    </div>
                                    <div class="col pl-1">
                                        <input type="date" class="form-control" name="tgl_lahir" value="<?= $dt_siswa['tgl_lahir'] ?>" id="txttgl" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>