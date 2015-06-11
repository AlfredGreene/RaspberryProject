<?php
	exec("raspivid -o - -t 0 -n -w 600 -h 400 -fps 12 | cvlc -v stream:///dev/stdin --sout '#standard{access=http,mux=ts,dst=:8554}' :demux=h264 1>/dev/null 2>&1");
?>
