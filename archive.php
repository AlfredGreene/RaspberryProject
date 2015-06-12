<?php
	include 'functions.inc.php';
	
	session_start();
	
	htmlHeader("Video-Archiv");
	
?>

<div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Video Archiv</h1>
                <p class="lead">Willkommen im Webinterface des Raspberry Pi's.<br>Hier können Sie Streamen etc.'</p>
				<?php
					$filelist = array_diff(scandir('motionarchive/',SCANDIR_SORT_DESCENDING), array('.','..','Thumbs.db'));
										
					$countFiles = count($filelist);
					
					if($countFiles < 1) {
						
						print '<div class="col-md-6 col-md-offset-3">
							<div class="alert alert-warning alert-dismissible" role="alert">
								  <strong>Archiv leer!</strong> Es befinden sich keine Vides-Dateien im Archiv!!
								</div>
							</div>';
					}
					else {
						foreach ($filelist as $file) {
						
							print '<h3>'.$file.'</h3>
							<embed src="motionarchive/'.$file.'" width="400" height="300" autostart="0"></embed><br>';
							/*print '
								<h3>'.$file.'</h3>
								<video width="640" height="480" controls>
								  <source src="motionarchive/'.$file.'" type="video/mp4">
								  Your browser does not support the video tag.
								</video>';*/
						}	
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