<div class="card border-0 shadow-none" style="height: 32.7cm;">
    <div class="card-body text-gray-900 p-0" id="formContainer">
        <div class="mb-3 pb-2 d-flex justify-content-between" style="border-bottom: solid black 3px !important;">
            <?= $this->include('guru/eraport/partial/header'); ?>
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
                            <p><?= (is_null($dtNond)) ? '<span class="text-warning">Belum Dinilai</span>' : $dtNond['nond_spiritual_predikat'] ?></p>
                        </td>
                        <td class="px-3 py-2">
                            <p><?= (is_null($dtNond)) ? '<span class="text-warning">Belum Dinilai</span>' : $dtNond['nond_spiritual_deskripsi'] ?></p>
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
                            <p><?= (is_null($dtNond)) ? '<span class="text-warning">Belum Dinilai</span>' : $dtNond['nond_sosial_predikat'] ?></p>
                        </td>
                        <td class="px-3 py-2">
                            <p><?= (is_null($dtNond)) ? '<span class="text-warning">Belum Dinilai</span>' : $dtNond['nond_sosial_deskripsi'] ?></p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?= $this->include('guru/eraport/partial/ttd'); ?>
    </div>
</div>