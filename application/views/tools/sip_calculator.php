<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://assets1.cleartax-cdn.com/content-prod/_next/static/css/3b16e32dce074681.css">
  <?php $this->load->view('components/head')?>

</head>

<body id="dark">
  <?php $this->load->view('components/navbar')?>
  <div class="landing-hero">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2 class="white">SIP Calculator</h2>
          <div data-testid="calculator-section">
            <div class="flex w-full sm:flex-col">
              <div class="w-6/12 ">
                <div class="shadow-md rounded-md p-12 relative w-full sm:p-6 xs:p-2">
                  <div class="mt-4">
                    <div class="col-md-10 mt-4">
                     <input required type="text" class="form-control" id="rate" placeholder="Enter annual rate of interest">
                    </div>
                    <script>
                      document.getElementById("rate").addEventListener("input", function() {
                          let rateValue = this.value.replace(/\D/g, "");
                          
                          if (!isNaN(rateValue) && rateValue !== '') {
                              rateValue = Math.min(rateValue, 40);
                              this.value = rateValue + '%';
                          } else {
                              this.value = '';
                          }
                      });
                  </script>
                    <div class="col-md-10 mt-4">

                      <input required type="text" class="form-control" id="time"
                        placeholder="Enter time period in years">
                    </div>
                    <script>
                      document.getElementById("time").addEventListener("input", function() {
                        let timeValues = this.value.replace(/\D/g, "");
                        if (!isNaN(timeValues) && timeValues !== '') {
                            timeValue = Math.min(timeValues, 35);
                            this.value = timeValue + ' years';
                        } else {
                            this.value = '';
                        }
                        });
                    </script>
                    <div class="col-md-10 mt-4">

                      <input required type="text" class="form-control" id="sipAmount"
                        placeholder="Enter monthly SIP amount">
                    </div>
                    <script>
                      document.getElementById("sipAmount").addEventListener("input", function() {
                          let sipAmountValue = this.value.replace(/\D/g, "");
                          if (!isNaN(sipAmountValue)  && sipAmountValue !== '') {
                            sipAmountValue = parseInt(sipAmountValue);
                            sipAmountValue = sipAmountValue.toLocaleString();
                            sipAmountValue = sipAmountValue;
                        } else {
                            sipAmountValue = '';
                        }
                        this.value = sipAmountValue;

                      });
                  </script>
                    <div class="col-md-8 mt-4">
                      <button class="btn btn-primary" onclick="calculateSIP()">Calculate</button>
                    </div>
                    <div class="col-md-8 mt-4" id="data1" style="display:none;">
                      <button class="white" onclick="toggleReport('monthlyReports')">Show/Hide Report</button>
                    </div>

                  </div>
                </div>
              </div>
              <div class="w-5/12 relative sm:w-full" id="data" style="display:none;">
                <div class="shadow-md rounded-md p-12 relative w-full sm:p-6 xs:p-2">
                  <div>
                    <div id="sipChart"></div>
                  </div>
                  <div>
                    <div class="flex justify-between items-center pt-3">
                      <div>Wealth Gained</div>
                      <div class="undefined whitespace-nowrap"><span>₹</span><span
                          id="totalEarnings"></span><span></span>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="flex justify-between items-center pt-3">
                      <div>Invested Amount</div>
                      <div class="undefined whitespace-nowrap"><span>₹</span><span
                          id="totalDeposited"></span><span></span></div>
                    </div>
                  </div>
                  <div>
                    <div class="flex justify-between items-center pt-3">
                      <div>Total Wealth</div>
                      <div class="font-bold  whitespace-nowrap"><span>₹</span><span
                          id="futureValue"></span><span></span>
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
                <p class="white">Monthly Reports
                  <span class="pl-4">
                    <i class="fa-solid fa-file-excel" style="color: #04e772;" onclick="downloadReport('Monthly')"></i>
                  </span>
                </p>
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
                <p class="white">Yearly Reports
                  <span class="pl-4">
                    <i class="fa-solid fa-file-excel" style="color: #04e772;" onclick="downloadReport('Yearly')"></i>
                  </span>
                </p>

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
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="wg-container">
    <div class="styles__CalculatorLayoutStyle-sc-1fy3shr-1 hYTzpD">
      <div>
        <div class="flex justify-between gap-6 calculator sm:flex-col">
          <div class="w-8/12 sm:w-full">
          <div class="py-6">
                  <h2 class="text-s-24 sm:text-s-20 white"><strong>What is SIP Calculator?</strong></h2>
                  <div class="my-4"><p>SIP calculator is a simulation, which allows you to estimate the return on mutual
                    fund investments made through SIP. Investing through SIPs in mutual funds is a popular investment
                    option for millennials. SIP calculators are designed to give potential investors a heads up on their
                    mutual fund investments. However, the actual return from the mutual fund scheme varies depending on
                    several factors. The SIP calculator does not account for the exit load and expense ratio (if any).
                    It is an online tool to calculate the SIP amount to achieve your financial goals, based on an
                    expected annual return.</p></div>
                </div>
                <div class="py-6">
                  <h2 class="text-s-24 sm:text-s-20 white"><strong>How does SIP Calculator Work?</strong></h2>
                  <div class="my-4"><p>A SIP plan calculator works by the values entered by the users.<br>You must enter
                    the amount of investment, frequency of investment, duration of investment, and the expected returns.
                    The SIP return calculator is designed based on the compound interest formula. The compounded
                    interest powers the mutual fund returns. ClearTax SIP Calculator shows the comparison of the returns
                    offered by mutual funds with fixed deposits.</p></div>
                  <div class="my-4"><h6>You can understand the workings of a SIP calculator with this formula.</h6></div>
                  <div class="my-4">&nbsp;</div>
                  <div class="my-4 white"><h6 class="white"><strong>FV = P [ (1+i)^n-1 ] * (1+i)/i&nbsp;</strong></h6></div>
                  <div class="my-4"><h6 class="white">FV = Future value or the amount you get at maturity.<br>P = Amount you invest
                    through SIP<br>i = Compounded rate of return<br>n = Investment duration in months<br>r = Expected
                    rate of return</h6></div>
               
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>

  <script>

    var chartPrepared = false;

    function calculateSIP() {
      var rate = parseFloat(document.getElementById('rate').value);
      var time = parseFloat(document.getElementById('time').value);
      var sipAmount = parseFloat(document.getElementById('sipAmount').value.replaceAll(',', ''));

      $.ajax({
        url: "<?php echo base_url('calculate_sip'); ?>",
        type: "GET",
        data: { rate: rate, time: time, sipAmount: sipAmount },
        dataType: 'json',
        success: function (response) {

          document.getElementById('futureValue').innerText = response.futureValues.slice(-1)[0];
          document.getElementById('totalEarnings').innerText = response.totalEarnings;
          document.getElementById('totalDeposited').innerText = response.totalDeposited;

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

        var futureValue = parseFloat(futureValueString);
        if (isNaN(futureValue)) {
          console.error('Invalid future value:', futureValueString);
          continue;
        }
        investedAmount += sipAmount;
        totalAmount += futureValue;

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

        var futureValue = parseFloat(futureValueString);
        if (isNaN(futureValue)) {
          console.error('Invalid future value:', futureValueString);
          continue;
        }
        investedAmount += sipAmount * (endMonth - startMonth + 1);
        totalAmount += futureValue;

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
      var values = data.futureValues.flat().map(value => parseFloat(value));
      console.log(values);
      var options = {
        chart: {
          type: 'line',
          // toolbar: {show: false},
        },
        series: [{
          name: 'Future Value',
          data: values
        }],
        xaxis: { categories: [""] },
        stroke: {
          curve: 'smooth',
          width: [2, 2]
        },
        grid: {
          xaxis: { lines: { show: false, } },
          yaxis: { lines: { show: false, } },
        },
        dataLabels: { enabled: false },
        tooltip: {
          shared: false, intersect: true,
          x: { show: false }
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
      chartPrepared = true;

      toggleDataVisibility();


    }

    function downloadReport(type) {
      var table;
      if (type === 'Monthly') {
        table = document.getElementById('monthlyReports');
      } else if (type === 'Yearly') {
        table = document.getElementById('yearlyReports');
      } else {
        console.error('Invalid report type');
        return;
      }

      var wb = XLSX.utils.table_to_book(table, { sheet: type });
      XLSX.writeFile(wb, type + '_Report.xlsx');
    }

    function toggleReport() {
      var reportTable = document.getElementById('resultSection');
      if (chartPrepared) {
        if (reportTable.style.display === 'none') {
          reportTable.style.display = 'block';
        } else {
          reportTable.style.display = 'none';
        }
      } else {
        alert('Please calculate the SIP first to prepare the chart.');
      }
    }
    function toggleDataVisibility() {
      var dataDiv = document.getElementById('data');
      var dataDiv1 = document.getElementById('data1');
      if (chartPrepared) {
        dataDiv.style.display = 'block';
        dataDiv1.style.display = 'block';
      } else {
        dataDiv.style.display = 'none';
        dataDiv1.style.display = 'none';
      }
    }



  </script>
  <?php $this->load->view('components/faq')?>

  <?php $this->load->view('components/footer')?>
  <?php $this->load->view('components/script')?>

</body>

</html>