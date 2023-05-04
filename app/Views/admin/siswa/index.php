<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>
<div class="col">

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <button class="btn btn-sm btn-primary tambah" data-toggle="modal" data-target="#add">
                    Tambah Data
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <tr>
                        <th>NO</th>
                        <th>NIS</th>
                        <th>NAMA LENGKAP</th>
                        <th>ALAMAT</th>
                        <th>AKSI</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    $dataSiswa = [];
                    foreach ($siswa as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['nis'] ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td><?= $value['alamat'] ?></td>
                            <td>
                                <button class="btn btn-xs btn-flat btn-warning" data-toggle="modal" data-target="#editSiswa" onclick="editSiswa('<?= $value['nis'] ?>')">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn btn-xs btn-flat btn-danger" data-toggle="modal" data-target="#deleteSiswa" onclick="deleteSiswa('<?= $value['nis'] ?>', '<?= $value['nama'] ?>')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <?php $tmp = [
                            'nis' => $value['nis'],
                            'username' => $value['username'],
                            'nama' => $value['nama'],
                            'tempatLahir' => $value['tempat_lahir'],
                            'tglLahir' => $value['tgl_lahir'],
                            'gender' => $value['gender'],
                            'kelas' => null,
                            'alamat' => $value['alamat'],
                            'noHp' => $value['no_hp'],
                            'foto' => $value['photo']
                        ];
                        array_push($dataSiswa, $tmp) ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>
<!-- Modal Add -->
<div class="modal fade bd-example-modal-lg" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title">Tambah Siswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('siswa/insertdata') ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>NIS</label>
                            <input name="nis" class="form-control" placeholder="Nomor Induk Siswa" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Username</label>
                            <input name="username" class="form-control" placeholder="username" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="password" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input name="nama" class="form-control" placeholder="Nama Lengkap Siswa" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="gender" class="form-control">
                                <option value="">--Pilih Jenis Kelamin--</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Kelas</label>
                            <select name="id_ta" class="form-control">
                                <option value="id_kelas">--Pilih Kelas--</option>
                                <?php foreach ($kelas as $value) : ?>
                                    <option value="<?= $value['id_kelas'] ?>"><?= $value['nama_kelas'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Alamat</label>
                            <input name="alamat" class="form-control" placeholder="Alamat Siswa" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>No Telepon</label>
                            <input name="no_hp" class="form-control" placeholder="nomor telepon" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Foto Siswa</label>
                            <input id="foto" type="file" accept="image/*" name="photo" class="form-control" onchange="bacaGambar(event)" required>
                        </div>
                        <div class="form-group" id="pre">
                            <label>Preview</label><br>
                            <img id="gambar_load" src="" width="200px">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Modal Edit -->
<div class="modal fade bd-example-modal-lg" id="editSiswa">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title">Edit Data Siswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="siswa/editData" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>NIS</label>
                                <input name="nis" class="form-control" placeholder="Nomor Induk Siswa" id="txtEditNIS" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Username</label>
                                <input name="Username" class="form-control" placeholder="Username" id="txtEditUsername" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="password" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input name="nama" class="form-control" placeholder="Nama Lengkap Siswa" id="txtEditNama" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" id="txtEditTempatLahir" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" id="txtEditTglLahir" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="gender" class="form-control" id="cmbGender">
                                    <option value="">--Pilih Jenis Kelamin--</option>
                                    <option value="Laki-laki" id="optGenderLaki-laki">Laki-laki</option>
                                    <option value="Perempuan" id="optGenderPerempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Kelas</label>
                                <select name="id_ta" class="form-control">
                                    <option value="id_kelas">--Pilih Kelas--</option>
                                    <?php foreach ($kelas as $dt) : ?>
                                        <option value="<?= $dt['id_kelas'] ?>"><?= $dt['nama_kelas'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Alamat</label>
                                <input name="alamat" class="form-control" placeholder="Alamat Siswa" id="txtEditAlamat" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input name="no_hp" class="form-control" placeholder="nomor telepon" id="txtEditNoHp" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Ganti Foto Siswa</label>
                                <input id="foto" type="file" accept="image/*" name="photo" onchange="editGambar(event)" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Preview</label><br>
                            <img id="gambar_load_edit" src="" width="200px">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-warning btn-sm">Ubah</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- Modal Delete -->
<div class="modal fade" id="deleteSiswa">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">Hapus Siswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda ingin menghapus <b id="deleteNamaSiswa"></b>?
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
                <a href="" class="btn btn-danger btn-sm" id="linkDeleteSiswa">Hapus</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
    const dtaSiswa = <?= json_encode($dataSiswa) ?>;

    function editSiswa(nis) {
        dtaSiswa.forEach(element => {
            if (element.nis == nis) {
                $('#cmbGender>option:selected').removeAttr('selected');
                $("#txtEditNIS").val(element.nis);
                $("#txtEditUsername").val(element.username);
                $("#txtEditNama").val(element.nama);
                $("#txtEditTempatLahir").val(element.tempatLahir);
                $("#txtEditTglLahir").val(element.tglLahir);
                $("#txtEditAlamat").val(element.alamat);
                $("#txtEditNoHp").val(element.noHp);
                $("#optGender" + element.gender).attr("selected", "");
                $("#gambar_load_edit").attr("src", "<?= base_url() ?>/foto_siswa/" + element.foto);
                return false;
            }
        });
    }

    function deleteSiswa(nis, nama) {
        $('#deleteNamaSiswa').html(nama);
        $('#linkDeleteSiswa').attr('href', '<?= base_url('siswa/deleteData') ?>/' + nis);
    }

    function editGambar(event) {
        try {
            $('#gambar_load_edit').attr('src', URL.createObjectURL(event.target.files[0]));
        } catch (error) {

        }
    }
</script>
<?= $this->endSection() ?>