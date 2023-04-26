<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>
<div class="col">
    <div class="card">

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA MATA PELAJARAN</th>
                        <th>NAMA GURU</th>
                        <th>KELAS</th>
                        <th>HARI</th>
                        <th>JAM MENGAJAR</th>
                        <th>TAHUN AJARAN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($dt_jadwal as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['nama_matapelajaran'] ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td><?= $value['nama_kelas'] ?></td>
                            <td><?= $value['hari'] ?></td>
                            <td><?= $value['jam_mengajar'] ?></td>
                            <td><?= $value['tahun_ajaran'] ?></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<?= $this->endSection() ?>