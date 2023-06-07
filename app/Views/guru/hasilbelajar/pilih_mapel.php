<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>
<div class="col">
    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="cellFit">NO</th>
                        <th>NAMA MAPEL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($dtMapel as $key => $value) { ?>
                        <tr style="cursor: pointer;" onclick="window.location.href='<?= base_url('HasilBelajar/hasil/' . $tahunAjaranID . '/' . $value['mapel_id'] . 'pengetahuan/') ?>'">
                            <td><?= $no++ ?></td>
                            <td><?= $value['nama_matapelajaran'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>