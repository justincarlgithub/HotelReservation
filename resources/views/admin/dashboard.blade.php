@include('admin.sidebar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        
                        <div class="row">
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
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
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
                            <div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
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
                            <div class="col-xl-6">
                                <div class="card mb-4 shadow h-100">
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between px-3" style="width: 100%;">
                                        <h6 class="m-0 font-weight-bold text-secondary"> <i class="fas fa-chart-area me-1"></i>Reservations Made</h6>
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Analysis
                                          </button>
                                          <ul class="dropdown-menu">
                                            <button class="btn active" onclick="changeData(0)" >This Week</button>
                                            <button class="btn" onclick="changeData(1)">This Month</button>
                                            <button class="btn" onclick="changeData(2)">This Year</button>
                                          </ul>
                                        </div>
                                    </div>
                                    <div class="card-body"><canvas id="chart" width="100%" height="40"></canvas></div>
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
var dataObjectsline = [
      {
        labelline: {!! json_encode($ldate) !!},
        dataline:  {!! json_encode($dincome) !!},
        _title: 'Daily',
      },
      {
        labelline: {!! json_encode($lweek) !!},
        dataline: {!! json_encode($dweek) !!},
        _title: 'Weekly',
      },
      {
        labelline: {!! json_encode($lyear) !!},
        dataline:{!! json_encode($dyear) !!} ,
        _title: 'Monthly',
      }
    ]
    
        </script>
        

        @include('partials.footer')
       