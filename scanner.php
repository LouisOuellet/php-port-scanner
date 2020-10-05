<?php

class Scanner {

	protected $Ports = [0,21,22,25,53,80,110,143,443,465,587,993,995,1194,8080];
	protected $UDP = [9,42,67,68,69,82,123,138,161,319,320,370,500,512,513,514,517,518,520,521,525,533,560,561,623,698,750,752,753,1194,1234,1900,1985,3785,3799,5445,9000,20000];

	public function __construct(){
		ini_set('max_execution_time', 0);
		ini_set('memory_limit', -1);
	}

	public function setPorts($ports = []){
		$this->Ports = $ports;
	}

	public function scanHost($host){
		if (filter_var($host, FILTER_VALIDATE_IP)) {
      $ip=$host;
    } else {
      $dns=dns_get_record($host, DNS_A);
      $ip=$dns[0]['ip'];
    }
		foreach ($this->Ports as $port){
			if($port != 0){
				$service = getservbyport($port, 'tcp');
				if(is_bool($service)){ $service = 'unknown'; }
				$tB = microtime(true);
				if(in_array($port,$this->UDP)){
					$socket = @fsockopen('udp://'.$ip, $port, $errno, $errstr, 2);
					$protocol = 'udp';
				} else {
					$socket = @fsockopen($ip, $port, $errno, $errstr, 2);
					$protocol = 'tcp';
				}
				if (is_resource($socket)){
					$tA = microtime(true);
					$results[$host][$port] = [
						'protocol' => $protocol,
						'service' => $service,
						'status' => 'open',
						'errno' => $errno,
						'errstr' => $errstr,
						'latency' => round((($tA - $tB) * 1000), 0)." ms",
					];
					fclose($socket);
		    } else {
					$tA = microtime(true);
					$results[$host][$port] = [
						'protocol' => $protocol,
						'service' => $service,
						'status' => 'closed',
						'errno' => $errno,
						'errstr' => $errstr,
						'latency' => round((($tA - $tB) * 1000), 0)." ms",
					];
		    }
			} else {
				if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
					exec("ping -n 1 ".$ip." | for /f \"tokens=5\" %a in ('findstr TTL=') do @echo %a", $latency);
					if(isset($latency[0])){
						$results[$host][$port] = [
							'protocol' => 'tcp',
							'service' => 'icmp',
							'status' => 'up',
							'errno' => '',
							'errstr' => '',
							'latency' => str_replace(['time=','time<','time>'],'',$latency[0]),
						];
					} else {
						$results[$host][$port] = [
							'protocol' => 'tcp',
							'service' => 'icmp',
							'status' => 'down',
							'errno' => '',
							'errstr' => '',
							'latency' => "ms",
						];
					}
				} else {
					exec("ping -c 1 " . $ip . " | head -n 2 | tail -n 1 | awk '{print $7}'", $latency);
					if(strpos($latency[0], 'time') !== false){
						$results[$host][$port] = [
							'protocol' => 'tcp',
							'service' => 'icmp',
							'status' => 'up',
							'errno' => '',
							'errstr' => '',
							'latency' => str_replace('time=','',$latency[0]).'ms',
						];
					} else {
						$results[$host][$port] = [
							'protocol' => 'tcp',
							'service' => 'icmp',
							'status' => 'down',
							'errno' => '',
							'errstr' => '',
							'latency' => str_replace('time=','',$latency[0]).'ms',
						];
					}
				}
			}
		}
		return json_encode($results, JSON_PRETTY_PRINT);
	}
}
