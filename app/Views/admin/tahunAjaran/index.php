<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>
<div class="col-6 p-3">
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
                        <th>TAHUN AJARAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($th_ajar as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['tahun_ajaran'] ?></td>
                            <td align="center">
                                <?php if ($no == 2 && !$isFinished) : ?>
                                    <button class="btn btn-sm btn-flat btn-warning" data-toggle="modal" data-target="#edit<?= $value['id'] ?>">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                    <button class="btn btn-sm btn-flat btn-danger" data-toggle="modal" data-target="#delete<?= $value['id'] ?>">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                <?php endif ?>
                                <button class="btn btn-sm btn-flat btn-primary" onclick="selectTA(<?= $value['id'] ?>, '<?= $value['tahun_ajaran'] ?>')">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-6 p-3">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                Kelola Data Semester
            </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>TAHUN AJARAN</th>
                        <th>SEMESTER</th>
                        <th>MULAI</th>
                        <th>SELESAI</th>
                    </tr>
                </thead>
                <tbody id="dataSemester">
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
            <?= form_open('tahunajaran/insertdata') ?>
            <div class="modal-body">
                <div class="alert alert-warning my-3" role="alert">
                    <div><i class="fas fa-exclamation-triangle"></i> <b>Perhatian</b></div>
                    Jika anda menambahkan tahun ajaran baru maka semester pada tahun ajaran lama akan di non aktifkan. Anda tidak bisa merubah data tahun ajaran lama.
                </div>
                <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <input name="tahun_ajaran" class="form-control" placeholder="Masukkan Tahun Ajaran" required>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </div>
            <?= form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php if (!$isFinished) : ?>
    <?php $first_tahun_ajar = $th_ajar[0]; ?>
    <!-- Modal Edit -->
    <div class="modal fade" id="edit<?= $first_tahun_ajar['id'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title">Edit kelas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open(base_url('tahunajaran/editdata/' . $first_tahun_ajar['id'])) ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tahun Ajaran</label>
                        <input name="tahun_ajaran" class="form-control" value="<?= $first_tahun_ajar['tahun_ajaran'] ?>" placeholder="tahun ajaran" required>
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
    <!-- Modal Delete -->
    <div class="modal fade" id="delete<?= $first_tahun_ajar['id'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title text-white">Hapus Tahun Ajaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda ingin menghapus data ini? Jika anda menghapus data ini, maka nilai yang terkait dengan tahun ajaran ini akan terhapus.
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
                    <a href="<?= base_url('tahunajaran/deleteData/' . $first_tahun_ajar['id']) ?>" class="btn btn-danger btn-sm">Hapus</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endif ?>
<script>
    const dtSemester = <?= json_encode($semester) ?>;

    function selectTA(id, thAjar) {
        $("#dataSemester").empty();
        let i = 1;
        let s1 = false;
        let tr, no, semester, mulai, selesai, btn, ta;
        dtSemester.forEach(element => {
            if (element.tahunAjaran == id) {
                tr = $("<tr></tr>");
                btn = $("<a class='btn btn-sm'></a>");
                no = $("<td></td>").html(i);
                semester = $("<td></td>").html(element.semester);
                ta = $("<td></td>").html(thAjar);
                if (element.mulai == null) {
                    var btnMulai = btn.addClass("btn-success");
                    btnMulai.attr('href', '<?= base_url('tahunAjaran') ?>/startSemester/');
                    btnMulai.html("Mulai");
                    mulai = $("<td></td>").append(btnMulai);
                    selesai = $("<td></td>").html("-");
                    if (i == 2) {
                        if (s1 == false) {
                            mulai.empty();
                            mulai.html('-');
                        }
                    }
                } else {
                    mulai = $("<td></td>").html(element.mulai);
                    if (element.selesai == null) {
                        var btnSelesai = btn.addClass("btn-danger");
                        if (element.semester == 'genap') {
                            btnSelesai.attr('onclick', 'finishTA()');
                        } else {
                            btnSelesai.attr('href', '<?= base_url('tahunAjaran') ?>/finishSemester');
                        }
                        btnSelesai.html('Selesai');
                        selesai = $("<td></td>").append(btnSelesai);
                    } else {
                        selesai = $("<td></td>").html(element.selesai);
                    }
                    if (i == 1) {
                        s1 = true;
                    }
                }
                i++;
                tr.append(no, ta, semester, mulai, selesai);
                $("#dataSemester").append(tr);
            }
        });
    }

    function finishTA() {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Jika anda menyelesaikan semester genap ini, maka tahun ajaran ini akan dianggap selesai. Akses edit pada tahun ajaran ini akan ditutup.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ffc107',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'Lanjutan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= base_url('tahunajaran') ?>/finishSemester';
            }
        })
    }
</script>
<?= $this->endSection() ?>