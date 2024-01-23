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
        <div class="col-md-12 text-center">
        <h2>SIP Calculator</h2>
        <p>Crypo is the most advanced UI kit for making the Blockchain platform.
            This kit comes with 4 different exchange page, market, wallet and many more</p> 
            <div class="settings-profile">
              <div class="form-row mt-4">
                <div class="col-md-4">
                  <input required type="text" class="form-control" id="rate" placeholder="Enter annual rate of interest">
                </div>
                <div class="col-md-4">
                  <input required type="text" class="form-control" id="time" placeholder="Enter time period in years">
                </div>
                <div class="col-md-4">
                  <input required type="text" class="form-control" id="sipAmount" placeholder="Enter monthly SIP amount">
                </div>
                <button onclick="calculateSIP()">Calculate</button>

              </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Display calculated data -->
  <div class="container mt-4">
    <div class="row">
        <div id="result col-md-3" >
          <h2 class="white" >Result:</h2>
          <p class="white" id="futureValue">Future Value: ₹ 0.00</p>
          <p class="white" id="totalEarnings">Total Earnings: ₹ 0.00</p>
          <p class="white" id="totalDeposited">Total Amount Deposited: ₹ 0.00</p>
        </div>
        <div class="col-md-9">
          <!-- Chart canvas -->
          <canvas id="sipChart" width="200" height="100"></canvas>
     
        </div>

    </div>
  </div>

<style>
  .white{
    color: #fff;
  }
</style>
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
        function calculateSIP() {
            // Get input values
            var rate = parseFloat(document.getElementById('rate').value);
            var time = parseFloat(document.getElementById('time').value);
            var sipAmount = parseFloat(document.getElementById('sipAmount').value);

            // Perform SIP calculations
            var periods = Array.from({ length: time * 12 }, (_, i) => i + 1);
            var futureValues = periods.map(month => {
                return sipAmount * ((Math.pow(1 + rate / (12 * 100), month) - 1) / (rate / (12 * 100)));
            });

            // Calculate result values
            var futureValue = futureValues[futureValues.length - 1];
            var totalEarnings = futureValue - (sipAmount * periods.length);
            var totalDeposited = sipAmount * periods.length;

            // Display result values
            document.getElementById('futureValue').innerText = 'Future Value: ₹ ' + futureValue.toFixed(2);
            document.getElementById('totalEarnings').innerText = 'Total Earnings: ₹ ' + totalEarnings.toFixed(2);
            document.getElementById('totalDeposited').innerText = 'Total Amount Deposited: ₹ ' + totalDeposited.toFixed(2);

            // Create a chart
            var ctx = document.getElementById('sipChart').getContext('2d');
            var sipChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: periods,
                    datasets: [{
                        label: 'Future Value',
                        data: futureValues,
                        backgroundColor: [
                            'rgba(0, 137, 132, .2)',
                        ],
                        borderColor: [
                            'rgba(0, 10, 130, .7)',
                        ],
                        borderWidth: 2,
                        fill: false,
                        // pointRadius: 5,  // Add point markers
                        // pointBackgroundColor: 'red',  // Marker color
                        pointHoverRadius: 7  // Marker hover size
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: { title: { display: true, text: 'Months' } },
                        y: { title: { display: true, text: 'Returns' } }
                    }
                }
            });
        }
    </script>


  <?php $this->load->view('components/footer')?>
  <?php $this->load->view('components/script')?>

</body>

</html>