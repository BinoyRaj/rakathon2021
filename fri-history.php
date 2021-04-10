<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Submission History | Hospital Interface</title>
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
								<br/><h2 style="text-align:center;color:#cc242a;">Your Submission History</h2>
								<center><p>Here you can find your submission history, amount raised and the status of your past submissions.</p></center>

							<!-- Section 3 -->
								<section>
									<header class="minor">
										<h2><button class="secondaryButton" onclick="window.location='http://localhost:8080/rakathon/new-fri-form.php'">New Submission</button></h2>
									</header>
									<?php
										include './serverside_scripts/includes/Dbconnect.php';
										$conn = getCon();
										$hospId = $_SESSION['hospId'];
										$stmt="SELECT `entryId`, `healthId`, `patientName`, `amountRequested` , `amountRaised` , `status` FROM `patientDetails` WHERE hospId='".$hospId."'";
										$result=$conn->query($stmt);
										if($result->num_rows > 0) {
											echo "<table width='80%' align='center' style='border:2px;'>
												<tr>
													<th>ID</th>
													<th>Patient Name</th>
													<th>Amount Requested</th>
													<th>Amount Raised</th>
													<th>FRI Status</th>
													<th>Upload New Bills</th>
													<th>Download ZIP</th>
													<th>Details</th>
												</tr>
											";
											while($res= $result->fetch_assoc()) {
												echo "<tr>
													<td>$res[entryId]</td>
													<td>$res[patientName]</td>
													<td>$res[amountRequested]</td>
													<td>$res[amountRaised]</td>
													<td>$res[status]</td>
													<td><button class='secondaryButton'>Upload</button></td>
													<td><button class='secondaryButton'>Download Zip</button></td>
													<td><button class='secondaryButton' onclick=window.location='http://localhost:8080/rakathon/patient_history.php?healthId=$res[healthId]'>View More</button></td>
												</tr>";
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

	</body>
</html>