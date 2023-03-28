<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>
<div class="col">

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <button class="btn btn-sm btn-primary tambah" data-toggle="modal" data-target="#add">
                    Tambah Data
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <tr>
                        <th>NO</th>
                        <th>NIP</th>
                        <th>NAMA</th>
                        <th>GENDER</th>
                        <th>JABATAN</th>
                        <th>AKSI</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($guru as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['nip'] ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td><?= $value['gender'] ?></td>
                            <td><?= $value['jabatan'] ?></td>
                            <td>
                                <button class="btn btn-xs btn-flat btn-warning" data-toggle="modal" data-target="#edit<?= $value['id_guru'] ?>">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn btn-xs btn-flat btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_guru'] ?>">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>
<!-- Modal Add -->
<div class="modal fade bd-example-modal-lg" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title">Tambah Guru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('guru/insertdata') ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Username</label>
                            <input name="username" class="form-control" placeholder="username" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="password" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>NIP</label>
                            <input name="nip" class="form-control" placeholder="Nomor Induk Pegawai" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input name="nama" class="form-control" placeholder="Nama Lengkap Guru" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="gender" class="form-control">
                                <option value="">--Pilih Jenis Kelamin--</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>No Telepon</label>
                            <input name="no_hp" class="form-control" placeholder="nomor telepon" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" class="form-control" placeholder="Masukkan Email" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Alamat</label>
                            <input name="alamat" class="form-control" placeholder="Masukkan Alamat" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input name="jabatan" class="form-control" placeholder="Jabatan" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Penddikan Terakhir</label>
                            <input name="pendidikan_terakhir" class="form-control" placeholder="Pendidikan Terakhir" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Foto Guru</label>
                            <input id="foto" type="file" accept="image/*" name="photo" class="form-control" onchange="bacaGambar(event)" required>
                        </div>
                        <div class="form-group" id="pre">
                            <label>Preview</label><br>
                            <img src="" id="gambar_load" width="200px">
                        </div>
                    </div>
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
<?php foreach ($guru as $key => $value) { ?>
    <div class="modal fade bd-example-modal-lg" id="edit<?= $value['id_guru'] ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title">Edit Data Guru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('guru/editData/' . $value['id_guru']) ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Username</label>
                                <input name="username" class="form-control" value="<?= $value['username'] ?>" placeholder="username" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="password" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>NIP</label>
                                <input name="nip" class="form-control" value="<?= $value['nip'] ?>" placeholder="Nomor Induk Pegawai" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input name="nama" class="form-control" value="<?= $value['nama'] ?>" placeholder="Nama Lengkap Guru" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input name="tempat_lahir" class="form-control" value="<?= $value['tempat_lahir'] ?>" placeholder="Tempat Lahir" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control" value="<?= $value['tgl_lahir'] ?>" placeholder="Tanggal Lahir" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="gender" class="form-control">
                                    <option value="">--Pilih Jenis Kelamin--</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input name="no_hp" class="form-control" value="<?= $value['no_hp'] ?>" placeholder="nomor telepon" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" class="form-control" value="<?= $value['email'] ?>" placeholder="Masukkan Email" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Alamat</label>
                                <input name="alamat" class="form-control" value="<?= $value['alamat'] ?>" placeholder="Masukkan Alamat" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input name="jabatan" class="form-control" value="<?= $value['jabatan'] ?>" placeholder="Jabatan" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Pendikan Terakhir</label>
                                <input name="pendidikan_terakhir" class="form-control" value="<?= $value['pendidikan_terakhir'] ?>" placeholder="Pendidikan Terakhir" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Foto Guru</label>
                                <input id="foto" type="file" accept="image/*" name="photo" class="form-control" onchange="bacaGambar(event)" required>
                            </div>
                            <div class="form-group">
                                <label>Preview</label><br>
                                <img src="<?= $value['photo'] ?>" id="gambar_load" width="200px">
                            </div>
                        </div>
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
<!-- Modal Delete -->
<?php foreach ($guru as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_guru'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title">Hapus Guru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda ingin menghapus <b><?= $value['nama'] ?></b>?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
                    <a href="<?= base_url('guru/deleteData/' . $value['id_guru']) ?>" class="btn btn-danger btn-sm">Hapus</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>
<?= $this->endSection() ?>