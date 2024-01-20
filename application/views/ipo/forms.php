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
        <h3 class="mb-4" style="color:white">Ipo Forms</h3>
        <div class="markets-pair-list">
          <div class="tab-content">
            <div class="tab-pane fade show active">
              <table class="table">
                <thead>
                  <tr>
                    <th>IPO Name</th>
                    <th>Date</th>
                    <th>BSE LInk</th>
                    <th>NSE Link</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($forms as $form) { ?>
                    <tr>
                      <td>
                        <?php echo $form['name'] ?>
                      </td>
                      <td>
                        <?php echo $form['date'] ?>
                      </td>
                      <td>
                        <?php if (!empty($form['bse_link'])) { ?>
                          <a href="<?php echo $form['bse_link'] ?>" target="_blank">
                            <?php echo $form['bse'] ?>
                          </a>
                        <?php } else { ?>
                          <?php echo $form['bse'] ?>
                        <?php } ?>
                      </td>
                      <td>
                        <?php if (!empty($form['nse_link'])) { ?>
                          <a href="<?php echo $form['nse_link'] ?>" target="_blank">
                            <?php echo $form['nse'] ?>
                          </a>
                        <?php } else { ?>
                          <?php echo $form['nse'] ?>
                        <?php } ?>
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