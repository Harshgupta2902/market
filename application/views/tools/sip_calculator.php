<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('components/head')?>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body id="dark">
  <?php $this->load->view('components/navbar')?>

  <div class="landing-hero">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2>SIP Calculator</h2>
          <p>Crypto is the most advanced UI kit for making the Blockchain platform. This kit comes with 4 different exchange pages, market, wallet, and many more</p>
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
              <button class="btn btn-primary" onclick="calculateSIP()">Calculate</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Display calculated data -->
  <div class="container mt-4" id="resultSection" style="display:none;">
    <div class="row">
      <div id="result col-md-3">
        <h2 class="white">Result:</h2>
        <p class="white" id="futureValue">Future Value: ₹ 0.00</p>
        <p class="white" id="totalEarnings">Total Earnings: ₹ 0.00</p>
        <p class="white" id="totalDeposited">Total Amount Deposited: ₹ 0.00</p>
      </div>
      <div class="col-md-9">
        <!-- Chart canvas -->
        <canvas id="sipChart" width="500" height="200"></canvas>
      </div>
    </div>

    <div class="col-md-12 mt-4">
      <p class="white">Reports</p>

      <table class="table">
        <thead>
          <tr>
            <th>Month</th>
            <th>Future Value</th>
          </tr>
        </thead>
        <tbody id="monthlyReports">
          <!-- Data will be dynamically populated here -->
        </tbody>
      </table>
    </div>
  </div>

  <style>
    .white {
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

        // Perform AJAX call to the CodeIgniter controller
        $.ajax({
            url: "<?php echo site_url('calculate_sip'); ?>",
            type: "GET",
            data: { rate: rate, time: time, sipAmount: sipAmount },
            dataType: 'json',
            success: function (response) {
                // Display result values and show the result section
                document.getElementById('futureValue').innerText = 'Future Value: ₹ ' + response.futureValues.slice(-1)[0];
                document.getElementById('totalEarnings').innerText = 'Total Earnings: ₹ ' + response.totalEarnings;
                document.getElementById('totalDeposited').innerText = 'Total Amount Deposited: ₹ ' + response.totalDeposited;
                document.getElementById('resultSection').style.display = 'block';

                // Display monthly reports
                displayMonthlyReports(response.futureValues);
                // Create a chart
                createChart(response);
            }
        });
    }

    function displayMonthlyReports(futureValues, sipAmount) {
    var monthlyReportsTable = document.getElementById('monthlyReports');
    monthlyReportsTable.innerHTML = '';

    let investedAmount = 0;
    var totalAmount = 0;

    for (var i = 0; i < futureValues.length; i++) {
        var row = document.createElement('tr');
        var monthNumber = i + 1;
        var futureValueString = futureValues[i];

        // Validate and convert future value to a number
        var futureValue = parseFloat(futureValueString.replace(',', ''));
        if (isNaN(futureValue)) {
            console.error('Invalid future value:', futureValueString);
            continue;  // Skip this iteration if the value is not a number
        }

        investedAmount += sipAmount;
        totalAmount += futureValue;

        row.innerHTML = '<td>' + monthNumber + '</td>' +
            '<td>₹ ' + futureValue.toFixed(2) + '</td>' +
            '<td>₹ ' + investedAmount.toFixed(2) + '</td>' +
            '<td>₹ ' + (totalAmount - investedAmount).toFixed(2) + '</td>';

        monthlyReportsTable.appendChild(row);
    }
}



    function createChart(data) {
      var labels = data.futureValues.map((value, index) => index);
      var values = data.futureValues.flat().map(value => parseFloat(value.replace(',', '')));
        var existingCanvas = document.getElementById('sipChart');

        // Create a new canvas element
        var newCanvas = document.createElement('canvas');
        newCanvas.id = 'sipChart';
        existingCanvas.parentNode.replaceChild(newCanvas, existingCanvas);

        var ctx = newCanvas.getContext('2d');

        // Create a new chart
        window.sipChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Future Value',
                    data: values,
                    backgroundColor: [
                        'rgba(0, 137, 132, .2)',
                    ],
                    borderColor: [
                        'rgba(0, 10, 130, .7)',
                    ],
                    borderWidth: 2,
                    fill: false,
                    pointHoverRadius: 7
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
