<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->
    load->view('components/head')?>
</head>

<body id="dark">
  <?php $this->load->view('components/navbar')?>
  <div class="landing-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Get All What you want.</h2>
                    <p>Crypo is the place where you can find the info regarding the Ipo's, Live Price of forex and other tools</p>
                </div>
                <div class="offset-md-1 col-md-5">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container tradingview-tecnical-analys">
                        <div class="tradingview-widget-container__widget"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                            {
                                "interval": "1m",
                                "width": "100%",
                                "isTransparent": false,
                                "height": "450",
                                "symbol": "BINANCE:BTCUSDT",
                                "showIntervalTabs": true,
                                "locale": "en",
                                "colorTheme": "dark"
                            }
                        </script>
                    </div>
                    <!-- TradingView Widget END -->
                </div>
            </div>
        </div>
    </div>


  <div class="container">
    <div class="row landing-hero">
        <div class="col-6">
          <h2 style = "color:white">Upcoming Ipo's</h2>
          <div class="markets-pair-list">
            <div class="tab-content">
              <div class="tab-pane fade show active" >
                <table class="table">
                  <thead>
                    <tr>
                      <th>Company Name</th>
                      <th>Open</th>
                      <th>Close</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($upcoming as $upcoming) { ?>
                    <tr>
                      <td>
                        <?php echo $upcoming['Company'] ?>
                      </td>
                      <td>
                        <?php echo $upcoming['Open'] ?>
                      </td>
                      <td>
                        <?php echo $upcoming['Close'] ?>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6">
          <h2 style = "color:white">Forthcoming Ipo's</h2>
          <div class="markets-pair-list">
            <div class="tab-content">
              <div class="tab-pane fade show active" >
                <table class="table">
                  <thead>
                    <tr>
                      <th>Company Name</th>
                      <th>Open</th>
                      <th>Close</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($sme as $sme) { ?>
                    <tr>
                      <td>
                        <?php echo $sme['Company'] ?>
                      </td>
                      <td>
                        <?php echo $sme['Open'] ?>
                      </td>
                      <td>
                        <?php echo $sme['Close'] ?>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>

  <?php $this->load->view('components/footer')?>
  <?php $this->load->view('components/script')?>
</body>

</html>