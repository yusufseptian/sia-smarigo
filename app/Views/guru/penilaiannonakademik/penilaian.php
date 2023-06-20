<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>
<div class="col">
    <div class="card">
        <div class="card-body" id="formContainer">
            <div class="border-bottom mb-3 pb-2 d-flex justify-content-between">
                <div class="d-flex">
                    <h3 class="mx-auto"><b>Penilaian Non Akademik</b></h3>
                </div>
                <table>
                    <tr>
                        <td>Nama</td>
                        <td class="px-3">:</td>
                        <td><?= $dtSiswa['nama'] ?></td>
                    </tr>
                    <tr>
                        <td>NIS</td>
                        <td class="px-3">:</td>
                        <td><?= $dtSiswa['nis'] ?></td>
                    </tr>
                    <tr>
                        <td>Tahun Ajaran</td>
                        <td class="px-3">:</td>
                        <td><?= $dtTA['tahun_ajaran'] ?> (<?= ucfirst($dtSmt['semester']) ?>)</td>
                    </tr>
                </table>
            </div>
            <div id="formContent">
                <ol type="A">
                    <li>
                        <b>Sikap</b>
                        <ol type="1">
                            <div class="row">
                                <div class="col-2">
                                    <li>
                                        <b>Predikat Spiritual</b>
                                        <div class="form-group">
                                            <select name="cmbSpiritual" id="cmbSpiritual" class="form-control" <?= ($isFinished) ? 'disabled' : '' ?>>
                                                <?php if ($isFinished) : ?>
                                                    <option value="Baik" <?= ($dtNond['nond_spiritual_predikat'] == 'Baik') ? 'selected' : '' ?>>Baik</option>
                                                    <option value="Cukup" <?= ($dtNond['nond_spiritual_predikat'] == 'Cukup') ? 'selected' : '' ?>>Cukup</option>
                                                    <option value="Sedang" <?= ($dtNond['nond_spiritual_predikat'] == 'Sedang') ? 'selected' : '' ?>>Sedang</option>
                                                <?php else : ?>
                                                    <option value="Baik">Baik</option>
                                                    <option value="Cukup">Cukup</option>
                                                    <option value="Sedang">Sedang</option>
                                                <?php endif ?>
                                            </select>
                                        </div>
                                    </li>
                                </div>
                                <div class="col-10 pl-5">
                                    <li>
                                        <b>Deskripsi Sikap Spiritual</b>
                                        <div class="form-group d-flex">
                                            <textarea name="txtSpiritual" id="txtSpiritual" class="form-control" rows="3" placeholder="Masukan deskripsi sikap spiritual dari siswa" <?= ($isFinished) ? 'disabled' : '' ?> required onfocus="showHelp('#btnSpiritualHelp', this.id)"><?= ($isFinished) ? $dtNond['nond_spiritual_deskripsi'] : '' ?></textarea>
                                            <div class="d-none flex-column btn-help-deskripsi" id="btnSpiritualHelp">
                                                <button class="btn btn-xs btn-primary" style="height: fit-content;" onclick="saveDeskripsi('#txtSpiritual')"><i class="fas fa-save"></i></button>
                                                <button class="btn btn-xs btn-success" style="height: fit-content;" data-toggle="modal" data-target="#modalListDesk"><i class="fas fa-random"></i></button>
                                            </div>
                                        </div>
                                    </li>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <li>
                                        <b>Predikat Sikap Sosial</b>
                                        <div class="form-group">
                                            <select name="cmbSosial" id="cmbSosial" class="form-control" <?= ($isFinished) ? 'disabled' : '' ?>>
                                                <?php if ($isFinished) : ?>
                                                    <option value="Baik" <?= ($dtNond['nond_sosial_predikat'] == 'Baik') ? 'selected' : '' ?>>Baik</option>
                                                    <option value="Cukup" <?= ($dtNond['nond_sosial_predikat'] == 'Cukup') ? 'selected' : '' ?>>Cukup</option>
                                                    <option value="Sedang" <?= ($dtNond['nond_sosial_predikat'] == 'Sedang') ? 'selected' : '' ?>>Sedang</option>
                                                <?php else : ?>
                                                    <option value="Baik">Baik</option>
                                                    <option value="Cukup">Cukup</option>
                                                    <option value="Sedang">Sedang</option>
                                                <?php endif ?>
                                            </select>
                                        </div>
                                    </li>
                                </div>
                                <div class="col-10 pl-5">
                                    <li>
                                        <b>Deskripsi Sikap Sosial</b>
                                        <div class="form-group d-flex">
                                            <textarea name="txtSosial" id="txtSosial" class="form-control" rows="3" placeholder="Masukan deskripsi sikap sosial dari siswa" <?= ($isFinished) ? 'disabled' : '' ?> required onfocus="showHelp('#btnSosialHelp', this.id)"><?= ($isFinished) ? $dtNond['nond_sosial_deskripsi'] : '' ?></textarea>
                                            <div class="d-none flex-column btn-help-deskripsi" id="btnSosialHelp">
                                                <button class="btn btn-xs btn-primary" style="height: fit-content;" onclick="saveDeskripsi('#txtSosial')"><i class="fas fa-save"></i></button>
                                                <button class="btn btn-xs btn-success" style="height: fit-content;" data-toggle="modal" data-target="#modalListDesk"><i class="fas fa-random"></i></button>
                                            </div>
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </ol>
                    </li>
                    <li>
                        <b>Ekstrakulikuler</b>
                        <div id="listEkstrakulikuler">
                            <?php if ($isFinished) : ?>
                                <?php if (count($dtEkskul) == 0) : ?>
                                    <div class="alert alert-info" role="alert">
                                        Siswa ini belum memiliki data ekstrakulikuler. Klik tombol edit untuk menambahkan data ekstrakulikuler.
                                    </div>
                                <?php else : ?>
                                    <?php
                                    $index = 1;
                                    $listEkskul = [];
                                    foreach ($dtEkskul as $dt) :
                                    ?>
                                        <div class="row py-1" id="containerEkstrakulikuler<?= $index ?>">
                                            <div class="col-1">
                                                <label>Ekskul <?= $index ?></label>
                                                <button type="button" class="btn btn-danger btn-sm d-none" id="btnDeleteEkstrakulikuler<?= $index ?>" onclick="deleteEkstrakulikuler(<?= $index ?>)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                            <div class="col-3">
                                                <input type="text" name="txtEkstrakulikuler_<?= $index ?>" id="txtEkstrakulikuler_<?= $index ?>" class="form-control" value="<?= $dt['ekskul_nama'] ?>" placeholder="Masukan Nama Ekstrakulikuler <?= $index ?>" disabled>
                                            </div>
                                            <div class="col-2">
                                                <select name="cmbEkstrakulikuler_<?= $index ?>_predikat" id="cmbEkstrakulikuler_<?= $index ?>_predikat" class="form-control" disabled>
                                                    <option value="a" <?= (strtolower($dt['ekskul_predikat']) == 'a') ? 'selected' : '' ?>>A</option>
                                                    <option value="b" <?= (strtolower($dt['ekskul_predikat']) == 'b') ? 'selected' : '' ?>>B</option>
                                                    <option value="c" <?= (strtolower($dt['ekskul_predikat']) == 'c') ? 'selected' : '' ?>>C</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <textarea name="txtEkstrakulikuler_<?= $index ?>_deskripsi" id="txtEkstrakulikuler_<?= $index ?>_deskripsi" class="form-control" rows="3" placeholder="Masukan Deskripsi Ekstrakulikuler <?= $index ?>" disabled><?= $dt['ekskul_deskripsi'] ?></textarea>
                                            </div>
                                        </div>
                                    <?php
                                        array_push($listEkskul, $index);
                                        $index++;
                                    endforeach
                                    ?>
                                <?php endif ?>
                            <?php else : ?>
                                <div class="row py-1" id="containerEkstrakulikuler1">
                                    <div class="col-1">
                                        <label>Ekskul 1</label>
                                        <button type="button" class="btn btn-danger btn-sm" id="btnDeleteEkstrakulikuler1" onclick="deleteEkstrakulikuler(1)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    <div class="col-3">
                                        <input type="text" name="txtEkstrakulikuler_1" id="txtEkstrakulikuler_1" class="form-control" placeholder="Masukan Nama Ekstrakulikuler 1">
                                    </div>
                                    <div class="col-2">
                                        <select name="cmbEkstrakulikuler_1_predikat" id="cmbEkstrakulikuler_1_predikat" class="form-control">
                                            <option value="a">A</option>
                                            <option value="b">B</option>
                                            <option value="c">C</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <textarea name="txtEkstrakulikuler_1_deskripsi" id="txtEkstrakulikuler_1_deskripsi" class="form-control" rows="3" placeholder="Masukan Deskripsi Ekstrakulikuler 1"></textarea>
                                    </div>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <button type="button" id="btnAddEkstrakulikuler" class="btn btn btn-success <?= ($isFinished) ? 'd-none' : '' ?>">Tambah Ekstrakulikuler</button>
                            </div>
                        </div>
                    </li>
                    <li>
                        <b>Prestasi</b>
                        <div id="listPrestasi">
                            <?php if ($isFinished) : ?>
                                <?php if (count($dtPrestasi) == 0) : ?>
                                    <div class="alert alert-info" role="alert">
                                        Siswa ini belum memiliki data prestasi. Klik tombol edit untuk menambahkan data prestasi.
                                    </div>
                                <?php else : ?>
                                    <?php
                                    $index = 1;
                                    $listPrestasi = [];
                                    foreach ($dtPrestasi as $dt) : ?>
                                        <div class="row py-1" id="containerPrestasi<?= $index ?>">
                                            <div class="col-1">
                                                <label>Prestasi <?= $index ?></label>
                                                <button type="button" class="btn btn-danger btn-sm d-none" id="btnDeletePrestasi<?= $index ?>" onclick="deletePrestasi(<?= $index ?>)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                            <div class="col-4">
                                                <input type="text" name="txtPrestasi_<?= $index ?>" id="txtPrestasi_<?= $index ?>" class="form-control" value="<?= $dt['prestasi_nama'] ?>" placeholder="Masukan Nama Kegiatan Prestasi <?= $index ?>" disabled>
                                            </div>
                                            <div class="col-7">
                                                <textarea name="txtPrestasi_<?= $index ?>_deskripsi" id="txtPrestasi_<?= $index ?>_deskripsi" class="form-control" rows="3" placeholder="Masukan Deskripsi Kegiatan Prestasi <?= $index ?>" disabled><?= $dt['prestasi_deskripsi'] ?></textarea>
                                            </div>
                                        </div>
                                    <?php
                                        array_push($listPrestasi, $index);
                                        $index++;
                                    endforeach
                                    ?>
                                <?php endif ?>
                            <?php else : ?>
                                <div class="row py-1" id="containerPrestasi1">
                                    <div class="col-1">
                                        <label>Prestasi 1</label>
                                        <button type="button" class="btn btn-danger btn-sm" id="btnDeletePrestasi1" onclick="deletePrestasi(1)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    <div class="col-4">
                                        <input type="text" name="txtPrestasi_1" id="txtPrestasi_1" class="form-control" placeholder="Masukan Nama Kegiatan Prestasi 1">
                                    </div>
                                    <div class="col-7">
                                        <textarea name="txtPrestasi_1_deskripsi" id="txtPrestasi_1_deskripsi" class="form-control" rows="3" placeholder="Masukan Deskripsi Kegiatan Prestasi 1"></textarea>
                                    </div>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <button type="button" id="btnAddPrestasi" class="btn btn btn-success <?= ($isFinished) ? 'd-none' : '' ?>">Tambah Prestasi</button>
                            </div>
                        </div>
                    </li>
                    <li>
                        <b>Ketidak Hadiran</b>
                        <div class="row">
                            <div class="col-4 px-3">
                                <div class="form-group">
                                    <label for="txtSakit">Sakit</label>
                                    <input type="number" name="txtSakit" id="txtSakit" class="form-control" min="0" value="<?= ($isFinished) ? $dtNond['nond_sakit'] : '' ?>" <?= ($isFinished) ? 'disabled' : '' ?> required>
                                </div>
                            </div>
                            <div class="col-4 px-3">
                                <div class="form-group">
                                    <label for="txtIzin">Izin</label>
                                    <input type="number" name="txtIzin" id="txtIzin" class="form-control" min="0" value="<?= ($isFinished) ? $dtNond['nond_izin'] : '' ?>" <?= ($isFinished) ? 'disabled' : '' ?> required>
                                </div>
                            </div>
                            <div class="col-4 px-3">
                                <div class="form-group">
                                    <label for="txtTanpaKeterangan">Tanpa Keterangan</label>
                                    <input type="number" name="txtTanpaKeterangan" id="txtTanpaKeterangan" min="0" class="form-control" value="<?= ($isFinished) ? $dtNond['nond_tanpa_keterangan'] : '' ?>" <?= ($isFinished) ? 'disabled' : '' ?> required>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <b>Catatan Dari Wali Kelas</b>
                        <textarea name="txtCatatanWali" id="txtCatatanWali" class="form-control" rows="3" <?= ($isFinished) ? 'disabled' : '' ?> required><?= ($isFinished) ? $dtNond['nond_catatan_wali_kelas'] : '' ?></textarea>
                    </li>
                </ol>
                <div class="mt-3">
                    <?php if (!$isFinished) : ?>
                        <button type="button" class="btn btn-primary" id="btnSave">Simpan</button>
                    <?php else : ?>
                        <button type="button" class="btn btn-warning" id="btnSetEdit">Edit</button>
                        <button type="button" class="btn btn-primary d-none" id="btnSave">Simpan</button>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal List Deskripsi -->
