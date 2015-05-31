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
                <h1>Raspberries verwalten</h1>
                <p class="lead">Auf dieser Seite können Sie neue Raspberry Pi's hinzufügen oder vorhandene Raspberries wieder löschen.</p>
				<div class="saveRaspi">
					<?php
						print '<h2>Neuer Raspberry Pi speichern</h2><br />
						<form action="'.$_SERVER["PHP_SELF"].'" method="post" accept-charset="utf-8">
							<input name="ipAdress" type="text" required="required" placeholder="0.0.0.0" title="Gültige IP Adresse: 0-255.0-255.0-255.0-255" pattern="((^|\.)((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))){4}$"\>
							<button class="btn btn-default" aria-label="Left Align" name="addRaspi">Speichern</button>
						</form>';
						
						if(isset($_POST['addRaspi']) && ($raspberryPiList == null || !in_array($_POST['ipAdress'],$raspberryPiList))){
							addRaspberryPi($raspberryPiList, $_POST['ipAdress']);
							print '<div class="col-md-6 col-md-offset-3">
							<div class="alert alert-success alert-dismissible" role="alert">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  <strong>Gespeichert!</strong>Der Raspberry Pi wurde erfolgreich gespeichert!
								</div>
							</div>';
						}
						
						
					?>
				</div>
				<!-- /.saveRaspi -->
				
				<div class="deleteRaspi">
					<?php
						print'<h2>Raspberry Pi löschen</h2><br />
							<form action="'.$_SERVER["PHP_SELF"].'" method="post" accept-charset="utf-8">
							<select name="selectedRaspi" size="1">
								<option>-</option>';
							
						$numberOfPi = count($raspberryPiList);
						for($i = 0;$i < $numberOfPi; $i++) {
							echo "\n<option value=\"".$i."\">".$raspberryPiList[$i]."</option>";	
						}

						print '</select>
						<button class="btn btn-default" aria-label="Left Align" name="deleteRaspi">Löschen</button>
						</form>';
						
						if(isset($_POST['deleteRaspi']) && $_POST['selectedRaspi'] != "-"){
							deleteRaspberryPi($raspberryPiList,$_POST['selectedRaspi']);
							print '<div class="col-md-6 col-md-offset-3">
							<div class="alert alert-success alert-dismissible" role="alert">
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