<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>
<?= $this->include('guru/eraport/partial/kkm'); ?>
<div class="col">
    <div class="card">
        <div class="card-header">
            Masukan Deskripsi Terkait Siswa
        </div>
        <div class="card-body">
            <div class="border-bottom pb-3 mb-3">
                <h3><b>Deskripsi Nilai Akhir <?= ucfirst($kategori) ?></b></h3>
                <div class="d-flex justify-content-between">
                    <div>
                        <table>
                            <tr>
                                <td>Mapel</td>
                                <td class="px-3">:</td>
                                <td><?= $dtMapel['nama_matapelajaran'] ?></td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td class="px-3">:</td>
                                <td><?= $dtKelas['nama_kelas'] ?></td>
                            </tr>
                            <tr>
                                <td>Tahun Ajaran</td>
                                <td class="px-3">:</td>
                                <td><?= $dtTA['tahun_ajaran'] ?> (<?= ucfirst($dtSmt['semester']) ?>)</td>
                            </tr>
                        </table>
                    </div>
                    <?php if ($isFinished) : ?>
                        <div class="d-flex">
                            <button type="button" id="btnEdit" class="btn btn-warning my-auto">Edit</button>
                            <button type="button" id="btnCancleEdit" class="btn btn-danger my-auto d-none" onclick="window.location.reload()">Batal</button>
                        </div>
                    <?php endif ?>
                </div>
            </div>
            <form action="<?= ($isFinished) ? '' : base_url("DeskripsiNilaiAkhir/save/$kategori/$mapelID/$kelasID") ?>" method="post" id="formDeskripsiNA">
                <table id="tbSiswa" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NIS</th>
                            <th>NAMA</th>
                            <th>NILAI</th>
                            <th>PREDIKAT</th>
                            <th>DESKRIPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($isFinished) {
                            $listID = [];
                        }
                        $no = 1;
                        foreach ($dtSiswa as $key => $value) { ?>
                            <tr>
                                <td class="cellFit text-center"><?= $no++ ?></td>
                                <td class="cellFit"><?= $value['nis'] ?></td>
                                <td><?= $value['nama'] ?></td>
                                <td class="cellFit text-center"><?= $dtNilaiAkademik[$value['id']] ?></td>
                                <td class="cellFit text-center"><?= getGrade($dtTA['kkm'], $dtNilaiAkademik[$value['id']]) ?></td>
                                <td>
                                    <div class="form-group d-flex">
                                        <?php if ($isFinished) : ?>
                                            <textarea name="txtDeskripsi<?= $value['nis'] ?>" id="txtDeskripsi<?= $value['nis'] ?>" class="form-control" rows="2" onfocus="showHelp('#btnDeskripsiNilai<?= $value['nis'] ?>', this.id)" disabled><?= $value['dna_deskripsi'] ?></textarea>
                                            <?php array_push($listID, "txtDeskripsi" . $value['nis']); ?>
                                        <?php else : ?>
                                            <textarea name="txtDeskripsi<?= $value['nis'] ?>" id="txtDeskripsi<?= $value['nis'] ?>" class="form-control" rows="2" onfocus="showHelp('#btnDeskripsiNilai<?= $value['nis'] ?>', this.id)"></textarea>
                                        <?php endif ?>
                                        <div class="d-none flex-column btn-help-deskripsi" id="btnDeskripsiNilai<?= $value['nis'] ?>">
                                            <button type="button" class="btn btn-xs btn-primary" style="height: fit-content;" onclick="saveDeskripsi('#txtDeskripsi<?= $value['nis'] ?>')"><i class="fas fa-save"></i></button>
                                            <button type="button" class="btn btn-xs btn-success" style="height: fit-content;" data-toggle="modal" data-target="#modalListDesk"><i class="fas fa-random"></i></button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="mt-3 text-center <?= ($isFinished) ? 'd-none' : '' ?>" id="containerBtnSave">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal List Deskripsi -->
<div class="modal fade" id="modalListDesk" tabindex="-1" aria-labelledby="modalListDeskLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalListDeskLabel">Pilih Deskripsi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered" id="tableListDesk">
                    <thead>
                        <tr>
                            <th class="cellFit">#</th>
                            <th>Deskripsi</th>
                            <th class="cellFit">Hapus</th>
                        </tr>
                    </thead>
                    <tbody id="listDesk">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCloseModalListDesk">Close</button>
                <button type="button" class="btn btn-primary" id="btnReplaceModalListDesk">Replace</button>
            </div>
        </div>
    </div>
</div>

<div class="d-none" id="loadContainer">
    <div class="m-auto text-center text-white" style="width: fit-content;">
        <div class="loader"></div>
        <div id="textLoad"></div>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('bottomScript'); ?>
<script>
    <?php if ($isFinished) : ?>
        const listID = <?= json_encode($listID) ?>;
        $("#btnEdit").click(function() {
            $("#btnCancleEdit").removeClass('d-none');
            $("#btnEdit").remove();
            $("#containerBtnSave").removeClass('d-none');
            $("#formDeskripsiNA").attr('action', '<?= base_url("DeskripsiNilaiAkhir/edit/$kategori/$mapelID/$kelasID") ?>');
            listID.forEach(element => {
                $("#" + element).removeAttr('disabled');
            });
        });
    <?php endif ?>

    function showLoad(text) {
        $("#loadContainer").removeClass('d-none');
        $("#textLoad").html(text);
        $("#loadContainer").addClass('d-flex');
    }

    function hideLoad() {
        $("#loadContainer").addClass('d-none');
        $("#loadContainer").removeClass('d-flex');
    }

    let idTextArea = null;

    function saveDeskripsi(id) {
        showLoad('Menyimpan deskripsi');
        $.ajax({
            type: "POST",
            url: '<?= base_url('listdeskripsi/save') ?>',
            data: {
                "listdesk_deskripsi": $(id).val()
            },
            success: function(response) {
                $("#tableListDesk").DataTable().destroy();
                $("#listDesk").empty();
                setListDesk();
                alert(response.msg);
                hideLoad();
            },
            error: function(request, status, error) {
                alert(request.responseText);
                hideLoad();
            }
        });
    }

    function showHelp(id, textAreaID) {
        $('.btn-help-deskripsi').addClass('d-none');
        $('.btn-help-deskripsi').removeClass('d-flex');
        $(id).removeClass('d-none');
        $(id).addClass('d-flex');
        idTextArea = textAreaID;
    }

    function deleteDesk(id) {
        showLoad('Menghapus deskripsi');
        $.ajax({
            type: "POST",
            url: '<?= base_url('listdeskripsi/deletes') ?>',
            data: {
                "idDeskripsi": id
            },
            success: function(response) {
                if (response.success) {
                    $("#tableListDesk").DataTable().destroy();
                    $("#listDesk").empty();
                    setListDesk();
                    alert(response.msg);
                    hideLoad();
                } else {
                    alert(response.msg);
                }
                hideLoad();
            },
            error: function(request, status, error) {
                alert(request.responseText);
                hideLoad();
            }
        });
    }

    function setListDesk() {
        showLoad('Mengambil data deskripsi');
        $.ajax({
            type: "POST",
            url: '<?= base_url('listdeskripsi/get') ?>',
            data: {
                "test": "test"
            },
            success: function(response) {
                response.data.forEach(element => {
                    let tr = $("<tr></tr>");
                    let tdInput = $("<td></td>");
                    let input = $("<input type='radio' name='rdDeskripsi'>");
                    input.attr('value', element.listdesk_deskripsi);
                    input.attr('id', 'rdDestkripsi' + element.listdesk_id);
                    tdInput.append(input);
                    let tdLabel = $("<td></td>");
                    let label = $("<label style='cursor:pointer'></label>");
                    label.attr('for', 'rdDestkripsi' + element.listdesk_id);
                    label.html(element.listdesk_deskripsi);
                    tdLabel.append(label);
                    let tdDelete = $("<td align='center'></td>");
                    let btnDelete = $("<button class='btn btn-sm btn-danger'></button>");
                    btnDelete.attr('onclick', 'deleteDesk(' + element.listdesk_id + ')');
                    btnDelete.append($('<i class="fas fa-trash"></i>'));
                    tdDelete.append(btnDelete);
                    tr.append(tdInput, tdLabel, tdDelete);
                    $("#listDesk").append(tr);
                });
                $("#tableListDesk").DataTable();
                hideLoad();
            }
        });
    }

    $("#btnReplaceModalListDesk").click(function() {
        let deskItem = $("input[name='rdDeskripsi']:checked");
        if (deskItem.length == 0) {
            alert('Mohon pilih terlebih dahulu deskripsinya');
        } else {
            $("#" + idTextArea).empty();
            $("#" + idTextArea).html(deskItem.val());
            $("#btnCloseModalListDesk").click();
            deskItem.prop('checked', false);
        }
    });

    $(document).ready(function() {
        setListDesk();
    });
</script>
<?= $this->endSection() ?>