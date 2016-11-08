<?php

// Disable the WSDL-Cache for testing.

ini_set("soap.wsdl_cache_enabled", 0);

// Build request object.

$dtTimeRequest = time();


$newdtTimeRequest = strtotime('-1 year', $dtTimeRequest);

print date('m/d/Y', $newdtTimeRequest);

$aoRequest = array();


//
function getHours ($lower = $newdtTimeRequest, $upper = $dtTimeRequest, $step = 3600, $format = '') {
  $times = array();

  if (empty($format)) {
    $format = 'g: i a';
  }

  foreach (range($lower, $upper, $step) as $increment) {
    $increment = gmdate('H:i', $increment);
    list( $hour, $minutes ) = explode( ':', $increment );

            $date = new DateTime( $hour . ':' . $minutes );

            $times[(string) $increment] = $date->format( $format );
        }

        return $times;
      }


$oRequest = new stdClass();
$oRequest->NodeIdentifier = 0;
$oRequest->UnitIdentifier = 0;
$oRequest->TimeStamp = $dtTimeRequest;

function getDataEachHour ($times, integer $node, integer $unit) {
  $times = getHours();

  for ($i = 0; $i < count($times); $i++ ) {
    $oRequest->NodeIdentifier = $node;
    $oRequest->UnitIdentifier = $unit;
    array_push($aoRequest, $oRequest);
    // no idea if the above is allowed because I'm not sure if you can append a class to an array
}
  return $aoRequest[];
  // I want to return the array in the format that was given before
}





// $oRequest = new stdClass();
// $oRequest->NodeIdentifier = 108791; // Aussentemperatur Habelschwerdter Allee
// $oRequest->UnitIdentifier = 73; // °C
// $oRequest->Timestamp = $dtTimeRequest;
//
// $aoRequest[] = $oRequest;
/***
$oRequest = new stdClass();
$oRequest->NodeIdentifier = 39675; // Mittelspannung Dahlem gesamt
$oRequest->UnitIdentifier = 0; // W
$oRequest->Timestamp = $dtTimeRequest;

$aoRequest[] = $oRequest;


$oRequest = new stdClass();
$oRequest->NodeIdentifier = 39675; // Mittelspannung Dahlem gesamt
$oRequest->UnitIdentifier = 0; // W
$oRequest->Timestamp = $newdtTimeRequest;

$aoRequest[] = $oRequest;




$oRequest = new stdClass();
$oRequest->NodeIdentifier = 89939; // Habelschwerdter Allee 45 / Silberlaube Heat GL add
$oRequest->UnitIdentifier = 24; // W
$oRequest->Timestamp = $dtTimeRequest;

$aoRequest[] = $oRequest;



$oRequest = new stdClass();
$oRequest->NodeIdentifier = 89939; // Habelschwerdter Allee 45 / Silberlaube Heat GL add
$oRequest->UnitIdentifier = 24; // W
$oRequest->Timestamp = $newdtTimeRequest;

$aoRequest[] = $oRequest;
***/



// $oRequest = new stdClass();
// $oRequest->NodeIdentifier = 89935; // Habelschwerdter Allee 45 / Silberlaube Heat KL add
// $oRequest->UnitIdentifier = 24; // W
// $oRequest->Timestamp = $dtTimeRequest;
//
// $aoRequest[] = $oRequest;
//
//
//
// $oRequest = new stdClass();
// $oRequest->NodeIdentifier = 89935; // Habelschwerdter Allee 45 / Silberlaube Heat KL add
// $oRequest->UnitIdentifier = 24; // W
// $oRequest->Timestamp = $newdtTimeRequest;
//
// $aoRequest[] = $oRequest;






