<!DOCTYPE html>
<html lang="en">

<head>
<?php $this->load->view('components/head')?>

</head>
<body id="dark">

<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
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
    <!-- ////////////////////////        CONTINUE TAPE            ///////////////////////////////////// -->
    <?php $this->load->view('components/navbar')?>

    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container">
          <div class="tradingview-widget-container__widget"></div>
          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js"
            async>
              {
                "width": "100%",
                "height": 900,
                "defaultColumn": "overview",
                "defaultScreen": "general",
                "market": "crypto",
                "showToolbar": true,
                "colorTheme": "dark",
                "locale": "en"
              }
            </script>
        </div>
        <!-- TradingView Widget END -->

    <?php $this->load->view('components/footer')?>
    <?php $this->load->view('components/script')?>



</body>

</html>