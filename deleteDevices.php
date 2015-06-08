<?php
	include 'functions.inc.php';
	
	session_start();
	
	htmlHeader("Raspberries verwalten");
	
	$raspberryPiList = null;
	
	if (!isset($_SESSION['raspberryPiList'])) {
		$raspberryPiList = getAllRaspberries();
	}
?>

 <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Raspberries löschen</h2>
                <p class="lead">Auf dieser Seite können Sie neue Raspberry Pi's löschen.</p>
				
				<div class="deleteRaspi">
					<?php
						print'<form action="'.$_SERVER["PHP_SELF"].'" method="post" accept-charset="utf-8">
							<select name="selectedRaspi" size="1">
								<option>-</option>';
							
						$numberOfPi = count($raspberryPiList);
						for($i = 0;$i < $numberOfPi; $i++) {
							echo "\n<option value=\"".$i."\">".$raspberryPiList[$i]."</option>";	
						}

						print '</select><br><br>
						<button class="btn btn-default" aria-label="Left Align" name="deleteRaspi">Löschen</button>
						</form><br>';
						
						if(isset($_POST['deleteRaspi']) && $_POST['selectedRaspi'] != "-"){
							deleteRaspberryPi($raspberryPiList,$_POST['selectedRaspi']);
							print '<div class="col-md-6 col-md-offset-3">
							<div class="alert alert-success alert-dismissible" role="alert">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  <strong>Gelöscht!</strong>Der Raspberry Pi wurde erfolgreich gelöscht!
								</div>
							</div>';
						}
						elseif (isset($_POST['deleteRaspi']) && $_POST['selectedRaspi'] == "-") {
							print '<div class="col-md-6 col-md-offset-3">
							<div class="alert alert-danger alert-dismissible" role="alert">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  <strong>Gelöscht!</strong>Der Raspberry Pi wurde erfolgreich gelöscht!
								</div>
							</div>';
						}
						
						unset($_POST); 	
					?>	
				</div>
				<!-- /.deleteRaspi -->
			</div>
			<!--  /.col -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

<?php
	include 'footer.php';
?>	