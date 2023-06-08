<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>
<div class="col">
    <div class="card">
        <div class="card-body">
            <div class="border-bottom d-flex justify-content-between mb-3">
                <table>
                    <tr>
                        <td>Kelas</td>
                        <td class="px-3">:</td>
                        <td><?= $dtKelas['nama_kelas'] ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Siswa</td>
                        <td class="px-3">:</td>
                        <td><?= count($dtSiswa) ?></td>
                    </tr>
                    <tr>
                        <td>Tahun Ajaran</td>
                        <td class="px-3">:</td>
                        <td><?= $dtTA['tahun_ajaran'] ?> (<?= (is_null($dtSmt)) ? '<span class="text-danger">Tidak ada semester yang aktif</span>' : ucfirst($dtSmt['semester']) ?>)</td>
                    </tr>
                </table>
            </div>
            <table id="example1" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td class="cellFit">NO</td>
                        <td>NIS</td>
                        <td>NAMA</td>
                        <td>AKSI</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    <?php foreach ($dtSiswa as $dt) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $dt['nis'] ?></td>
                            <td><?= $dt['nama'] ?></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='<?= base_url('ERaport/nilai/' . $dt['nis']) ?>'">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>