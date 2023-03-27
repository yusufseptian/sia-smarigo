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
                        <th>KODE KELAS</th>
                        <th>NAMA KELAS</th>
                        <th>TAHUN AJARAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($kelas as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['kode_kelas'] ?></td>
                            <td><?= $value['nama_kelas'] ?></td>
                            <td><?= $value['tahun_ajaran'] ?></td>
                            <td>
                                <button class="btn btn-xs btn-flat btn-warning" data-toggle="modal" data-target="#edit<?= $value['id_kelas'] ?>">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn btn-xs btn-flat btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_kelas'] ?>">
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
                <h4 class="modal-title">Tambah Kelas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('kelas/insertdata') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Kode Kelas</label>
                    <input name="kode_kelas" class="form-control" placeholder="Kode Kelas" required>
                </div>
                <div class="form-group">
                    <label>Kelas</label>
                    <input name="nama_kelas" class="form-control" placeholder="Kelas" required>
                </div>
                <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <select name="id_ta" class="form-control">
                        <option value="">--Pilih Tahun Ajaran--</option>
                        <?php foreach ($th_ajar as $value) : ?>
                            <option value="<?= $value['id'] ?>"><?= $value['tahun_ajaran'] ?></option>
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
<?php foreach ($kelas as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_kelas'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title">Edit kelas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('kelas/editdata/' . $value['id_kelas']) ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Kelas</label>
                        <input name="kode_kelas" class="form-control" value="<?= $value['kode_kelas'] ?>" placeholder="Kode Kelas" required>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <input name="nama_kelas" class="form-control" value="<?= $value['nama_kelas'] ?>" placeholder="Kelas" required>
                    </div>
                    <div class="form-group">
                        <label>Tahun Ajaran</label>
                        <select name="id_ta" class="form-control">
                            <option value="">--Pilih Tahun Ajaran--</option>
                            <?php foreach ($th_ajar as $value) : ?>
                                <option value="<?= $value['id'] ?>"><?= $value['tahun_ajaran'] ?></option>
                            <?php endforeach; ?>
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
<?php foreach ($kelas as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_kelas'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title text-white">Hapus Kelas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda ingin menghapus data ini</b>?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
                    <a href="<?= base_url('kelas/deleteData/' . $value['id_kelas']) ?>" class="btn btn-danger btn-sm">Hapus</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>

<?= $this->endSection() ?>