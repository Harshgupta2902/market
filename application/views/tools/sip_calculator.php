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
                      <input required type="text" class="form-control" id="rate"
                        placeholder="Enter annual rate of interest">
                    </div>
                    <div class="col-md-8 mt-4">
                      <input required type="text" class="form-control" id="time"
                        placeholder="Enter time period in years">
                    </div>
                    <div class="col-md-8 mt-4">
                      <input required type="text" class="form-control" id="sipAmount"
                        placeholder="Enter monthly SIP amount">
                    </div>
                    <div class="col-md-8 mt-4">
                      <button class="btn btn-primary" onclick="calculateSIP()">Calculate</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="w-5/12 relative sm:w-full" id="data">
                <div class="shadow-md rounded-md p-12 relative w-full sm:p-6 xs:p-2">
                  <div>
                    <div id="sipChart"></div>
                  </div>
                  <div>
                    <div class="flex justify-between items-center gap-2 border-b p-3">
                      <div>Wealth Gained</div>
                      <div class="undefined whitespace-nowrap"><span>₹</span><span
                          id="totalEarnings"></span><span></span>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="flex justify-between items-center gap-2 border-b p-3">
                      <div>Invested Amount</div>
                      <div class="undefined whitespace-nowrap"><span>₹</span><span
                          id="totalDeposited"></span><span></span></div>
                    </div>
                  </div>
                  <div>
                    <div class="flex justify-between items-center gap-2 border-b p-3">
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

  <!-- Before the Monthly Report Table -->
  <button class="white" onclick="toggleReport('monthlyReports')">Show/Hide Report</button>

  <script>
    var chartPrepared = false;

    function toggleReport() {
        var reportTable = document.getElementById('resultSection');
        
        // Check if the chart is prepared
        if (chartPrepared) {
            if (reportTable.style.display === 'none') {
                reportTable.style.display = 'block';
            } else {
                reportTable.style.display = 'none';
            }
        } else {
            // If chart is not prepared, alert the user or take appropriate action
            alert('Please calculate the SIP first to prepare the chart.');
        }
    }
