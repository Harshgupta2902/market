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
        <h3 class="mb-4" style="color:white">Latest IPO GMP Today</h3>
        <div class="markets-pair-list">
          <div class="tab-content">
            <div class="tab-pane fade show active">
              <table class="table">
                <thead>
                  <tr>
                    <th>IPO Name</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>IPO GMP	</th>
                    <th>Price</th>
                    <th>Gain</th>
                    <th>Kostak</th>
                    <th>Subject</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($gmp as $gmp) { ?>
                  <tr>
                    <td>
                      <?php echo $gmp['ipo_name'] ?>
                    </td>
                    <td>
                      <?php echo $gmp['date'] ?>
                    </td>
                    <td>
                      <?php echo $gmp['type'] ?>
                    </td>
                    <td>
                      <?php echo $gmp['ipo_gmp'] ?>
                    </td>
                    <td>
                      <?php echo $gmp['price'] ?>
                    </td>
                    <td>
                      <?php echo $gmp['gain'] ?>
                    </td>
                    <td>
                      <?php echo $gmp['kostak'] ?>
                    </td>
                    <td>
                      <?php echo $gmp['subject'] ?>
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


<!-- Past IPO Grey Market Premium of IPO 2022 | 2023 | 2024 -->
<div class="container">
    <div class="row landing-hero">
      <div class="col-12">
        <h3 class="mb-4" style="color:white">Past IPO Grey Market Premium of IPO 2022 | 2023 | 2024</h3>
        <div class="markets-pair-list">
          <div class="tab-content">
            <div class="tab-pane fade show active">
              <table class="table">
                <thead>
                  <tr>
                    <th>IPO Name</th>
                    <th>Price</th>
                    <th>IPO GMP</th>
                    <th>Listed</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($oldGmp as $oldGmp) { ?>
                  <tr>
                    <td>
                      <?php echo $oldGmp['ipo_name'] ?>
                    </td>
                    <td>
                      <?php echo $oldGmp['price'] ?>
                    </td>
                    <td>
                      <?php echo $oldGmp['ipo_gmp'] ?>
                    </td>
                    <td>
                      <?php echo $oldGmp['listed'] ?>
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

<!-- FAQ's -->
  <?php $this->load->view('components/faq')?>
  <?php $this->load->view('components/footer')?>
  <?php $this->load->view('components/script')?>
</body>





</html>