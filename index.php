<?php

class Scanner {

	protected $Ports = [7,21,22,25,53,80,110,111,143,443,465,587,993,995,1194,3306,5222,5269,5280,8080,8081];
	protected $UDP = [9,42,67,68,69,82,123,138,161,319,320,370,500,512,513,514,517,518,520,521,525,533,560,561,623,698,750,752,753,1194,1234,1900,1985,3785,3799,5445,9000,20000];

	public function __construct(){
		ini_set('max_execution_time', 0);
		ini_set('memory_limit', -1);
	}

	public function setPorts($ports = []){
		$this->Ports = $ports;
	}

	public function scanHost($host){
		foreach ($this->Ports as $port){
			if($port != 0){
				$service = getservbyport($port, 'tcp');
				if(is_bool($service)){ $service = 'unknown'; }
				$tB = microtime(true);
				if(in_array($port,$this->UDP)){
					$socket = @fsockopen('udp://'.$host, $port, $errno, $errstr, 2);
					$protocol = 'udp';
				} else {
					$socket = @fsockopen($host, $port, $errno, $errstr, 2);
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
					exec("ping -n 1 ".$host." | for /f \"tokens=5\" %a in ('findstr TTL=') do @echo %a", $latency);
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
							'latency' => str_replace(['time=','time<','time>'],'',$latency)."ms",
						];
					}
				} else {
					exec("ping -c 1 " . $host . " | head -n 2 | tail -n 1 | awk '{print $7}'", $latency);
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
		return $results;
	}
}

$Scan = new Scanner;

// echo json_encode($Scan->scanHost('webman-01.albcie.com'), JSON_PRETTY_PRINT);
// echo json_encode($Scan->scanHost('google.com'), JSON_PRETTY_PRINT);
$Scan->setPorts([0]);
echo json_encode($Scan->scanHost('192.168.40.254'), JSON_PRETTY_PRINT);
echo json_encode($Scan->scanHost('192.168.40.200'), JSON_PRETTY_PRINT);
// $Scan->setPorts([7,3389,22]);
// echo json_encode($Scan->scanHost('louis.ouellet.alb.com'), JSON_PRETTY_PRINT);
