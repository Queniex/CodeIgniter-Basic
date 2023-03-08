<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h1>Daftar Komik</h1>
                <a href="/comics/create" class="btn btn-primary mb-3"> [+] Tambah Komik</a>
                <?php if(session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-<?= session()->getFlashdata('warna'); ?>" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($komik as $a) : ?>
                        <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><img src="/img/<?= $a['sampul']; ?>" alt="" class="sampul"></td>
                        <td><?= $a['judul']; ?></td>
                        <td><a href="/comics/<?= $a['slug']; ?>" class="btn btn-success">Detail</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>