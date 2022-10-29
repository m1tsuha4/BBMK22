<style type="text/css">
    @font-face{
        font-family: Montserrat-Regular;
        src: url("<?= base_url(); ?>assets/img/Montserrat-Regular.ttf");
    }
    @font-face{
        font-family: LemonMilkbold;
        src: url("<?= base_url(); ?>assets/img/LemonMilkbold.otf");
    }
    body{
        font-family: LemonMilkbold;
    }
</style>
<div class="container">
    <nav class="navbar navbar-expand-sm navbar-light bg-white wow bounceIn">
        <a class="navbar-brand" href="<?= base_url(); ?>"><img src="<?= base_url(); ?>assets/img/logo2.jpg" height="50px"> </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#bbmk-navbar" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="bbmk-navbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>cek">ACCOUNT CHECK</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>login">LOGIN</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<hr class="bg-info">
<div class="container">