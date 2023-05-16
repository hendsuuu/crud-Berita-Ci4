<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<style>
    .card {
        margin: 20px;
    }

    .btn {
        background-color: #6dc797;
        color: #fff;
    }
</style>
<div class="container">
    <div class="row">
        <!-- my php code which uses x-path to get results from xml query. -->
        <?php foreach ($news as $m) : ?>
            <div class="col-sm-3 ">
                <div class="card-columns-fluid">
                    <div class="card" style="width: 18rem;">
                        <img src="/img/<?= $m['gambar']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $m['title']; ?></h5>
                            <p class="card-text"><?= substr($m['content'], 100); ?>...</p>
                            <p class="card-author"><?= $m['penulis']; ?></p>
                            <a href="/news/detail/<?= $m['id_news']; ?>" class="btn">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!--container div  -->
<?= $this->endsection(); ?>