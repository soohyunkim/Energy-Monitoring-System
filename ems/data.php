<?php
//Request array
$aoRequest = array();

// Disable the WSDL-Cache for testing.
ini_set("soap.wsdl_cache_enabled", 0);

$dtTimeRequestUpp 	= time();
// Get one month of data from current date
$dtTimeRequestLow 	= strtotime('-1 month', $dtTimeRequestUpp );
$node				= (isset($_GET['node']))?$_GET['node']:0;
$unit				= (isset($_GET['unit']))?$_GET['unit']:0;


function getHours($lower,$upper,$step='3600',$format = '') {
  $times = array();

  foreach (range($lower, $upper, $step) as $tStamp) {

	$times[] = $tStamp;

   }

   return $times;
}

function getDataEachHour($node, $unit, $dtTimeRequestLow, $dtTimeRequestUpp) {
  // Build request object.
  $oRequest = array();
  $times = getHours($dtTimeRequestLow,$dtTimeRequestUpp);

  for($i=0;$i<count($times);$i++) {

	$oRequest[$i]->NodeIdentifier = $node;
    	$oRequest[$i]->UnitIdentifier = $unit;
	$oRequest[$i]->Timestamp = $times[$i];
	$oRequest[$i]->DateCheck = date('l jS \of F Y h:i:s A', $times[$i]);
  }

  //return array for soap request
  return $oRequest;

}

$aoRequest = getDataEachHour($node, $unit, $dtTimeRequestLow, $dtTimeRequestUpp);


// Request.

$sWsdlUri = 'https://www.dezem.de/services/dataloader/soap/1/';

$oClient = new SoapClient($sWsdlUri, array(
    'trace' => TRUE,
    'soap_version' => SOAP_1_2,
    'login' => 'FUBEnergie',
    'password' => 'energieFUB1'
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
