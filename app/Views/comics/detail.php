<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h1>Detail Komik</h1>
                <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                    <img src="/img/<?= $komik['sampul']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item mt-3"><h5 class="card-title"><?= $komik['judul']; ?></h5></li>
                            <li class="list-group-item">Penulis  : <?= $komik['penulis']; ?> </li>
                            <li class="list-group-item">Penerbit : <?= $komik['penerbit']; ?></li>
                            <li class="list-group-item mt-3">
                                <a href="/comics/edit/<?= $komik['slug']; ?>" class="btn btn-success">Edit</a>
                                <!-- <a href="/comics/" class="btn btn-danger">Delete</a> -->

                                <form action="/comics/delete/<?= $komik['id']; ?>" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>            

                                <a href="/comics/" class="btn btn-primary">Back</a>
                            </li>
                        </ul>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>