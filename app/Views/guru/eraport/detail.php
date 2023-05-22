<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>
<div class="col">
    <div class="card">
        <div class="card-body text-gray-900 p-0" id="formContainer" style="margin-left: 150px; margin-right: 110px; margin-top: 150px; margin-bottom: 110px;">
            <div class="mb-3 pb-2 d-flex justify-content-between" style="border-bottom: solid black 3px !important;">
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
                                <td></td>
                            </tr>
                            <tr>
                                <td>Semester</td>
                                <td class="px-3">:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Tahun Ajaran</td>
                                <td class="px-3">:</td>
                                <td><?= $dtTA['tahun_ajaran'] ?> (<?= ucfirst($dtSmt['semester']) ?>)</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <p class="font-weight-bold text-center">CAPAIAN HASIL BELAJAR</p>

            <p class="font-weight-bold mt-3 text-uppercase">a. sikap</p>
            <div class="my-3 ml-4 p-0">
                <p class="font-weight-bold w-100 text-capitalize">1. sikap spiritual</p>
                <table class="w-100" border="1">
                    <thead>
                        <tr class="text-center">
                            <td width="320px" class="py-2"> Predikat </td>
                            <td class="py-2"> Deksripsi </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center py-2">
                                <p>Baik</p>
                            </td>
                            <td class="px-3 py-2">
                                <p>Memiliki sikap spiritual yang Baik, antara lain konsisten dalam berdoa, toleran pada agama yang berbeda, taat beribadah, dan mensyukuri nikmat.</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-3 ml-4 p-0">
                <p class="font-weight-bold w-100 text-capitalize">2. sikap sosial</p>
                <table class="w-100" border="1">
                    <thead>
                        <tr class="text-center">
                            <td width="320px" class="py-2"> Predikat </td>
                            <td class="py-2"> Deksripsi </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center py-2">
                                <p>Baik</p>
                            </td>
                            <td class="px-3 py-2">
                                <p>Memiliki sikap spiritual yang Baik, antara lain konsisten dalam berdoa, toleran pada agama yang berbeda, taat beribadah, dan mensyukuri nikmat.</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="float-right" style="margin-top: 200px;">
                <p>Kebumen, 21 Juni 2023</p>
                <p class="text-center">Wali Kelas</p>
                <p class="font-weight-bold text-center" style="margin-top: 150px;">Wahyudistira, S.Pd</p>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body text-gray-900 p-0" id="formContainer" style="margin-left: 150px; margin-right: 110px; margin-top: 150px; margin-bottom: 110px;">
            <div class="mb-3 pb-2 d-flex justify-content-between" style="border-bottom: solid black 3px !important;">
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
                                <td></td>
                            </tr>
                            <tr>
                                <td>Semester</td>
                                <td class="px-3">:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Tahun Ajaran</td>
                                <td class="px-3">:</td>
                                <td><?= $dtTA['tahun_ajaran'] ?> (<?= ucfirst($dtSmt['semester']) ?>)</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <p class="font-weight-bold mt-3 text-uppercase">b. pengetahuan</p>
            <p class="text-capitalize font-weight-bold mt-3">kriteria ketuntasan minimal : 70</p>
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
                        <tr class="text-center">
                            <td>1</td>
                            <td class="text-left px-3">Pendidikan Agama dan Budi Pekerti</td>
                            <td>89</td>
                            <td class="text-center py-2">
                                <p>A</p>
                            </td>
                            <td class="px-3 py-2 text-left">
                                <p>Memiliki sikap spiritual yang Baik, antara lain konsisten dalam berdoa, toleran pada agama yang berbeda, taat beribadah, dan mensyukuri nikmat.</p>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td>2</td>
                            <td class="text-left px-3">Pendidikan Pancasila dan Kewarganegaraan</td>
                            <td>89</td>
                            <td class="text-center py-2">
                                <p>A</p>
                            </td>
                            <td class="px-3 py-2 text-left">
                                <p>Memiliki sikap spiritual yang Baik, antara lain konsisten dalam berdoa, toleran pada agama yang berbeda, taat beribadah, dan mensyukuri nikmat.</p>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td>3</td>
                            <td class="text-left px-3">Bahasa Indonesia</td>
                            <td>89</td>
                            <td class="text-center py-2">
                                <p>A</p>
                            </td>
                            <td class="px-3 py-2 text-left">
                                <p>Memiliki sikap spiritual yang Baik, antara lain konsisten dalam berdoa, toleran pada agama yang berbeda, taat beribadah, dan mensyukuri nikmat.</p>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td>4</td>
                            <td class="text-left px-3">Matematika</td>
                            <td>89</td>
                            <td class="text-center py-2">
                                <p>A</p>
                            </td>
                            <td class="px-3 py-2 text-left">
                                <p>Memiliki sikap spiritual yang Baik, antara lain konsisten dalam berdoa, toleran pada agama yang berbeda, taat beribadah, dan mensyukuri nikmat.</p>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td>5</td>
                            <td class="text-left px-3">Sejarah Indonesia</td>
                            <td>89</td>
                            <td class="text-center py-2">
                                <p>A</p>
                            </td>
                            <td class="px-3 py-2 text-left">
                                <p>Memiliki sikap spiritual yang Baik, antara lain konsisten dalam berdoa, toleran pada agama yang berbeda, taat beribadah, dan mensyukuri nikmat.</p>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td>6</td>
                            <td class="text-left px-3">Bahasa Inggris</td>
                            <td>89</td>
                            <td class="text-center py-2">
                                <p>A</p>
                            </td>
                            <td class="px-3 py-2 text-left">
                                <p>Memiliki sikap spiritual yang Baik, antara lain konsisten dalam berdoa, toleran pada agama yang berbeda, taat beribadah, dan mensyukuri nikmat.</p>
                            </td>
                        </tr>


                        <tr>
                            <td colspan="5" class="p-2 font-weight-bold">Kelompok B (Umum)</td>
                        </tr>
                        <tr class="text-center">
                            <td>1</td>
                            <td class="text-left px-3">Seni Budaya</td>
                            <td>89</td>
                            <td class="text-center py-2">
                                <p>A</p>
                            </td>
                            <td class="px-3 py-2 text-left">
                                <p>Memiliki sikap spiritual yang Baik, antara lain konsisten dalam berdoa, toleran pada agama yang berbeda, taat beribadah, dan mensyukuri nikmat.</p>
                            </td>
                        </tr>


                        <tr>
                            <td colspan="5" class="p-2 font-weight-bold">Kelompok C (Peminatan)</td>
                        </tr>
                        <tr class="text-center">
                            <td>1</td>
                            <td class="text-left px-3">Matematika</td>
                            <td>89</td>
                            <td class="text-center py-2">
                                <p>A</p>
                            </td>
                            <td class="px-3 py-2 text-left">
                                <p>Memiliki sikap spiritual yang Baik, antara lain konsisten dalam berdoa, toleran pada agama yang berbeda, taat beribadah, dan mensyukuri nikmat.</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="float-right" style="margin-top: 200px;">
                <p>Kebumen, 21 Juni 2023</p>
                <p class="text-center">Wali Kelas</p>
                <p class="font-weight-bold text-center" style="margin-top: 150px;">Wahyudistira, S.Pd</p>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body text-gray-900 p-0" id="formContainer" style="margin-left: 150px; margin-right: 110px; margin-top: 150px; margin-bottom: 110px;">
            <div class="mb-3 pb-2 d-flex justify-content-between" style="border-bottom: solid black 3px !important;">
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
                                <td></td>
                            </tr>
                            <tr>
                                <td>Semester</td>
                                <td class="px-3">:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Tahun Ajaran</td>
                                <td class="px-3">:</td>
                                <td><?= $dtTA['tahun_ajaran'] ?> (<?= ucfirst($dtSmt['semester']) ?>)</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <p class="font-weight-bold mt-3 text-uppercase">b. keterampilan</p>
            <p class="text-capitalize font-weight-bold mt-3">kriteria ketuntasan minimal : 70</p>
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
                        <tr class="text-center">
                            <td>1</td>
                            <td class="text-left px-3">Pendidikan Agama dan Budi Pekerti</td>
                            <td>89</td>
                            <td class="text-center py-2">
                                <p>A</p>
                            </td>
                            <td class="px-3 py-2 text-left">
                                <p>Memiliki sikap spiritual yang Baik, antara lain konsisten dalam berdoa, toleran pada agama yang berbeda, taat beribadah, dan mensyukuri nikmat.</p>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td>2</td>
                            <td class="text-left px-3">Pendidikan Pancasila dan Kewarganegaraan</td>
                            <td>89</td>
                            <td class="text-center py-2">
                                <p>A</p>
                            </td>
                            <td class="px-3 py-2 text-left">
                                <p>Memiliki sikap spiritual yang Baik, antara lain konsisten dalam berdoa, toleran pada agama yang berbeda, taat beribadah, dan mensyukuri nikmat.</p>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td>3</td>
                            <td class="text-left px-3">Bahasa Indonesia</td>
                            <td>89</td>
                            <td class="text-center py-2">
                                <p>A</p>
                            </td>
                            <td class="px-3 py-2 text-left">
                                <p>Memiliki sikap spiritual yang Baik, antara lain konsisten dalam berdoa, toleran pada agama yang berbeda, taat beribadah, dan mensyukuri nikmat.</p>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td>4</td>
                            <td class="text-left px-3">Matematika</td>
                            <td>89</td>
                            <td class="text-center py-2">
                                <p>A</p>
                            </td>
                            <td class="px-3 py-2 text-left">
                                <p>Memiliki sikap spiritual yang Baik, antara lain konsisten dalam berdoa, toleran pada agama yang berbeda, taat beribadah, dan mensyukuri nikmat.</p>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td>5</td>
                            <td class="text-left px-3">Sejarah Indonesia</td>
                            <td>89</td>
                            <td class="text-center py-2">
                                <p>A</p>
                            </td>
                            <td class="px-3 py-2 text-left">
                                <p>Memiliki sikap spiritual yang Baik, antara lain konsisten dalam berdoa, toleran pada agama yang berbeda, taat beribadah, dan mensyukuri nikmat.</p>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td>6</td>
                            <td class="text-left px-3">Bahasa Inggris</td>
                            <td>89</td>
                            <td class="text-center py-2">
                                <p>A</p>
                            </td>
                            <td class="px-3 py-2 text-left">
                                <p>Memiliki sikap spiritual yang Baik, antara lain konsisten dalam berdoa, toleran pada agama yang berbeda, taat beribadah, dan mensyukuri nikmat.</p>
                            </td>
                        </tr>


                        <tr>
                            <td colspan="5" class="p-2 font-weight-bold">Kelompok B (Umum)</td>
                        </tr>
                        <tr class="text-center">
                            <td>1</td>
                            <td class="text-left px-3">Seni Budaya</td>
                            <td>89</td>
                            <td class="text-center py-2">
                                <p>A</p>
                            </td>
                            <td class="px-3 py-2 text-left">
                                <p>Memiliki sikap spiritual yang Baik, antara lain konsisten dalam berdoa, toleran pada agama yang berbeda, taat beribadah, dan mensyukuri nikmat.</p>
                            </td>
                        </tr>


                        <tr>
                            <td colspan="5" class="p-2 font-weight-bold">Kelompok C (Peminatan)</td>
                        </tr>
                        <tr class="text-center">
                            <td>1</td>
                            <td class="text-left px-3">Matematika</td>
                            <td>89</td>
                            <td class="text-center py-2">
                                <p>A</p>
                            </td>
                            <td class="px-3 py-2 text-left">
                                <p>Memiliki sikap spiritual yang Baik, antara lain konsisten dalam berdoa, toleran pada agama yang berbeda, taat beribadah, dan mensyukuri nikmat.</p>
                            </td>
                        </tr>
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
                        <td>70</td>
                        <td>Nilai < 70</td>
                        <td>70 ≤ Nilai ≤ 79</td>
                        <td>80 ≤ Nilai ≤ 89</td>
                        <td>Nilai ≥ 90</td>
                    </tr>
                </tbody>
            </table>
            <div class="float-right" style="margin-top: 200px;">
                <p>Kebumen, 21 Juni 2023</p>
                <p class="text-center">Wali Kelas</p>
                <p class="font-weight-bold text-center" style="margin-top: 150px;">Wahyudistira, S.Pd</p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>