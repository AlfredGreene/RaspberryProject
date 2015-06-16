<?php
	include 'functions.inc.php';
	
	session_start();
	
	htmlHeader("Videostream anzeigen");
		
	$localIP = "10.142.126.113"; 	// IP @ GIBM
	//$localIP = "192.168.0.21"; 		// IP @ Home
?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Live Videostream anzeigen</h1>
                <p class="lead">Hier können Sie den gestarteten Stream Ihres Raspberry Pi's ansehen!<br>Viel Vergnügen!</p>
				<?php
						createStreamDiv($localIP);
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
