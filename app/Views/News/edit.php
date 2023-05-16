<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<style>
    .btn{
        background-color: #6dc797;
        color: #fff;
    }
</style>
<div class="container-lg">
    <div class="row">
        <div class="col">
            <h2 class="My-3">Form Ubah Data Berita</h2>

            <form action="/news/update/<?= $news['id_news']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_news" id="" value="<?= $news['id_news']; ?>">
                
                <input type="hidden" name="sampulLama" id="" value="<?= $news['gambar']; ?>">
                <div class="row mb-3">
                    <label for="title" name="title" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="title" value="<?= (old('title')) ? old('title') : $news['title'] ?>" name="title" required autofocus>
                        <div class="invalid-feedback">
                            <?= $validation->getError('title'); ?>
                        </div>
                    </div>

                </div>
                <div class="row mb-3">
                    <label for="penulis" name="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penulis" value="<?= (old('penulis')) ? old('penulis') : $news['penulis'] ?>" name="penulis">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="content" name="content" class="col-sm-2 col-form-label">Konten</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="content" value="<?= (old('penulis')) ? old('penulis') : $news['penulis'] ?>" name="content">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="gambar" name="gambar" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $news['gambar']; ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group mb-3">
                            <input type="file" onchange="previewImg()" value="<?= $news['gambar']; ?>" name="gambar" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar">
                            <div class="invalid-feedback">
                                <?= $validation->getError('gambar'); ?>
                            </div>
                            <label class="input-group-text" for="gambar">Upload</label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn">Update data</button>
            </form>

        </div>

    </div>
</div>

<?= $this->endsection(); ?>