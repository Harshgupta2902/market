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
        <h3 class="mb-4" style="color:white">Upcoming Ipo's</h3>
        <div class="markets-pair-list">
          <div class="tab-content">
            <div class="tab-pane fade show active">
              <table class="table">
                <thead>
                  <tr>
                    <th>IPO Name</th>
                    <th>Date</th>
                    <th>Size</th>
                    <th>Price</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($upcoming as $upcoming) { ?>
                    <tr>
                      <td>
                        <?php echo $upcoming['companyName'] ?>
                      </td>
                      <td>
                        <?php echo $upcoming['date'] ?>
                      </td>
                      <td>
                        <?php echo $upcoming['size'] ?>
                      </td>
                      <td>
                        <?php echo $upcoming['price'] ?>
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