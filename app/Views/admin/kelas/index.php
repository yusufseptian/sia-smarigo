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
                        <th>WALI KELAS</th>
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
                            <td><?= (is_null($value['nama'])) ? 'Belum Diatur' : $value['nama'] ?></td>
                            <td align="center">
                                <button class="btn btn-xs btn-flat btn-warning" data-toggle="modal" data-target="#edit<?= $value['id_kelas'] ?>">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn btn-xs btn-flat btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_kelas'] ?>">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <button class="btn btn-xs btn-flat btn-primary" onclick="window.location.href='<?= base_url('kelas/siswa') ?>/<?= $value['id_kelas'] ?>'">
                                    <i class="fas fa-user-graduate"></i>
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
                    <label>Wali Kelas</label>
                    <div class="input-group">
                        <input name="wali_kelas" id="wali_kelas" class="form-control disabled" placeholder="Wali Kelas" disabled required aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text btn btn-dark" id="basic-addon2" data-toggle="modal" data-target="#guruModal" onclick="setAction('add', 0)">...</span>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="wali_kelas_id" id="wali_kelas_id">
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
                        <label>Wali Kelas</label>
                        <div class="input-group">
                            <input name="wali_kelas" id="wali_kelas_edit_<?= $value['id_kelas'] ?>" class="form-control disabled" placeholder="Wali Kelas" disabled required aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text btn btn-dark" id="basic-addon2" data-toggle="modal" data-target="#guruModal" onclick="setAction('edit', <?= $value['id_kelas'] ?>)">...</span>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="wali_kelas_id" id="wali_kelas_id_edit_<?= $value['id_kelas'] ?>" value="<?= $value['id_guru'] ?>">
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
<!-- Modal Wali Kelas -->
<div class="modal fade" id="guruModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title">Pilih Wali Kelas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered" id="listWaliKelas">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIP</th>
                            <th>NAMA</th>
                            <th>NO TELP</th>
                            <th>WALI KELAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $listNamaGuru = []; ?>
                        <?php foreach ($dtGuru as $dt) : ?>
                            <tr>
                                <td>
                                    <input type="radio" name="cmbGuru" id="cmbGuru<?= $dt['nip'] ?>" value="<?= $dt['nip'] ?>">
                                </td>
                                <td>
                                    <label for="cmbGuru<?= $dt['nip'] ?>" style="cursor: pointer;"><?= $dt['nip'] ?></label>
                                </td>
                                <td>
                                    <label for="cmbGuru<?= $dt['nip'] ?>" style="cursor: pointer;"><?= $dt['nama'] ?></label>
                                </td>
                                <td>
                                    <label for="cmbGuru<?= $dt['nip'] ?>" style="cursor: pointer;"><?= $dt['no_hp'] ?></label>
                                </td>
                                <td>
                                    <label for="cmbGuru<?= $dt['nip'] ?>" style="cursor: pointer;">Belum Menjadi Wali Kelas</label>
                                </td>
                            </tr>
                            <?php $listNamaGuru[$dt['nip']] = [
                                'id' => $dt['id_guru'],
                                'nama' => $dt['nama']
                            ] ?>
                        <?php endforeach ?>
                        <?php foreach ($listWaliKelas as $dt) : ?>
                            <tr>
                                <td>
                                    <input type="radio" name="cmbGuru" id="cmbGuru<?= $dt['nip'] ?>" value="<?= $dt['nip'] ?>">
                                </td>
                                <td>
                                    <label for="cmbGuru<?= $dt['nip'] ?>" style="cursor: pointer;"><?= $dt['nip'] ?></label>
                                </td>
                                <td>
                                    <label for="cmbGuru<?= $dt['nip'] ?>" style="cursor: pointer;"><?= $dt['nama'] ?></label>
                                </td>
                                <td>
                                    <label for="cmbGuru<?= $dt['nip'] ?>" style="cursor: pointer;"><?= $dt['no_hp'] ?></label>
                                </td>
                                <td>
                                    <label for="cmbGuru<?= $dt['nip'] ?>" style="cursor: pointer;"><?= $dt['nama_kelas'] ?></label>
                                </td>
                            </tr>
                            <?php $listNamaGuru[$dt['nip']] = [
                                'id' => $dt['id_guru'],
                                'nama' => $dt['nama']
                            ] ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" id="btnCloseGuruModal">Tutup</button>
                <button type="button" onclick="setWaliKelas()" class="btn btn-success btn-sm">Lanjutkan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?= $this->endSection() ?>
<?= $this->section('bottomScript') ?>
<script>
    let action = null;
    let indexEdit = null;
    const listGuru = <?= json_encode($listNamaGuru) ?>;

    function setAction(x, i) {
        action = x;
        indexEdit = i;
    }

    function setWaliKelas() {
        let selected = $("input[name='cmbGuru']:checked");
        if (selected.length > 0) {
            if (action == 'add') {
                $("#wali_kelas").val(listGuru[selected.val()]['nama']);
                $("#wali_kelas_id").val(listGuru[selected.val()]['id']);
            } else if (action == 'edit') {
                $("#wali_kelas_edit_" + indexEdit).val(listGuru[selected.val()]['nama']);
                $("#wali_kelas_id_edit_" + indexEdit).val(listGuru[selected.val()]['id']);
            } else {
                Swal.fire(
                    'Gagal!',
                    'Ada kesalahan aksi. Mohon refresh halaman!',
                    'error'
                )
            }
            $("#btnCloseGuruModal").click();
        } else {
            Swal.fire(
                'Gagal!',
                'Silahkan pilih guru terlebih dahulu',
                'error'
            )
        }
    }

    $("#listWaliKelas").DataTable();
</script>
<?= $this->endSection() ?>