// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';


// Area Chart Example
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: dataObjectsline[0].labelline,
    datasets: [{
      label: "Income",
      lineTension: 0.3,
      backgroundColor: "rgba(0, 0, 0, 0)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: dataObjectsline[0].dataline,
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
      }],
      yAxes: [{
        
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        },
        ticks: {
          beginAtZero: true,
          userCallback: function(label, index, labels) {
            if (Math.floor(label) === label) {
              return label;
            }
          }
      }
      }],
    },
    legend: {
      display: true
    }
  }
});

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