/**************
$oRequest = new stdClass();
$oRequest->NodeIdentifier = 89937; // Habelschwerdter Allee 45 / Silberlaube Electricity
$oRequest->UnitIdentifier = 0; // W
$oRequest->Timestamp = $dtTimeRequest;

$aoRequest[] = $oRequest;

$oRequest = new stdClass();
$oRequest->NodeIdentifier = 89931; // Habelschwerdter Allee 45 / Silberlaube Heat GL add
$oRequest->UnitIdentifier = 24; // W
$oRequest->Timestamp = $dtTimeRequest;

$aoRequest[] = $oRequest;

$oRequest = new stdClass();
$oRequest->NodeIdentifier = 95529; // Habelschwerdter Allee 45 / Silberlaube Heat KL add
$oRequest->UnitIdentifier = 24; // W
$oRequest->Timestamp = $dtTimeRequest;

$aoRequest[] = $oRequest;

$oRequest = new stdClass();
$oRequest->NodeIdentifier = 89933; // Habelschwerdter Allee 45 / Silberlaube Electricity
$oRequest->UnitIdentifier = 0; // W
$oRequest->Timestamp = $dtTimeRequest;

$aoRequest[] = $oRequest;

$oRequest = new stdClass();
$oRequest->NodeIdentifier = 95436; // Arnimallee 14 Heat GL add
$oRequest->UnitIdentifier = 24; // W
$oRequest->Timestamp = $dtTimeRequest;

$aoRequest[] = $oRequest;

$oRequest = new stdClass();
$oRequest->NodeIdentifier = 95434; // Arnimallee 14 Heat KL add
$oRequest->UnitIdentifier = 24; // W
$oRequest->Timestamp = $dtTimeRequest;

$aoRequest[] = $oRequest;

$oRequest = new stdClass();
$oRequest->NodeIdentifier = 95438; // Arnimallee 14 Electricity add
$oRequest->UnitIdentifier = 0; // W
$oRequest->Timestamp = $dtTimeRequest;

$aoRequest[] = $oRequest;

$oRequest = new stdClass();
$oRequest->NodeIdentifier = 100359; // Arnimallee 14 Electricity add
$oRequest->UnitIdentifier = 0; // W
$oRequest->Timestamp = $dtTimeRequest;

$aoRequest[] = $oRequest;

$oRequest = new stdClass();
$oRequest->NodeIdentifier = 95440; // Arnimallee 14 Electricity add
$oRequest->UnitIdentifier = 0; // W
$oRequest->Timestamp = $dtTimeRequest;

$aoRequest[] = $oRequest;

$oRequest = new stdClass();
$oRequest->NodeIdentifier = 39623; // Arnimallee 14 Electricity subtract
$oRequest->UnitIdentifier = 0; // W
$oRequest->Timestamp = $dtTimeRequest;

$aoRequest[] = $oRequest;

$oRequest = new stdClass();
$oRequest->NodeIdentifier = 95475; // Garystr. 12 Heat GL add
$oRequest->UnitIdentifier = 24; // W
$oRequest->Timestamp = $dtTimeRequest;

$aoRequest[] = $oRequest;

$oRequest = new stdClass();
$oRequest->NodeIdentifier = 95477; // Garystr. 12 Heat KL add
$oRequest->UnitIdentifier = 24; // W
$oRequest->Timestamp = $dtTimeRequest;

$aoRequest[] = $oRequest;

$oRequest = new stdClass();
$oRequest->NodeIdentifier = 95481; // Garystr. 12 Electricity
$oRequest->UnitIdentifier = 0; // W
$oRequest->Timestamp = $dtTimeRequest;

$aoRequest[] = $oRequest;

$oRequest = new stdClass();
$oRequest->NodeIdentifier = 95687; // Vent Hoff Str. 8 Electricity
$oRequest->UnitIdentifier = 0; // W
$oRequest->Timestamp = $dtTimeRequest;

$aoRequest[] = $oRequest;

$oRequest = new stdClass();
$oRequest->NodeIdentifier = 95685; // Vent Hoff Str. 8 Heat GL add
$oRequest->UnitIdentifier = 24; // W
$oRequest->Timestamp = $dtTimeRequest;

$aoRequest[] = $oRequest;

$oRequest = new stdClass();
$oRequest->NodeIdentifier = 95681; // Vent Hoff Str. 8 Heat KL add
$oRequest->UnitIdentifier = 24; // W
$oRequest->Timestamp = $dtTimeRequest;

$aoRequest[] = $oRequest;
*******************/

// Request.

$sWsdlUri = 'https://www.dezem.de/services/dataloader/soap/1/';

$oClient = new SoapClient($sWsdlUri, array(
    'trace' => TRUE,
    'soap_version' => SOAP_1_2,
    'login' => 'fubguest',
    'password' => 'energieGuest1'
));

// Print results.
try {
     #var_dump($oClient->__getFunctions());
     #var_dump($oClient->getRecentData($aoRequest));
     print(json_encode($oClient->getRecentData($aoRequest)));
     #var_dump($oClient->__getLastRequest());
     #var_dump($oClient->__getLastResponse());
}
catch (Exception $e) {
    print($e);
}

?>
