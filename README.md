# PHP Port Scanner
This repository contains a PHP application that allows users to scan ports of an IP. It can also be used to ping a host using port 0 as demonstrated in the usage section.

## Changelog

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
echo $Scan->scanHost('google.com');

// Specify which ports to scan
$Scan->setPorts([0,80,443]);

// Change the timeout value
$Scan->setTimeout(1);

// Scan with new settings
echo $Scan->scanHost('google.com');

```
### Sample

```json
{
    "google.com": {
        "0": {
            "protocol": "tcp",
            "service": "icmp",
            "status": "up",
            "errno": "",
            "errstr": "",
            "latency": "16.4ms"
        },
        "21": {
            "protocol": "tcp",
            "service": "ftp",
            "status": "closed",
            "errno": 110,
            "errstr": "Connection timed out",
            "latency": "2001ms"
        },
        "22": {
            "protocol": "tcp",
            "service": "ssh",
            "status": "closed",
            "errno": 110,
            "errstr": "Connection timed out",
            "latency": "2002ms"
        },
        "25": {
            "protocol": "tcp",
            "service": "smtp",
            "status": "closed",
            "errno": 110,
            "errstr": "Connection timed out",
            "latency": "2001ms"
        },
        "53": {
            "protocol": "tcp",
            "service": "domain",
            "status": "closed",
            "errno": 110,
            "errstr": "Connection timed out",
            "latency": "2002ms"
        },
        "80": {
            "protocol": "tcp",
            "service": "http",
            "status": "open",
            "errno": 0,
            "errstr": "",
            "latency": "13ms"
        },
        "110": {
            "protocol": "tcp",
            "service": "pop3",
            "status": "closed",
            "errno": 110,
            "errstr": "Connection timed out",
            "latency": "2001ms"
        },
        "143": {
            "protocol": "tcp",
            "service": "imap2",
            "status": "closed",
            "errno": 110,
            "errstr": "Connection timed out",
            "latency": "2002ms"
        },
        "443": {
            "protocol": "tcp",
            "service": "https",
            "status": "open",
            "errno": 0,
            "errstr": "",
            "latency": "9ms"
        },
        "465": {
            "protocol": "tcp",
            "service": "urd",
            "status": "closed",
            "errno": 110,
            "errstr": "Connection timed out",
            "latency": "2000ms"
        },
        "587": {
            "protocol": "tcp",
            "service": "submission",
            "status": "closed",
            "errno": 110,
            "errstr": "Connection timed out",
            "latency": "2003ms"
        },
        "993": {
            "protocol": "tcp",
            "service": "imaps",
            "status": "closed",
            "errno": 110,
            "errstr": "Connection timed out",
            "latency": "2002ms"
        },
        "995": {
            "protocol": "tcp",
            "service": "pop3s",
            "status": "closed",
            "errno": 110,
            "errstr": "Connection timed out",
            "latency": "2001ms"
        },
        "1194": {
            "protocol": "udp",
            "service": "openvpn",
            "status": "open",
            "errno": 0,
            "errstr": "",
            "latency": "0ms"
        },
        "8080": {
            "protocol": "tcp",
            "service": "http-alt",
            "status": "closed",
            "errno": 110,
            "errstr": "Connection timed out",
            "latency": "2002ms"
        }
    }
}{
    "google.com": {
        "0": {
            "protocol": "tcp",
            "service": "icmp",
            "status": "up",
            "errno": "",
            "errstr": "",
            "latency": "13.6ms"
        },
        "80": {
            "protocol": "tcp",
            "service": "http",
            "status": "open",
            "errno": 0,
            "errstr": "",
            "latency": "14ms"
        },
        "443": {
            "protocol": "tcp",
            "service": "https",
            "status": "open",
            "errno": 0,
            "errstr": "",
            "latency": "11ms"
        }
    }
}
```

## Enjoy!
