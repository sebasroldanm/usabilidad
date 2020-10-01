<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-radar.min.js"></script>
    <title>Graficas</title>
    <!-- <style type="text/css">
        #container {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style> -->
</head>

<body>

    <h1>Graficas</h1>

    <canvas id="graphCanvas"></canvas>

    <div id="container" style="width: 500px; height: 400px;"></div>

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

<script>
        anychart.onDocumentReady(function() {
            // create data set on our data
            $.post("datosRadar.php",
                function(data) {
                    console.log(data);
                    var dataSet = anychart.data.set(data);

                    // map data for the first series, take x from the zero column and value from the first column of data set
                    var data1 = dataSet.mapAs({
                        x: 0,
                        value: 1
                    });
                    // map data for the second series, take x from the zero column and value from the second column of data set
                    var data2 = dataSet.mapAs({
                        x: 0,
                        value: 2
                    });
                    // map data for the third series, take x from the zero column and value from the third column of data set
                    var data3 = dataSet.mapAs({
                        x: 0,
                        value: 3
                    });

                    // create radar chart
                    var chart = anychart.radar();

                    // set chart title text settings
                    chart.title(
                        'Calculo Usabilidad con Diagráma de Radar'
                    );

                    // create first series with mapped data
                    var series1 = chart.line(data1).name('Shaman');
                    series1.markers().enabled(true).type('circle').size(3);
                    // create first series with mapped data
                    var series2 = chart.line(data2).name('Warrior');
                    series2.markers().enabled(true).type('circle').size(3);
                    // create first series with mapped data
                    var series3 = chart.line(data3).name('Priest');
                    series3.markers().enabled(true).type('circle').size(3);

                    // chart tooltip format
                    chart.tooltip().format('Value: {%Value}');

                    // set container id for the chart
                    chart.container('container');
                    chart.draw();
                })
        });
    </script>

</html>