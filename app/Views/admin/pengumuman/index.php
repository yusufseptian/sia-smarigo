<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>

<div class="col-sm-12">
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
                        <th>JUDUL</th>
                        <th>PENGUMUMAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($pengumuman as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['judul'] ?></td>
                            <td><?= $value['pengumuman'] ?></td>
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
                <h4 class="modal-title">Tambah Pengumuman</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('pengumuman/insertdata') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Judul</label>
                    <input name="judul" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Pengumuman</label>
                    <textarea name="pengumuman" class="form-control" rows="7" required></textarea>
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
<?php foreach ($pengumuman as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title">Edit Pengumuman</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('pengumuman/editdata/' . $value['id']) ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul</label>
                        <input name="judul" class="form-control" value="<?= $value['judul'] ?>" placeholder="Judul" required>
                    </div>
                    <div class="form-group">
                        <label>Pengumuman</label>
                        <textarea name="pengumuman" class="form-control" rows="7" required><?= $value['pengumuman'] ?></textarea>
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
<?php foreach ($pengumuman as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id'] ?>">
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
                    <a href="<?= base_url('pengumuman/deleteData/' . $value['id']) ?>" class="btn btn-danger btn-sm">Hapus</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>

<?= $this->endsection() ?>