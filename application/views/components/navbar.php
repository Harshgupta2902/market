<header class="dark-bb">
    <nav class="navbar navbar-expand-lg center">
        <a class="navbar-brand" href="/exchange-dark"><img src="assets/img/logo-light.svg" alt="logo" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headerMenu"
            aria-controls="headerMenu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="icon ion-md-menu"></i>
        </button>

        <div class="collapse navbar-collapse" id="headerMenu">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="<?php echo base_url() ?>" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Ipo
                    </a> 
                     <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo base_url('upcomingIpo')?>">Upcoming Ipo</a>
                        <a class="dropdown-item" href="<?php echo base_url('greyMarketIpo')?>">GMP of Ipo</a>
                        <a class="dropdown-item" href="<?php echo base_url('smeMarketIpo')?>">SME of Ipo</a>
                        <a class="dropdown-item" href="<?php echo base_url('subscriptionStatus')?>">Subscription Status</a>
                        <a class="dropdown-item" href="<?php echo base_url('ipoForms')?>">Ipo Forms</a>
                        <a class="dropdown-item" href="<?php echo base_url('sharesBuyBack')?>">Ipo Buyback</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="<?php echo base_url('Crypto') ?>" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Crypto
                    </a> 
                     <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo base_url('Crypto')?>">Home</a>
                        <a class="dropdown-item" href="<?php echo base_url('')?>">Landing Two</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Other Tools
                    </a> 
                     <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo base_url('')?>">Landing One</a>
                        <a class="dropdown-item" href="<?php echo base_url('')?>">Landing Two</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>