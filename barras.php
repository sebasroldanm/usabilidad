<!DOCTYPE html>
<html>

<head>
	<title>Creating Dynamic Data Graph using PHP and Chart.js</title>
	<style type="text/css">
		#chart-container {
			width: 80%;
			height: 10%;
		},
	</style>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/Chart.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
	<h1>Graficas</h1>
	<div id="chart-container">
		<canvas id="graphCanvas"></canvas>
	</div>

</body>

<script>
	$(document).ready(function() {
		showGraph();
	});


	function showGraph() {
		{
			$.post("datos.php",
				function(data) {
					console.log(data);
					var name = [];
					var marks = [];

					for (var i in data) {
						name.push(data[i].student_name);
						marks.push(data[i].marks);
					}

					var chartdata = {
						labels: name,
						datasets: [{
							label: 'Cálculo',
							backgroundColor: '#49e2ff',
							borderColor: '#46d5f1',
							hoverBackgroundColor: '#CCCCCC',
							hoverBorderColor: '#666666',
							data: marks
						}]
					};

					var graphTarget = $("#graphCanvas");

					var barGraph = new Chart(graphTarget, {
						type: 'bar',
						data: chartdata
					});
				});
		}
	}
</script>

</html>