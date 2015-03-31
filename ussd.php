<?php

// Save this code in ussd.php. Configure the callback URL for BOTH phone numbers
// to point to the location of this script on the web
// e.g http://YourSite.rhcloud.com/ussd.php

// Reads the variables sent via POST from our gateway
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

if ( $text == "" ) {

	// This is the first request. Note how we start the response with CON
	$response  = "CON What would you like to do? \n";
	$response .= "1. Check My Bank A/c Number \n";
	$response .= "2. Check My Balance";

} else if ( $text == "1" ) {

	// Your business logic to determine the account number goes here
	$accountNumber  = "08822602296"; 
	// This is a terminal request. Note how we start the response with END
	$response = "END Your account number is $accountNumber";

} else if ( $text == "2" ) {

	// Your business logic to determine the balance goes here
	$balance  = "KES 1,000";
	// This is a terminal request. Note how we start the response with END
	$response = "END Your balance is $balance";

}

// Print the response onto the page so that our gateway can read it
header('Content-type: text/plain');
echo $response;

// DONE!!!
?>