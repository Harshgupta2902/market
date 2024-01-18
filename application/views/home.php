<!DOCTYPE html>
<html lang="en">

<head>
<?php $this->load->view('components/head')?>

</head>
<body id="dark">
    <?php $this->load->view('components/navbar')?>
    <div class="container">
      <div class="row">



        <div class="col-md-12">
          <div class="markets-pair-list">

            <div class="tab-content">
              <div class="tab-pane fade show active" id="STAR" role="tabpanel">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Pairs</th>
                      <th>Coin</th>
                      <th>Last Price</th>
                      <th>Change (24H)</th>
                      <th>High (24H)</th>
                      <th>Low (24h)</th>
                      <th>Volume (24h)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><i class="icon ion-md-star"></i> ETH/BTC</td>
                      <td><img src="assets/img/icon/1.png" alt="eth"> ETH</td>
                      <td>7394.06</td>
                      <td class="green">+0.78%</td>
                      <td>7444.91</td>
                      <td>7267.06</td>
                      <td>431,687,258.77</td>
                    </tr>
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