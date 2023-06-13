<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>
<div class="col">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <button class="btn btn-sm btn-primary tambah" data-toggle="modal" data-target="#add">
                    <i class="fas fa-plus fa-sm"></i>Tambah Data
                </button>
            </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>USERNAME</th>
                        <th>NAMA</th>
                        <th>TELEPON</th>
                        <th>PEKERJAAN</th>
                        <th>NIS SISWA</th>
                        <th>ALAMAT</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($ortu as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['username'] ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td><?= $value['no_hp'] ?></td>
                            <td><?= $value['pekerjaan'] ?></td>
                            <td><?= $value['nis_siswa'] ?></td>
                            <td><?= $value['alamat'] ?></td>
                            <td>
                                <button class="btn btn-xs btn-flat btn-warning" data-toggle="modal" data-target="#edit<?= $value['id_orangtua'] ?>">
                                    <i class="fas fa-pen"></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title">Tambah Data Ortu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('ortu/insertdata') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" class="form-control" placeholder="Masukkan Username" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" type="password" class="form-control" placeholder="Masukkan Password" required>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input name="nama" class="form-control" placeholder="Masukkan Nama" required>
                </div>
                <div class="form-group">
                    <label>Pekerjaan</label>
                    <input name="pekerjaan" class="form-control" placeholder="Masukkan Pekerjaan" required>
                </div>
                <div class="form-group">
                    <label>Telepon</label>
                    <input name="no_hp" class="form-control" placeholder="Masukkan Telepon" required>
                </div>
                <div class="form-group">
                    <label>Nis Siswa</label>
                    <select name="nis_siswa" class="form-control">
                        <option value="">--Pilih Siswa--</option>
                        <?php foreach ($siswa as $nilai) : ?>
                            <option value="<?= $nilai['nis'] ?>"><?= $nilai['nama'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input name="alamat" class="form-control" placeholder="Masukkan Alamat" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Modal Edit -->
<?php foreach ($ortu as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_orangtua'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title">Edit Data Orang Tua</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('ortu/editdata/' . $value['id_orangtua']) ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" class="form-control" value="<?= $value['username'] ?>" placeholder="Masukkan Username" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="text" class="form-control" value="<?= base64_decode($value['password']) ?>" placeholder="Masukkan Password" required>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input name="nama" class="form-control" value="<?= $value['nama'] ?>" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="form-group">
                        <label>Pekerjaan</label>
                        <input name="pekerjaan" class="form-control" value="<?= $value['pekerjaan'] ?>" placeholder="Masukkan Pekerjaan" required>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input name="no_hp" class="form-control" value="<?= $value['no_hp'] ?>" placeholder="Masukkan Telepon" required>
                    </div>
                    <div class="form-group">
                        <label>Nis Siswa</label>
                        <select name="nis_siswa" class="form-control">
                            <option value="">--Pilih Siswa--</option>
                            <?php foreach ($siswa as $nilai) : ?>
                                <option value="<?= $nilai['nis'] ?>" <?= ($nilai['nis'] == $value['nis_siswa']) ? 'selected' : '' ?>><?= $nilai['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input name="alamat" class="form-control" value="<?= $value['alamat'] ?>" placeholder="Masukkan Alamat" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-warning btn-sm">Ubah</button>
                </div>
                <?= form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>

<?= $this->endSection() ?>