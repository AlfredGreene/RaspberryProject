<?php
	include 'functions.inc.php';
	
	session_start();
	
	htmlHeader("Startseite");
		
	//$localIp = "10.142.126.113"; 	// IP @ GIBM
	$localIP = "192.168.0.21"; 		// IP @ Home
?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Live Videostream starten</h1>
                <p class="lead">Willkommen im Webinterface des Raspberry Pi's.<br>Hier können Sie Streamen etc.'</p>
				<?php
					print '<form action="'.$_SERVER["PHP_SELF"].'" method="post" accept-charset="utf-8">
					<button class="btn btn-default" aria-label="Left Align" name="start">Stream starten</button> 
					<button class="btn btn-default" aria-label="Left Align" name="stop">Stream stoppen</button>
					</form>';
				  
					if(isset($_POST['start'])){
						echo "TEST 1";
						//shell_exec("sudo /usr/bin/killall motion vlc");
						//shell_exec("raspivid -o - -t 0 -w 800 -h 600 -fps 30 |cvlc -v stream:///dev/stdin --sout '#standard{access=http,mux=ts,dst=:8554}' :demux=h264");
						//exec("sudo bash /var/www/htdocs/RaspberryProject/scripts/videoStream.sh");
						echo "Läuft";
						createStreamDiv($localIP);
					}
					
					if(isset($_POST['stop'])){
						echo "GESTOPPT";
						exec("sudo /usr/bin/killall motion vlc");
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
