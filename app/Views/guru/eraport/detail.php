<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>
<div class="col">
    <div class="card">
        <div class="card-body" id="formContainer">
            <div class="border-bottom mb-3 pb-2 d-flex justify-content-between">
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
        </div>
    </div>
</div>
<?= $this->endSection() ?>