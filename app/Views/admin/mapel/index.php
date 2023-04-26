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
                        <th>KODE MATA PELAJARAN</th>
                        <th>NAMA</th>
                        <th>KATEGORI</th>
                        <th>JURUSAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($mapel as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['kode_matapelajaran'] ?></td>
                            <td><?= $value['nama_matapelajaran'] ?></td>
                            <td><?= $value['kategori_mapel'] ?></td>
                            <td><?= $value['jurusan_mapel'] ?></td>
                            <td>
                                <button class="btn btn-xs btn-flat btn-warning" data-toggle="modal" data-target="#edit<?= $value['id'] ?>">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn btn-xs btn-flat btn-danger" data-toggle="modal" data-target="#delete<?= $value['id'] ?>">
                                    <i class="fas fa-trash"></i>
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
                <h4 class="modal-title">Tambah Mata Pelajaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('mapel/insertdata') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Kode Mata Pelajaran</label>
                    <input name="kode_matapelajaran" class="form-control" placeholder="Kode Mata Pelajaran" required>
                </div>
                <div class="form-group">
                    <label>Nama Mata Pelajaran</label>
                    <input name="nama_matapelajaran" class="form-control" placeholder="Nama Mata Pelajaran" required>
                </div>
                <div class="form-group">
                    <label>Kategori Mata Pelajaran</label>
                    <select name="kategori_mapel" class="form-control">
                        <option value="">--Pilih Kategori--</option>
                        <?php foreach ($kategori_mapel as $kategori) : ?>
                            <option value="<?= $kategori ?>"><?= $kategori ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jurusan</label>
                    <select name="jurusan_mapel" class="form-control">
                        <option value="">--Pilih Jurusan--</option>
                        <?php foreach ($jurusan as $jur) : ?>
                            <option value="<?= $jur ?>"><?= $jur ?></option>
                        <?php endforeach; ?>
                    </select>
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
<?php foreach ($mapel as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title">Edit kelas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('mapel/editdata/' . $value['id']) ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Mata Pelajaran</label>
                        <input name="kode_matapelajaran" class="form-control" value="<?= $value['kode_matapelajaran'] ?>" placeholder="Kode Mata Pelajaran" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Mata Pelajaran</label>
                        <input name="nama_matapelajaran" class="form-control" value="<?= $value['nama_matapelajaran'] ?>" placeholder="Nama Mata Pelajaran" required>
                    </div>
                    <div class="form-group">
                        <label>Kategori Mata Pelajaran</label>
                        <select name="kategori_mapel" class="form-control">
                            <option value="">--Pilih Kategori--</option>
                            <option value="Kelompok A (Umum)">Kelompok A (Umum)</option>
                            <option value="Kelompok B (Umum)">Kelompok B (Umum)</option>
                            <option value="Kelompok C (Peminatan)">Kelompok C (Peminatan)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jurusan</label>
                        <select name="jurusan_mapel" class="form-control">
                            <option value="">--Pilih Jurusan--</option>
                            <option value="IPA">IPA</option>
                            <option value="IPS">IPS</option>
                        </select>
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
<?php foreach ($mapel as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title text-white">Hapus Mata Pelajaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda ingin menghapus data ini</b>?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
                    <a href="<?= base_url('mapel/deleteData/' . $value['id']) ?>" class="btn btn-danger btn-sm">Hapus</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>
<?= $this->endSection() ?>