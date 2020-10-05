# PHP Port Scanner
This repository contains a PHP application that allows users to scan ports of an IP. It can also be used to ping a host using port 0 as demonstrated in the usage section.

## Changelog
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
require_once 'scanner.php';

$Scan = new Scanner;

echo $Scan->scanHost('google.com');
$Scan->setPorts([0,80,443]);
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
            "latency": "12.6ms"
        },
        "21": {
            "protocol": "tcp",
            "service": "ftp",
            "status": "closed",
            "errno": 110,
            "errstr": "Connection timed out",
            "latency": "2001 ms"
        },
        "22": {
            "protocol": "tcp",
            "service": "ssh",
            "status": "closed",
            "errno": 110,
            "errstr": "Connection timed out",
            "latency": "2002 ms"
        },
        "25": {
            "protocol": "tcp",
            "service": "smtp",
            "status": "closed",
            "errno": 110,
            "errstr": "Connection timed out",
            "latency": "2001 ms"
        },
        "53": {
            "protocol": "tcp",
            "service": "domain",
            "status": "closed",
            "errno": 110,
            "errstr": "Connection timed out",
            "latency": "2002 ms"
        },
        "80": {
            "protocol": "tcp",
            "service": "http",
            "status": "open",
            "errno": 0,
            "errstr": "",
            "latency": "6 ms"
        },
        "110": {
            "protocol": "tcp",
            "service": "pop3",
            "status": "closed",
            "errno": 110,
            "errstr": "Connection timed out",
            "latency": "2001 ms"
        },
        "143": {
            "protocol": "tcp",
            "service": "imap2",
            "status": "closed",
            "errno": 110,
            "errstr": "Connection timed out",
            "latency": "2002 ms"
        },
        "443": {
            "protocol": "tcp",
            "service": "https",
            "status": "open",
            "errno": 0,
            "errstr": "",
            "latency": "11 ms"
        },
        "465": {
            "protocol": "tcp",
            "service": "urd",
            "status": "closed",
            "errno": 110,
            "errstr": "Connection timed out",
            "latency": "2002 ms"
        },
        "587": {
            "protocol": "tcp",
            "service": "submission",
            "status": "closed",
            "errno": 110,
            "errstr": "Connection timed out",
            "latency": "2002 ms"
        },
        "993": {
            "protocol": "tcp",
            "service": "imaps",
            "status": "closed",
            "errno": 110,
            "errstr": "Connection timed out",
            "latency": "2002 ms"
        },
        "995": {
            "protocol": "tcp",
            "service": "pop3s",
            "status": "closed",
            "errno": 110,
            "errstr": "Connection timed out",
            "latency": "2001 ms"
        },
        "1194": {
            "protocol": "udp",
            "service": "openvpn",
            "status": "open",
            "errno": 0,
            "errstr": "",
            "latency": "0 ms"
        },
        "8080": {
            "protocol": "tcp",
            "service": "http-alt",
            "status": "closed",
            "errno": 110,
            "errstr": "Connection timed out",
            "latency": "2002 ms"
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
            "latency": "11.9ms"
        },
        "80": {
            "protocol": "tcp",
            "service": "http",
            "status": "open",
            "errno": 0,
            "errstr": "",
            "latency": "22 ms"
        },
        "443": {
            "protocol": "tcp",
            "service": "https",
            "status": "open",
            "errno": 0,
            "errstr": "",
            "latency": "16 ms"
        }
    }
}
```

## Enjoy!
