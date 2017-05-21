



<?php
	// Länk till nedladdade REST-biblioteket.
	include('httpful.phar');

	// Hämta datat
	/*
	http://www.statistikdatabasen.scb.se/pxweb/sv/ssd/START__HE__HE0103__HE0103A/DispInk10/table/tableViewLayout1/?rxid=6104fc86-74de-4c08-a416-863c73886369
	*/
	$url = "http://www.statistikdatabasen.scb.se/sq/31158";
	$response = \Httpful\Request::get($url)
		->send();

	//var_dump($response);	// vad har vi fått?

	// stoppa in resultatet i en array.
	$rader = explode("\n", $response);

	// Plocka bort rubrikraden ur arrayen
	array_shift( $rader );

	// Skapa arrayer som är lämpliga för visualisering.
	$namnArr = array();
	$befArr = array();
	$i=2;
	foreach ( $rader as $rad )
	{
		$rad = trim( $rad );
		$radData = str_getcsv( $rad, ";");
		if( count( $radData ) >= 3 )	// ev tomrader
		{
			$namnArr[] =  utf8_encode( $radData[$i] );
			//$namnArr[] =  $radData[1];
			$befArr[] = (int)$radData[3];

		}
	}

	// Ett PHP-objekt, med JSON-kodat data anpassat för Plotly.
	$data = [ [
		"x" => $namnArr,
		"y" => $befArr,
		"type" => "bar"
	] ];


	$ut = json_encode( $data);
	echo "{$ut}";

	//var_dump( $ut );	// kolla resultatet av json_encode.
	//var_dump( json_last_error_msg() );	// om json_encode gick fel, vad gick fel?

?>
