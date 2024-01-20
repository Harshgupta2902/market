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
        <h3 class="mb-4" style="color:white">SME Ipo's</h3>
        <div class="markets-pair-list">
          <div class="tab-content">
            <div class="tab-pane fade show active">
              <table class="table">
                <thead>
                  <tr>
                    <th>IPO Name</th>
                    <th>Date</th>
                    <th>Price</th>
                    <th>Platform</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($sme as $sme) { ?>
                  <tr>
                    <td>
                      <?php echo $sme['name'] ?>
                    </td>
                    <td>
                      <?php echo $sme['Dates'] ?>
                    </td>
                    <td>
                      <?php echo $sme['Price'] ?>
                    </td>
                    <td>
                      <?php echo $sme['Platform'] ?>
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