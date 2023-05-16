<style>
    .navbar{
        background-color: #6dc797;
    }
    .navbar li a:active{
        color: #fff;
    }
    .nav-item .nav-link{
        color: #fff;
    }
    .title{
        color: #fff;
    }
    .nav-item{
        transition: 0.8s;
    }
    .nav-item:hover{
        background-color: #fff;
        border-radius: 3px;
    }
    
    .log-out{
        background-color: #EA5455;
        padding: 2px 10px;
        border: none;
        border-radius: 3px;
        color: #fff;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <div class="container-fluid">
                <h2 class="title" href="#">Hendsu News</h2>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/pages/index">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/pages/about'); ?>">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/pages/contact'); ?>">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/news'); ?>">News</a>
                        </li>
                    </ul>
                    <a href="/auth/logout"><button class="log-out">Log Out</button></a>
                </div>
            </div>
        </div>
    </nav>
