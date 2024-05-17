<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center text-2xl font-semibold mt-4">form tambah data</h2>
            <?= $validasi->listErrors(); ?>
            <div class=" flex justify-center">
                <form class="" action="/komik/save" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Judul</label>
                        <input type="text" class="form-control w-96 <?= ($validasi->hasError('judul')) ? 'in-invalid' : ''; ?>" id="judul" name="judul" autofocus value="<?= old('judul'); ?>">
                        <div class="invalid-feedback">
                            <?= $validasi->getError('judul'); ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Penulis</label>
                        <input type="text" class="form-control w-96" id="penulis" name="penulis" value="<?= old('penulis'); ?>">
                    </div>
                    <div class=" mb-3">
                        <label for="exampleInputPassword1" class="form-label">Penerbit</label>
                        <input type="text" class="form-control w-96" id="penerbit" name="penerbit" value="<?= old('penerbit'); ?>">
                    </div>
                    <div class=" mb-3">
                        <label for="exampleInputPassword1" class="form-label">Sampul</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="sampul" name="sampul">
                            <label class="input-group-text" for="Sampul">Upload</label>
                        </div>
                    </div>
                    <button type=" submit" class="btn btn-primary">Tambah Data</button>
                </form>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>