</script>

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

  <div class="wg-container">

    <div class="styles__CalculatorLayoutStyle-sc-1fy3shr-1 hYTzpD">
      <div>
        <div class="flex justify-between gap-6 calculator sm:flex-col">
          <div class="w-8/12 sm:w-full">
            <div>
              <div class="raw-html-embed">
                <div class="rc-calculator" id="RC-CALCULATOR-3"></div>
              </div>
              <h2 style="0px;" dir="ltr"><span><strong>What is a PPF calculator?</strong></span></h2>
              <p style="0px;" dir="ltr"><span>A Public Provident Fund (PPF) calculator is an online long-term investment
                  tool designed to help investors calculate the potential returns and growth of their investments in a
                  PPF account.</span></p>
              <p style="0px;" dir="ltr"><span>It considers various factors such as the contribution amount, interest
                  rate, and investment duration to estimate the maturity amount and the interest earned over a
                  period.&nbsp;</span></p>
              <p style="0px;" dir="ltr"><span>If you are someone who is planning to invest in PPF and not sure how much
                  to invest or how much returns you may get on investing a certain amount, our PPF calculator is here
                  for you.&nbsp;</span></p>
              <p style="0px;" dir="ltr"><span>By using a PPF calculator, you gain a clear understanding of the future
                  value of their PPF investments, make informed financial decisions, and effectively plan their
                  savings.</span></p>
              <p style="0px;" dir="ltr"><span>Once you decide the amount you can afford to invest on a regular basis,
                  the calculator considers the tenure to be 15 years and the prevalent interest rate to calculate the
                  returns.&nbsp;</span></p>
              <p>However, ensure that you make your PPF investments before the 5th of the month, or else you will not
                receive the interest for that month. This is because the PPF interest is calculated on the lowest
                balance between the close of the 5th day and the last day of every month.&nbsp;</p>
              <p>Thus, a PPF contribution made on the 5th of a month will be taken into consideration for interest
                calcultion and will earn interest for that month, while any PPF contribution made after the 5th of the
                month will not earn interest and result in a loss of interest for that month.&nbsp;</p>
              <h2 style="0px;" dir="ltr"><span><strong>Why use a PPF calculator?</strong></span></h2>
              <p style="0px;" dir="ltr"><span>Here’s why you should use a PPF calculator:</span></p>
              <p style="0px;" dir="ltr"><span><strong>Plan your investments:</strong> It helps you visualise how your
                  PPF grows, thus helping you plan your contributions to reach desired financial goals, which could be
                  building a retirement corpus, children’s education, marriage, etc.</span></p>
              <p style="0px;" dir="ltr"><span><strong>Compare investment options:</strong> You can compare PPF returns
                  with other options, such as bank deposits, helping you make informed financial decisions.</span></p>
              <p style="0px;" dir="ltr"><span><strong>Maximise your contributions:</strong> It will help you effectively
                  utilise the full Rs.1.5 lakh annual limit by understanding how different contribution frequencies
                  impact returns.</span></p>
              <p style="0px;" dir="ltr"><span><strong>Track your progress:</strong> You can monitor your PPF’s growth
                  over a period, keeping you motivated enough to remain on track to meet your financial goals.</span>
              </p>
              <h2 style="0px;" dir="ltr"><span><strong>How to use PPF Calculator?</strong></span></h2>
              <p style="0px;" dir="ltr"><span>You can follow the easy steps mentioned below to use the PPF calculator to
                  calculate your PPF investments accurately:</span></p>
              <p style="0px;" dir="ltr"><span><strong>Select the frequency of investment:</strong> The frequency of your
                  investment will influence your maturity value. Ideally, select monthly in case you are salaried for
                  more convenient investment and accurate results.</span></p>
              <p style="0px;" dir="ltr"><span><strong>Enter the monthly PPF investment:&nbsp;</strong>It is the amount
                  you wish to invest in the PPF account. You could input a monthly, quarterly, semi-annual, or annual
                  amount. Also, ensure that your investment amount is not more than Rs 12,500 per month or Rs 1.5 lakh a
                  year.</span></p>
              <p style="0px;" dir="ltr"><span><strong>Select the duration of investment</strong>:&nbsp; It is the time
                  you will continue your PPF investment. The minimum time available is 15 years, and you have the option
                  to extend the term in batches of five years after that. The PPF calculator assumes that you will be
                  investing the same amount till the time of maturity.</span></p>
              <p style="0px;" dir="ltr"><span><strong>Check the future value:</strong>&nbsp; Once you enter all the
                  above details, our calculator will automatically show the maturity amount.&nbsp;</span></p>
              <h2 style="0px;" dir="ltr"><span><strong>How the PPF Calculator Can Help You?</strong></span></h2>
              <p style="0px;" dir="ltr"><span>The PPF calculator makes it easy for an investor to keep track of their
                  account balance and growth. It can also aid in resolving your queries regarding changing interest
                  rates or how they affect your maturity value.</span></p>
              <p style="0px;" dir="ltr"><span>The online tool accurately calculates your potential profit and shows you
                  the data within a short span of a few seconds.</span></p>
              <p style="0px;" dir="ltr"><span>You are only required to provide few basic information such as deposit
                  amount, tenure and investment frequency. After this, you can automatically see the current PPF
                  interest rate on the calculator. This makes the PPF calculations quick and easy to use for
                  anyone.</span></p>
              <h2 style="0px;" dir="ltr"><span><strong>Formula used for calculating PPF</strong></span></h2>
              <p style="0px;" dir="ltr"><span>A PPF calculator uses a similar formula that’s used for calculating the
                  future of an annuity. Simply put, it calculates the future value of your investment, depending on the
                  annual contribution you make towards the PPF and the prevailing interest rate.&nbsp;</span></p>
              <p style="0px;" dir="ltr"><span>The calculation formula that a PPF calculator uses is as follows:</span>
              </p>
              <p style="0px;" dir="ltr"><span><strong>M = P [ ( { (1 + i) ^ n } - 1 ) / i ]&nbsp;</strong></span></p>
              <p style="0px;" dir="ltr"><span>In which:</span></p>
              <p style="0px;" dir="ltr"><span>M = Maturity benefit</span></p>
              <p style="0px;" dir="ltr"><span>P = Annual installments</span></p>
              <p style="0px;" dir="ltr"><span>i = Interest rate</span></p>
              <p style="0px;" dir="ltr"><span>n = Number of years</span></p>
              <p style="0px;" dir="ltr"><span>The part after the P in the formula is the annuity factor, which when
                  multiplied with the annual contribution, provides the maturity value of the PPF
                  investment.&nbsp;</span></p>
              <p style="0px;" dir="ltr"><span><strong>Illustration:</strong></span></p>
              <p style="0px;" dir="ltr"><span>Let’s say, you make annual contributions of Rs 1,00,000 for 15 years and
                  the PPF account interest rate is 7.1%.</span></p>
              <p style="0px;" dir="ltr"><span>By using the above-mentioned PPF calculation formula:</span></p>
              <p style="0px;" dir="ltr"><span>M= Rs 1,00,000 [({(1+0.071)^15}-1)/i] = Rs 27,12,139</span></p>
              <h2 style="0px;" dir="ltr"><span><strong>PPF calculator example table</strong></span></h2>
              <p style="0px;" dir="ltr"><span>The concept of the power of compounding and how it works in favour of an
                  investor when it comes to PPF calculation could be explained with the following table, which
                  highlights the PPF interest earned, the principal invested and the PPF maturity value for 15, 20, and
                  30 year tenures.</span></p>
              <div dir="ltr" align="left">
                <figure class="table" style="764px;">
                  <table class="ck-table-resized" style="border:0px solid inherit;">
                    <colgroup>
                      <col style="25%;">
                      <col style="25%;">
                      <col style="25%;">
                      <col style="25%;">
                    </colgroup>
                    <tbody>
                      <tr>
                        <td style="border:1pt solid rgb(0, 0, 0);padding:5pt;vertical-align:top;">
                          <p style="0px;" dir="ltr"><span><strong>Investment Period</strong></span></p>
                        </td>
                        <td style="border:1pt solid rgb(0, 0, 0);padding:5pt;vertical-align:top;">
                          <p style="0px;" dir="ltr"><span><strong>Total PPF Investment</strong></span></p>
                        </td>
                        <td style="border:1pt solid rgb(0, 0, 0);padding:5pt;vertical-align:top;">
                          <p style="0px;" dir="ltr"><span><strong>Total Interest Earned</strong></span></p>
                        </td>
                        <td style="border:1pt solid rgb(0, 0, 0);padding:5pt;vertical-align:top;">
                          <p style="0px;text-align:center;" dir="ltr"><span><strong>Maturity Value</strong></span></p>
                        </td>
                      </tr>
                      <tr>
                        <td style="border:1pt solid rgb(0, 0, 0);padding:5pt;vertical-align:top;">
                          <p style="0px;text-align:center;" dir="ltr"><span><strong>15 years</strong></span></p>
                        </td>
                        <td style="border:1pt solid rgb(0, 0, 0);padding:5pt;vertical-align:top;">
                          <p style="0px;text-align:center;" dir="ltr"><span><strong>Rs 1.5 lakh</strong></span></p>
                        </td>
                        <td style="border:1pt solid rgb(0, 0, 0);padding:5pt;vertical-align:top;">
                          <p style="0px;text-align:center;" dir="ltr"><span><strong>Rs 18,18,209</strong></span></p>
                        </td>
                        <td style="border:1pt solid rgb(0, 0, 0);padding:5pt;vertical-align:top;">
                          <p style="0px;text-align:center;" dir="ltr"><span><strong>Rs 40,68,209</strong></span></p>
                        </td>
                      </tr>
                      <tr>
                        <td style="border:1pt solid rgb(0, 0, 0);padding:5pt;vertical-align:top;">
                          <p style="0px;text-align:center;" dir="ltr"><span><strong>20 years</strong></span></p>
                        </td>
                        <td style="border:1pt solid rgb(0, 0, 0);padding:5pt;vertical-align:top;">
                          <p style="0px;text-align:center;" dir="ltr"><span><strong>Rs 1.5 lakh</strong></span></p>
                        </td>
                        <td style="border:1pt solid rgb(0, 0, 0);padding:5pt;vertical-align:top;">
                          <p style="0px;text-align:center;" dir="ltr"><span><strong>Rs 36,58,288</strong></span></p>
                        </td>
                        <td style="border:1pt solid rgb(0, 0, 0);padding:5pt;vertical-align:top;">
                          <p style="0px;text-align:center;" dir="ltr"><span><strong>Rs 66,58,288</strong></span></p>
                        </td>
                      </tr>
                      <tr>
                        <td style="border:1pt solid rgb(0, 0, 0);padding:5pt;vertical-align:top;">
                          <p style="0px;text-align:center;" dir="ltr"><span><strong>30 years</strong></span></p>
                        </td>
                        <td style="border:1pt solid rgb(0, 0, 0);padding:5pt;vertical-align:top;">
                          <p style="0px;text-align:center;" dir="ltr"><span><strong>Rs 1.5 lakh</strong></span></p>
                        </td>
                        <td style="border:1pt solid rgb(0, 0, 0);padding:5pt;vertical-align:top;">
                          <p style="0px;text-align:center;" dir="ltr"><span><strong>Rs 1,09,50,911</strong></span></p>
                        </td>
                        <td style="border:1pt solid rgb(0, 0, 0);padding:5pt;vertical-align:top;">
                          <p style="0px;text-align:center;" dir="ltr"><span><strong>Rs 1,54,50,911</strong></span></p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </figure>
              </div>
              <p style="0px;" dir="ltr"><span>In this PPF calculation example, it is assumed that the annual investment
                  amount is Rs 1,50,000, and the PPF interest rate is 7.1% per annum (the current PPF interest rate is
                  7.1% for Q4 of FY 2023-24).&nbsp;</span></p>
              <p style="0px;" dir="ltr"><span>The above example highlights the power of compounding when investing in
                  PPF – your maturity amount rises from Rs 40 lakh to Rs 1 crore merely by investing Rs. 1.5 lakh over a
                  15-year period to a 30-year period.</span></p>
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

    }


  </script>
  <?php $this->load->view('components/faq')?>

  <?php $this->load->view('components/footer')?>
  <?php $this->load->view('components/script')?>

</body>

</html>