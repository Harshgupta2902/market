<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('components/head')?>
</head>

<body id="dark">
  <?php $this->load->view('components/navbar')?>
<!-- Latest IPO GMP Today -->
  <div class="container">
    <div class="row landing-hero">
      <div class="col-12">
        <h3 class="mb-4" style="color:white">Ipo BuyBack</h3>
        <div class="markets-pair-list">
          <div class="tab-content">
            <div class="tab-pane fade show active">
              <table class="table">
                <thead>
                  <tr>
                    <th>IPO Name</th>
                    <th>Record Date</th>
                    <th>Open</th>
                    <th>Close</th>
                    <th>Price</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($buyback as $buyback) { ?>
                    <tr>
                      <td>
                        <?php echo $buyback['company_name'] ?>
                      </td>
                      <td>
                        <?php echo $buyback['record_date'] ?>
                      </td>
                      <td>
                        <?php echo $buyback['open'] ?>
                      </td>
                      <td>
                        <?php echo $buyback['close'] ?>
                      </td>
                      <td>
                        <?php echo $buyback['price'] ?>
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

  <?php $this->load->view('components/faq')?>
  <?php $this->load->view('components/footer')?>
  <?php $this->load->view('components/script')?>
</body>

</html>