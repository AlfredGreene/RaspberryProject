<?php
include 'functions.inc.php';
	
	session_start();
	
	htmlHeader("Willkommen");
		
	$localIP = "10.142.126.113"; 	// IP @ GIBM
	//$localIP = "192.168.0.21"; 		// IP @ Home
?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Raspberry Project</h1>
                <p class="lead">Willkommen im Webinterface des Raspberry Pi's.</p>
				<p>In dieser Applikation können Sie einen Videostream starten, eine Bewegungsüberwachung durchführen,
				externe Streams anschauen oder die aufgenommenen Videos der Überwachung in einem Archiv ansehen.</p>
				
			</div>
			<!--  /.col -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
<?php
	include 'footer.php';
?>	
