<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h1>My contact : </h1>
                <?php foreach ($alamat as $a) : ?>
                <ul>
                    <li>Tipe : <?= $a['Tipe']; ?></li>
                    <li>Jalan : <?= $a['Alamat']; ?></li>
                    <li>Kota : <?= $a['Kota']; ?></li>
                </ul>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>