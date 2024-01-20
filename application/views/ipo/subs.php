<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('components/head')?>
</head>

<body id="dark">
  <?php $this->load->view('components/navbar')?>

<!-- NSE IPO Subscription Status Live -->
  <div class="container">
    <div class="row landing-hero">
      <div class="col-12">
        <h3 class="mb-4" style="color:white">NSE IPO Subscription Status Live</h3>
        <div class="markets-pair-list">
          <div class="tab-content">
            <div class="tab-pane fade show active">
              <table class="table">
                <thead>
                  <tr>
                    <th>IPO Name</th>
                    <th>Close Date</th>
                    <th>Size (Rs Cr)</th>
                    <th>QIB (x)</th>
                    <th>sNII (x)</th>
                    <th>bNII (x)</th>
                    <th>NII (x)</th>
                    <th>Retail (x)</th>
                    <th>Employee (x)</th>
                    <th>Others (x)</th>
                    <th>Total (x)</th>
                    <th>Applications</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($ipo as $ipo) { ?>
                  <tr>
                    <td>
                      <?php echo $ipo['company_name'] ?>
                    </td>
                    <td>
                      <?php echo $ipo['close_date'] ?>
                    </td>
                    <td>
                      <?php echo $ipo['size_rs_cr'] ?>
                    </td>
                    <td>
                      <?php echo $ipo['qib_x'] ?>
                    </td>
                    <td>
                      <?php echo $ipo['snii_x'] ?>
                    </td>
                    <td>
                      <?php echo $ipo['bnii_x'] ?>
                    </td>
                    <td>
                      <?php echo $ipo['nii_x'] ?>
                    </td>
                    <td>
                      <?php echo $ipo['retail_x'] ?>
                    </td>
                    <td>
                      <?php echo $ipo['employee_x'] ?>
                    </td>
                    <td>
                      <?php echo $ipo['others_x'] ?>
                    </td>
                    <td>
                      <?php echo $ipo['total_x'] ?>
                    </td>
                    <td>
                      <?php echo $ipo['applications'] ?>
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


<!-- SME IPO Subscription Status Live -->
  <div class="container">
    <div class="row landing-hero">
      <div class="col-12">
        <h3 class="mb-4" style="color:white">SME IPO Subscription Status Live</h3>
        <div class="markets-pair-list">
          <div class="tab-content">
            <div class="tab-pane fade show active">
              <table class="table">
                <thead>
                  <tr>
                    <th>IPO Name</th>
                    <th>Close Date</th>
                    <th>Size (Rs Cr)</th>
                    <th>QIB (x)</th>
                    <th>NII (x)</th>
                    <th>Retail (x)</th>
                    <th>Total (x)</th>
                    <th>Applications</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($sme as $sme) { ?>
                  <tr>
                    <td>
                      <?php echo $sme['company_name'] ?>
                    </td>
                    <td>
                      <?php echo $sme['close_date'] ?>
                    </td>
                    <td>
                      <?php echo $sme['size_rs_cr'] ?>
                    </td>
                    <td>
                      <?php echo $sme['qib_x'] ?>
                    </td>
                    <td>
                      <?php echo $sme['nii_x'] ?>
                    </td>
                    <td>
                      <?php echo $sme['retail_x'] ?>
                    </td>
                 
                    <td>
                      <?php echo $sme['total_x'] ?>
                    </td>
                    <td>
                      <?php echo $sme['applications'] ?>
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