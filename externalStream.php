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

        <div  class="row">
            <div id="row" class="col-lg-12 text-center">
                <h1>Externe Streams anschauen</h1>
                <p class="lead">Auf dieser Seite ist es möglich, Streams von anderen Raspberries anzuschauen.</p>
				<?php
					print '
					<select id="IPAdress" name="IPAdress" size="1">';
					
					foreach ($raspberryPiList as $singleRaspberry) {
					  echo "\n <option>".$singleRaspberry."</option>";
					  
					}
					
					print '</select><br><br>
					<button id="test" class="btn btn-default" aria-label="Left Align" name="startStream" onclick="addStream()" >Stream starten ...</button>
					<br><br>';
					
					
					/*if(isset($_POST['startStream'])){
						
						//echo '<script type="text/javascript">addStream();</script>';
						//echo "TEST 1";
						//exec("sudo /usr/bin/killall motion vlc");
						//exec("raspivid -o - -t 0 -w 800 -h 600 -fps 30 |cvlc -v stream:///dev/stdin --sout '#standard{access=http,mux=ts,dst=:8554}' :demux=h264");
						
						//print '<div id="'.$_POST['IPAdress'].'">';
						//createStreamDiv($_POST['IPAdress']);
						print '<form action="'.$_SERVER["PHP_SELF"].'" method="post" accept-charset="utf-8">
						<button id="'.$_POST['IPAdress'].'" class="btn btn-default" aria-label="Left Align" name="stopStream">Stream beenden ...</button>
						</form>
						</div>';
					}*/
					
				?>	
			</div>
			<!--  /.col -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

	<footer class="footer">
		<div class="container">
			<p class="text-muted">&copy 2015 by Thomas Frey, GIBM Pratteln  </p>
		</div>
	</footer>   
	<!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
				
		/*document.getElementById("test").addEventListener("click", function () {
			$("#row").append('<div>'+ ipadress +'<form action="#" method="post" accept-charset="utf-8"><button id="'+ ipadress +'" class="btn btn-default" aria-label="Left Align" name="stopStream">Stream beenden ...</button></form></div>');
		});*/
		var counter = 1;
		function addStream()
		{	
			var value = $('#IPAdress').val();
			$("#row").append('<div id="'+ counter +'">\
			<h3>'+ value +'</h3><br>\
			<OBJECT classid="clsid:9BE31822-FDAD-461B-AD51-BE1D1C159921"\
			 codebase="http://downloads.videolan.org/pub/videolan/vlc/latest/win32/axvlc.cab"\
			 width="800" height="600" id="vlc" events="True">\
			 <param name="Src" value="http://'+ value +':8554/" />\
			 <param name="ShowDisplay" value="True" />\
			 <param name="AutoLoop" value="False" />\
			 <param name="AutoPlay" value="True" />\
			 <embed id="vlcEmb" type="application/x-google-vlc-plugin" version="VideoLAN.VLCPlugin.2" autoplay="yes" loop="no" width="640" height="480"\
			 target="http://'+ value +':8554/" ></embed>\
			</OBJECT><br>\
			<button id="'+ counter+'" class="btn btn-default stopButton" aria-label="Left Align" value="'+ counter +'" onclick="deleteStream(this.id)" >Stream beenden ...</button>\
			</div>');
			
			counter ++;
		}
		
		function deleteStream(clicked_id){
			//var id = "#" + button ;
			var id = "#" + clicked_id;
			//window.alert(id);
			$( id ).remove();
		}
		
	</script>
	
</body>

</html>'