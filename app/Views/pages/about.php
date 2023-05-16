<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">

            <img src="/img/thumbnail.jpg" class="rounded img-fluid mx-auto d-block" alt="">
        </div>
        <div class="col">
            <h1 class="text-center">About</h1>
            <p class="align-middle">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis veniam ducimus ipsum ipsam
                accusantium minus eligendi ex sit, aliquid ad cumque, alias voluptatem mollitia earum obcaecati deleniti quos omnis quidem!
            </p>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>