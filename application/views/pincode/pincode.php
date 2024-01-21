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
          <h2>Find Post Office from PinCode</h2>
          <p>Enter PinCode to search for Nearedt Post Office</p>
          <form action="<?= base_url('find') ?>" method="get">
            <div class="input-group">
              <input type="text" required name="pincode" class="form-control" placeholder="Enter Pincode">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit" id="searchButton">Search</button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

  <?php if (isset($pincode) ) : ?>

  <div class="landing-feature">
    <div class="container">
      <div class="landing-feature-item">
        <?php foreach ($pincode as $pincode) { ?>
        <div class="row ml-4 mr-4 mb-2">
          <h3 class="ifsc-box">
            <?= $pincode['PostOffice'] ?>
          </h3>
          <span class="ml-4">
            <a
              href="<?= base_url('details?' . http_build_query(['pinCode' => $pincode['PinCode'], 'postOffice' => $pincode['PostOffice']])) ?>">See</a>
          </span>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <?php if (isset($details) ) : ?>
  <div class="landing-feature">
    <div class="container">
      <div class="landing-feature-item">
        <?php foreach ($details as $key => $value) { ?>
        <div class="row ml-4 mr-4 mb-2">
          <h3 class="ifsc-box1">
            <?= $key == "Description" ? "" : $key ?>
          </h3>
          <span class="ml-4">
            <h6>
            <?= $value ?>
            </h6>
          </span>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <div class="landing-sub">
    <div class="container">
      <div class="row">
        <div class="offset-md-1 col-md-10">
          <div class="landing-sub-content">
            <h2>Get this Pincode Api Now
            </h2>
            <a href="https://rapidapi.com/RandomFastApi/api/search-pin-code">Contact</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php $this->load->view('components/footer')?>
  <?php $this->load->view('components/script')?>

  <style>
    .ifsc-box {
      width: 600px;
      text-align: left;
    }
    .ifsc-box1 {
      width: 220px;
      text-align: left;
    }
  </style>
</body>

</html>