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
							<button class="btn btn-default" aria-label="Left Align" name="addRaspi">Detection starten ...</button>
						</form>';
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


	