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
          <h2 class="white">Lumpsum Calculator</h2>
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

                      <input required type="text" class="form-control" id="lumpsumAmount"
                        placeholder="Enter lumpsum amount">
                    </div>
                    <script>
                      document.getElementById("lumpsumAmount").addEventListener("input", function() {
                          let lumpAmountValue = this.value.replace(/\D/g, "");
                          if (!isNaN(lumpAmountValue)  && lumpAmountValue !== '') {
                            lumpAmountValue = parseInt(lumpAmountValue);
                            lumpAmountValue = lumpAmountValue.toLocaleString();
                            lumpAmountValue = lumpAmountValue;
                        } else {
                            lumpAmountValue = '';
                        }
                        this.value = lumpAmountValue;

                      });
                  </script>
                    <div class="col-md-8 mt-4">
                      <button class="btn btn-primary" onclick="calculateLumpsum()">Calculate</button>
                    </div>
                    <div id="errorSection" class="col-md-12 mt-4" style="display:none;">
                      <p class="white" id="errorMessage"></p>
                    </div>
                    <div class="col-md-8 mt-4" id="data1" style="display:none;">
                      <button class="white" onclick="toggleReport()">Show/Hide Report</button>
                    </div>

                  </div>
                </div>
              </div>
              <div class="w-5/12 relative sm:w-full" id="data" style="display:none;">
                <div class="shadow-md rounded-md p-12 relative w-full sm:p-6 xs:p-2">
                  <div>
                  <canvas id="lumpsumChart" width="500" height="200"></canvas>
                  </div>
                  <div>
                  <div>
                    <div class="flex justify-between items-center pt-3">
                      <div>Invested Amount</div>
                      <div class="undefined whitespace-nowrap"><span>₹</span><span
                          id="totalInvested"></span><span></span>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="flex justify-between items-center pt-3">
                      <div>Total Earning</div>
                      <div class="undefined whitespace-nowrap"><span>₹</span><span
                          id="totalEarnings"></span><span></span></div>
                    </div>
                  </div>
                  <div>
                    <div class="flex justify-between items-center pt-3">
                      <div>Future Value</div>
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
  </div>

  
  <div class="container mt-4" id="resultSection" style="display:none;">
    <div class="col-md-12 mt-4">
    <p class="white">Reports</p>
      <table class="table">
        <thead>
          <tr>
            <th>Year</th>
            <th>Future Value</th>
            <th>Total Earnings</th>
          </tr>
        </thead>
        <tbody id="yearlyReports">
        </tbody>
      </table>
    </div>
  </div>


  <div class="wg-container">
    <div class="styles__CalculatorLayoutStyle-sc-1fy3shr-1 hYTzpD">
      <div>
        <div class="flex justify-between gap-6 calculator sm:flex-col">
          <div class="w-8/12 sm:w-full">
          <div class="py-6">
                  <h2 class="text-s-24 sm:text-s-20 white"><strong>What is Lumpsum Investment?</strong></h2>
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
  .white{
    color: #fff;
  }
</style>
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> <!-- Include jQuery -->

  <script>

    var chartReady = false;
    function calculateLumpsum() {
        var rate = parseFloat(document.getElementById('rate').value);
        var time = parseFloat(document.getElementById('time').value);
        var lumpsumAmount = parseFloat(document.getElementById('lumpsumAmount').value.replaceAll(',',''));
        $.ajax({
            url: "<?php echo base_url('calculate_lumpsum'); ?>",
            type: "GET",
            data: { rate: rate, time: time, lumpsumAmount: lumpsumAmount },
            dataType: 'json',
            success: function (response) {
              if(response['error'] == 'Invalid input parameters'){
                document.getElementById('errorMessage').innerText = 'Invalid input parameters. Please check your inputs.';
                document.getElementById('errorSection').style.display = 'block';
              }
              else{
                displayYearlyReports(response.yearlyReports);
                document.getElementById('futureValue').innerText =  response.futureValue;
                document.getElementById('totalEarnings').innerText =  response.totalEarnings;
                document.getElementById('totalInvested').innerText = response.totalInvested;
                createChart(response);
              }
                
            }
        });
    }

   

    function displayYearlyReports(yearlyReports) {
        var yearlyReportsTable = document.getElementById('yearlyReports');
        yearlyReportsTable.innerHTML = '';

        for (var i = 0; i < yearlyReports.length; i++) {
            var row = document.createElement('tr');
            row.innerHTML = '<td>' + yearlyReports[i].year + '</td>' +
                '<td>₹ ' + yearlyReports[i].futureValue + '</td>' +
                '<td>₹ ' + yearlyReports[i].totalEarnings + '</td>';

            yearlyReportsTable.appendChild(row);
        }
    }

    function createChart(data) {
        var labels = [];
        var values = [];
        for (var i = 0; i < data.yearlyReports.length; i++) {
            labels.push(data.yearlyReports[i].year);
            var numericValue = parseFloat(data.yearlyReports[i].futureValue.replaceAll(",", ""));
            values.push(isNaN(numericValue) ? 0 : numericValue);
        }

        var existingCanvas = document.getElementById('lumpsumChart');
        var newCanvas = document.createElement('canvas');
        newCanvas.id = 'lumpsumChart';
        existingCanvas.parentNode.replaceChild(newCanvas, existingCanvas);
        var ctx = newCanvas.getContext('2d');
        window.lumpsumChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Future Value',
                    data: values,
                    backgroundColor: 'red',
                    borderColor: 'white',
                    borderWidth: 2,
                    fill: false,
                    pointRadius: 2,
                    pointBackgroundColor: 'WHITE',
                    pointHoverRadius: 7
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: { display: true, text: 'Years' },
                        ticks: { color: 'white' }
                    },
                    y: {
                        title: { display: true, text: 'Returns' },
                        ticks: { color: 'white' }
                    }
                }
            }
        });
        chartReady = true;
        toggleDataVisibility();
    }
    function toggleDataVisibility() {
      var dataDiv = document.getElementById('data');
      var dataDiv1 = document.getElementById('data1');
      if (chartReady) {
        dataDiv.style.display = 'block';
        dataDiv1.style.display = 'block';
      } else {
        dataDiv.style.display = 'none';
        dataDiv1.style.display = 'none';
      }
    }
    function toggleReport() {
      var reportTable = document.getElementById('resultSection');
      if (chartReady) {
        if (reportTable.style.display === 'none') {
          reportTable.style.display = 'block';
        } else {
          reportTable.style.display = 'none';
        }
      } else {
        alert('Please calculate the SIP first to prepare the chart.');
      }
    }
  </script>
 
  <?php $this->load->view('components/faq')?>
  <?php $this->load->view('components/footer')?>
  <?php $this->load->view('components/script')?>

</body>

</html>
