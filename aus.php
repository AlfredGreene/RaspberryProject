<?php
include 'functions.inc.php';
	
	session_start();
	
	htmlHeader("Startseite");
		
	$localIP = "10.142.126.113"; 	// IP @ GIBM
	//$localIP = "192.168.0.21"; 		// IP @ Home
?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Ausschalten! - Alle Aktivitäten abschalten</h1>
                <p class="lead">Hier können Sie die Aktivitäten abschalten!</p>
				<?php
					
					
						print '<form action="'.$_SERVER["PHP_SELF"].'" method="post" accept-charset="utf-8">
						<button class="btn btn-default" aria-label="Left Align" id="start" name="ausschalten">Ausschalten</button> 
						</form><br>';
					
					if(isset($_POST['ausschalten'])){
						//exec("sudo /usr/bin/killall motion vlc");
						//include 'script1.php';
						//exec("sudo /usr/bin/raspivid -o - -t 9999999 | sudo /usr/bin/cvlc -vvv stream:///dev/stdin --sout '#standard{access=http,mux=ts,dst=:8554}' :demux=h264' > /dev/null &");
						shell_exec('bash /var/www/htdocs/RaspberryProject/scripts/stop_videostream.sh');
						
						shell_exec('bash /var/www/htdocs/RaspberryProject/scripts/stop_motion.sh');
						
						print '<div class="col-md-6 col-md-offset-3">
							<div class="alert alert-success alert-dismissible" role="alert">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  <strong>Ausgeschaltet!</strong> Stream und Motion Detection sind ausgeschaltet!
								</div>
							</div>';
						//echo "Läuft";
						
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
