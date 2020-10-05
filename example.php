<?php

require_once 'scanner.php';

$Scan = new Scanner;

echo $Scan->scanHost('google.com');
$Scan->setPorts([0,80,443]);
echo $Scan->scanHost('google.com');
