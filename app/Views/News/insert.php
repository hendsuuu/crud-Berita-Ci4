<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<style>
    .col h2{
        margin-top: 20px;
    }
    .btn{
        background-color: #6dc797;
        color: #fff;
    }
</style>
<div class="container-lg">
    <div class="row">
        <div class="col">
            <h2 class="My-3">Form Tambah Data Berita</h2>

            <form action="/news/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="title" name="title" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="title" value="<?= old('title'); ?>" name="title" autofocus>
                        <div class="invalid-feedback">
                            <?= $validation->getError('title'); ?>
                        </div>
                    </div>

                </div>
                <div class="row mb-3">
                    <label for="penulis" name="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penulis" value="<?= old('penulis'); ?>" name="penulis">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="content" name="content" class="col-sm-2 col-form-label">Konten</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="content" value="<?= old('content'); ?>" name="content">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="gambar" name="gambar" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-2">
                        <img src="/img/default.jpg" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group mb-3">
                            <input type="file" onchange="previewImg()" name="gambar" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar">
                            <div class="invalid-feedback">
                                <?= $validation->getError('gambar'); ?>
                            </div>
                            <label class="input-group-text" for="gambar">Upload</label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn">Tambah data</button>
            </form>

        </div>

    </div>
</div>

<?= $this->endsection(); ?>