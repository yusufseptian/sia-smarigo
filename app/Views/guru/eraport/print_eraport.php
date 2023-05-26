<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php base_url() ?>/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?php base_url() ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">

    <title>Document</title>
    <style>
        @page {
            size: A4;
            /* DIN A4 standard, Europe */
            margin: 0;
        }

        * {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12;
        }

        body {
            padding: 3cm 3cm 3cm 4cm;
        }
    </style>
</head>

<body>

    <?= $this->include('guru/eraport/partial/kkm'); ?>
    <div class="col p-0 m-0">
        <div class="row">
            <div class="col"><?= $this->include('guru/eraport/partial/lembar1'); ?></div>
        </div>
        <div class="row">
            <div class="col"><?= $this->include('guru/eraport/partial/lembar2'); ?></div>
        </div>
        <div class="row">
            <div class="col"><?= $this->include('guru/eraport/partial/lembar3'); ?></div>
        </div>
        <div class="row">
            <div class="col"><?= $this->include('guru/eraport/partial/lembar4'); ?></div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>