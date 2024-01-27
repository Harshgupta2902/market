<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->
    load->view('components/head')?>
</head>

<body id="dark">
  <!-- TradingView Widget BEGIN -->
  <div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js"
      async>
        {
          "symbols": [
            {
              "description": "",
              "proName": "BINANCE:BTCUSDT"
            },
            {
              "description": "",
              "proName": "BITSTAMP:BTCUSD"
            },
            {
              "description": "",
              "proName": "OANDA:XAUUSD"
            },
            {
              "description": "",
              "proName": "CRYPTOCAP:USDT"
            },
            {
              "description": "",
              "proName": "BITSTAMP:ETHUSD"
            },
            {
              "description": "",
              "proName": "CRYPTOCAP:DOGE"
            }
          ],
            "showSymbolLogo": true,
              "isTransparent": true,
                "displayMode": "regular",
                  "colorTheme": "dark",
                    "locale": "en"
        }
      </script>
  </div>
  <!-- TradingView Widget END -->
  <!-- ////////////////////////     CONTINUE TAPE      ///////////////////////////////////// -->
  <?php $this->load->view('components/navbar')?>

  <div class="markets ptb70">
    <div class="container">
      <div class="row">
        <!-- Info -->
        <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js"
            async>
              {
                "symbol": "<?=$symbol?>",
                  "width": "100%",
                    "locale": "en",
                      "colorTheme": "dark",
                        "isTransparent": true
              }
            </script>
        </div>
        <br />
        <div class="col-sm-12 mt-4">
          <div class="main-chart">
            <!-- Chart -->
            <div class="tradingview-widget-container">
              <div id="tradingview_e8053"></div>
              <script src="https://s3.tradingview.com/tv.js"></script>
              <script>
                new TradingView.widget(
                  {
                    "width": "100%",
                    "height": 550,
                    "symbol": "<?=$symbol?>",
                    "interval": "D",
                    "timezone": "Asia/Kolkata",
                    "theme": "Dark",
                    "style": "1",
                    "locale": "en",
                    "toolbar_bg": "#f1f3f6",
                    "enable_publishing": false,
                    "withdateranges": true,
                    "hide_side_toolbar": false,
                    "allow_symbol_change": false,
                    "show_popup_button": false,
                    "popup_width": "1000",
                    "popup_height": "650",
                    "container_id": "tradingview_e8053"
                  }
                );
              </script>
            </div>
          </div>
        </div>

        <div class="row justify-content-around mt-4" >
          <div class="col-5">
            <!-- Profile -->
            <div class="tradingview-widget-container">
              <div class="tradingview-widget-container__widget"></div>
              <script type="text/javascript"
                src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-profile.js" async>
                  {
                    "width": "480",
                    "height": "830",
                    "isTransparent": true,
                    "colorTheme": "dark",
                    "symbol": "<?=$symbol?>",
                    "locale": "en"
                  }
                </script>
            </div>
          </div>
          <div class="col-5">
            <!-- Financials -->
            <div class="tradingview-widget-container">
              <div class="tradingview-widget-container__widget"></div>
              <script type="text/javascript"
                src="https://s3.tradingview.com/external-embedding/embed-widget-financials.js" async>
                  {
                    "isTransparent": true,
                    "largeChartUrl": "",
                    "displayMode": "regular",
                    "width": "480",
                    "height": "830",
                    "colorTheme": "dark",
                    "symbol": "<?=$symbol?>",
                    "locale": "en"
                  }
                </script>
            </div>
          </div>
        </div>

        <div class="row">
          <!-- News -->
            <div class="tradingview-widget-container">
              <div class="tradingview-widget-container__widget"></div>
              <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-timeline.js" async>
              {
              "feedMode": "symbol",
              "symbol": "<?=$symbol?>",
              "isTransparent": true,
              "displayMode": "compact",
              "width": "1100",
              "height": "450",
              "colorTheme": "dark",
              "locale": "en"
            }
              </script>
            </div>
        </div>
      </div>
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