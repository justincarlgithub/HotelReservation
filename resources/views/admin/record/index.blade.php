@extends('admin.dashboard')
<?php use Carbon\Carbon; ?>
@section('content')

  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Bookings</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$count}}</div>
                      
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                           Income</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> 
                          @foreach ($tsales as $dat) 
                          {{ $dat->sales ? $dat->sales : 0 }}
                      @endforeach</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-peso-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Occupied Room
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                 {{ $roomoccupied }}
                            </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: 50%" aria-valuenow="10" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                                <div class="col-auto">
                                  <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                              </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>



  <div class=" container-fluid col-lg-12">
    <div class="row">
  
    <div class="card shadow mb-4 col-lg-6 ">
      <!-- Card Header - Dropdown -->
      <div
          class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Bookings Overview</h6>  
              <div class="btn-group" id="myDIV">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  Analysis
                </button>
                <ul class="dropdown-menu">
                  <button class="btn active" onclick="changeData(0)" >Last 6 days</button>
                  <button class="btn active" onclick="changeData(0)" >This Week</button>
                  <button class="btn" onclick="changeData(1)">This Month</button>
                  <button class="btn" onclick="changeData(2)">This Year</button>
                </ul>
              </div>
             </div>
      <!-- Card Body -->
      <div class="card-body">
          <div class="chart-area">
            <canvas id="chart"></canvas>
        </div>
      </div>
  </div>

</div>


</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
  <style>
	.chart-container {
	  width: 50%;
	  height: 50%;
	  margin: auto;
	}
  </style>

<script>
    var dataObjects = [
      {
        _label: {!! json_encode($labels) !!},
        data:  {!! json_encode($data) !!},
        _title: 'Daily',
      },
      {
        _label: {!! json_encode($mlabel) !!},
        data: {!! json_encode($mdata) !!},
        _title: 'Weekly',
      },
      {
        _label: {!! json_encode($ylabel) !!},
        data: {!! json_encode($ydata) !!} ,
        _title: 'Monthly',
      }
    ]
	const cty = document.getElementById("chart").getContext('2d');
	const chart = new Chart(cty, {
	  type: 'bar',
	  data: {
      labels:  dataObjects[0]._label,
		datasets: [{
		  label: 'Reservations made',
		  backgroundColor: 'rgb(47, 128, 237,0.2)', 
		  borderColor: 'rgb(47, 128, 237, 1)',
      borderWidth: 1,
		  data: dataObjects[0].data,
		}]
	  },
	  options: {
		scales: {
		  yAxes: [{
			ticks: {
			  beginAtZero: true,
        callback: function(value) {if (value % 1 === 0) {return value;}}
        
			},
		  }],
     
		},
     title: {
            display: true,
            text: dataObjects[0]._title,
            font: {
              size: 70,
            }
        }
    
	  },
	});
          function changeData(index) {
          chart.data.datasets.forEach(function(dataset) {
            dataset.data = dataObjects[index].data;
          });
            chart.options.title.text = dataObjects[index]._title;
            chart.data.labels = dataObjects[index]._label;
         
          chart.update();
        }

        var header = document.getElementById("myDIV");
          var btns = header.getElementsByClassName("btn");
          for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
              var current = document.getElementsByClassName("active");
              current[0].className = current[0].className.replace(" active", "");
              this.className += " active";
            });
}

 
  
    function changeDataline(index) {
           myChart.data.datasets.forEach(function(dataset) {
              dataset.data = dataObjectsline[index].dataline;
            });
              myChart.data.labels = dataObjectsline[index].labelline;
              myChart.options.title.text = dataObjectsline[index]._title;
          
            myChart.update();
          }

          var header = document.getElementById("myDIV");
            var btns = header.getElementsByClassName("btn");
            for (var i = 0; i < btns.length; i++) {
              btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("activeline");
                current[0].className = current[0].className.replace(" activeline", "");
                this.className += " activeline";
              });
  }
  </script>




  @endsection

