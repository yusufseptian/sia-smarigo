<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>
<div class="col">
    <div class="card">
        <div class="card-header">
            Pilih Mapel yg Diampu
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA MATA PELAJARAN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($dtJadwal as $key => $value) { ?>
                        <tr style="cursor:  pointer;" onclick="window.location.href='<?= base_url('PenilaianAkademik/kelas/' . $value['mapel_id']) ?>'">
                            <td class="cellFit"><?= $no++ ?></td>
                            <td><?= $value['nama_matapelajaran'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<?= $this->endSection() ?>