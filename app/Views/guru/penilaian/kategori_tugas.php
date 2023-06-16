<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>
<div class="col">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div>
                <label for="cmbSemester">Semester: </label>
                <select name="cmbSemester" id="cmbSemester" class="form-control form-control-sm" style="width: fit-content; display: inline;" onchange="changeSemester(this.value)">
                    <?php foreach ($listSemester as $dt) : ?>
                        <?php if (is_null($dtSmt)) : ?>
                            <option value="<?= $dt['id_semester'] ?>"><?= ucfirst($dt['semester']) ?></option>
                        <?php else : ?>
                            <option value="<?= $dt['id_semester'] ?>" <?= ($dtSmt['id_semester'] == $dt['id_semester']) ? 'selected' : '' ?>><?= ucfirst($dt['semester']) ?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select>
            </div>
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAddKategori">Tambah</button>
        </div>
        <div class="card-body">
            <h3><b>Nilai <?= ucfirst($keteranganKategori) ?></b></h3>
            <div class="mb-3 border-bottom d-flex justify-content-between">
                <table>
                    <tr>
                        <td>Mapel</td>
                        <td class="px-3">:</td>
                        <td><?= $dtMapel['nama_matapelajaran'] ?></td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td class="px-3">:</td>
                        <td><?= $dtKelas['nama_kelas'] ?></td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>Tahun Ajaran</td>
                        <td class="px-3">:</td>
                        <td><?= $dtTA['tahun_ajaran'] ?> (<?= ucfirst($dtSmt['semester']) ?>)</td>
                    </tr>
                    <tr>
                        <td>Total Bobot Penilaian</td>
                        <td class="px-3">:</td>
                        <td id="totalBobot"></td>
                    </tr>
                </table>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="cellFit">NO</th>
                        <th>KATEGORI</th>
                        <th>DESKRIPSI</th>
                        <th class="cellFit">TANGGAL TUGAS</th>
                        <th class="cellFit">KKM</th>
                        <th class="cellFit">BOBOT TUGAS (%)</th>
                        <th class="cellFit">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    $listKategori = [];
                    $bobot = 0;
                    foreach ($dtKategori as $key => $value) { ?>
                        <tr>
                            <td class="cellFit"><?= $no++ ?></td>
                            <td><?= $value['kt_nama'] ?></td>
                            <td><?= $value['kt_deskripsi'] ?></td>
                            <td><?= $value['kt_tanggal'] ?></td>
                            <td class="text-center"><?= $value['kt_kkm'] ?></td>
                            <td class="text-center"><?= $value['kt_bobot'] ?></td>
                            <td class="text-center cellFit">
                                <button type="button" class="btn btn-warning btn-sm" onclick="setEdit('<?= $value['kt_id'] ?>', '<?= $value['kt_bobot'] ?>')" data-toggle="modal" data-target="#modalEditKategori"><i class="fas fa-edit"></i></button>
                                <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='<?= base_url('PenilaianAkademik/nilai/' . $mapelID . '/' . $kelasID . '/' . $value['kt_id']) ?>'"><i class="fas fa-list-alt"></i></button>
                            </td>
                        </tr>

                    <?php
                        $listKategori[$value['kt_id']] = $value;
                        $bobot += $value['kt_bobot'];
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal Add Kategori -->
<div class="modal fade" id="modalAddKategori" tabindex="-1" aria-labelledby="modalAddKategoriLabel" aria-hidden="true">
    <form action="<?= base_url("PenilaianAkademik/addkategori/$keteranganKategori/$mapelID/$kelasID/" . $dtSmt['id_semester']) ?>" method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddKategoriLabel">Tambah Kategori Tugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info mb-3" role="alert">
                        Bobot maksimal saat ini adalah <span id="maxBobotInfo"></span>
                    </div>
                    <div class="form-group">
                        <label for="txtNamaKategori">Nama</label>
                        <input type="text" class="form-control" id="txtNamaKategori" name="txtNamaKategori" maxlength="50" required>
                    </div>
                    <div class="form-group">
                        <label for="txtTanggal">Tanggal Tugas</label>
                        <input type="date" class="form-control" id="txtTanggal" name="txtTanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="txtKKM">KKM</label>
                        <input type="number" class="form-control" id="txtKKM" name="txtKKM" min="0" max="100" required>
                    </div>
                    <div class="form-group">
                        <label for="txtBobot">Bobot Tugas</label>
                        <input type="number" class="form-control" id="txtBobot" name="txtBobot" min="0" max="100" required>
                    </div>
                    <div class="form-group">
                        <label for="txtDeskripsi">Deskripsi Tugas</label>
                        <textarea name="txtDeskripsi" id="txtDeskripsi" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Modal Edit Kategori -->
<div class="modal fade" id="modalEditKategori" tabindex="-1" aria-labelledby="modalEditKategoriLabel" aria-hidden="true">
    <form action="" method="post" id="formEditKategori">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditKategoriLabel">Edit Kategori Tugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info mb-3" role="alert" id="alertEdit">
                        <span id="infoEdit">Bobot maksimal saat ini adalah</span> <span id="maxBobotInfo_Edit"></span>
                    </div>
                    <div class="form-group">
                        <label for="txtNamaKategori_Edit">Nama</label>
                        <input type="text" class="form-control" id="txtNamaKategori_Edit" name="txtNamaKategori_Edit" maxlength="50" required>
                    </div>
                    <div class="form-group">
                        <label for="txtTanggal_Edit">Tanggal Tugas</label>
                        <input type="date" class="form-control" id="txtTanggal_Edit" name="txtTanggal_Edit" required>
                    </div>
                    <div class="form-group">
                        <label for="txtKKM_Edit">KKM</label>
                        <input type="number" class="form-control" id="txtKKM_Edit" name="txtKKM_Edit" min="0" max="100" required>
                    </div>
                    <div class="form-group">
                        <label for="txtBobot_Edit">Bobot Tugas</label>
                        <input type="number" class="form-control" id="txtBobot_Edit" name="txtBobot_Edit" min="0" max="100" oninput="changeBobot()" required>
                    </div>
                    <div class="form-group">
                        <label for="txtDeskripsi_Edit">Deskripsi Tugas</label>
                        <textarea name="txtDeskripsi_Edit" id="txtDeskripsi_Edit" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
<?= $this->section('bottomScript') ?>
<script>
    const dtKategori = <?= json_encode($listKategori) ?>;
    let bobotEdit = 0;

    function setEdit(id, bobot) {
        $("#txtNamaKategori_Edit").val(dtKategori[id]['kt_nama']);
        $("#txtTanggal_Edit").val(dtKategori[id]['kt_tanggal']);
        $("#txtKKM_Edit").val(dtKategori[id]['kt_kkm']);
        $("#txtBobot_Edit").val(dtKategori[id]['kt_bobot']);
        $("#txtDeskripsi_Edit").html(dtKategori[id]['kt_deskripsi']);
        $("#formEditKategori").attr('action', "<?= base_url("PenilaianAkademik/editKategori/$mapelID/$kelasID") ?>/" + id);
        bobotEdit = Number(bobot);
    }

    function changeBobot() {
        let rest = (100 - Number(<?= $bobot ?>) + bobotEdit - Number($("#txtBobot_Edit").val()));
        if (rest < 0) {
            $("#infoEdit").html('Bobot melewati batas maksimal bobot');
            $("#maxBobotInfo_Edit").html('');
            $("#alertEdit").addClass('alert-danger');
            $("#alertEdit").removeClass('alert-info');
        } else {
            $("#infoEdit").html('Bobot maksimal saat ini adalah');
            $("#maxBobotInfo_Edit").html(rest);
            $("#alertEdit").addClass('alert-info');
            $("#alertEdit").removeClass('alert-danger');
            $("#txtBobot_Edit").attr('max', rest);
        }
    }

    $(document).ready(function() {
        $("#totalBobot").html('<?= $bobot ?>%');
        $("#txtBobot").attr("max", (100 - Number(<?= $bobot ?>)));
        $("#txtBobot_Edit").attr("max", (100 - Number(<?= $bobot ?>)));
        $("#maxBobotInfo_Edit").html((100 - Number(<?= $bobot ?>)));
        $("#maxBobotInfo").html((100 - Number(<?= $bobot ?>)));
    });

    function changeSemester(semester) {
        window.location.href = '<?= base_url("PenilaianAkademik/kategori/$keteranganKategori/$mapelID/$kelasID") ?>/' + semester;
    }
</script>
<?= $this->endSection() ?>