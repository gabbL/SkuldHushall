<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../fixed-nav-master/bars/style.css" type="text/css">
    <link rel="stylesheet" href="../fixed-nav-master/css/card.css" type="text/css">
    <script src="../fixed-nav-master/bars/amcharts.js" type="text/javascript"></script>
    <script src="../fixed-nav-master/bars/serial.js" type="text/javascript"></script>
    <script src="../fixed-nav-master/bars/light.js" type="text/javascript"></script>
    <title>Skuldkvot per hushåll</title>
  </head>

  <body>
    <div class="w3-row">
      <div class="w3-col w3-container" style="width:40%">
        <script>

          //Takes the data which is returned from the php-code and puts it in an array named array.
          array = <?php
          //Declares and array named bla.
          $bla = array();
          //Opens up a connection to a MYSQL server, and then saves it in a (variable?). Or if it doesn't work to connect, process is cancelled.
          $db = mysqli_connect("localhost", "admin", "password", "ar") or die("Fel vid anslutning");
          //Declare variable sql to get all data from table ar.
          $sql ="SELECT * FROM ar";
          //variable resultat gets the result from the mysqli_query function (which is all data from table ar) and if it doesn't work to connect, process is cancelled
          $resultat = mysqli_query($db, $sql) or die("error");
          //while there's still one row to fetch from the (table?)
          while($row = mysqli_fetch_array($resultat))     
          //Add three elements in variable(?) bla   
            array_push($bla, $row['ar'], $row["totalskuld"], $row["dispinkomst"]);
          //Return the json encoded array
            echo json_encode($bla);?>

            //Creates a new chart for the script from Amcharts.
              var chart;
            /*
            Because of the order we put in the column values per row into the array in the php-file we can
            put out the values in this order because we know that for each year there's three elements in the array.
            The element for disposable income is multiplied by 12 because the value is acquired as the monthly 
            disposable income and we want it to be the yearly disposable income.
            */
              var chartData = [
                  {
                      "ar": array[15],
                      "totalskuld": array[16],
                      "dispinkomst": array[17]*12
                  },
                  {
                      "ar": array[12],
                      "totalskuld": array[13],
                      "dispinkomst": array[14]*12
                  },
                  {
                      "ar": array[9],
                      "totalskuld": array[10],
                      "dispinkomst": array[11]*12
                  },
                  {
                      "ar": array[6],
                      "totalskuld": array[7],
                      "dispinkomst": array[8]*12
                  },
                  {
                      "ar": array[3],
                      "totalskuld": array[4],
                      "dispinkomst": array[5]*12
                  },
                  {
                      "ar": array[0],
                      "totalskuld": array[1],
                      "dispinkomst": array[2]*12
                  },
              ];

              AmCharts.ready(function () {
                  // SERIAL CHART
                  chart = new AmCharts.AmSerialChart();
                  chart.dataProvider = chartData;
                  chart.categoryField = "ar";
                  chart.startDuration = 1;
                  chart.plotAreaBorderColor = "#DADADA";
                  chart.plotAreaBorderAlpha = 1;
                  // this single line makes the chart a bar chart
                  chart.rotate = true;

                  // AXES
                  // Category
                  var categoryAxis = chart.categoryAxis;
                  categoryAxis.gridPosition = "start";
                  categoryAxis.gridAlpha = 0.1;
                  categoryAxis.axisAlpha = 0;

                  // Value
                  var valueAxis = new AmCharts.ValueAxis();
                  valueAxis.axisAlpha = 0;
                  valueAxis.gridAlpha = 0.1;
                  valueAxis.position = "bottom";
                  valueAxis.unit = " kr";
                  valueAxis.title = "Total skuld/disponibel årsinkomst i kr"
                  chart.addValueAxis(valueAxis);

                  // GRAPHS
                  // first graph
                  var graph1 = new AmCharts.AmGraph();
                  graph1.type = "column";
                  graph1.title = "Total skuld";
                  graph1.valueField = "totalskuld";
                  graph1.balloonText = "Totalskuld:[[value]] kr";
                  graph1.lineAlpha = 0;
                  graph1.fillColors = "#ADD981";
                  graph1.fillAlphas = 1;
                  chart.addGraph(graph1);

                  // second graph
                  var graph2 = new AmCharts.AmGraph();
                  graph2.type = "column";
                  graph2.title = "Disponabel årsinkomst";
                  graph2.valueField = "dispinkomst";
                  graph2.balloonText = "Disponibel årsinkomst:[[value]] kr";
                  graph2.lineAlpha = 0;
                  graph2.fillColors = "#81acd9";
                  graph2.fillAlphas = 1;
                  chart.addGraph(graph2);

                  // LEGEND
                  var legend = new AmCharts.AmLegend();
                  chart.addLegend(legend);

                  chart.creditsPosition = "top-right";

                  // Writes the graph.
                  chart.write("chartdiv");
              });
        </script>
        <div id="chartdiv" style="width: 35%; min-width: 400px; height: 50%; min-height: 500px"></div>
      </div>

      <div class="w3-col w3-container" style="width:35%;">
      <!-- -->
        <img src="bilder/skuldkvot_karta3.jpeg" alt="Geografisk representation över medianskuldkvoten per komun" style="width: 80%; height: auto;"> 
      </div>

      <div class="w3-col w3-container" style="width:25%;">
        <div class="card">
          <div class="header">
          <!--"The bar diagram to the left shows the relationship between the total debt and the disposable yearly income per household between 2011-2016." -->
            <p>Stapeldiagrammet till vänster visar förhållandet mellan den totala skulden och den disponibla årsinkomsten per hushåll mellan 2011-2016. </p>
          </div>

          <div class="container">
          <!-- "The picture to the right show a geographic representation over the mediandebt-quota per municipality" -->
            <p>Bilden till höger visar en geografisk representation över medianskuldkvoten per kommun.</p>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
