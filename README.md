# PHP Port Scanner
This repository contains a PHP application that allows users to scan ports of an IP. It can also be used to ping a host using port 0 as demonstrated in the usage section.

## Changelog

<<<<<<< HEAD
=======
 * [2020-10-15] => Added support for scanning multiple hosts
>>>>>>> 6456b24524351ca451a621ae4a47ad234db1ae38
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

// Specify which host(s) to scan
$list = [
	'google.com',
	'facebook.com',
	'yahoo.com',
	'duckduckgo.com',
];

// Scan multiple hosts and output set to JSON
echo $Scan->scanHost($list, 'json');
```
### Sample

```
array(1) {
  ["google.com"]=>
  array(15) {
    [0]=>
    array(7) {
      ["ip"]=>
      string(14) "172.217.13.206"
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
      string(6) "2.07ms"
    }
    [21]=>
    array(7) {
      ["ip"]=>
      string(14) "172.217.13.206"
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
      string(6) "2003ms"
    }
    [22]=>
    array(7) {
      ["ip"]=>
      string(14) "172.217.13.206"
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
    array(7) {
      ["ip"]=>
      string(14) "172.217.13.206"
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
      string(6) "2002ms"
    }
    [53]=>
    array(7) {
      ["ip"]=>
      string(14) "172.217.13.206"
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
    array(7) {
      ["ip"]=>
      string(14) "172.217.13.206"
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
      string(3) "2ms"
    }
    [110]=>
    array(7) {
      ["ip"]=>
      string(14) "172.217.13.206"
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
      string(6) "2002ms"
    }
    [143]=>
    array(7) {
      ["ip"]=>
      string(14) "172.217.13.206"
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
    array(7) {
      ["ip"]=>
      string(14) "172.217.13.206"
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
      string(3) "2ms"
    }
    [465]=>
    array(7) {
      ["ip"]=>
      string(14) "172.217.13.206"
      ["protocol"]=>
      string(3) "tcp"
      ["service"]=>
      string(11) "submissions"
      ["status"]=>
      string(6) "closed"
      ["errno"]=>
      int(110)
      ["errstr"]=>
      string(20) "Connection timed out"
      ["latency"]=>
      string(6) "2002ms"
    }
    [587]=>
    array(7) {
      ["ip"]=>
      string(14) "172.217.13.206"
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
    array(7) {
      ["ip"]=>
      string(14) "172.217.13.206"
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
    array(7) {
      ["ip"]=>
      string(14) "172.217.13.206"
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
    array(7) {
      ["ip"]=>
      string(14) "172.217.13.206"
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
    array(7) {
      ["ip"]=>
      string(14) "172.217.13.206"
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
            "ip": "172.217.13.206",
            "protocol": "tcp",
            "service": "icmp",
            "status": "up",
            "errno": "",
            "errstr": "",
            "latency": "2.16ms"
        },
        "80": {
            "ip": "172.217.13.206",
            "protocol": "tcp",
            "service": "http",
            "status": "open",
            "errno": 0,
            "errstr": "",
            "latency": "2ms"
        },
        "443": {
            "ip": "172.217.13.206",
            "protocol": "tcp",
            "service": "https",
            "status": "open",
            "errno": 0,
            "errstr": "",
            "latency": "2ms"
        }
    }
}{
    "google.com": {
        "0": {
            "ip": "172.217.13.206",
            "protocol": "tcp",
            "service": "icmp",
            "status": "up",
            "errno": "",
            "errstr": "",
            "latency": "1.95ms"
        },
        "80": {
            "ip": "172.217.13.206",
            "protocol": "tcp",
            "service": "http",
            "status": "open",
            "errno": 0,
            "errstr": "",
            "latency": "2ms"
        },
        "443": {
            "ip": "172.217.13.206",
            "protocol": "tcp",
            "service": "https",
            "status": "open",
            "errno": 0,
            "errstr": "",
            "latency": "2ms"
        }
    },
    "facebook.com": {
        "0": {
            "ip": "157.240.0.35",
            "protocol": "tcp",
            "service": "icmp",
            "status": "up",
            "errno": "",
            "errstr": "",
            "latency": "14.1ms"
        },
        "80": {
            "ip": "157.240.0.35",
            "protocol": "tcp",
            "service": "http",
            "status": "open",
            "errno": 0,
            "errstr": "",
            "latency": "17ms"
        },
        "443": {
            "ip": "157.240.0.35",
            "protocol": "tcp",
            "service": "https",
            "status": "open",
            "errno": 0,
            "errstr": "",
            "latency": "14ms"
        }
    },
    "yahoo.com": {
        "0": {
            "ip": "98.137.11.163",
            "protocol": "tcp",
            "service": "icmp",
            "status": "up",
            "errno": "",
            "errstr": "",
            "latency": "71.0ms"
        },
        "80": {
            "ip": "98.137.11.163",
            "protocol": "tcp",
            "service": "http",
            "status": "open",
            "errno": 0,
            "errstr": "",
            "latency": "72ms"
        },
        "443": {
            "ip": "98.137.11.163",
            "protocol": "tcp",
            "service": "https",
            "status": "open",
            "errno": 0,
            "errstr": "",
            "latency": "71ms"
        }
    },
    "duckduckgo.com": {
        "0": {
            "ip": "52.149.246.39",
            "protocol": "tcp",
            "service": "icmp",
            "status": "down",
            "errno": "",
            "errstr": "",
            "latency": "ms"
        },
        "80": {
            "ip": "52.149.246.39",
            "protocol": "tcp",
            "service": "http",
            "status": "open",
            "errno": 0,
            "errstr": "",
            "latency": "34ms"
        },
        "443": {
            "ip": "52.149.246.39",
            "protocol": "tcp",
            "service": "https",
            "status": "open",
            "errno": 0,
            "errstr": "",
            "latency": "33ms"
        }
    }
```

## Enjoy!
