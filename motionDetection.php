<?php
	include 'functions.inc.php';
	
	session_start();
	
	
	
	htmlHeader("Motion Detection");
?>
	 <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Motion Detection</h1>
                <p class="lead">Hier können Sie Ihre Motion Detection starten.</p>
				<?php
					print '<form action="'.$_SERVER["PHP_SELF"].'" method="post" accept-charset="utf-8">
							<button class="btn btn-default" aria-label="Left Align" name="startMotion">Detection starten ...</button>
						</form><br>';
						
					 if(isset($_POST['startMotion'])) {
						//exec("sudo /usr/bin/killall vlc motion > /dev/null &");
						//exec("sudo /var/www/motion -c /var/www/motion-mmal.conf > /dev/null &");
						exec("bash /var/www/htdocs/RaspberryProject/scripts/stop_motion.sh");
						exec("bash /var/www/htdocs/RaspberryProject/scripts/start_motion.sh");
						print '<div class="col-md-6 col-md-offset-3">
							<div class="alert alert-info alert-dismissible" role="alert">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  <strong>Motion gestartet!</strong> Die Motion Detection wurde erfolgreich gestartet!
								</div>
							</div><br>';
						
						print '<div class="col-md-6 col-md-offset-3">
						<form action="'.$_SERVER["PHP_SELF"].'" method="post" accept-charset="utf-8">
							<button class="btn btn-default" aria-label="Left Align" name="stopMotion">Detection stoppen ...</button>
						</form>
						</div><br>';						
							
					 }	
					 
					 if (isset($_POST['stopMotion'])){
						 //exec("sudo /usr/bin/killall vlc motion > /dev/null &");
						 exec("bash /var/www/htdocs/RaspberryProject/scripts/stop_motion.sh");
						 
						 print '<div class="col-md-6 col-md-offset-3">
							<div class="alert alert-info alert-dismissible" role="alert">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  <strong>Motion gestoppt!</strong> Die Motion Detection wurde erfolgreich gestoppt!
								</div>
							</div>';
						 
					 }
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


	