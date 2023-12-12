@include('admin.sidebar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4 shadow h-100">
                                    
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between px-3" style="width: 100%;">
                                    <h6 class="m-0 font-weight-bold text-secondary"> <i class="fas fa-chart-area me-1"></i> Income Overview</h6>
                                    <div class="btn-group" id="myDIV">
                                      <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Analysis
                                      </button>
                                      <ul class="dropdown-menu">
                                        <button class="btn" onclick="changeDataline(0)" >This Week</button>
                                        <button class="btn" onclick="changeDataline(1)">This Month</button>
                                        <button class="btn" onclick="changeDataline(2)">This Year</button>
                                      </ul>
                                    </div>
                                </div>
                                    <div class="card-body"><canvas id="myChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                   </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example

var cty = document.getElementById("chart");
// <block:setup:1>
    const labels = Utils.months({count: 7});
const data = {
  labels: labels,
  datasets: [{
    label: 'My First Dataset',
    data: [65, 59, 80, 81, 56, 55, 40],
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
  }]
};
// </block:setup>

// <block:config:0>
const config = {
  type: 'bar',
  data: data,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};
// </block:config>

module.exports = {
  actions: [],
  config: config,
};