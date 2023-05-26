<div class="card border-0 shadow-none" style="height: 29.7cm; margin-top:3cm;">
    <div class="card-body text-gray-900 p-0" id="formContainer">
        <div class="mb-3 pb-2 d-flex justify-content-between" style="border-bottom: solid black 3px !important;">
            <?= $this->include('guru/eraport/partial/header'); ?>
        </div>
        <p class="font-weight-bold mt-3 text-uppercase">D. EKSTRAKURIKULER</p>
        <div class="mt-3 p-0">
            <table class="w-100" border="1">
                <thead class="font-weight-bold">
                    <tr class="text-center">
                        <td width="50px" class="py-2">No</td>
                        <td width="200px" class="py-2">Kegiatan Ekstrakurikuler</td>
                        <td width="100px" class="py-2">Predikat</td>
                        <td class="py-2">Deksripsi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <tr class="text-center">
                        <td><?= $no++ ?></td>
                        <td class="text-left px-3">Ada</td>
                        <td class="py-2">asd</td>
                        <td class="px-3 py-2 text-left">asdsad</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p class="font-weight-bold mt-3 text-uppercase">e. prestasi</p>
        <div class="mt-3 p-0">
            <table class="w-100" border="1">
                <thead class="font-weight-bold">
                    <tr class="text-center">
                        <td width="50px" class="py-2">No</td>
                        <td width="200px" class="py-2">Jenis Kegiatan</td>
                        <td class="py-2">Keterangan</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <tr class="text-center">
                        <td><?= $no++ ?></td>
                        <td class="text-left px-3">Ada</td>
                        <td class="px-3 py-2 text-left">asdsad</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p class="font-weight-bold mt-3 text-uppercase">f. ketidakhadiran</p>
        <table class="w-100" border="1">
            <tr>
                <td class="px-3">Sakit</td>
                <td class="text-center w-50"><?php ?> hari</td>
            </tr>
            <tr>
                <td class="px-3">Ijin</td>
                <td class="text-center w-50"><?php ?> hari</td>
            </tr>
            <tr>
                <td class="px-3">Tanpa Keterangan</td>
                <td class="text-center w-50"><?php ?> hari</td>
            </tr>
        </table>
        <p class="font-weight-bold mt-3 text-uppercase">g. catatan wali kelas</p>
        <div class="border border-dark p-3">Belajar lagi</div>
        <p class="font-weight-bold mt-3 text-uppercase">h. tanggapan orang tua</p>
        <div class="border border-dark p-3">Belajar lagi</div>

        <table class="w-100" style="margin-top: 70px;">
            <tr>
                <td class="text-center">
                    <p>Mengetahui,</p>
                    <p class="text-center">Orang Tua / Wali</p>
                    <p class="font-weight-bold text-center text-uppercase" style="margin-top: 80px;"><?= $dtKelas['nama'] ?></p>
                </td>
                <td></td>
                <td class="text-center">
                    <p>Kebumen, <?= date("d") . ' ' . $listBulan[(int)date("m")] . ' ' . date("Y")  ?></p>
                    <p class="text-center">Wali Kelas</p>
                    <p class="font-weight-bold text-center text-uppercase" style="margin-top: 80px;"><?= $dtKelas['nama'] ?></p>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="text-center">
                    <p>Mengetahui,</p>
                    <p class="text-center">Kepala Sekolah</p>
                    <p class="font-weight-bold text-center text-uppercase" style="margin-top: 80px;"><?= $dtKelas['nama'] ?></p>
                </td>
            </tr>
        </table>
    </div>