<?php
	function htmlHeader($title){
		print '<!DOCTYPE html>
		<html lang="en">

		<head>

			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="A website running on a Raspberry Pi for viewing and managing livestreams from other Raspi cameras in the local network.">
			<meta name="author" content="Thomas Frey">

			<title>'.$title.'</title>

			<!-- Bootstrap Core CSS -->
			<link href="css/bootstrap.min.css" rel="stylesheet">

			<!-- Custom CSS -->
			<link href="css/stylesheet.css" rel="stylesheet">
		   
			<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
			<!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->
			<!--[if lt IE 9]>
				<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
				<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->

		</head>

		<body>

			<!-- Navigation -->
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.php">Raspberry Pi</a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li>
								<a href="index.php">Videostream</a>
							</li>
							<li>
								<a href="motionDetection.php">Motion Detection</a>
							</li>
							<li>
								<a href="externalStream.php">Externer Stream</a>
							</li>
						</ul>
					</div>
					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container -->
			</nav>';
	}

	
	function createStreamDiv($IPAddress){
	
		print '<div class="lead">Aktuelle IP-Adresse: '. $IPAddress .'</p>
		 <div class="videostream">
			<embed type="application/x-vlc-plugin" pluginspage="http://www.videolan.org"
			   width="640"
			   height="480"
			   target="http://'.$IPAddress.':8554"
			   controls="false"
			</embed>
		 </div>';
	
	}
	
?>