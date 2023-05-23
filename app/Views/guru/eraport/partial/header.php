<div class="row w-100 mx-1">
    <div class="col-8">
        <table>
            <tr>
                <td>Nama Sekolah</td>
                <td class="px-3">:</td>
                <td></td>
            </tr>
            <tr>
                <td>Alamat Sekolah</td>
                <td class="px-3">:</td>
                <td></td>
            </tr>
            <tr>
                <td>Nama Peserta Didik</td>
                <td class="px-3">:</td>
                <td><?= $dtSiswa['nama'] ?></td>
            </tr>
            <tr>
                <td>No.Induk / NISN</td>
                <td class="px-3">:</td>
                <td><?= $dtSiswa['nis'] ?> / <?= $dtSiswa['nis'] ?></td>
            </tr>
        </table>
    </div>
    <div class="col-4">
        <table>
            <tr>
                <td>Kelas</td>
                <td class="px-3">:</td>
                <td><?= $dtKelas['nama_kelas'] ?></td>
            </tr>
            <tr>
                <td>Semester</td>
                <td class="px-3">:</td>
                <td><?= ucfirst($dtSmt['semester']) ?></td>
            </tr>
            <tr>
                <td>Tahun Ajaran</td>
                <td class="px-3">:</td>
                <td><?= $dtTA['tahun_ajaran'] ?> (<?= ucfirst($dtSmt['semester']) ?>)</td>
            </tr>
        </table>
    </div>
</div>