<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('components/head')?>
</head>

<body id="dark">


  <?php $this->load->view('components/navbar', $metaData)?>

  <div class="container">
    <div class="row landing-hero">
      <div class="col-6 table-responsive">
        <h3 class="mb-4" style="color:white">Mainboard Upcoming Ipo's</h3>
        <table class="table">
          <thead>
            <tr>
              <th>Company Name</th>
              <th>Open</th>
              <th>Close</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($upcoming as $upcoming) { ?>
              
                <tr>
                  <td>
                  <a href="<?= $upcoming['slug'] == null ? "" :  base_url("detail?slug=" . urlencode($upcoming['slug'])) ?>" style="color: white">  <?php echo $upcoming['Company'] ?></a>
                   
                  </td>
                  <td>
                    <?php echo $upcoming['Open'] ?>
                  </td>
                  <td>
                    <?php echo $upcoming['Close'] ?>
                  </td>
                </tr>
             

            <?php } ?>
          </tbody>
        </table>
      </div>
      <div class="col-6 table-responsive">
        <h3 class="mb-4" style="color:white">Upcoming SME Ipo's</h3>
        <table class="table">
          <thead>
            <tr>
              <th>Company Name</th>
              <th>Open</th>
              <th>Close</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($sme as $sme) { ?>
            <tr>
              <td>
                <?php echo $sme['Company'] ?>
              </td>
              <td>
                <?php echo $sme['Open'] ?>
              </td>
              <td>
                <?php echo $sme['Close'] ?>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <?php $this->load->view('components/footer')?>
  <?php $this->load->view('components/script')?>

</body>

</html>

</html>