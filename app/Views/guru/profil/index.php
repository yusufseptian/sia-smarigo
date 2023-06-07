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
                    <div class="form-group" id="pre">
                        <img src="<?= base_url('foto_guru/') . $dt_guru['photo'] ?>" id="gambar_load_edit" class="w-100" style="height: 200px;object-fit: scale-down;">
                    </div>
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
                    <?= form_open_multipart(base_url('Guru_profil/update')) ?>
                    <div class="card-title h3 font-weight-bold text-gray-900">Profil Guru</div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtusername">Username</label>
                                <input type="text" class="form-control px-4" name="username" value="<?= $dt_guru['username'] ?>" id="txtusername">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtusername">Nama Guru</label>
                                <input type="text" class="form-control px-4" name="nama" value="<?= $dt_guru['nama'] ?>" id="txtnama">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtusername">Jabatan</label>
                                <input type="text" class="form-control px-4" name="jabatan" value="<?= $dt_guru['jabatan'] ?>" id="txtjabatan">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtNohp">Nomor Telepon</label>
                                <input type="text" class="form-control px-4" name="no_hp" value="<?= $dt_guru['no_hp'] ?>" id="txtno">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtnip">nip</label>
                                <input type="text" class="form-control px-4" name="nip" value="<?= $dt_guru['nip'] ?>" id="txtnip">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtEmail">Email</label>
                                <input type="email" class="form-control px-4" name="email" value="<?= $dt_guru['email'] ?>" id="txtEmail">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Jenis Kelamin</label>
                                <div class="d-flex">
                                    <div class="form-check ml-3">
                                        <input class="form-check-input" type="radio" id="jk_L" <?= ($dt_guru['gender'] == "Laki-laki") ? "checked" : '' ?> value="Laki-laki" name="gender">
                                        <label class="form-check-label" for="jk_L">Laki-laki</label>
                                    </div>
                                    <div class="form-check pl-5">
                                        <input class="form-check-input" type="radio" id="jk_P" <?= ($dt_guru['gender'] == "Perempuan") ? "checked" : '' ?> value="Perempuan" name="gender">
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
                                        <input type="text" class="form-control" name="tempat_lahir" value="<?= $dt_guru['tempat_lahir'] ?>" id="txttempatlahir">
                                    </div>
                                    <div class="col pl-1">
                                        <input type="date" class="form-control" name="tgl_lahir" value="<?= $dt_guru['tgl_lahir'] ?>" id="txttgl">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="txtalamat">Alamat</label>
                                <input type="text" min="1" class="form-control px-4" name="alamat" value="<?= $dt_guru['alamat'] ?>" id="txtalamat">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="txtusername">Pendidikan Terakhir</label>
                                <input type="text" class="form-control px-4" name="pendidikan_terakhir" value="<?= $dt_guru['pendidikan_terakhir'] ?>" id="txtpendidikan">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-2">Ubah Foto</div>
                            <input id="photo" type="file" accept="image/*" name="photo" class="form-control" onchange="editGambar(event,'#gambar_load_edit')">
                        </div>
                    </div>
                    <button class="btn btn-success mt-4" type="submit">
                        Simpan Data
                    </button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>