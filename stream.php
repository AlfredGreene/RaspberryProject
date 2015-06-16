<?php
	include 'functions.inc.php';
	
	session_start();
	
	htmlHeader("Videostream");
		
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
				
					print '<form action="'.$_SERVER["PHP_SELF"].'" method="post" accept-charset="utf-8">
						<button class="btn btn-default" aria-label="Left Align" id="start" name="start">Stream starten</button>
											
						</form><br>';
						
						//<button class="btn btn-default" aria-label="Left Align" name="stop">Stream stoppen</button>	
					
					if(isset($_POST['start'])){
						
						//Script for stopping videstream
						shell_exec('sudo /var/www/htdocs/RaspberryProject/scripts/stop_videostream.sh');
						//Script for stopping motion
						shell_exec('bash /var/www/htdocs/RaspberryProject/scripts/stop_motion.sh');
						//Script for starting videostream
						shell_exec('nohup raspivid -o - -t 0 -n -w 640 -h 480 -fps 24 | cvlc -v stream:///dev/stdin --sout \'#standard{access=http,mux=ts,dst=:8554}\' :demux=h264 > /dev/null 2>&1 &');
					
						print '<div class="col-md-6 col-md-offset-3">
							<div class="alert alert-success alert-dismissible" role="alert">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  <strong>Gestartet!</strong> Der Raspberry Videostream wurde gestartet!
								</div>
							</div>';
						//unset($_POST);
						
					}
					
					/*if(isset($_POST['stop'])){
						//echo "GESTOPPT";
						shell_exec('bash /var/www/htdocs/RaspberryProject/scripts/stop_videostream.sh');
						
						print '<div class="col-md-6 col-md-offset-3">
							<div class="alert alert-success alert-dismissible" role="alert">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  <strong>Gestoppt!</strong> Der Raspberry Videostream wurde gestoppt!
								</div>
							</div>';
						
						//unset($_POST);
					}*/			
					
					//unset($_POST);				
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
