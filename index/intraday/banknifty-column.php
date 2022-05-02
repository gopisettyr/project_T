<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Basic Column - Grouped</title>

    <link href="../../assets/styles.css" rel="stylesheet" />

    <style>
      
        #chart {
      //max-width: 650px;
    }
      
    </style>

    <script>
      window.Promise ||
        document.write(
          '<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js"><\/script>'
        )
      window.Promise ||
        document.write(
          '<script src="https://cdn.jsdelivr.net/npm/eligrey-classlist-js-polyfill@1.2.20171210/classList.min.js"><\/script>'
        )
      window.Promise ||
        document.write(
          '<script src="https://cdn.jsdelivr.net/npm/findindex_polyfill_mdn"><\/script>'
        )
    </script>

    
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    

    <script>
      // Replace Math.random() with a pseudo-random number generator to get reproducible results in e2e tests
      // Based on https://gist.github.com/blixt/f17b47c62508be59987b
      var _seed = 42;
      Math.random = function() {
        _seed = _seed * 16807 % 2147483647;
        return (_seed - 1) / 2147483646;
      };
    </script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


    
  </head>

  <body>
     <div class="card">
		<div class="card-header">
			BANKNIFTY CHANGE
		</div>
		<div class="card-body" id="chart3">
		</div>
	 </div>

    <script>
      $(document).ready(function(){
	  $.getJSON("banknifty_column_data.php", function(res){
	  //alert(res['PE']);
        var options = {
          series: [{
          name: 'OI Change',
          data: res['PE']
        }, {
          name: 'OI Change',
          data: res['CE']
        }],
          chart: {
          type: 'bar',
          height: 250
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '50%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['PE Chg','CE Chg'],
        },
        yaxis: {
          title: {
            text: ''
          }
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return val 
            }
          }
        }
        };

        var chart3 = new ApexCharts(document.querySelector("#chart3"), options);
        chart3.render();
		})
      })
      
    </script>

    
  </body>
</html>
