<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Svenska skulder</title>
    <link rel="stylesheet" href="../fixed-nav-master/css/styles.css">
    <script src="../fixed-nav-master/js/responsive-nav.js"></script>
  </head>

  <header>
    <!--    -->
    <a href="#start" class="logo" data-scroll>Svenska hushållens skulder</a>
    <nav class="nav-collapse">
    <!-- SE: Själva headern där man kan välja mellan de olika sektionerna som länkar till olika php-filer. 
          EN: The header where you can choose between the different sections which links to different php-files.
    -->
      <ul>  
        <li class="menu-item active"><a href="#start" data-scroll>Start</a></li>
        <li class="menu-item"><a href="#skuld" data-scroll>Skulder</a></li>
        <li class="menu-item"><a href="#inkomst" data-scroll>Inkomst</a></li>
        <li class="menu-item"><a href="#omsidan" data-scroll>Om sidan</a></li>
      </ul>
    </nav>
  </header>

  <!-- 
  SE: Sektionen för medelvärdet på Hushållens skulder och årliga disponibla inkomst.
  EN: The section for the meanvalue of the household debts and yearly disposable income.
  -->
  <section id="start">
    <h1>Skuldkvot per hushåll</h1> <!--SE: Titel / En: Title -->
    <!--SE:Hämtar start.php-filen/ EN: Gets start.php-file  --> 
    <div class="start"> <?php include 'sections/start.php';?></div> 
 </section>

  <section id="skuld">
    <h1>Totalskuld och bolåneskuld</h1> <!--SE: Titel / En: Title -->
    <!--SE:Hämtar skuld.php-filen/ EN: Gets skuld.php-file  -->    
    <div class="skuld"> <?php include 'sections/skuld.php';?></div>
    <div id="chartdiv2" style="width: 100%; min-width: 400px; height: 75%; min-height: 500px"></div>
  </section>

  <section id="inkomst">
    <h1>Disponibel inkomst för samtliga hushåll uttryckt i medianvärde. [TKR]</h1>  <!--SE: Titel / En: Title -->
    <!--SE:Hämtar inkomst.php-filen/ EN: Gets inkomst.php-file  --> 
    <div class="inkomst"> <?php include 'sections/inkomst.php';?></div>     
  </section>

  <section id="omsidan">
    <h1>Om sidan</h1> <!--SE: Titel / En: Title -->
    <!--SE:Hämtar omsidan.php-filen/ EN: Gets omsidan.php-file  --> 
    <div class="omsidan"> <?php include 'sections/omsidan.php';?></div>
  </section>

    <!--SE: Länkar till Javascripten vi som vi använder/ EN: Linking to the Javascript that we're using -->
    <script src="../fixed-nav-master/js/fastclick.js"></script>
    <script src="../fixed-nav-master/js/scroll.js"></script>
    <script src="../fixed-nav-master/js/fixed-responsive-nav.js"></script>
