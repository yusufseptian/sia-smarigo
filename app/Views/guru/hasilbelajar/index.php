<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>
<div class="col">
    <div class="card">
        <div class="card-body">
            <?php if (session('log_auth')['role'] == "SISWA" || session('log_auth')['role'] == "ORTU") : ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="cellFit">NO</th>
                            <th>KELAS</th>
                            <th>TAHUN AJARAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($dtTahunAjaran as $key => $value) { ?>
                            <tr style="cursor: pointer;" onclick="window.location.href='<?= base_url('hasilbelajar/mapel/' . $value['id']) ?>'">
                                <td><?= $no++ ?></td>
                                <td><?= $value['nama_kelas'] ?></td>
                                <td><?= $value['tahun_ajaran'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php else : ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="cellFit">NO</th>
                            <th>TAHUN AJARAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($dtTahunAjaran as $key => $value) { ?>
                            <tr style="cursor: pointer;" onclick="selectClass(<?= $value['id'] ?>)" data-toggle="modal" data-target="#selectClassModel">
                                <td><?= $no++ ?></td>
                                <td><?= $value['tahun_ajaran'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php endif ?>
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