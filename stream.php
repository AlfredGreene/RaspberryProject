<?php
	
	if(isset($_POST['stream_start'])) {
		echo 'start stream... ';
		shell_exec("nohup raspivid -o - -t 0 -w 800 -h 600 -fps 30 |cvlc -v stream:///dev/stdin --sout '#standard{access=http,mux=ts,dst=:8554}' :demux=h264 > /dev/null 2>&1 &");
		echo ' done!';		
	} 
?>