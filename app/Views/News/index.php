<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<style>
    .top {
        display: inline;
        align-items: center;
    }

    .top h1 {
        float: left;
    }

    #btn-add {
        float: right;
        background-color: #6dc797;
        color: #fff;
    }

    .top h3 {
        margin-top: 20px;
    }
    .alert{
        margin-top: 20px;
    }
</style>
<div class="container">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="top">
        <h3>Daftar Berita</h3>
        <span><a href="/news/insert" id="btn-add" class="btn Mt-4">Tambah Data Berita</a></span>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Penulis</th>
                <th scope="col">Banner</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($news as $n) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $n['title']; ?></td>
                    <td><?= $n['penulis']; ?></td>
                    <td><?= $n['gambar']; ?></td>
                    <td>
                        <a href="/news/edit/<?= $n['id_news']; ?>" class="btn btn-warning">Edit</a>

                        <form action="/news/<?= $n['id_news']; ?>" method="POST" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin');">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?= $this->endsection(); ?>