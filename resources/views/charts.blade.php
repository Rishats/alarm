@foreach($lastelement as $element)
{{ dump($element->temperature) }}
@endforeach
<!DOCTYPE HTML>
<html>
<head>
<script type = "text/javascript" >

yVal = 66;
window.onload = function () {
	var dataPoints = [{y : 0}, {y : 1}, {y : 2}, {y : 3}, {y : 4}];
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