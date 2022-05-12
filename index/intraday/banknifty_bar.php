<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Grouped Bar Chart</title>

    <link href="../../assets/styles.css" rel="stylesheet" />

    <style>
      
        #chart {
      max-width: 650px;
      margin: 35px auto;
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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

    
  </head>

  <body>
     <div class="card">
                <div class="card-header">
                       BANKNIFTY OI Compass
                </div>
                <div class="card-body" id="chart4">
                </div>
         </div>

    <script>
      $(document).ready(function(){
	  $.getJSON("banknifty_data.php", function(data){
			var options = {
			  series: [{
			  name: 'CE',
			  data: data.CE
			}, {
			  name: 'PE',
			  data: data.PE
			}],
			  chart: {
			  type: 'bar',
			  height: 600
			},
			plotOptions: {
			  bar: {
				horizontal: true,
				dataLabels: {
				  position: 'top',
				},
			  }
			},
			dataLabels: {
			  enabled: true,
			  offsetX: 30,
			  style: {
				fontSize: '10px',
				colors: ['grey']
			  }
			},
			stroke: {
			  show: true,
			  width: 1,
			  colors: ['#fff']
			},
			tooltip: {
			  shared: true,
			  intersect: false
			},
                        annotations: {
     yaxis: [
       {
         y: data.ATM[0],
         borderColor: "black",
         label: {
           borderColor: "#00E396",
           style: {
             color: "#fff",
             background: "#00E396"
           },
           text: "ATM"
         }
            },
      {
         y: data.PEOI,
         borderColor: "Green",
         label: {
           borderColor: "green",
           style: {
             color: "black",
             background: "green"
           },
           text: "Major Support"
         }
       },
         {
         y: data.CEOI,
         borderColor: "Red",
         label: {
           borderColor: "#e30000",
           style: {
             color: "black",
             background: "#e30000"
           },
           text: "Major Resistance"
         }
       }
     ],
   },

			xaxis: {
			  categories: data.categories,
			},
			};
			var chart4 = new ApexCharts(document.querySelector("#chart4"), options);
			chart4.render();
		})
      })
    </script>

    
  </body>
</html>
