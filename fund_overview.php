<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Fund Overview | FRI Interface</title>
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
		<style>
			/* The Modal (background) */
			.modal {
			display: none; /* Hidden by default */
			position: fixed; /* Stay in place */
			z-index: 1; /* Sit on top */
			padding-top: 100px; /* Location of the box */
			left: 0;
			top: 0;
			width: 100%; /* Full width */
			height: 100%; /* Full height */
			overflow: auto; /* Enable scroll if needed */
			background-color: rgb(0,0,0); /* Fallback color */
			background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
			}

			/* Modal Content */
			.modal-content {
			background-color: #fefefe;
			margin: auto;
			padding: 20px;
			border: 1px solid #888;
			width: 40%;
			}

			/* The Close Button */
			.close {
			color: #aaaaaa;
			float: right;
			font-size: 28px;
			font-weight: bold;
			}

			.close:hover,
			.close:focus {
			color: #000;
			text-decoration: none;
			cursor: pointer;
			}
		</style>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<?php include "./header.html" ?>
								<br/><h2 style="text-align:center;color:#cc242a;">Fund Overview</h2>
								<center><p></p></center>
							<!-- Section 1 -->	
								<section>
									<header class="major">
										<h2>All Patient Details</h2>
									</header>
									<form method="get" class="form loginForm formValidation"  action="./fund_overview.php">
										<div class="inputContainer inputValidation" data-validate="">
											<input class="input" type="text" name="friId" placeholder="FRI ID" value=<?php echo $_GET['friId']; ?>>
											<span class="inputFocus"></span>
											<span class="inputIcon">
												<i class="fa fa-user" aria-hidden="true"></i>
											</span>
										</div>
									</form>
									<?php
										include './serverside_scripts/includes/Dbconnect.php';
										$conn = getCon();
										$hospId = $_SESSION['hospId'];
										$friId = $_GET['friId'];
										if(!isset($friId) || $friId=="") {
											$stmt="SELECT `entryId`, `hospId`, `healthId`, `patientName`, `amountRequested` , `amountRaised` , `status` FROM `patientDetails`";
										} else {
											$stmt="SELECT `entryId`, `hospId`, `healthId`, `patientName`, `amountRequested` , `amountRaised` , `status` FROM `patientDetails` where entryId='".$friId."'";
										}
										$result=$conn->query($stmt);
										if($result->num_rows > 0) {
											echo "<table width='80%' align='center' style='border:2px;'>
												<tr>
													<th>FRI ID</th>
													<th>Patient Name</th>
													<th>Amount Raised</th>
													<th>FRI Status</th>
													<th>Hospital Name</th>
													<th>Contribute</th>
												</tr>
											";
											$ij = 0;
											while($res= $result->fetch_assoc()) {
												echo "<tr>
													<td>$res[entryId]</td>
													<td>$res[patientName]</td>
													<td>
														<progress max=$res[amountRequested] value=$res[amountRaised]></progress>
														<h4>₹ $res[amountRaised] raised out of ₹ $res[amountRequested]</h4>
													</td>
													<td>$res[status]</td>";
													$hospId = $res["hospId"];
													$stmt1 = "SELECT `hospName` FROM `hospitalLogin` WHERE userId='".$hospId."'";
													if(!($result1=mysqli_query($conn,$stmt1))) {
													} else {
														if(mysqli_num_rows($result1) == 0){
														} else {
															$row = mysqli_fetch_assoc($result1);
															$hospName = $row["hospName"];
														}
													}
												echo "
													<td>$hospName</td>
													<td><button id='myBtn' class='secondaryButton'>Payment QR</button></td>
													<div id='myModal' class='modal'>
														<div class='modal-content'>
															<span class='close'>&times;</span>
															<center><img src='./images/qr.png' width='50%'></center>
														</div>
													</div>
												</tr>";
												$ij++;
											}
											echo "</table>";
										} else {
											echo "<p>No submissions found. <a href='new-fri-form.php'>Click here for a new submission.</a></p>";
										}
									?>
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
			<script>
				
				// Get the modal
				var modal = document.getElementById("myModal");

				// Get the button that opens the modal
				var btn = document.getElementById("myBtn");

				// Get the <span> element that closes the modal
				var span = document.getElementsByClassName("close")[0];

				// When the user clicks the button, open the modal 
				btn.onclick = function() {
				modal.style.display = "block";
				}

				// When the user clicks on <span> (x), close the modal
				span.onclick = function() {
				modal.style.display = "none";
				}

				// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
				if (event.target == modal) {
					modal.style.display = "none";
				}
				}
			</script>

	</body>
</html>