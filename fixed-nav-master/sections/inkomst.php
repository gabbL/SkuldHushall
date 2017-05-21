<head>
	<meta charset="UTF-8">
	<title>Inkomst</title>
	<script src="https://cdn.plot.ly/plotly-latest.min.js"></script> <!-- SE: länkar till url för plotlys graf. /EN: Links to url for the graph of plotly. -->
	<script>
		var layout = {
		  title: 'År 2008',
		  xaxis: {
		    title: 'Ålder',
		    showgrid: false,
		    zeroline: false
		  },
		  yaxis: {
		    title: 'Medianvärde för disponibel inkomst',
		    showline: false
		  }
		};

		function loadDoc() {
			var xhttp = new XMLHttpRequest(); //Declares the variable xhttp to an API which can retrieve data from a URL without having to do a full page request    

			xhttp.onreadystatechange = function() //When all the data is aquired do this.
			{
				if (this.readyState == 4 && this.status == 200) //If the request is finished and the ready status is OK
				{
					var data = JSON.parse(this.responseText); //Translates the JSON DOMString to readable data for the plotly function....  CORRECT?
					Plotly.newPlot('graf', data , layout);
				}
			};
			//Getting the data from the php-file to then use it in the function above.
			xhttp.open("GET", "plotDataPHP_REST.php", true);
			// xhttp.open("POST", "plotDataPHP_REST.php", true);
			xhttp.send();
		}
	</script>

</head>

<body>
  <div id="graf" style="width: 1200px; height: 400px; margin: auto;">
  </div>
<button type="button"  onclick="loadDoc()" style="position: right;">Ladda om</button> <!-- SE: Laddar in grafen. / EN: Loads the graph. -->

</body>
