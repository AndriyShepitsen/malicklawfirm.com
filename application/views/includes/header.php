<!DOCTYPE html>
<!-- 
//LOCATION: q/home/ 
-->
<html lang="en">
<head>
	<meta charset="utf-8">
	 <link href="<?php echo base_url(); ?>/stylesheets/app.css" rel="stylesheet" type="text/css" />
	  	<link href="<?php echo base_url(); ?>/stylesheets/normalize.css" media="screen, projector, print" rel="stylesheet" type="text/css" />
	
	<link href="<?php echo base_url(); ?>/comp/stylesheets/print.css" media="print" rel="stylesheet" type="text/css" />

  
  <link href="/comp/stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
  
  <link href="<?php echo base_url(); ?>/comp/stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.9.1.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/script.js"></script>
  <title>Northbrook, Skokie Attorney</title>

<link href="/stylesheets/app.css" rel="stylesheet" type="text/css" />
  <link href="/stylesheets/normalize.css" media="screen, projector, print" rel="stylesheet" type="text/css" />

</head>
<body>
	<div id="booksbg">
		<div id="outerWrapper">
			<header id="header">
				<div id="logoDiv">

					<?php 
					$logo = '<img src="';
					$logo .= base_url();
					$logo .= 'comp/img/Northbrook-Skokie-Attorney-Logo.png" ';
					$logo .= 'alt="Northbrook Skokie Principal Attorney Logo"/>';
					echo anchor(base_url(), $logo);

					?>

				</div> <!--logoDiv  -->

				<div id="formDiv">
					<div id="formDivInner">

						<?php

						if ($this->session->userdata('is_LoggedIn')){
						// echo("tEST");

							echo "<p id='userNameAct' class = 'userName'>" . ($this->session->userdata('userName')) ;

							$isAdmin = $this->session->userdata('is_Admin');
							if ($isAdmin) {
								echo anchor('admin', 'Admin Panel', 'class=\'adminLink\'');
							} else {

								echo anchor('partner', 'Personal Files', 'class=\'adminLink\'') . "</br>";
							} 


							echo anchor('/logout', 'Logout', 'class=\'logout\'');
							echo('</p>');
						} else {
							include 'loginform.php';
						}



						?>

					</div> 
					
					<div id="facebookHeaderWrapper">
						<a href="http://www.facebook.com/pages/The-Malick-Law-Firm/125904747582046">
							<img id="facebookHeaderLogo" src="<?php echo base_url(); ?>/comp/img/Northbrook-Law-Firm-facebook.jpg" alt="Skokie Law Consultant Facebook">
						</a>
					</div>


					<!-- formDivInner -->
				</div>  <!--formDiv  -->

				<!-- My comment1 -->
			</header><!-- /header -->
			<!-- My comment2 -->
			<?php
			include_once 'nav.php';
			?>
		<!-- My comment3!!! -->