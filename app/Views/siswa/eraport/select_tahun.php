<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>
<div class="card w-100">
    <div class="card-body">
        <div class="border-bottom pb-3 mb-3">
            <h3 class="font-weight-bolder text-gray-900">E-Raport</h3>
            <table>
                <tr>
                    <td>NIS</td>
                    <td class="px-3">:</td>
                    <td><?= $dtSiswa['nis'] ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td class="px-3">:</td>
                    <td><?= $dtSiswa['nama'] ?></td>
                </tr>
            </table>
        </div>
        <div class="row">
            <?php foreach ($dtTahun as $dt) : ?>
                <div class="col-lg-3 col-md-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">E-Raport</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Tahun Ajaran <?= $dt['tahun_ajaran'] ?></h6>
                            <a href="<?= base_url("ERaport/nilai/" . $dtSiswa['nis'] . "/" . $dt['id'] . "/1") ?>" class="card-link">Semester 1</a>
                            <a href="<?= base_url("ERaport/nilai/" . $dtSiswa['nis'] . "/" . $dt['id'] . "/2") ?>" class="card-link">Semester 2</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>