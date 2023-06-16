<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>
<div class="col">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span class="my-auto">Penilaian</span>
            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalAddKategori">Info</button>
        </div>
        <div class="card-body">
            <form action="<?= base_url("PenilaianAkademik/insertnilai/$mapelID/$kelasID/$kategoriID") ?>" method="post" id="formNilai">
                <div class="mb-3 border-bottom d-flex justify-content-between">
                    <table>
                        <tr>
                            <td>Mapel</td>
                            <td class="px-3">:</td>
                            <td><?= $dtMapel['nama_matapelajaran'] ?></td>
                        </tr>
                        <tr>
                            <td>Kategori Tugas</td>
                            <td class="px-3">:</td>
                            <td><?= $dtKategori['kt_nama'] ?></td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td class="px-3">:</td>
                            <td><?= $dtKelas['nama_kelas'] ?></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>Tahun Ajaran</td>
                            <td class="px-3">:</td>
                            <td><?= $dtTA['tahun_ajaran'] ?> (<?= ucfirst($dtSmt['semester']) ?>)</td>
                        </tr>
                        <tr>
                            <td>Bobot Tugas</td>
                            <td class="px-3">:</td>
                            <td><?= $dtKategori['kt_bobot'] ?>%</td>
                        </tr>
                        <tr>
                            <td>KKM</td>
                            <td class="px-3">:</td>
                            <td><?= $dtKategori['kt_kkm'] ?></td>
                        </tr>
                    </table>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="cellFit">NO</th>
                            <th>NIS</th>
                            <th>NAMA</th>
                            <th class="cellFit">NILAI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $listID = [];
                        foreach ($dtSiswa as $key => $value) { ?>
                            <tr>
                                <td class="cellFit text-center"><?= $no++ ?></td>
                                <td><?= $value['nis'] ?></td>
                                <td><?= $value['nama'] ?></td>
                                <td>
                                    <input type="number" name="txtNilai_<?= $value['nis'] ?>" id="txtNilai_<?= $value['nis'] ?>" min="0" max="100" value="<?= ($isCompleted) ? $value['na_nilai'] : '' ?>" <?= ($isCompleted) ? 'disabled' : '' ?> required>
                                </td>
                            </tr>

                        <?php
                            array_push($listID, 'txtNilai_' . $value['nis']);
                        }
                        ?>
                    </tbody>
                </table>
                <div class="text-center my-1">
                    <button type="button" class="btn btn-success <?= ($isCompleted) ? 'd-none' : '' ?>" id="btnSubmit" onclick="submitNilai()">Submit</button>
                    <?php if ($isCompleted) : ?>
                        <button type="button" class="btn btn-warning" id="btnEdit">Edit</button>
                        <button type="button" class="btn btn-danger d-none" id="btnBatalEdit">Batal</button>
                    <?php endif ?>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Info -->
<div class="modal fade" id="modalAddKategori" tabindex="-1" aria-labelledby="modalAddKategoriLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddKategoriLabel">Informasi Tugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <h6 class="mb-0"><b>Mata Pelajaran</b></h6>
                    <p class="text-muted"><i><?= $dtMapel['nama_matapelajaran'] ?></i></p>
                </div>
                <div class="mb-3">
                    <h6 class="mb-0"><b>Kelas</b></h6>
                    <p class="text-muted"><i><?= $dtKelas['nama_kelas'] ?></i></p>
                </div>
                <div class="mb-3">
                    <h6 class="mb-0"><b>Nama Tugas</b></h6>
                    <p class="text-muted"><i><?= $dtKategori['kt_nama'] ?></i></p>
                </div>
                <div class="mb-3">
                    <h6 class="mb-0"><b>Tanggal Pemberian Tugas</b></h6>
                    <p class="text-muted"><i><?= date("d/m/Y", strtotime($dtKategori['kt_tanggal'])) ?></i></p>
                </div>
                <div class="mb-3">
                    <h6 class="mb-0"><b>Tanggal Penilaian</b></h6>
                    <p class="text-muted"><i><?= (is_null($dtKategori['kt_assessed_at'])) ? 'Belum Ada' : date("d/m/Y H:i:s", strtotime($dtKategori['kt_assessed_at'])) ?></i></p>
                </div>
                <div class="mb-3">
                    <h6 class="mb-0"><b>Tanggal Terakhir Nilai Dirubah</b></h6>
                    <p class="text-muted"><i><?= (is_null($dtKategori['kt_value_changed_at'])) ? 'Belum Ada' : date("d/m/Y H:i:s", strtotime($dtKategori['kt_value_changed_at'])) ?></i></p>
                </div>
                <div class="mb-3">
                    <h6 class="mb-0"><b>Bobot Tugas</b></h6>
                    <p class="text-muted"><i><?= $dtKategori['kt_bobot'] ?>%</i></p>
                </div>
                <div class="mb-3">
                    <h6 class="mb-0"><b>KKM</b></h6>
                    <p class="text-muted"><i><?= $dtKategori['kt_kkm'] ?></i></p>
                </div>
                <div class="mb-3">
                    <h6 class="mb-0"><b>Deskripsi Terkait Tugas</b></h6>
                    <p class="text-muted"><i><?= (trim($dtKategori['kt_deskripsi']) == "") ? 'Tidak Ada' : $dtKategori['kt_deskripsi'] ?></i></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('bottomScript') ?>
<script>
    const listID = <?= json_encode($listID) ?>

    function submitNilai() {
        let valid = true;
        listID.forEach(element => {
            if ($("#" + element).val() == "") {
                valid = false;
                return false;
            } else {
                if (Number($("#" + element).val()) < 0 || Number($("#" + element).val()) > 100) {
                    valid = false;
                    return false;
                }
            }
        });
        if (valid) {
            Swal.fire({
                title: 'SIA-SMARIGO?',
                text: "Apakah anda yakin memasukan nilai tersebut. Anda masih bisa merubahnya selama tahun ajaran saat ini masih aktif.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1cc88a',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Lanjutan',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#formNilai").submit();
                }
            })
        } else {
            Swal.fire(
                'Gagal!',
                'Mohon lengkapi data dengan tepat!',
                'error'
            );
        }
    }

    $("#btnEdit").click(function() {
        listID.forEach(element => {
            $("#" + element).removeAttr('disabled');
        });
        $("#btnEdit").addClass('d-none');
        $("#btnSubmit").removeClass('d-none');
        $("#btnBatalEdit").removeClass('d-none');
        $("#formNilai").attr('action', "<?= base_url("PenilaianAkademik/editnilai/$mapelID/$kelasID/$kategoriID") ?>");
    });

    $("#btnBatalEdit").click(function() {
        // listID.forEach(element => {
        //     $("#" + element).attr('disabled', '');
        // });
        // $("#btnEdit").removeClass('d-none');
        // $("#btnSubmit").addClass('d-none');
        // $("#btnBatalEdit").addClass('d-none');
        // $("#formNilai").attr('action', "");
        window.location.reload();
    });

    $(document).ready(function() {

    });
</script>
<?= $this->endSection() ?>