<div class="modal fade" id="modalListDesk" tabindex="-1" aria-labelledby="modalListDeskLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalListDeskLabel">Pilih Deskripsi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered" id="tableListDesk">
                    <thead>
                        <tr>
                            <th class="cellFit">#</th>
                            <th>Deskripsi</th>
                            <th class="cellFit">Hapus</th>
                        </tr>
                    </thead>
                    <tbody id="listDesk">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCloseModalListDesk">Close</button>
                <button type="button" class="btn btn-primary" id="btnReplaceModalListDesk">Replace</button>
            </div>
        </div>
    </div>
</div>

<div class="d-none" id="loadContainer">
    <div class="m-auto text-center text-white" style="width: fit-content;">
        <div class="loader"></div>
        <div id="textLoad"></div>
    </div>
</div>

<?php $link = ($isFinished) ? 'edit' : 'save' ?>
<?= $this->endSection() ?>
<?= $this->section('bottomScript') ?>
<script>
    <?php if ($isFinished) : ?>
        var prestasiList = <?= (isset($listPrestasi)) ? json_encode($listPrestasi) : json_encode([]) ?>;
        var ekstrakulikulerList = <?= (isset($listEkskul)) ? json_encode($listEkskul) : json_encode([]) ?>;
    <?php else : ?>
        var prestasiList = [1];
        var ekstrakulikulerList = [1];
    <?php endif ?>

    function showLoad(text) {
        $("#loadContainer").removeClass('d-none');
        $("#textLoad").html(text);
        $("#loadContainer").addClass('d-flex');
    }

    function hideLoad() {
        $("#loadContainer").addClass('d-none');
        $("#loadContainer").removeClass('d-flex');
    }

    <?php if ($isFinished) : ?>
        $("#btnSetEdit").click(function() {
            $("#txtSpiritual").removeAttr('disabled');
            $("#cmbSpiritual").removeAttr('disabled');
            $("#txtSosial").removeAttr('disabled');
            $("#cmbSosial").removeAttr('disabled');
            $("#txtSakit").removeAttr('disabled');
            $("#txtIzin").removeAttr('disabled');
            $("#txtTanpaKeterangan").removeAttr('disabled');
            $("#txtCatatanWali").removeAttr('disabled');
            prestasiList.forEach(element => {
                $("#txtPrestasi_" + element).removeAttr('disabled');
                $("#txtPrestasi_" + element + "_deskripsi").removeAttr('disabled');
                $("#btnDeletePrestasi" + element).removeClass('d-none');
            });
            ekstrakulikulerList.forEach(element => {
                $("#txtEkstrakulikuler_" + element).removeAttr('disabled');
                $("#cmbEkstrakulikuler_" + element + "_predikat").removeAttr('disabled');
                $("#txtEkstrakulikuler_" + element + "_deskripsi").removeAttr('disabled');
                $("#btnDeleteEkstrakulikuler" + element).removeClass('d-none');
            });
            $("#btnAddEkstrakulikuler").removeClass('d-none');
            $("#btnAddPrestasi").removeClass('d-none');
            $("#btnSetEdit").hide();
            $("#btnSave").removeClass('d-none');
        });
    <?php endif ?>

    $("#btnSave").click(function() {
        Swal.fire({
            title: 'SIA-SMARIGO?',
            text: "Apakah anda yakin memasukan nilai tersebut. Anda masih bisa merubahnya selama semester saat ini masih aktif.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1cc88a',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'Lanjutan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                let txtPrestasiList = $("<input type='hidden' name='txtPrestasiList'>");
                txtPrestasiList.attr('value', prestasiList.length);
                let txtEkstrakulikulerList = $("<input type='hidden' name='txtEkstrakulikulerList'>");
                txtEkstrakulikulerList.attr('value', ekstrakulikulerList.length);
                let form = $("<form method='post' id='formPenilaian'></form>");
                form.attr('action', "<?= base_url("PenilaianNonAkademik/$link/$nisSiswa") ?>");
                form.append(txtEkstrakulikulerList, txtPrestasiList, $("#formContent"));
                $("#formContainer").append(form);
                $("#formPenilaian").submit();
            }
        })
    });

    function deleteEkstrakulikuler(key) {
        let index = 0;
        for (let i = 0; i < ekstrakulikulerList.length; i++) {
            if (ekstrakulikulerList[i] == key) {
                index = i;
                break;
            }
        }
        $("#containerEkstrakulikuler" + key).remove();
        delete ekstrakulikulerList[index];
        console.log(ekstrakulikulerList);
    }

    $("#btnAddEkstrakulikuler").click(function() {
        let container = $("<div class='row py-1'></div>");
        container.attr('id', 'containerEkstrakulikuler' + (ekstrakulikulerList.length + 1));
        let col1 = $("<div class='col-1'></div>");
        let title = $("<label></label>").html("Ekskul " + (ekstrakulikulerList.length + 1));
        let btnDelete = $("<button type='button' class='btn btn-danger btn-sm'></button>");
        btnDelete.attr('onclick', 'deleteEkstrakulikuler(' + (ekstrakulikulerList.length + 1) + ')');
        btnDelete.append($('<i class="fas fa-trash"></i>'));
        col1.append(title, btnDelete);
        let col3 = $("<div class='col-3'></div>");
        let txtJudul = $("<input type='text' class='form-control'>");
        txtJudul.attr('name', 'txtEkstrakulikuler_' + (ekstrakulikulerList.length + 1));
        txtJudul.attr('id', 'txtEkstrakulikuler_' + (ekstrakulikulerList.length + 1));
        txtJudul.attr('placeholder', 'Masukan Nama Ekstrakulikuler ' + (ekstrakulikulerList.length + 1));
        col3.append(txtJudul);
        let col2 = $("<div class='col-2'></div>");
        let cmbPredikat = $("<select class='form-control'></select>");
        cmbPredikat.attr('name', 'cmbEkstrakulikuler_' + (ekstrakulikulerList.length + 1) + '_predikat');
        cmbPredikat.attr('id', 'cmbEkstrakulikuler_' + (ekstrakulikulerList.length + 1) + '_predikat');
        cmbPredikat.append($("<option value='a'></option>").html('A'));
        cmbPredikat.append($("<option value='b'></option>").html('B'));
        cmbPredikat.append($("<option value='c'></option>").html('C'));
        col2.append(cmbPredikat);
        let col6 = $("<div class='col-6'></div>");
        let txtDeskripsi = $("<textarea class='form-control' col='3'></textarea>");
        txtDeskripsi.attr('name', 'txtEkstrakulikuler_' + (ekstrakulikulerList.length + 1) + '_deskripsi');
        txtDeskripsi.attr('id', 'txtEkstrakulikuler_' + (ekstrakulikulerList.length + 1) + '_deskripsi');
        txtDeskripsi.attr('placeholder', 'Masukan Deskripsi Terkait Ekstrakulikuler ke-' + (ekstrakulikulerList.length + 1));
        col6.append(txtDeskripsi);
        container.append(col1, col3, col2, col6);
        $("#listEkstrakulikuler").append(container);
        ekstrakulikulerList.push((ekstrakulikulerList.length + 1));
        console.log(ekstrakulikulerList);
    });

    function deletePrestasi(key) {
        let index = 0;
        for (let i = 0; i < prestasiList.length; i++) {
            if (prestasiList[i] == key) {
                index = i;
                break;
            }
        }
        $("#containerPrestasi" + key).remove();
        delete prestasiList[index];
        console.log(prestasiList);
    }

    $("#btnAddPrestasi").click(function() {
        let container = $("<div class='row py-1'></div>");
        container.attr('id', 'containerPrestasi' + (prestasiList.length + 1));
        let col1 = $("<div class='col-1'></div>");
        let title = $("<label></label>").html("Prestasi " + (prestasiList.length + 1));
        let btnDelete = $("<button type='button' class='btn btn-danger btn-sm'></button>");
        btnDelete.attr('onclick', 'deletePrestasi(' + (prestasiList.length + 1) + ')');
        btnDelete.append($('<i class="fas fa-trash"></i>'));
        col1.append(title, btnDelete);
        let col4 = $("<div class='col-4'></div>");
        let txtJudul = $("<input type='text' class='form-control'>");
        txtJudul.attr('name', 'txtPrestasi_' + (prestasiList.length + 1));
        txtJudul.attr('id', 'txtPrestasi_' + (prestasiList.length + 1));
        txtJudul.attr('placeholder', 'Masukan Nama Kegiatan Prestasi ' + (prestasiList.length + 1));
        col4.append(txtJudul);
        let col7 = $("<div class='col-7'></div>");
        let txtDeskripsi = $("<textarea class='form-control' col='3'></textarea>");
        txtDeskripsi.attr('name', 'txtPrestasi_' + (prestasiList.length + 1) + '_deskripsi');
        txtDeskripsi.attr('id', 'txtPrestasi_' + (prestasiList.length + 1) + '_deskripsi');
        txtDeskripsi.attr('placeholder', 'Masukan Deskripsi Terkait Prestasi ke-' + (prestasiList.length + 1));
        col7.append(txtDeskripsi);
        container.append(col1, col4, col7);
        $("#listPrestasi").append(container);
        prestasiList.push((prestasiList.length + 1));
        console.log(prestasiList);
    });

    let idTextArea = null;

    function saveDeskripsi(id) {
        showLoad('Menyimpan deskripsi');
        $.ajax({
            type: "POST",
            url: '<?= base_url('listdeskripsi/save') ?>',
            data: {
                "listdesk_deskripsi": $(id).val()
            },
            success: function(response) {
                $("#tableListDesk").DataTable().destroy();
                $("#listDesk").empty();
                setListDesk();
                alert(response.msg);
                hideLoad();
            },
            error: function(request, status, error) {
                alert(request.responseText);
                hideLoad();
            }
        });
    }

    function showHelp(id, textAreaID) {
        $('.btn-help-deskripsi').addClass('d-none');
        $('.btn-help-deskripsi').removeClass('d-flex');
        $(id).removeClass('d-none');
        $(id).addClass('d-flex');
        idTextArea = textAreaID;
    }

    function deleteDesk(id) {
        showLoad('Menghapus deskripsi');
        $.ajax({
            type: "POST",
            url: '<?= base_url('listdeskripsi/deletes') ?>',
            data: {
                "idDeskripsi": id
            },
            success: function(response) {
                if (response.success) {
                    $("#tableListDesk").DataTable().destroy();
                    $("#listDesk").empty();
                    setListDesk();
                    alert(response.msg);
                    hideLoad();
                } else {
                    alert(response.msg);
                }
                hideLoad();
            },
            error: function(request, status, error) {
                alert(request.responseText);
                hideLoad();
            }
        });
    }

    function setListDesk() {
        showLoad('Mengambil data deskripsi');
        $.ajax({
            type: "POST",
            url: '<?= base_url('listdeskripsi/get') ?>',
            data: {
                "test": "test"
            },
            success: function(response) {
                response.data.forEach(element => {
                    let tr = $("<tr></tr>");
                    let tdInput = $("<td></td>");
                    let input = $("<input type='radio' name='rdDeskripsi'>");
                    input.attr('value', element.listdesk_deskripsi);
                    input.attr('id', 'rdDestkripsi' + element.listdesk_id);
                    tdInput.append(input);
                    let tdLabel = $("<td></td>");
                    let label = $("<label style='cursor:pointer'></label>");
                    label.attr('for', 'rdDestkripsi' + element.listdesk_id);
                    label.html(element.listdesk_deskripsi);
                    tdLabel.append(label);
                    let tdDelete = $("<td align='center'></td>");
                    let btnDelete = $("<button class='btn btn-sm btn-danger'></button>");
                    btnDelete.attr('onclick', 'deleteDesk(' + element.listdesk_id + ')');
                    btnDelete.append($('<i class="fas fa-trash"></i>'));
                    tdDelete.append(btnDelete);
                    tr.append(tdInput, tdLabel, tdDelete);
                    $("#listDesk").append(tr);
                });
                $("#tableListDesk").DataTable();
                hideLoad();
            }
        });
    }

    $("#btnReplaceModalListDesk").click(function() {
        let deskItem = $("input[name='rdDeskripsi']:checked");
        if (deskItem.length == 0) {
            alert('Mohon pilih terlebih dahulu deskripsinya');
        } else {
            $("#" + idTextArea).empty();
            $("#" + idTextArea).html(deskItem.val());
            $("#btnCloseModalListDesk").click();
            deskItem.prop('checked', false);
        }
    });

    $(document).ready(function() {
        setListDesk();
    });
</script>
<?= $this->endSection() ?>