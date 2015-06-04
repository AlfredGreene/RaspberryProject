<?php
	include 'functions.inc.php';
	
	session_start();
	
	htmlHeader("Externer Stream");
	
	$raspberryPiList = null;
	
	if (!isset($_SESSION['raspberryPiList'])) {
		$raspberryPiList = getAllRaspberries();
	}
?>
<div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Externe Streams anschauen</h1>
                <p class="lead">Auf dieser Seite ist es möglich, Streams von anderen Raspberries anzuschauen.</p>
				<?php
					print '<form action="'.$_SERVER["PHP_SELF"].'" method="post" accept-charset="utf-8">
					<select name="IPAdress" size="1">';
					
					foreach ($raspberryPiList as $singleRaspberry) {
					  echo "\n <option>".$singleRaspberry."</option>";
					  
					}
					
					print '</select><br><br>
					<button class="btn btn-default" aria-label="Left Align" name="startStream">Stream starten ...</button>
					</form><br><br>';
					
					
					if(isset($_POST['startStream']) && $_POST['IPAdress'] != '-'){
						//echo "TEST 1";
						//exec("sudo /usr/bin/killall motion vlc");
						//exec("raspivid -o - -t 0 -w 800 -h 600 -fps 30 |cvlc -v stream:///dev/stdin --sout '#standard{access=http,mux=ts,dst=:8554}' :demux=h264");
						createStreamDiv($_POST['IPAdress']);
						print '<form action="'.$_SERVER["PHP_SELF"].'" method="post" accept-charset="utf-8">
						<button class="btn btn-default" aria-label="Left Align" name="stopStream">Stream beenden ...</button>
						</form>';
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