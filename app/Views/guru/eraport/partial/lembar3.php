<div class="card border-0 shadow-none" style="height: 32.7cm; margin-top:3cm;">
    <div class="card-body text-gray-900 p-0" id="formContainer">
        <div class="mb-3 pb-2 d-flex justify-content-between" style="border-bottom: solid black 3px !important;">
            <?= $this->include('guru/eraport/partial/header'); ?>
        </div>
        <p class="font-weight-bold mt-3 text-uppercase">c. keterampilan</p>
        <p class="text-capitalize font-weight-bold mt-3">kriteria ketuntasan minimal : <?= $dtTA['kkm'] ?></p>
        <div class="mt-3 p-0">
            <table class="w-100" border="1">
                <thead class="font-weight-bold">
                    <tr class="text-center">
                        <td width="50px" class="py-2">No</td>
                        <td width="200px" class="py-2">Mata Pelajaran</td>
                        <td width="100px" class="py-2">Nilai</td>
                        <td width="100px" class="py-2">Predikat</td>
                        <td class="py-2">Deksripsi</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5" class="p-2 font-weight-bold">Kelompok A (Umum)</td>
                    </tr>
                    <?php $no = 1; ?>
                    <?php foreach ($dtJadwal as $jadwal) : ?>
                        <?php if ($jadwal['kategori_mapel'] == 'Kelompok A (Umum)') : ?>
                            <tr class="text-center">
                                <td><?= $no++ ?></td>
                                <td class="text-left px-3"><?= $jadwal['nama_matapelajaran'] ?></td>
                                <td><?= $dtNA[$jadwal['mapel_id']]['nilaiKeterampilan'] ?></td>
                                <td class="text-center py-2">
                                    <p><?= getGrade($dtTA['kkm'], $dtNA[$jadwal['mapel_id']]['nilaiKeterampilan']) ?></p>
                                </td>
                                <td class="px-3 py-2 text-left">
                                    <p><?= $dtDNAK[$jadwal['jadwal_id']] ?></p>
                                </td>
                            </tr>
                        <?php endif ?>
                    <?php endforeach ?>
                    <tr>
                        <td colspan="5" class="p-2 font-weight-bold">Kelompok B (Umum)</td>
                    </tr>
                    <?php foreach ($dtJadwal as $jadwal) : ?>
                        <?php if ($jadwal['kategori_mapel'] == 'Kelompok B (Umum)') : ?>
                            <tr class="text-center">
                                <td><?= $no++ ?></td>
                                <td class="text-left px-3"><?= $jadwal['nama_matapelajaran'] ?></td>
                                <td><?= $dtNA[$jadwal['mapel_id']]['nilaiKeterampilan'] ?></td>
                                <td class="text-center py-2">
                                    <p><?= getGrade($dtTA['kkm'], $dtNA[$jadwal['mapel_id']]['nilaiKeterampilan']) ?></p>
                                </td>
                                <td class="px-3 py-2 text-left">
                                    <p><?= $dtDNAK[$jadwal['jadwal_id']] ?></p>
                                </td>
                            </tr>
                        <?php endif ?>
                    <?php endforeach ?>
                    <tr>
                        <td colspan="5" class="p-2 font-weight-bold">Kelompok C (Peminatan)</td>
                    </tr>
                    <?php foreach ($dtJadwal as $jadwal) : ?>
                        <?php if ($jadwal['kategori_mapel'] == 'Kelompok C (Peminatan)') : ?>
                            <tr class="text-center">
                                <td><?= $no++ ?></td>
                                <td class="text-left px-3"><?= $jadwal['nama_matapelajaran'] ?></td>
                                <td><?= $dtNA[$jadwal['mapel_id']]['nilaiKeterampilan'] ?></td>
                                <td class="text-center py-2">
                                    <p><?= getGrade($dtTA['kkm'], $dtNA[$jadwal['mapel_id']]['nilaiKeterampilan']) ?></p>
                                </td>
                                <td class="px-3 py-2 text-left">
                                    <p><?= $dtDNAK[$jadwal['jadwal_id']] ?></p>
                                </td>
                            </tr>
                        <?php endif ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <p class="mt-3">Tabel Interval Predikat Berdasarkan KKM</p>
        <table border="1" class="w-100 text-center">
            <thead class="font-weight-bold text-uppercase">
                <tr>
                    <td rowspan="2">KKM</td>
                    <td colspan="4">Predikat</td>
                </tr>
                <tr>
                    <td>D</td>
                    <td>C</td>
                    <td>B</td>
                    <td>A</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $dtTA['kkm'] ?></td>
                    <td>Nilai < <?= is_int(100 - getInterval($dtTA['kkm']) * 3) ? 100 - getInterval($dtTA['kkm']) * 3 : round(100 - getInterval($dtTA['kkm']) * 3, 2) ?></td>
                    <td>
                        <?= is_int(100 - getInterval($dtTA['kkm']) * 3) ? 100 - getInterval($dtTA['kkm']) * 3 : round(100 - getInterval($dtTA['kkm']) * 3, 2) ?>
                        ≤ Nilai ≤
                        <?= is_int(100 - getInterval($dtTA['kkm']) * 2 - 1) ? 100 - getInterval($dtTA['kkm']) * 2 - 1 : round(100 - getInterval($dtTA['kkm']) * 2 - 1, 2) ?></td>
                    <td>
                        <?= is_int(100 - getInterval($dtTA['kkm']) * 2) ? 100 - getInterval($dtTA['kkm']) * 2 : round(100 - getInterval($dtTA['kkm']) * 2, 2) ?>
                        ≤ Nilai ≤
                        <?= is_int(100 - getInterval($dtTA['kkm']) - 1) ? 100 - getInterval($dtTA['kkm']) - 1 : round(100 - getInterval($dtTA['kkm']) - 1, 2) ?>
                    </td>
                    <td>Nilai ≥ <?= is_int(100 - getInterval($dtTA['kkm'])) ? 100 - getInterval($dtTA['kkm']) : round(100 - getInterval($dtTA['kkm']), 2) ?></td>
                </tr>
            </tbody>
        </table>
        <?= $this->include('guru/eraport/partial/ttd'); ?>
    </div>
</div>