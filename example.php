<?php

// We need to include the Scanner Class
require_once 'scanner.php';

// Initialisation
$Scan = new Scanner;

// Scan with default settings
var_dump($Scan->scanHost('google.com'));

// Specify which ports to scan
$Scan->setPorts([0,80,443]);

// Change the timeout value
$Scan->setTimeout(1);

// Change the UDP ports
$Scan->setUDP([123,1194,3785]);

// Scan with new settings and output set to JSON
echo $Scan->scanHost('google.com', 'json');

// Specify which host(s) to scan
$list = [
	'google.com',
	'facebook.com',
	'yahoo.com',
	'duckduckgo.com',
];

// Scan multiple hosts and output set to JSON
echo $Scan->scanHost($list, 'json');
