<!DOCTYPE html>
<html lang="en">

<head>
<?php $this->load->view('components/head')?>
   
</head>
<body id="dark">
    <!-- ////////////////////////        CONTINUE TAPE                     ///////////////////////////////////// -->


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


    
    <?php $this->load->view('components/navbar')?>
    <div class="landing-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Explore Real-time Cryptocurrency Price.</h2>
                    <p>Discover the latest trends and prices in the cryptocurrency market. Our platform provides real-time data, advanced charts, and a secure trading experience.</p>
                    <!-- <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter Your Email" aria-label="Enter Your Email" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button" id="button-addon2">Get Started</button>
                        </div>
                    </div> -->
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
    <div class="landing-feature landing-coin-price bt-none">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Check your favorite coin price <br> within a glance</h2>
            </div>

            <?php
            $coinSymbols = [
                'BINANCE:BTCUSD',
                'BINANCE:ETHUSDT',
                'BINANCE:XRPUSDT',
                'BINANCE:BNBUSDT',
                'BINANCE:ADAUSDT',
                'BINANCE:DOGEUSDT',
                'BINANCE:DOTUSDT',
                'BINANCE:SOLUSDT'
            ];
            foreach ($coinSymbols as $symbol) :
            ?>
                <div class="col-md-3 mb30">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                            {
                                "symbol": "<?= $symbol ?>",
                                "width": "100%",
                                "height": 220,
                                "locale": "en",
                                "dateRange": "12M",
                                "colorTheme": "dark",
                                "trendLineColor": "rgba(41, 98, 255, 1)",
                                "underLineColor": "rgba(41, 98, 255, 0.3)",
                                "underLineBottomColor": "rgba(41, 98, 255, 0)",
                                "isTransparent": false,
                                "autosize": false,
                                "largeChartUrl": "<?= base_url('symbols')?>"
                            }
                        </script>
                    </div>
                    <!-- TradingView Widget END -->
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="landing-feature">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Check fiat currency cross rates <br> within a second</h2>
                </div>
                <div class="col-md-12">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-forex-cross-rates.js" async>
                            {
                                "width": "100%",
                                "height": 400,
                                "currencies": [
                                    "EUR",
                                    "USD",
                                    "JPY",
                                    "GBP",
                                    "CHF",
                                    "AUD",
                                    "CAD",
                                    "NZD",
                                    "CNY"
                                ],
                                "isTransparent": false,
                                "colorTheme": "dark",
                                "locale": "en"
                            }
                        </script>
                    </div>
                    <!-- TradingView Widget END -->
                </div>
            </div>
        </div>
    </div>

    <div class="landing-feature">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Check real-time heat map find opportunities <br> and trade with confidence</h2>
                </div>
                <div class="col-md-12">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-forex-heat-map.js" async>
                            {
                                "width": "100%",
                                "height": 400,
                                "currencies": [
                                    "EUR",
                                    "USD",
                                    "JPY",
                                    "GBP",
                                    "CHF",
                                    "AUD",
                                    "CAD",
                                    "NZD",
                                    "CNY"
                                ],
                                "isTransparent": false,
                                "colorTheme": "dark",
                                "locale": "en"
                            }
                        </script>
                    </div>
                    <!-- TradingView Widget END -->
                </div>
            </div>
        </div>
    </div>
    <div class="landing-feature">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Check latest news and key events of popular <br> companies and cryptocurrencies</h2>
                </div>
                <div class="col-md-12">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-timeline.js" async>
                            {
                                "colorTheme": "dark",
                                "isTransparent": false,
                                "displayMode": "compact",
                                "width": "100%",
                                "height": 430,
                                "locale": "en"
                            }
                        </script>
                    </div>
                    <!-- TradingView Widget END -->
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('components/footer')?>
    <?php $this->load->view('components/script')?>



</body>

</html>