<div class="tab-pane fade show active table-responsive py-1" id="hasil-akhir" role="tabpanel" aria-labelledby="hasil-akhir-tab">
    <?php if (count($dtNilai[0]) == 3) : ?>
        <div class="alert alert-warning" role="alert">
            <b><i class="fas fa-exclamation-triangle"></i></b> Belum ada data kategori tugas
        </div>
    <?php endif ?>
    <table class="table table-striped table-bordered w-auto">
        <thead>
            <tr>
                <th class="cellFit">NO</th>
                <th class="cellFit">NIS</th>
                <th>NAMA</th>
                <th>HASIL AKHIR</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($dtNilai as $nilai) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $nilai['nis'] ?></td>
                    <td><?= $nilai['nama'] ?></td>
                    <td>
                        <?php
                        $result = 0;
                        foreach ($dtKategori as $kategori) {
                            if (!is_null($nilai[$kategori['kt_id']])) {
                                $result += $kategori['kt_bobot'] / 100 * $nilai[$kategori['kt_id']]['na_nilai'];
                            }
                        }
                        echo $result;
                        ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<div class="tab-pane fade table-responsive py-1" id="detail-nilai" role="tabpanel" aria-labelledby="detail-nilai-tab">
    <?php if (count($dtNilai[0]) == 3) : ?>
        <div class="alert alert-warning" role="alert">
            <b><i class="fas fa-exclamation-triangle"></i></b> Belum ada data kategori tugas
        </div>
    <?php endif ?>
    <table class="table table-striped table-bordered w-auto">
        <thead>
            <tr>
                <th class="cellFit">NO</th>
                <th class="cellFit">NIS</th>
                <th>NAMA</th>
                <?php foreach ($dtKategori as $dt) : ?>
                    <th class="cellFit"><?= $dt['kt_nama'] ?></th>
                <?php endforeach ?>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($dtNilai as $nilai) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $nilai['nis'] ?></td>
                    <td><?= $nilai['nama'] ?></td>
                    <?php foreach ($dtKategori as $kategori) : ?>
                        <td><?= (is_null($nilai[$kategori['kt_id']])) ? '-' : $nilai[$kategori['kt_id']]['na_nilai'] ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>