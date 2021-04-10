<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Patient History | Hospital Interface</title>
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
			#patient_details {
			font-family: Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
			}

			#patient_details td, #patient_details th {
			border: 1px solid #ddd;
			padding: 8px;
			}

			#patient_details th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: center;
			background-color: #cc242a;
			color: white;
			}
			progress[value] {
			width: 500px;
			height: 50px;
			}
			.center {
			margin: auto;
			border: 3px;
			padding: 10px;
			text-align: center;
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
								<br/><h2 style="text-align:center;color:#cc242a;">Patient History</h2>
								<?php
									include './serverside_scripts/includes/Dbconnect.php';
									$conn = getCon();
									$healthId = $_GET['healthId'];
									$hospId = $_SESSION['hospId'];
									$stmt1="SELECT `entryId`, `patientName`, `amountRequested` , `amountRaised` , `status` FROM `patientDetails` WHERE healthId='".$healthId."'";
									
									if(!($result1=mysqli_query($conn,$stmt1))) {
									} else {
										if(mysqli_num_rows($result1) == 0){
										} else {
											$row = mysqli_fetch_assoc($result1);
											$entryId = $row["entryId"];
											$patientName = $row["patientName"];
											$amountRequested = $row["amountRequested"];
											$amountRaised = $row["amountRaised"];
											$status = $row["status"];
										}
									}
									$stmt2="SELECT * FROM `NDHMDB` where healthId='".$healthId."'";
									$result2=$conn->query($stmt2);
									if($result2->num_rows > 0) {
										while($res2= $result2->fetch_assoc()) {
											$age = $res2["age"];
											$gender = $res2["gender"];
											$mobile = $res2["mobile"];
											$roomAndNursingCharges = $res2["roomAndNursingCharges"];
											$diagnosisCodeLevel1 = $res2["diagnosisCodeLevel1"];
											$proceduraCodeLevel1 = $res2["proceduraCodeLevel1"];
											$policyNumber = $res2["policyNumber"];
											$hospitalName = $res2["hospitalName"];
											$hospitalAddress = $res2["hospitalAddress"];
											$hospitalisationType = $res2["hospitalisationType"];
											$expectedLOS = $res2["expectedLOS"];
											$daysInICU = $res2["daysInICU"];
											$roomType = $res2["roomType"];
											$diagnosticCharges = $res2["diagnosticCharges"];
											$professionalFees = $res2["professionalFees"];
											$medicineCharges = $res2["medicineCharges"];
										}
									}
								?>
								<center><p>Details for <?php echo $patientName; ?></p></center>
								<div class="center">
									<progress max=<?php echo $amountRequested;?> value=<?php echo $amountRaised;?>></progress>
									<h2>₹ <?php echo $amountRaised;?> raised out of ₹ <?php echo $amountRequested;?></h2>
								</div>
							<!-- Section 3 -->
							<section id="banner">
								<div class="formContainer">
									<header class="major">
										<h2>Patient Details</h2>
									</header>
									<div class="formInnerContainer login visible">
										<table width='80%' align='center' style='border:2px;'>
											<tr>
												<td>Name</td>
												<td><?php echo $patientName ?></td>
											</tr>
											<tr>
												<td>Age</td>
												<td><?php echo $age ?></td>
											</tr>
											<tr>
												<td>Gender</td>
												<td><?php echo $gender ?></td>
											</tr>
											<tr>
												<td>Mobile</td>
												<td><?php echo $mobile ?></td>
											</tr>
										</table>
									</div>
								</div>
								
								<div class="formContainer" style="margin-left: 30%;">
									<header class="major">
										<h2>Diagnosis Details</h2>
									</header>
									<div class="formInnerContainer login visible">
										<table width='80%' align='center' style='border:2px;'>
											<tr>
												<td>Room And Nursing Charges</td>
												<td><?php echo $roomAndNursingCharges ?></td>
											</tr>
											<tr>
												<td>Diagnosis Code Level</td>
												<td><?php echo $diagnosisCodeLevel1 ?></td>
											</tr>
											<tr>
												<td>Procedural Code Level</td>
												<td><?php echo $proceduraCodeLevel1 ?></td>
											</tr>
											<tr>
												<td>Hospital Name</td>
												<td><?php echo $hospitalName ?></td>
											</tr>
											<tr>
												<td>Hospital Address</td>
												<td><?php echo $hospitalAddress ?></td>
											</tr>
											<tr>
												<td>Hospitalisation Type</td>
												<td><?php echo $hospitalisationType ?></td>
											</tr>
											<tr>
												<td>Expected LOS</td>
												<td><?php echo $expectedLOS ?></td>
											</tr>
											<tr>
												<td>Days In ICU</td>
												<td><?php echo $daysInICU ?></td>
											</tr>
											<tr>
												<td>Room Type</td>
												<td><?php echo $roomType ?></td>
											</tr>
											<tr>
												<td>Diagnostic Charges</td>
												<td><?php echo $diagnosticCharges ?></td>
											</tr>
											<tr>
												<td>Professional Fees</td>
												<td><?php echo $professionalFees ?></td>
											</tr>
											<tr>
												<td>Medicine Charges</td>
												<td><?php echo $medicineCharges ?></td>
											</tr>
										</table>
									</div>
								</div>
							</section>
							
							<section>
								<table id = "patient_details">
									<tr>
										<th  colspan="2">
											Present Ailments
										</th>
									<tr>
									<td>Nature of Illness with Presenting Complaints</td>
									<td>Dengue</td>
									</tr>
									<tr>
									<td>Relevant Critical Findings</td>
									<td>Fever</td>
									</tr>
									<tr>
									<td>Date of first constultation</td>
									<td>18/03/2021</td>
									</tr>
									<tr>
										<td>Past History</td>
										<td>Diabetes</td>
									</tr>
									<tr>
										<td>Duration of Present Ailment</td>
										<td>2 weeks</td>
									</tr>
									<tr>
										<th colspan="2">
										Provisional Diagnosis
									</th>
									</tr>
									<tr>
										<td>Details</td>
										<td>Dengue</td>
									</tr>
									<tr>
										<td>ICD-10 Code</td>
										<td>30GG</td>
									</tr>
									<tr>
										<th colspan="2">
											Proposed Treatment
										</th>
									</tr>
									<tr>
										<td>Treatment Type</td>
										<td>Supportive Care</td>
									</tr>
									<tr>
										<td>ICD-10 PCS Code</td>
										<td>90A</td>
									</tr>
									</table>
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