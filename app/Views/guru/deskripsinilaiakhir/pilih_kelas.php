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
                        <th>KELAS</th>
                        <th class="cellFit">NILAI PENGETAHUAN</th>
                        <th class="cellFit">NILAI KETERAMPILAN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($dtJadwal as $key => $value) { ?>
                        <tr style="cursor:  pointer;">
                            <td class="cellFit"><?= $no++ ?></td>
                            <td><?= $value['nama_kelas'] ?></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-success btn-sm" onclick="window.location.href='<?= base_url('DeskripsiNilaiAkhir/nilai/pengetahuan/' . $mapelID . '/' . $value['kelas_id']) ?>'">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='<?= base_url('DeskripsiNilaiAkhir/nilai/keterampilan/' . $mapelID . '/' . $value['kelas_id']) ?>'">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>