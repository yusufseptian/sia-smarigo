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
                        <th>NIS</th>
                        <th>NAMA SISWA</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($dtSiswa as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['nis'] ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td align="center">
                                <button class="btn btn-xs btn-flat btn-danger" data-toggle="modal" data-target="#deleteSiswa" onclick="deleteSiswa(<?= $value['nis'] ?>, '<?= $value['nama'] ?>')">
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title">Tambah Kelas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('kelas/insertsiswa') ?>
            <div class="modal-body">
                <table class="table table-striped table-bordered" id="listNotMemberSiswa">
                    <thead>
                        <tr>
                            <th style="width: 1%;">#</th>
                            <th style="width: 1%;">NIS</th>
                            <th class="w-auto">NAMA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dtSiswaNotMember as $dt) { ?>
                            <tr>
                                <td><input type="radio" name="nisSiswa" id="nisSiswa_<?= $dt['nis'] ?>" value="<?= $dt['nis'] ?>"></td>
                                <td><label for="nisSiswa_<?= $dt['nis'] ?>"><?= $dt['nis'] ?></label></td>
                                <td><label for="nisSiswa_<?= $dt['nis'] ?>"><?= $dt['nama'] ?></label></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <input type="hidden" name="kelas" value="<?= $dtKelas['id_kelas'] ?>">
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
<!-- Modal Delete -->
<div class="modal fade" id="deleteSiswa">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title text-white">Hapus Siswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda ingin menghapus siswa dengan nama <b id="modalNamaSiswa"></b>?
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
                <a href="" class="btn btn-danger btn-sm" id="linkDeleteSiswa">Hapus</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    function deleteSiswa(nis, nama) {
        $('#modalNamaSiswa').html(nama);
        $('#linkDeleteSiswa').attr('href', '<?= base_url('kelas/deleteSiswa/' . $dtKelas['id_kelas']) ?>/' + nis);
    }
</script>

<?= $this->endSection() ?>