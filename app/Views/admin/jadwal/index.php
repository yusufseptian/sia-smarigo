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
                        <th>NAMA MATA PELAJARAN</th>
                        <th>NAMA GURU</th>
                        <th>KELAS</th>
                        <th>HARI</th>
                        <th>JAM MENGAJAR</th>
                        <th>TAHUN AARAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($dt_jadwal as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['nama_matapelajaran'] ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td><?= $value['nama_kelas'] ?></td>
                            <td><?= $value['hari'] ?></td>
                            <td><?= $value['jam_mengajar'] ?></td>
                            <td><?= $value['tahun_ajaran'] ?></td>

                            <td>
                                <button class="btn btn-xs btn-flat btn-warning" data-toggle="modal" data-target="#edit<?= $value['jadwal_id'] ?>">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn btn-xs btn-flat btn-danger" data-toggle="modal" data-target="#delete<?= $value['jadwal_id'] ?>">
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
                <h4 class="modal-title">Tambah Jadwal Mengajar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('jadwal/insertdata') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Mata Pelajaran</label>
                    <select name="mapel_id" class="form-control">
                        <option value="">--Pilih Mata Pelajaran--</option>
                        <?php foreach ($dt_mapel as $value) : ?>
                            <option value="<?= $value['id'] ?>"><?= $value['nama_matapelajaran'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama Guru</label>
                    <select name="guru_id" class="form-control">
                        <option value="">--Pilih Guru--</option>
                        <?php foreach ($dt_guru as $value) : ?>
                            <option value="<?= $value['id_guru'] ?>"><?= $value['nama'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kelas</label>
                    <select name="kelas_id" class="form-control">
                        <option value="">--Pilih Kelas--</option>
                        <?php foreach ($dt_kelas as $value) : ?>
                            <option value="<?= $value['id_kelas'] ?>"><?= $value['nama_kelas'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Hari</label>
                    <select name="hari" class="form-control">
                        <option value="">--Pilih hari--</option>
                        <?php foreach ($hari as $day) : ?>
                            <option value="<?= $day ?>"><?= $day ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jam Mengajar</label>
                    <input name="jam_mengajar" class="form-control" placeholder="Kode Mata Pelajaran" required>
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
<?php foreach ($dt_jadwal as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['jadwal_id'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title">Edit Jadwal Mengajar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('jadwal/editdata/' . $value['jadwal_id']) ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Mata Pelajaran</label>
                        <select name="mapel_id" class="form-control">
                            <option value="">--Pilih Mata Pelajaran--</option>
                            <?php foreach ($dt_mapel as $mpl) : ?>
                                <option value="<?= $mpl['id'] ?>" <?= $mpl['id'] == ($value['mapel_id']) ? 'selected' : '' ?>><?= $mpl['nama_matapelajaran'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Guru</label>
                        <select name="guru_id" class="form-control">
                            <option value="">--Pilih Guru--</option>
                            <?php foreach ($dt_guru as $guru) : ?>
                                <option value="<?= $guru['id_guru'] ?>" <?= ($guru['id_guru']) == ($value['guru_id']) ? 'selected' : ''  ?>><?= $guru['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <select name="kelas_id" class="form-control">
                            <option value="">--Pilih Kelas--</option>
                            <?php foreach ($dt_kelas as $kelas) : ?>
                                <option value="<?= $kelas['id_kelas'] ?>" <?= ($kelas['id_kelas']) == ($value['kelas_id']) ? 'selected' : '' ?>><?= $kelas['nama_kelas'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Hari</label>
                        <select name="hari" class="form-control">
                            <option value="">--Pilih hari--</option>
                            <?php foreach ($hari as $day) : ?>
                                <option value="<?= $day ?>" <?= $day == ($value['hari']) ? 'selected' : '' ?>><?= $day ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jam Mengajar</label>
                        <input name="jam_mengajar" class="form-control" placeholder="Kode Mata Pelajaran" required>
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
<?php foreach ($dt_jadwal as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['jadwal_id'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title text-white">Hapus Jadwal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda ingin menghapus data ini</b>?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
                    <a href="<?= base_url('jadwal/deleteData/' . $value['jadwal_id']) ?>" class="btn btn-danger btn-sm">Hapus</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>
<?= $this->endSection() ?>