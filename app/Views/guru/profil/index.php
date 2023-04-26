<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>
<div class="col">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center py-3">
                        <h3 class="font-weight-bolder text-gray-900"><?= $dt_guru['nama'] ?></h3>
                        <h6 class="font-italic">@<?= $dt_guru['username'] ?></h6>
                    </div>
                    <img src="<?= base_url('foto_guru/') . $dt_guru['photo'] ?>" class="w-100" style="height: 200px;object-fit: scale-down;">
                    <div class="row mt-3 text-center">
                        <div class="col-6">
                            <div class="small font-italic text-gray-500">NIP</div>
                            <h6><?= $dt_guru['nip'] ?></h6>
                        </div>
                        <div class="col-6">
                            <div class="small font-italic text-gray-500">Email</div>
                            <h6><?= $dt_guru['email'] ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-title h3 font-weight-bold text-gray-900">Profil Guru</div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtusername">Username</label>
                                <input type="text" class="form-control px-4" value="<?= $dt_guru['username'] ?>" id="txtusername" disabled>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtusername">Nama Guru</label>
                                <input type="text" class="form-control px-4" value="<?= $dt_guru['nama'] ?>" id="txtnama" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtusername">Jabatan</label>
                                <input type="text" class="form-control px-4" value="<?= $dt_guru['jabatan'] ?>" id="txtjabatan" disabled>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtNohp">Nomor Telepon</label>
                                <input type="text" class="form-control px-4" name="no_hp" value="<?= $dt_guru['no_hp'] ?>" id="txtno" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Jenis Kelamin</label>
                                <div class="d-flex">
                                    <div class="form-check ml-3">
                                        <input class="form-check-input" type="radio" id="jk_L" <?= ($dt_guru['gender'] == "Laki-Laki") ? "checked" : '' ?> value="Laki-Laki" name="gender" disabled>
                                        <label class="form-check-label" for="jk_L">Laki-laki</label>
                                    </div>
                                    <div class="form-check pl-5">
                                        <input class="form-check-input" type="radio" id="jk_P" <?= ($dt_guru['gender'] == "Perempuan") ? "checked" : '' ?> value="Perempuan" name="gender" disabled>
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
                                        <input type="text" class="form-control" name="tempat_lahir" value="<?= $dt_guru['tempat_lahir'] ?>" id="txttempatlahir" disabled>
                                    </div>
                                    <div class="col pl-1">
                                        <input type="date" class="form-control" name="tgl_lahir" value="<?= $dt_guru['tgl_lahir'] ?>" id="txttgl" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="txtalamat">Alamat</label>
                                <input type="text" min="1" class="form-control px-4" value="<?= $dt_guru['alamat'] ?>" id="txtalamat" disabled>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="txtusername">Pendidikan Terakhir</label>
                                <input type="text" class="form-control px-4" value="<?= $dt_guru['pendidikan_terakhir'] ?>" id="txtpendidikan" disabled>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>