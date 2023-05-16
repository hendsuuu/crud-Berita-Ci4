<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<style>
    .image{
        width: 100%;
        height: 400px;
        background-image: url('/img/<?= $news['gambar']; ?>');
        background-size: cover;
    }
    .content{
        font-size: large;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center"><?= $news['title']; ?></h2>
            <p>Penulis : <?= $news['penulis']; ?></p>
            <div class="image"></div>
            <div class="content"><?= $news['content']; ?></div>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>