<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>
<div class="col">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div>
                <label for="cmbSemester">Semester</label>
                <select name="cmbSemester" id="cmbSemester" class="form-control" style="width: fit-content; display: inline;" onchange="setSemester(this.value)">
                    <?php foreach ($listSemester as $semester) : ?>
                        <option value="<?= $semester['id_semester'] ?>" <?= ($semester['id_semester'] == $dtSmt['id_semester']) ? 'selected' : '' ?>><?= ucfirst($semester['semester']) ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div>
                <label for="cmbKategori">Kategori</label>
                <select name="cmbKategori" id="cmbKategori" class="form-control" style="width: fit-content; display: inline;" onchange="setKeterangan(this.value)">
                    <option value="pengetahuan" <?= ($jenisKategori == "pengetahuan") ? 'selected' : '' ?>>Pengetahuan</option>
                    <option value="keterampilan" <?= ($jenisKategori == "keterampilan") ? 'selected' : '' ?>>Keterampilan</option>
                </select>
            </div>
        </div>
        <div class="card-body">
            <h3><b>Nilai <?= ucfirst($jenisKategori) ?></b></h3>
            <div class="border-bottom border-top p-2 d-flex justify-content-between">
                <?php if (session('log_auth')['role'] == "SISWA" || session('log_auth')['role'] == "ORTU") : ?>
                    <div>
                        <table>
                            <tr>
                                <td>Nama Siswa</td>
                                <td class="px-3">:</td>
                                <td><?= $dtSiswa['nama'] ?></td>
                            </tr>
                            <tr>
                                <td>NIS Siswa</td>
                                <td class="px-3">:</td>
                                <td><?= $dtSiswa['nis'] ?></td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td class="px-3">:</td>
                                <td><?= $dtMapel['nama_kelas'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <table>
                            <tr>
                                <td>Mapel</td>
                                <td class="px-3">:</td>
                                <td><?= $dtMapel['nama_matapelajaran'] ?></td>
                            </tr>
                            <tr>
                                <td>Tahun Ajaran</td>
                                <td class="px-3">:</td>
                                <td><?= $dtTA['tahun_ajaran'] ?></td>
                            </tr>
                        </table>
                    </div>
                <?php else : ?>
                    <table>
                        <tr>
                            <td>Kelas</td>
                            <td class="px-3">:</td>
                            <td><?= $dtMapel['nama_kelas'] ?></td>
                        </tr>
                        <tr>
                            <td>Tahun Ajaran</td>
                            <td class="px-3">:</td>
                            <td><?= $dtTA['tahun_ajaran'] ?> (<?= ucfirst($dtSmt['semester']) ?>)</td>
                        </tr>
                    </table>
                <?php endif ?>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="hasil-akhir-tab" data-toggle="tab" data-target="#hasil-akhir" type="button" role="tab" aria-controls="hasil-akhir" aria-selected="true">Hasil Akhir</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="detail-nilai-tab" data-toggle="tab" data-target="#detail-nilai" type="button" role="tab" aria-controls="detail-nilai" aria-selected="false">Detail</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <?php if (session('log_auth')['role'] == "SISWA" || session('log_auth')['role'] == "ORTU") : ?>
                    <?= $this->include('guru/hasilbelajar/hasil_for_siswa'); ?>
                <?php else : ?>
                    <?= $this->include('guru/hasilbelajar/hasil_for_guru'); ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('bottomScript') ?>
<script>
    function setSemester(semester) {
        window.location.href = "<?= base_url("HasilBelajar/hasil/$jenisKategori/$tahunAjaranID/$mapelID") ?>/" + semester;
    }

    function setKeterangan(keterangan) {
        window.location.href = "<?= base_url("HasilBelajar/hasil") ?>/" + keterangan + "<?= "/$tahunAjaranID/$mapelID/$semesterID" ?>";
    }
</script>
<?= $this->endSection() ?>