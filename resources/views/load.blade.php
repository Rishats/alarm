<!DOCTYPE HTML>
<html>
<head>
<script type = "text/javascript" >
var phpvar = "<?php echo $arraydone[0]; ?>";
var a = parseInt(phpvar);
yVal = a;
window.onload = function () {
	var dataPoints = [{y : 0}, {y : 10}, {y : 20}, {y : 30}, {y : 40}];
	var chart = new CanvasJS.Chart("chartContainer", {
			title : {
				text : "Dynamic Data"
			},
			data : [{
					type : "spline",
					dataPoints : dataPoints
				}
			]
		});

	chart.render();
	
	updateCount = 0;
	var updateChart = function () {
		
		dataPoints.push({
			y : yVal
		});
      	
        chart.options.title.text = "Update " + updateCount;
		chart.render();    
		
	};

	// update chart every second
	setInterval(function(){updateChart()}, 1000);
}	
</script>
<script src="js/canvasjs.min.js"></script>
</head>
<body>
<div id = "chartContainer" style = "height: 300px; width: 100%;" />
</body>
</html>