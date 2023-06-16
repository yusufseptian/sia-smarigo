<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>
<?= $this->include('guru/eraport/partial/kkm'); ?>
<div class="col">
    <div class="card">
        <div class="card-header">
            Masukan Deskripsi Terkait Siswa
        </div>
        <div class="card-body">
            <div class="border-bottom pb-3 mb-3">
                <h3><b>Deskripsi Nilai Akhir <?= ucfirst($kategori) ?></b></h3>
                <div class="d-flex justify-content-between">
                    <div>
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
                            <tr>
                                <td>Tahun Ajaran</td>
                                <td class="px-3">:</td>
                                <td><?= $dtTA['tahun_ajaran'] ?> (<?= ucfirst($dtSmt['semester']) ?>)</td>
                            </tr>
                        </table>
                    </div>
                    <?php if ($isFinished) : ?>
                        <div class="d-flex">
                            <button type="button" id="btnEdit" class="btn btn-warning my-auto">Edit</button>
                            <button type="button" id="btnCancleEdit" class="btn btn-danger my-auto d-none" onclick="window.location.reload()">Batal</button>
                        </div>
                    <?php endif ?>
                </div>
            </div>
            <form action="<?= ($isFinished) ? '' : base_url("DeskripsiNilaiAkhir/save/$kategori/$mapelID/$kelasID") ?>" method="post" id="formDeskripsiNA">
                <table id="tbSiswa" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NIS</th>
                            <th>NAMA</th>
                            <th>NILAI</th>
                            <th>PREDIKAT</th>
                            <th>DESKRIPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($isFinished) {
                            $listID = [];
                        }
                        $no = 1;
                        foreach ($dtSiswa as $key => $value) { ?>
                            <tr>
                                <td class="cellFit text-center"><?= $no++ ?></td>
                                <td class="cellFit"><?= $value['nis'] ?></td>
                                <td><?= $value['nama'] ?></td>
                                <td class="cellFit text-center"><?= $dtNilaiAkademik[$value['id']] ?></td>
                                <td class="cellFit text-center"><?= getGrade($dtTA['kkm'], $dtNilaiAkademik[$value['id']]) ?></td>
                                <td>
                                    <?php if ($isFinished) : ?>
                                        <textarea name="txtDeskripsi<?= $value['nis'] ?>" id="txtDeskripsi<?= $value['nis'] ?>" class="form-control" rows="2" disabled><?= $value['dna_deskripsi'] ?></textarea>
                                        <?php array_push($listID, "txtDeskripsi" . $value['nis']); ?>
                                    <?php else : ?>
                                        <textarea name="txtDeskripsi<?= $value['nis'] ?>" id="txtDeskripsi<?= $value['nis'] ?>" class="form-control" rows="2"></textarea>
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="mt-3 text-center <?= ($isFinished) ? 'd-none' : '' ?>" id="containerBtnSave">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('bottomScript'); ?>
<script>
    <?php if ($isFinished) : ?>
        const listID = <?= json_encode($listID) ?>;
        $("#btnEdit").click(function() {
            $("#btnCancleEdit").removeClass('d-none');
            $("#btnEdit").remove();
            $("#containerBtnSave").removeClass('d-none');
            $("#formDeskripsiNA").attr('action', '<?= base_url("DeskripsiNilaiAkhir/edit/$kategori/$mapelID/$kelasID") ?>');
            listID.forEach(element => {
                $("#" + element).removeAttr('disabled');
            });
        });
    <?php endif ?>
</script>
<?= $this->endSection() ?>