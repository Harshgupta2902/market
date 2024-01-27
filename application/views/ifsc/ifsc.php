<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('components/head')?>
</head>

<body id="dark">
  <?php $this->load->view('components/navbar')?>

  <div class="landing-hero">
    <div class="container">
      <div class="row">
        <div class="offset-md-2 col-md-8 text-center">
          <h2>Find Bank from IFSC Code</h2>
          <p>Enter the IFSC code to search for bank details.</p>
          <form action="<?= base_url('search') ?>" method="get">
            <div class="input-group">
              <input type="text" required name="ifsc" class="form-control" placeholder="Enter IFSC Code" id="ifscInput">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit" id="searchButton">Search</button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

<div class="landing-feature">
    <?php if (isset($ifsc['Bank']) || isset($ifsc['Ifsc']) || isset($ifsc['Branch']) || isset($ifsc['Address']) || isset($ifsc['City']) || isset($ifsc['State']) || isset($ifsc['Phone'])) : ?>
        <div class="container">
            <div class="landing-feature-item">
                <?php if (isset($ifsc['Bank'])) : ?>
                    <div class="row ml-4 mr-4 mb-2">
                        <h3 class="ifsc-box">Bank Name: </h3>
                        <span class="ml-4">
                            <h5><?= $ifsc['Bank'] ?></h5>
                        </span>
                    </div>
                <?php endif; ?>

                <?php if (isset($ifsc['Ifsc'])) : ?>
                    <div class="row ml-4 mr-4 mb-2">
                        <h3 class="ifsc-box">Ifsc Code: </h3>
                        <span class="ml-4">
                            <h5><?= $ifsc['Ifsc'] ?></h5>
                        </span>
                    </div>
                <?php endif; ?>

                <?php if (isset($ifsc['Branch'])) : ?>
                    <div class="row ml-4 mr-4 mb-2">
                        <h3 class="ifsc-box">Branch: </h3>
                        <span class="ml-4">
                            <h5><?= $ifsc['Branch'] ?></h5>
                        </span>
                    </div>
                <?php endif; ?>

                <?php if (isset($ifsc['Address'])) : ?>
                    <div class="row ml-4 mr-4 mb-2">
                        <h3 class="ifsc-box">Address: </h3>
                        <span class="ml-4">
                            <h5><?= $ifsc['Address'] ?></h5>
                        </span>
                    </div>
                <?php endif; ?>

                <?php if (isset($ifsc['City'])) : ?>
                    <div class="row ml-4 mr-4 mb-2">
                        <h3 class="ifsc-box">City: </h3>
                        <span class="ml-4">
                            <h5><?= $ifsc['City'] ?></h5>
                        </span>
                    </div>
                <?php endif; ?>

                <?php if (isset($ifsc['State'])) : ?>
                    <div class="row ml-4 mr-4 mb-2">
                        <h3 class="ifsc-box">State: </h3>
                        <span class="ml-4">
                            <h5><?= $ifsc['State'] ?></h5>
                        </span>
                    </div>
                <?php endif; ?>

                <?php if (isset($ifsc['Phone'])) : ?>
                    <div class="row ml-4 mr-4 mb-2">
                        <h3 class="ifsc-box">Phone: </h3>
                        <span class="ml-4">
                            <h5><?= $ifsc['Phone'] ?></h5>
                        </span>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    <?php endif; ?>
</div>

<div class="landing-sub">
  <div class="container">
    <div class="row">
      <div class="offset-md-1 col-md-10">
        <div class="landing-sub-content">
          <h2>Get this Bank Api Now
          </h2>
          <a href="https://rapidapi.com/RandomFastApi/api/banks-info">Contact</a>
        </div>
      </div>
    </div>
  </div>
</div>

  <?php $this->load->view('components/footer')?>
  <?php $this->load->view('components/script')?>
  <script>
    document.getElementById('searchButton').addEventListener('click', function () {
      var ifscCode = document.getElementById('ifscInput').value;
      if (validateIFSC(ifscCode)) {
        window.location.href = "<?php echo base_url('search'); ?>";
      } else {
        alert('Invalid IFSC Code. Please enter a valid code.');
      }
    });

    function validateIFSC(ifsc) {
      var regex = /^[A-Za-z]{4}[0-9]{7}$/;
      return regex.test(ifsc);
    }
  </script>

  <style>
    .ifsc-box {
      width: 150px;
      text-align: left;
    }
  </style>
</body>

</html>