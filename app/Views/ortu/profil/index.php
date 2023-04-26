<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>
<div class="col">
    <div class="row">

        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-title h3 font-weight-bold text-gray-900">Profil Orang Tua</div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtnis">Username</label>
                                <input type="text" class="form-control px-4" value="<?= $dt_ortu['username'] ?>" id="txtnip" disabled>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtusername">Nama Orang Tua</label>
                                <input type="text" class="form-control px-4" value="<?= $dt_ortu['nama'] ?>" id="txtnama" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="txtalamat">Alamat</label>
                                <input type="text" min="1" class="form-control px-4" value="<?= $dt_ortu['alamat'] ?>" id="txtalamat" disabled>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtNohp">Nomor Telepon</label>
                                <input type="text" class="form-control px-4" name="no_hp" value="<?= $dt_ortu['no_hp'] ?>" id="txtno" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtnis">NIS Siswa</label>
                                <input type="number" min="1" class="form-control px-4" value="<?= $dt_ortu['nis_siswa'] ?>" id="txtnis" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>