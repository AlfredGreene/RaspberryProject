<?php
	function htmlHeader($title){
		print '<!DOCTYPE html>
		<html>

		<head>

			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="A website running on a Raspberry Pi for viewing and managing livestreams from other Raspi cameras in the local network.">
			<meta name="author" content="Thomas Frey">

			<title>'.$title.'</title>

			<!-- Bootstrap Core CSS -->
			<link href="css/bootstrap.min.css" rel="stylesheet">
			
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

			<!-- Custom CSS -->
			<link href="css/stylesheet.css" rel="stylesheet">
			<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
			<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
			<link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
		   
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
								<a href="aus.php">Ausschalten</a>
							</li>
							<li>
								<a href="stream.php">Videostream</a>
							</li>
							<li>
								<a href="motionDetection.php">Motion Detection</a>
							</li>
							<li>
								<a href="externalStream.php">Externer Stream</a>
							</li>
							<li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Verwalten <span class="caret"></span></a>
							  <ul class="dropdown-menu" role="menu">							 
								<li>
									<a href="addDevices.php">Raspberries hinzufügen</a>
								</li>
								<li>
									<a href="deleteDevices.php">Raspberries löschen</a>
								</li>
							 </ul>
							</li>
							<li>
								<a href="archive.php">Archiv</a>
							</li>
						</ul>
					</div>
					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container -->
			</nav>';
	}

	
	function createStreamDiv($IPAddress){
	
		print '<OBJECT classid="clsid:9BE31822-FDAD-461B-AD51-BE1D1C159921"
		 codebase="http://downloads.videolan.org/pub/videolan/vlc/latest/win32/axvlc.cab"
		 width="800" height="600" id="vlc" events="True">
		 <param name="Src" value="http://'.$IPAddress.':8554/" />
		 <param name="ShowDisplay" value="True" />
		 <param name="AutoLoop" value="False" />
		 <param name="AutoPlay" value="True" />
		 <embed id="vlcEmb" type="application/x-google-vlc-plugin" version="VideoLAN.VLCPlugin.2" autoplay="yes" loop="no" width="640" height="480"
		 target="http://'.$IPAddress.':8554/" ></embed>
		</OBJECT>';
	
		/*print '<div class="lead">Aktuelle IP-Adresse: '. $IPAddress .'</p>
		 <div class="videostream">
			<embed type="application/x-vlc-plugin"
			   name="main-video"	 
			   width="640"
			   height="480"
			   src="http://'. $IPAddress .':8554/"
			   controls="false"
			</embed>
		 </div>';*/
	
	}
	
	function addRaspberryPi($rasberryPiList, $raspberryPi){
		$rasberryPiList[] = $raspberryPi;
		file_put_contents("allRaspberries.json",json_encode($rasberryPiList));
	}
	
	function deleteRaspberryPi($raspberryPiList, $RaspiID){
		unset($raspberryPiList[$RaspiID]);    
		$raspberryPiList = array_values($raspberryPiList);
		file_put_contents("allRaspberries.json",json_encode($raspberryPiList));
	}
	
	function getAllRaspberries (){
		if (file_exists("allRaspberries.json")) {
		  $raspiFile = file_get_contents("allRaspberries.json");
		  return json_decode($raspiFile);
		}
	}
	
?>