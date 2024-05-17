<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center text-2xl font-semibold mt-4">form ubah data</h2>
            <div class=" flex justify-center">
                <form class="" action="/komik/update/<?= $komik['id']; ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Judul</label>
                        <input type="text" class="form-control w-96 <?= ($validation->hasError('judul')) ? 'in-invalid' : ''; ?>" id="judul" name="judul" autofocus value="<?= $komik['slug']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('judul'); ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Penulis</label>
                        <input type="text" class="form-control w-96" id="penulis" name="penulis" value="<?= $komik['penulis']; ?>">
                    </div>
                    <div class=" mb-3">
                        <label for="exampleInputPassword1" class="form-label">Penerbit</label>
                        <input type="text" class="form-control w-96" id="penerbit" name="penerbit" value="<?= $komik['penerbit']; ?>">
                    </div>
                    <div class=" mb-3">
                        <label for="exampleInputPassword1" class="form-label">Sampul</label>
                        <input type="text" class="form-control w-96" id="sampul" name="sampul" value="<?= $komik['sampul']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit Data</button>
                </form>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>