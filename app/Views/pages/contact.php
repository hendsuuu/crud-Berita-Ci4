<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">

            <img src="/img/contact.jpg" width="500" class="rounded img-fluid mx-auto d-block" alt="">
        </div>
        <div class="col">
            <h1 class="text-center">Contact</h1>
            <table>
                <tr>
                    <td>Email</td>
                    <td>: sutrishendra07@gmail.com</td>
                </tr>
                <tr>
                    <td>Whatsapp</td>
                    <td>: 081234222797</td>
                </tr>
                <tr>
                    <td>Instagram</td>
                    <td>: @hendsuuuu</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>