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
                <h1>Live Videostream starten</h1>
                <p class="lead">Willkommen im Webinterface des Raspberry Pi's.<br>Hier können Sie Streamen etc.'</p>
				<p>In dieser Applikation können Sie eine Videostream starten, eine Bewegungsüberwachung durchführen, andere 
				Streams anschauen oder die aufgenommenen Videos der Überwachung in einem Archiv ansehen.</p>
				
			</div>
			<!--  /.col -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
<?php
	include 'footer.php';
?>	
