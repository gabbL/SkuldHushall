  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../fixed-nav-master/bars/style.css" type="text/css">
    <link rel="stylesheet" href="../fixed-nav-master/css/card.css" type="text/css">
    <script src="../fixed-nav-master/bars/amcharts.js" type="text/javascript"></script>
    <script src="../fixed-nav-master/bars/serial.js" type="text/javascript"></script>
    <script src="../fixed-nav-master/bars/light.js" type="text/javascript"></script>
    <title>Skuld</title>
  </head>

  <body>
    <div class="w3-row">
      <div class="w3-col w3-container" style="width:50%">
        <script>
        //Takes the data which is returned from the php-code and puts it in an array named array.
          array = <?php
          //Declares an array named totskuld
          $totskuld = array();
          //Opens up a connection to a MYSQL server, and then saves it in a (variable?). Or if it doesn't work to connect, process is cancelled.
          $db = mysqli_connect("localhost", "admin", "password", "ar") or die("Fel vid anslutning");
          //Declare variable sql to get all data from table ar.
          $sql ="SELECT * FROM ar";
          //variable resultat gets the result from the mysqli_query function (which is all data from table ar) and if it doesn't work to connect, process is cancelled
          $resultat = mysqli_query($db, $sql) or die("error");
          //while there's still one row to fetch from the (table?)
          while($row = mysqli_fetch_array($resultat))
          //Add three elements in variable(?) totskuld
            array_push($totskuld, $row['ar'], $row["totalskuld"], $row["bolaneskuld"]);
          //Return the json encoded array
            echo json_encode($totskuld);?>

            //Declare a new chart with the id(?) chartdiv2.
              var chart = AmCharts.makeChart("chartdiv2", {
                  "theme": "light",
                  "type": "serial",
            /*Because of the order we put in the column values per row into the array in the php-file
             we can put out the values in this order because we know that for each year there's three elements in the array.
            */
                  "dataProvider": [{
                      "ar": array[0], 
                      "totalskuld": array[1],
                      "bolaneskuld": array[2]
                  }, {
                      "ar": array[3],
                      "totalskuld": array[4],
                      "bolaneskuld": array[5]
                  }, {
                      "ar": array[6],
                      "totalskuld": array[7],
                      "bolaneskuld": array[8],
                  }, {
                      "ar": array[9],
                      "totalskuld": array[10],
                      "bolaneskuld": array[11],
                  }, {
                      "ar": array[12],
                      "totalskuld": array[13],
                      "bolaneskuld": array[14],
                  }, {
                      "ar": array[15],
                      "totalskuld": array[16],
                      "bolaneskuld": array[17],
                  }],
                  "valueAxes": [{
                      "unit": " kr",
                      "position": "left",
                      "title": "Totalskuld/bolåneskuld i kr",
                  }],
                  "startDuration": 1,
                  "graphs": [{
                      "balloonText": "Totalskuld [[category]]: <b>[[value]]</b> kr",
                      "fillAlphas": 0.9,
                      "lineAlpha": 0.2,
                      "title": "totalskuld",
                      "type": "column",
                      "valueField": "totalskuld"
                  }, {
                      "balloonText": "Bolåneskuld [[category]]: <b>[[value]]</b> kr",
                      "fillAlphas": 0.9,
                      "lineAlpha": 0.2,
                      "title": "bolaneskuld",
                      "type": "column",
                      "clustered":false,
                      "columnWidth":0.5,
                      "valueField": "bolaneskuld"
                  }],
                  "plotAreaFillAlphas": 0.1,
                  "categoryField": "ar",
                  "categoryAxis": {
                      "gridPosition": "start"
                  },
                  "export": {
                    "enabled": false
                   }

              });
        </script>
        <!-- Link to the graph in the div which shows it on the site.  -->
        <div id="chartdiv2" style="width: 100%; min-width: 400px; height: 75%; min-height: 500px"></div>
</div>
      <!--A class from the w3schools site WHICH DOES WHAT?? -->
      <div class="w3-col w3-container" style="width:50%">
      <!-- calls the class card from the stylesheet card.css which gives the dropdown-menu its design and aligns it on the right side of the graph. -->
        <div class="card">
          <div class="header"><br>
            <p>De senaste åren har andelen hushåll som betalar tillbaka på sina bostadslån legat på ungefär 50%.</p><br>
            <p>Välj ett år nedan för att se hur lång tid det tar i snitt för ett hushåll att betala tillbaka sina skulder.</p>
          </div>

          <div class="container">
            <div id="andra">
              <form action="#" method="post">
                <table><tr><td>
                  <select name="dropdown">
                    <option value="" disabled="disabled" selected="selected">Välj ett år!</option>
                    <option value="2011">2011</option>
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                  </select>
                  <input type="submit" name="knapp" value="Visa år"></td></tr>
                </table>
              </form>
                <?php
                $db = mysqli_connect("localhost", "admin", "password", "ar") or die("Fel vid anslutning");
                if(isset($_POST['dropdown'])){
                  $valtar = $_POST["dropdown"];
                	$resultat = "SELECT antalar FROM ar WHERE ar = $valtar";
                  $result1 = mysqli_query($db, $resultat);
                	 echo  "<table><tr>";
                    while ($row = mysqli_fetch_array($result1)) {
                      $antalar = $row['antalar'];}
                	 echo "<td><p>År " . $valtar . " tog det i genomsnitt " . $antalar . " år att betala tillbaka lånet. Observera att detta endast gäller de som faktiskt betalade tillbaka på sin skuld.</td></p>";}
                   echo "</table></tr>";?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
