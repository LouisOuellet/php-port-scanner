# PHP Port Scanner
This repository contains a PHP application that allows users to scan ports of an IP. It can also be used to ping a host using port 0 as demonstrated in the usage section.

## Changelog

 * [2020-10-05] => Added an output setting (a php array or JSON)
 * [2020-10-05] => Adding proper documentation
 * [2020-10-05] => General Code optimization
 * [2020-10-05] => Scanner Class created
 * [2020-10-05] => repository created

## Requirements
 * Web server with PHP support (WinNT or UNIX)

## Installation

```bash
git clone https://github.com/LouisOuellet/php-port-scanner.git
```

## Usage
```php
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

```
### Sample

```
array(1) {
  ["google.com"]=>
  array(15) {
    [0]=>
    array(6) {
      ["protocol"]=>
      string(3) "tcp"
      ["service"]=>
      string(4) "icmp"
      ["status"]=>
      string(2) "up"
      ["errno"]=>
      string(0) ""
      ["errstr"]=>
      string(0) ""
      ["latency"]=>
      string(6) "2.78ms"
    }
    [21]=>
    array(6) {
      ["protocol"]=>
      string(3) "tcp"
      ["service"]=>
      string(3) "ftp"
      ["status"]=>
      string(6) "closed"
      ["errno"]=>
      int(110)
      ["errstr"]=>
      string(20) "Connection timed out"
      ["latency"]=>
      string(6) "2002ms"
    }
    [22]=>
    array(6) {
      ["protocol"]=>
      string(3) "tcp"
      ["service"]=>
      string(3) "ssh"
      ["status"]=>
      string(6) "closed"
      ["errno"]=>
      int(110)
      ["errstr"]=>
      string(20) "Connection timed out"
      ["latency"]=>
      string(6) "2002ms"
    }
    [25]=>
    array(6) {
      ["protocol"]=>
      string(3) "tcp"
      ["service"]=>
      string(4) "smtp"
      ["status"]=>
      string(6) "closed"
      ["errno"]=>
      int(110)
      ["errstr"]=>
      string(20) "Connection timed out"
      ["latency"]=>
      string(6) "2001ms"
    }
    [53]=>
    array(6) {
      ["protocol"]=>
      string(3) "tcp"
      ["service"]=>
      string(6) "domain"
      ["status"]=>
      string(6) "closed"
      ["errno"]=>
      int(110)
      ["errstr"]=>
      string(20) "Connection timed out"
      ["latency"]=>
      string(6) "2002ms"
    }
    [80]=>
    array(6) {
      ["protocol"]=>
      string(3) "tcp"
      ["service"]=>
      string(4) "http"
      ["status"]=>
      string(4) "open"
      ["errno"]=>
      int(0)
      ["errstr"]=>
      string(0) ""
      ["latency"]=>
      string(3) "4ms"
    }
    [110]=>
    array(6) {
      ["protocol"]=>
      string(3) "tcp"
      ["service"]=>
      string(4) "pop3"
      ["status"]=>
      string(6) "closed"
      ["errno"]=>
      int(110)
      ["errstr"]=>
      string(20) "Connection timed out"
      ["latency"]=>
      string(6) "2001ms"
    }
    [143]=>
    array(6) {
      ["protocol"]=>
      string(3) "tcp"
      ["service"]=>
      string(5) "imap2"
      ["status"]=>
      string(6) "closed"
      ["errno"]=>
      int(110)
      ["errstr"]=>
      string(20) "Connection timed out"
      ["latency"]=>
      string(6) "2002ms"
    }
    [443]=>
    array(6) {
      ["protocol"]=>
      string(3) "tcp"
      ["service"]=>
      string(5) "https"
      ["status"]=>
      string(4) "open"
      ["errno"]=>
      int(0)
      ["errstr"]=>
      string(0) ""
      ["latency"]=>
      string(3) "4ms"
    }
    [465]=>
    array(6) {
      ["protocol"]=>
      string(3) "tcp"
      ["service"]=>
      string(3) "urd"
      ["status"]=>
      string(6) "closed"
      ["errno"]=>
      int(110)
      ["errstr"]=>
      string(20) "Connection timed out"
      ["latency"]=>
      string(6) "2001ms"
    }
    [587]=>
    array(6) {
      ["protocol"]=>
      string(3) "tcp"
      ["service"]=>
      string(10) "submission"
      ["status"]=>
      string(6) "closed"
      ["errno"]=>
      int(110)
      ["errstr"]=>
      string(20) "Connection timed out"
      ["latency"]=>
      string(6) "2002ms"
    }
    [993]=>
    array(6) {
      ["protocol"]=>
      string(3) "tcp"
      ["service"]=>
      string(5) "imaps"
      ["status"]=>
      string(6) "closed"
      ["errno"]=>
      int(110)
      ["errstr"]=>
      string(20) "Connection timed out"
      ["latency"]=>
      string(6) "2001ms"
    }
    [995]=>
    array(6) {
      ["protocol"]=>
      string(3) "tcp"
      ["service"]=>
      string(5) "pop3s"
      ["status"]=>
      string(6) "closed"
      ["errno"]=>
      int(110)
      ["errstr"]=>
      string(20) "Connection timed out"
      ["latency"]=>
      string(6) "2002ms"
    }
    [1194]=>
    array(6) {
      ["protocol"]=>
      string(3) "udp"
      ["service"]=>
      string(7) "openvpn"
      ["status"]=>
      string(4) "open"
      ["errno"]=>
      int(0)
      ["errstr"]=>
      string(0) ""
      ["latency"]=>
      string(3) "0ms"
    }
    [8080]=>
    array(6) {
      ["protocol"]=>
      string(3) "tcp"
      ["service"]=>
      string(8) "http-alt"
      ["status"]=>
      string(6) "closed"
      ["errno"]=>
      int(110)
      ["errstr"]=>
      string(20) "Connection timed out"
      ["latency"]=>
      string(6) "2002ms"
    }
  }
}
{
    "google.com": {
        "0": {
            "protocol": "tcp",
            "service": "icmp",
            "status": "up",
            "errno": "",
            "errstr": "",
            "latency": "3.53ms"
        },
        "80": {
            "protocol": "tcp",
            "service": "http",
            "status": "open",
            "errno": 0,
            "errstr": "",
            "latency": "4ms"
        },
        "443": {
            "protocol": "tcp",
            "service": "https",
            "status": "open",
            "errno": 0,
            "errstr": "",
            "latency": "3ms"
        }
    }
}
```

## Enjoy!
