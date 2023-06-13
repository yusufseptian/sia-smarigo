<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>
<div class="col">
    <div class="row">

        <div class="col">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title h3 font-weight-bold text-gray-900">Profil Orang Tua</div>
                            <div class="form-group">
                                <label for="txtnis">Username</label>
                                <input type="text" class="form-control px-4" name="username" value="<?= $dt_ortu['username'] ?>" id="txtnip" disabled>
                            </div>
                            <div class="form-group">
                                <label for="txtnama">Nama Orang Tua</label>
                                <input type="text" class="form-control px-4" name="nama" value="<?= $dt_ortu['nama'] ?>" id="txtnama" disabled>
                            </div>
                            <div class="form-group">
                                <label for="txtalamat">Alamat</label>
                                <input type="text" min="1" class="form-control px-4" name="alamat" value="<?= $dt_ortu['alamat'] ?>" id="txtalamat" disabled>
                            </div>
                            <div class="form-group">
                                <label for="txtNohp">Nomor Telepon</label>
                                <input type="text" class="form-control px-4" name="no_hp" value="<?= $dt_ortu['no_hp'] ?>" id="txtno" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8 px-0">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title h3 font-weight-bold text-gray-900">Data Siswa</div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="txtnis">NIS Siswa</label>
                                        <input type="number" min="1" class="form-control px-4" value="<?= $dt_ortu['nis_siswa'] ?>" id="txtnis" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="txtnamasiswa">Nama Siswa</label>
                                        <input type="text" class="form-control px-4" name="" value="<?= $dt_siswa['nama'] ?>" id="txtnamasiswa" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="txtkelas">Kelas Siswa</label>
                                        <input type="text" class="form-control px-4" name="" value="<?= $dt_siswa['nama_kelas'] ?>" id="txtkelas" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="txttgl">Tanggal Lahir</label>
                                        <input type="text" class="form-control px-4" name="" value="<?= $dt_siswa['tgl_lahir'] ?>" id="txttgl" disabled>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fotosiswa" class="w-100">Foto Siswa</label>
                                        <img src="<?= base_url('foto_siswa/' . $dt_siswa['photo']) ?>" class="img-fluid small text-danger" width="300px" id="fotosiswa" onerror="errorFoto()">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('bottomScript'); ?>
<script>
    function errorFoto() {
        $("#fotosiswa").attr('alt', "(Foto gagal di-load. Silahkan hubungi admin untuk memperbaharui foto murid).");
    }
</script>
<?= $this->endSection() ?>