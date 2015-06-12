<?php
	include 'functions.inc.php';
	
	session_start();
	
	htmlHeader("Startseite");
		
	//$localIP = "10.142.126.113"; 	// IP @ GIBM
	$localIP = "192.168.0.21"; 		// IP @ Home
?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Live Videostream starten</h1>
                <p class="lead">Willkommen im Webinterface des Raspberry Pi's.<br>Hier können Sie Streamen etc.'</p>
				<?php
					if(!isset($_POST['start'])){
					
						print '<form action="'.$_SERVER["PHP_SELF"].'" method="post" accept-charset="utf-8">
						<button class="btn btn-default" aria-label="Left Align" id="start" name="start">Stream starten</button> 
						</form>';
					}
					
					if(isset($_POST['start'])){
						print '<form action="'.$_SERVER["PHP_SELF"].'" method="post" accept-charset="utf-8">
						<button class="btn btn-default" aria-label="Left Align" name="stop">Stream stoppen</button>
						</form><br>';
						//exec("bash /var/www/htdocs/RaspberryProject/scripts/stop_videostream.sh");
						//exec("sudo /usr/bin/killall motion vlc");
						//include 'script1.php';
						//shell_exec("nohup raspivid -o - -t 0 -w 800 -h 600 -fps 24 |cvlc -v stream:///dev/stdin --sout '#standard{access=http,mux=ts,dst=:8554}' :demux=h264 > /dev/null 2>&1 &");
						//exec("sudo /usr/bin/raspivid -o - -t 9999999 | sudo /usr/bin/cvlc -vvv stream:///dev/stdin --sout '#standard{access=http,mux=ts,dst=:8554}' :demux=h264' > /dev/null &");
						shell_exec('/var/www/htdocs/RaspberryProject/scripts/stop_videostream.sh');
						shell_exec('bash /var/www/htdocs/RaspberryProject/scripts/start_videostream.sh');
						
						createStreamDiv($localIP);
						//echo "Läuft";
						//unset($_POST);
						
					}
					
					if(isset($_POST['stop'])){
						//echo "GESTOPPT";
						shell_exec('sudo /var/www/htdocs/RaspberryProject/scripts/stop_videostream.sh');
						
						//unset($_POST);
					}			
					
					unset($_POST);				
				?>
				
			</div>
			<!--  /.col -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
<?php
	include 'footer.php';
?>	
