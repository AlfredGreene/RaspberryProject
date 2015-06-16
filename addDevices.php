<?php
	include 'functions.inc.php';
	
	session_start();
	
	htmlHeader("Raspberry hinzufügen");
	
	$raspberryPiList = null;
	
	if (!isset($_SESSION['raspberryPiList'])) {
		$raspberryPiList = getAllRaspberries();
	}
?>

 <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Neuer Raspberry speichern</h2>
                <p class="lead">Auf dieser Seite können Sie ein neuer Raspberry Pi hinzufügen.</p>
				<div class="saveRaspi">
					<?php
						print '<form action="'.$_SERVER["PHP_SELF"].'" method="post" accept-charset="utf-8">
							<input name="ipAdress" type="text" required="required" placeholder="0.0.0.0" title="Gültige IP Adresse: 0-255.0-255.0-255.0-255" pattern="((^|\.)((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))){4}$"\><br><br>
							<button class="btn btn-default" aria-label="Left Align" name="addRaspi">Speichern</button>
						</form><br>';
						
						if(isset($_POST['addRaspi']) && ($raspberryPiList == null || !in_array($_POST['ipAdress'],$raspberryPiList))){
							addRaspberryPi($raspberryPiList, $_POST['ipAdress']);
							print '<div class="col-md-6 col-md-offset-3">
							<div class="alert alert-success alert-dismissible" role="alert">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  <strong>Gespeichert!</strong> Der Raspberry Pi wurde erfolgreich gespeichert!
								</div>
							</div>';
						}
						
						
					?>
				</div>
				<!-- /.saveRaspi -->
			</div>
			<!--  /.col -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

<?php
	include 'footer.php';
?>	