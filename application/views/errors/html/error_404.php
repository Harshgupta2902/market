<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Crypo</title>
  <link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">
</head>

<body id="dark">
  <header class="dark-bb">
    <nav class="navbar navbar-expand-lg">
      <a class='navbar-brand' href='/exchange-dark'><img src="assets/img/logo-light.svg" alt="logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headerMenu"
        aria-controls="headerMenu" aria-expanded="false" aria-label="Toggle navigation">
        <i class="icon ion-md-menu"></i>
      </button>

      <div class="collapse navbar-collapse" id="headerMenu">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              Landing Page
            </a>
            <div class="dropdown-menu">
              <a class='dropdown-item' href='/landing-page-dark'>Landing One</a>
              <a class='dropdown-item' href='/landing-page-dark-two'>Landing Two</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              Exchange
            </a>
            <div class="dropdown-menu">
              <a class='dropdown-item' href='/exchange-dark'>Exchange</a>
              <a class='dropdown-item' href='/exchange-dark-live-price'>Exchange Live Price</a>
              <a class='dropdown-item' href='/exchange-dark-ticker'>Exchange Ticker</a>
              <a class='dropdown-item' href='/exchange-dark-fluid'>Exchange Fluid</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              Markets
            </a>
            <div class="dropdown-menu">
              <a class='dropdown-item' href='/markets-dark'>Markets</a>
              <a class='dropdown-item' href='/market-capital-dark'>Markets Line</a>
              <a class='dropdown-item' href='/market-capital-bar-dark'>Markets Bar</a>
              <a class='dropdown-item' href='/market-overview-dark'>Market Overview</a>
              <a class='dropdown-item' href='/market-screener-dark'>Market Screener</a>
              <a class='dropdown-item' href='/market-crypto-dark'>Market Crypto</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              Dashboard
            </a>
            <div class="dropdown-menu">
              <a class='dropdown-item' href='/settings-profile-dark'>Profile</a>
              <a class='dropdown-item' href='/settings-wallet-dark'>Wallet</a>
              <a class='dropdown-item' href='/settings-dark'>Settings</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              Others
            </a>
            <div class="dropdown-menu">
              <a class='dropdown-item' href='/technical-analysis-dark'>Technical Analysis</a>
              <a class='dropdown-item' href='/cross-rates-dark'>Cross Rates</a>
              <a class='dropdown-item' href='/symbol-info-dark'>Symbol Info</a>
              <a class='dropdown-item' href='/heat-map-dark'>Heat Map</a>
              <a class='dropdown-item' href='/signin-dark'>Sign in</a>
              <a class='dropdown-item' href='/signup-dark'>Sign up</a>
              <a class='dropdown-item' href='/404-dark'>404</a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item header-custom-icon">
            <a class="nav-link" href="#" id="clickFullscreen">
              <i class="icon ion-md-expand"></i>
            </a>
          </li>
          <li class="nav-item dropdown header-custom-icon">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              <i class="icon ion-md-notifications"></i>
              <span class="circle-pulse"></span>
            </a>
            <div class="dropdown-menu">
              <div class="dropdown-header d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium">6 New Notifications</p>
                <a href="#!" class="text-muted">Clear all</a>
              </div>
              <div class="dropdown-body">
                <a href="#!" class="dropdown-item">
                  <div class="icon">
                    <i class="icon ion-md-lock"></i>
                  </div>
                  <div class="content">
                    <p>Account password change</p>
                    <p class="sub-text text-muted">5 sec ago</p>
                  </div>
                </a>
                <a href="#!" class="dropdown-item">
                  <div class="icon">
                    <i class="icon ion-md-alert"></i>
                  </div>
                  <div class="content">
                    <p>Solve the security issue</p>
                    <p class="sub-text text-muted">10 min ago</p>
                  </div>
                </a>
                <a href="#!" class="dropdown-item">
                  <div class="icon">
                    <i class="icon ion-logo-android"></i>
                  </div>
                  <div class="content">
                    <p>Download android app</p>
                    <p class="sub-text text-muted">1 hrs ago</p>
                  </div>
                </a>
                <a href="#!" class="dropdown-item">
                  <div class="icon">
                    <i class="icon ion-logo-bitcoin"></i>
                  </div>
                  <div class="content">
                    <p>Bitcoin price is high now</p>
                    <p class="sub-text text-muted">2 hrs ago</p>
                  </div>
                </a>
                <a href="#!" class="dropdown-item">
                  <div class="icon">
                    <i class="icon ion-logo-usd"></i>
                  </div>
                  <div class="content">
                    <p>Payment completed</p>
                    <p class="sub-text text-muted">4 hrs ago</p>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer d-flex align-items-center justify-content-center">
                <a href="#!">View all</a>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown header-img-icon">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              <img src="assets/img/avatar.svg" alt="avatar">
            </a>
            <div class="dropdown-menu">
              <div class="dropdown-header d-flex flex-column align-items-center">
                <div class="figure mb-3">
                  <img src="assets/img/avatar.svg" alt="">
                </div>
                <div class="info text-center">
                  <p class="name font-weight-bold mb-0">Tony Stark</p>
                  <p class="email text-muted mb-3">tonystark@gmail.com</p>
                </div>
              </div>
              <div class="dropdown-body">
                <ul class="profile-nav">
                  <li class="nav-item">
                    <a class='nav-link' href='/settings-profile-dark'>
                      <i class="icon ion-md-person"></i>
                      <span>Profile</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class='nav-link' href='/settings-wallet-dark'>
                      <i class="icon ion-md-wallet"></i>
                      <span>My Wallet</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class='nav-link' href='/settings-dark'>
                      <i class="icon ion-md-settings"></i>
                      <span>Settings</span>
                    </a>
                  </li>
                  <li class="nav-item" id="changeThemeDark">
                    <a href="#!" class="nav-link">
                      <i class="icon ion-md-moon"></i>
                      <span>Theme</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class='nav-link red' href='/exchange-dark'>
                      <i class="icon ion-md-power"></i>
                      <span>Log Out</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <div class="error-page vh-100 d-flex justify-content-center text-center">
    <div class="my-auto">
      <h2>404</h2>
      <p>Oops something went wrong</p>
      <a class='btn' href='/exchange-dark'>Back to Home <i class="icon ion-md-home"></i></a>
    </div>
  </div>

  <script src="assets/js/jquery-3.4.1.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/amcharts-core.min.js"></script>
  <script src="assets/js/amcharts.min.js"></script>
  <script src="assets/js/custom.js"></script>
</body>

</html>