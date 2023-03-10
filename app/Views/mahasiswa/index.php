<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-6">
                <h1>Daftar Mahasiswa</h1>
                <form action="" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter Keyword..." name="keyword">
                        <button class="btn btn-outline-secondary" type="submit" name="enter" id="button-addon2">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <!-- <a href="/comics/create" class="btn btn-primary mb-3"> [+] Tambah Mahasiswa</a> -->
                <?php if(session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-<?= session()->getFlashdata('warna'); ?>" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 + (3 * ($currentPage - 1)); ?>
                        <?php foreach ($mahasiswa as $a) : ?>
                        <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $a['nama']; ?></td>
                        <td><?= $a['alamat']; ?></td>
                        <td><a href="" class="btn btn-success">Detail</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('mahasiswa', 'mahasiswa_pagination'); ?>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>