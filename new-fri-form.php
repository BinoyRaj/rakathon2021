<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>New Submission | Hospital Interface</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="apple-touch-icon" sizes="180x180" href="assets/img/logo.png">
    	<link rel="icon" type="image/png" sizes="32x32" href="assets/img/logo.png">
    	<link rel="icon" type="image/png" sizes="16x16" href="assets/img/logo.png">
    	<link rel="manifest" href="https://powzgjpkx1w0hrwbbholpa-on.drv.tw/diginotes.co.in/icons/site.webmanifest">
    	<link rel="mask-icon" href="assets/img/logo.png" color="#5bbad5">
    	<meta name="msapplication-TileColor" content="#da532c">
    	<meta name="theme-color" content="#ffffff">
		<link rel="stylesheet" href="https://powzgjpkx1w0hrwbbholpa-on.drv.tw/diginotes.co.in/mcss/main.css" />
		<link rel="stylesheet" href="https://powzgjpkx1w0hrwbbholpa-on.drv.tw/diginotes.co.in/mcss/newStyles.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<?php include "./header.html" ?>
								<br/><h2 style="text-align:center;color:#cc242a;">New Submission</h2>
								<center><p>Here you can submit the form to help raise a find.</p></center>
							<!-- Section 3 -->
								<section id="banner">
								<div class="content"></div>
								<div class="formContainer">
									<header class="major">
										<h2>Form</h2>
									</header>
									<div class="formContainer">
										<div class="formInnerContainer login visible">
											<form action="./serverside_scripts/v1/register.php" class="form formValidation" method="post" enctype="multipart/form-data">	
												<div class="inputContainer inputValidation" data-validate="">
													<input class="input" type="text" name="healthId" placeholder="Patient Health ID">
													<span class="inputFocus"></span>
													<span class="inputIcon">
														<i class="fa fa-user" aria-hidden="true"></i>
													</span>
												</div>
												<div class="inputContainer inputValidation" data-validate="">
													<input class="input" type="text" name="amt" placeholder="Amount Required">
													<span class="inputFocus"></span>
													<span class="inputIcon">
														<i class="fa fa-rupee-sign" aria-hidden="true"></i>
													</span>
												</div>
												<div class="inputContainer inputValidation" data-validate="Valid email is required: ex@abc.xyz">
												
													<input class="input" type="file" id="bills" name="bills[]" style="display:none;" multiple accept="image/*">
													<label class="input" for="bills">Upload Bills</label>
													<span class="inputFocus"></span>
													<span class="inputIcon">
														<i class="fa fa-upload" aria-hidden="true"></i>
													</span>
												</div>
												<div class="textAlignment_right mb-15"></div>
												<div class="loginButtonContainer right">
													<button class="loginButton secondaryButton">Submit</button>
												</div>
											</form>
										</div>
									</div>
									
								</section>
							
								<!-- Footer -->
									<?php include "./footer.html" ?>    
						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<?php include "./navbar.php" ?>
					</div>

			</div>

		<!-- Scripts -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<script src="https://powzgjpkx1w0hrwbbholpa-on.drv.tw/diginotes.co.in/mjs/browser.min.js"></script>
			<script src="https://powzgjpkx1w0hrwbbholpa-on.drv.tw/diginotes.co.in/mjs/breakpoints.min.js"></script>
			<script src="https://powzgjpkx1w0hrwbbholpa-on.drv.tw/diginotes.co.in/mjs/util.js"></script>
			<script src="https://powzgjpkx1w0hrwbbholpa-on.drv.tw/diginotes.co.in/mjs/main.js"></script>

	</body>
</html>