<div class="tab-pane fade show active py-1" id="hasil-akhir" role="tabpanel" aria-labelledby="hasil-akhir-tab">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="cellFit">No</th>
                <th>Nama Tugas</th>
                <th>Hasil Akhir</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $dtSiswa['nama'] ?></td>
                <td>
                    <?php
                    $result = 0;
                    foreach ($dtKategori as $dt) {
                        if (!is_null($dtNilai[$dt['kt_id']])) {
                            $result += $dt['kt_bobot'] / 100 * $dtNilai[$dt['kt_id']]['na_nilai'];
                        }
                    }
                    echo $result;
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="tab-pane fade py-1" id="detail-nilai" role="tabpanel" aria-labelledby="detail-nilai-tab">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="cellFit">No</th>
                <th>Nama Tugas</th>
                <th>Deskripsi Tugas</th>
                <th class="cellFit">Bobot</th>
                <th class="cellFit">Nilai</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($dtKategori as $dt) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $dt['kt_nama'] ?></td>
                    <td><?= $dt['kt_deskripsi'] ?></td>
                    <td class="text-center"><?= $dt['kt_bobot'] ?>%</td>
                    <td class="text-center"><?= (is_null($dtNilai[$dt['kt_id']])) ? '-' : $dtNilai[$dt['kt_id']]['na_nilai'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>