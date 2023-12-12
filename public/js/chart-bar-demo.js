// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var cty = document.getElementById("chart");
var chart= new Chart(cty, {
  type: 'bar',
  data: {
    labels: dataObjects[0]._label,
    datasets: [{
      label: "Reservations Made",
      backgroundColor: 'rgb(47, 128, 237,0.2)', 
      borderColor: "rgba(2,117,216,1)",
      data: dataObjects[0].data,
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          beginAtZero: true,
          userCallback: function(label, index, labels) {
            if (Math.floor(label) === label) {
              return label;
            }
          }
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false,
    },
    title: {
      display: true,
      text: dataObjects[0]._title,
      font: {
        size: 70,
      }
  },
  
}
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
    })
  };
