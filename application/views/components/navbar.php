<header class="dark-bb">
    <nav class="navbar navbar-expand-lg center">
        <a class="navbar-brand" href="<?= base_url() ?>"><img src="assets/img/logo-light.svg" alt="logo" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headerMenu"
            aria-controls="headerMenu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="icon ion-md-menu"></i>
        </button>

        <div class="collapse navbar-collapse" id="headerMenu">
            <ul class="navbar-nav mr-auto">
                <?php foreach ($nav as $key => $value) { ?>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="<?php echo base_url('Crypto') ?>" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <?= $key ?>
                        </a> 
                        <div class="dropdown-menu">
                            <?php foreach ($nav[$key] as $subnav) { ?>
                                <a class="dropdown-item" href="<?php echo base_url($subnav['url'])?>"><?= $subnav['subnav'] ?></a>
                            <?php } ?>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
</header>