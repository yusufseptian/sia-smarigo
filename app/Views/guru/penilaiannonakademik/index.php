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
                        <td><?= $dtTA['tahun_ajaran'] ?> (<?= (is_null($dtSmt)) ? '<span class="text-danger">Semester Belum Dimulai</span>' : ucfirst($dtSmt['semester']) ?>)</td>
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
                                <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='<?= base_url('PenilaianNonAkademik/nilai/' . $dt['nis']) ?>'">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal Pilih Kelas -->
<div class="modal fade" id="selectClassModel" tabindex="-1" aria-labelledby="selectClassModelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="selectClassModelLabel">Pilih Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="cellFit">#</th>
                            <th>Kelas</th>
                        </tr>
                    </thead>
                    <tbody id="dataKelas">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="hyperlink()">Lihat</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('bottomScript') ?>
<script>
    <?php if (session('log_auth')['role'] == "GURU") : ?>
        let idTahunAjaran = 0;
        const dtKelas = <?= json_encode($dtKelas) ?>;

        function selectClass(id) {
            idTahunAjaran = id;
            $("#dataKelas").empty();
            dtKelas.forEach(element => {
                if (element.idTahunAjaran == id) {
                    var radio = $("<input type='radio' name='rdClass'>");
                    radio.attr('value', element.idKelas);
                    radio.attr('id', 'rdKelas' + element.idKelas);
                    radio.attr('required', '');
                    var tdRadio = $("<td></td>").append(radio);
                    var label = $("<label></label>").html(element.namaKelas);
                    label.attr('for', 'rdKelas' + element.idKelas);
                    var tdLabel = $("<td></td>").append(label);
                    $("#dataKelas").append($("<tr></tr>").append(tdRadio, tdLabel));
                }
            });
        }

        function hyperlink() {
            let kelas = $("input[name='rdClass']:checked");
            if (kelas.length == 0) {
                Swal.fire(
                    'Gagal!',
                    'Mohon pilih kelas terlebih dahulu!',
                    'error'
                );
            } else {
                window.location.href = '<?= base_url("hasilbelajar/mapel") ?>/' + idTahunAjaran + '/' + kelas.val();
            }
        }
    <?php endif ?>
</script>
<?= $this->endSection() ?>