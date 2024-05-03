<!DOCTYPE html>
<html lang="en">

<head>
  


  <link rel="stylesheet" href="https://assets1.cleartax-cdn.com/content-prod/_next/static/css/3b16e32dce074681.css">
  <?php $this->load->view('components/head')?>

</head>

<body id="dark">
  <?php $this->load->view('components/navbar')?>
  <div class="landing-hero">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2>SIP Calculator</h2>

          <div data-testid="calculator-section">
            <h4 class="hidden ">SIP Calculator</h4>
            <div class="flex items-start w-full sm:flex-col sm:gap-9">
              <div class="w-6/12 ">
                <div class=" shadow-lg p-12 rounded-md sm:p-6">
                  <div class="mt-4">
                    <div class="col-md-8 mt-4">
                      <input required type="text" class="form-control" id="rate" placeholder="Enter annual rate of interest">
                    </div>
                    <div class="col-md-8 mt-4">
                      <input required type="text" class="form-control" id="time" placeholder="Enter time period in years">
                    </div>
                    <div class="col-md-8 mt-4">
                      <input required type="text" class="form-control" id="sipAmount" placeholder="Enter monthly SIP amount">
                    </div>
                    <div class="col-md-8 mt-4">
                      <button class="btn btn-primary" onclick="calculateSIP()">Calculate</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="w-5/12 relative sm:w-full">
                <div class="shadow-md rounded-md p-12 relative w-full sm:p-6 xs:p-2">
                  <div>
                    <div id="sipChart" width="500" height="200"></div>
                  </div>
                  <div>
                    <div class="flex justify-between items-center gap-2 border-b p-3">
                      <div>Wealth Gained</div>
                      <div class="undefined whitespace-nowrap"><span>₹</span><span id="totalEarnings"></span><span></span>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="flex justify-between items-center gap-2 border-b p-3">
                      <div>Invested Amount</div>
                      <div class="undefined whitespace-nowrap"><span>₹</span><span id="totalDeposited"></span><span></span></div>
                    </div>
                  </div>
                  <div>
                    <div class="flex justify-between items-center gap-2 border-b p-3">
                      <div>Total Wealth</div>
                      <div class="font-bold  whitespace-nowrap"><span>₹</span><span id="futureValue"></span><span></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  <div class="container mt-4" id="resultSection" style="display:none;">
    <div>
      <div class="d-flex pb-0 p-3">
        <div class="nav-wrapper position-relative w-100">
          <ul class="nav nav-tabs nav-fill p-1" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#Monthly" role="tab"
                aria-controls="Monthly" aria-selected="false" id="monthlyTab">
                Monthly
              </a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#Yearly" role="tab" aria-controls="Yearly"
                aria-selected="true" tabindex="-1" id="yearlyTab">
                Yearly
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="p-3 mt-2">
        <div class="tab-content" id="v-pills-tabContent">
          <div class="tab-pane fade position-relative border-radius-lg active show" id="Monthly" role="tabpanel"
            aria-labelledby="Monthly">
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
          <div class="tab-pane fade position-relative border-radius-lg" id="Yearly" role="tabpanel"
            aria-labelledby="Yearly">
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
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

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
          
          document.getElementById('futureValue').innerText = response.futureValues.slice(-1)[0];
          document.getElementById('totalEarnings').innerText = response.totalEarnings;
          document.getElementById('totalDeposited').innerText = response.totalDeposited;
          document.getElementById('resultSection').style.display = 'block';

          displayMonthlyReports(response.futureValues, sipAmount);
          displayYearlyReports(response.futureValues, sipAmount);

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
          '<td>₹ ' + (futureValue - investedAmount).toFixed(2) + '</td>' +
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

      var options = {
        chart: {
          type: 'line',
          // toolbar: {
          //   show: false,
          // },
        },
        series: [{
          name: 'Future Value',
          data: values
        }],
        xaxis: {categories: [""]},
        stroke: {
          curve: 'smooth',
          width: [2, 2]
        },
        grid: {
          xaxis: {lines: {show: false,}},
          yaxis: {lines: {show: false,}},
        },
        dataLabels: {enabled: false},
        tooltip: {
          shared: false,intersect: true,
          x: {show: false}
        },
        legend: {
          horizontalAlign: "left",
          offsetX: 40
        }
      }
      if (chart) {
    chart.destroy();
  }

      var chart = new ApexCharts(document.querySelector("#sipChart"), options);
      chart.render();
    }


  </script>
  <?php $this->load->view('components/faq')?>

  <?php $this->load->view('components/footer')?>
  <?php $this->load->view('components/script')?>

</body>

</html>