<?php

// We need to include the Scanner Class
require_once 'scanner.php';

// Initialisation
$Scan = new Scanner;

// Scan with default settings
echo $Scan->scanHost('google.com');

// Specify which ports to scan
$Scan->setPorts([0,80,443]);

// Change the timeout value
$Scan->setTimeout(1);

// Scan with new settings
echo $Scan->scanHost('google.com');
