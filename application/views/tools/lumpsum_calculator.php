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
        <h2>Lumpsum Calculator</h2>
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
                  <input required type="text" class="form-control" id="lumpsumAmount" placeholder="Enter lumpsum amount">
                </div>
                <div class="col-sm-12 mt-4" >
                  <button class="btn btn-primary" onclick="calculateLumpsum()">Calculate</button>
                </div>
                  <div id="errorSection" class="col-md-12 mt-4" style="display:none;">
                    <p class="white" id="errorMessage"></p>
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
        <div id="result col-md-3" >
          <h2 class="white" >Result:</h2>
          <p class="white" id="futureValue"></p>
          <p class="white" id="totalEarnings"></p>
          <p class="white" id="totalInvested"></p>
        </div>
        <div class="col-md-9">
          <!-- Chart canvas -->
          <canvas id="lumpsumChart" width="500" height="200"></canvas>
        </div>
    </div>


    <div class="col-md-12 mt-4">
    <p class="white" id="totalInvested">Reports</p>

      <table class="table">
        <thead>
          <tr>
            <th>Year</th>
            <!-- <th>Invested Amount</th> -->
            <th>Future Value</th>
            <th>Total Earnings</th>
          </tr>
        </thead>
        <tbody id="yearlyReports">
          <!-- Data will be dynamically populated here -->
        </tbody>
      </table>
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
    function calculateLumpsum() {
        // Get input values
        var rate = parseFloat(document.getElementById('rate').value);
        var time = parseFloat(document.getElementById('time').value);
        var lumpsumAmount = parseFloat(document.getElementById('lumpsumAmount').value);
        document.getElementById('resultSection').style.display = 'block';
    
        // Perform AJAX call to the CodeIgniter controller
        $.ajax({
            url: "<?php echo base_url('calculate_lumpsum'); ?>",
            type: "GET",
            data: { rate: rate, time: time, lumpsumAmount: lumpsumAmount },
            dataType: 'json',
            success: function (response) {
              if(response['error'] == 'Invalid input parameters'){
                document.getElementById('resultSection').style.display = 'none';
                document.getElementById('errorMessage').innerText = 'Invalid input parameters. Please check your inputs.';
                document.getElementById('errorSection').style.display = 'block';
              }
              else{
                displayYearlyReports(response.yearlyReports);
                document.getElementById('futureValue').innerText = 'Future Value: ₹ ' + response.futureValue;
                document.getElementById('totalEarnings').innerText = 'Total Earnings: ₹ ' + response.totalEarnings;
                document.getElementById('totalInvested').innerText = 'Total Amount Invested: ₹ ' + response.totalInvested;
                createChart(response);
                document.getElementById('resultSection').style.display = 'block';
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

            // Convert the futureValue to a numerical value
            var numericValue = parseFloat(data.yearlyReports[i].futureValue.replace(",", ""));
            values.push(isNaN(numericValue) ? 0 : numericValue);
        }

        // Get the existing canvas element
        var existingCanvas = document.getElementById('lumpsumChart');

        // Create a new canvas element
        var newCanvas = document.createElement('canvas');
        newCanvas.id = 'lumpsumChart';
        existingCanvas.parentNode.replaceChild(newCanvas, existingCanvas);

        var ctx = newCanvas.getContext('2d');

        // Create a new chart
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
    }
  </script>
 
  <?php $this->load->view('components/faq')?>
  <?php $this->load->view('components/footer')?>
  <?php $this->load->view('components/script')?>

</body>

</html>
