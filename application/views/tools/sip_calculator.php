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
              <div class="col-sm-12 mt-4" >
                <button class="btn btn-primary" onclick="calculateSIP()">Calculate</button>
              </div>
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
        <canvas id="sipChart" width="500" height="200"></canvas>
      </div>
    </div>
    <div>
         <div class="d-flex pb-0 p-3">
            <div class="nav-wrapper position-relative w-100">
               <ul class="nav nav-tabs nav-fill p-1" role="tablist">
                  <li class="nav-item" role="presentation">
                     <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#Monthly" role="tab" aria-controls="Monthly" aria-selected="true"id="monthlyTab">
                     Monthly
                     </a>
                  </li>
                  <li class="nav-item" role="presentation">
                     <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#Yearly" role="tab" aria-controls="Yearly" aria-selected="false" tabindex="-1" id="yearlyTab">
                     Yearly
                     </a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="p-3 mt-2">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade position-relative border-radius-lg active show" id="Monthly" role="tabpanel" aria-labelledby="Monthly">
                    <div class="table-responsive">
                      <div class="col-md-12 mt-4">
                        <p class="white">Reports</p>
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Month</th>
                              <th>SIP</th>
                              <th>Invested Amount</th>
                              <th>Interest Earned</th>
                              <th>Future Value</th>
                            </tr>
                          </thead>
                          <tbody id="monthlyReports">
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
                <div class="tab-pane fade position-relative border-radius-lg" id="Yearly" role="tabpanel" aria-labelledby="Yearly" >
                    <div class="table-responsive">
                        <div class="col-md-12 mt-4">
                          <p class="white">Yearly Reports</p>
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Year</th>
                                <th>SIP</th>
                                <th>Invested Amount</th>
                                <th>Interest Earned</th>
                                <th>Future Value</th>
                              </tr>
                            </thead>
                            <tbody id="yearlyReports">
                              <!-- Data will be dynamically populated here -->
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
            </div>
         </div>
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
            url: "<?php echo base_url('calculate_sip'); ?>",
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
                displayMonthlyReports(response.futureValues, sipAmount );
                displayYearlyReports(response.futureValues, sipAmount);
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
            investedAmount += sipAmount;  // Accumulate the invested amount
            totalAmount += futureValue;   // Accumulate the total amount

            row.innerHTML = '<td>' + monthNumber + '</td>' +
                '<td>₹ ' + sipAmount.toFixed(2) + '</td>' +
                '<td>₹ ' + investedAmount.toFixed(2) + '</td>' +
                '<td>₹ ' + (futureValue-investedAmount ).toFixed(2) + '</td>'+
                '<td>₹ ' + futureValue.toFixed(2) + '</td>';

            monthlyReportsTable.appendChild(row);
        }
    }

    function displayYearlyReports(futureValues, sipAmount) {
        var yearlyReportsTable = document.getElementById('yearlyReports');
        yearlyReportsTable.innerHTML = '';

        let investedAmount = 0;
        var totalAmount = 0;

        for (var i = 0; i < futureValues.length; i += 12) {
          var row = document.createElement('tr');
          var startMonth = i + 1;
          var endMonth = Math.min(i + 12, futureValues.length);
          var futureValueString = futureValues[endMonth - 1];

          // Validate and convert future value to a number
          var futureValue = parseFloat(futureValueString.replace(',', ''));
          if (isNaN(futureValue)) {
            console.error('Invalid future value:', futureValueString);
            continue;
          }
          investedAmount += sipAmount * (endMonth - startMonth + 1); // Accumulate the invested amount for the year
          totalAmount += futureValue; // Accumulate the total amount

          row.innerHTML = '<td>' + startMonth + ' - ' + endMonth + '</td>' +
            '<td>₹ ' + (sipAmount * (endMonth - startMonth + 1)).toFixed(2) + '</td>' +
            '<td>₹ ' + investedAmount.toFixed(2) + '</td>' +
            '<td>₹ ' + (futureValue - investedAmount).toFixed(2) + '</td>' +
            '<td>₹ ' + futureValue.toFixed(2) + '</td>';

          yearlyReportsTable.appendChild(row);
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
<?php $this->load->view('components/faq')?>

  <?php $this->load->view('components/footer')?>
  <?php $this->load->view('components/script')?>

</body>

</html>
