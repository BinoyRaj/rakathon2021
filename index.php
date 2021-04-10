<?php
    session_start();
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Hospital Interface</title>
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
    <script>
        var TxtRotate = function(el, toRotate, period) {
            this.toRotate = toRotate;
            this.el = el;
            this.loopNum = 0;
            this.period = parseInt(period, 10) || 2000;
            this.txt = '';
            this.tick();
            this.isDeleting = false;
        };

        TxtRotate.prototype.tick = function() {
            var i = this.loopNum % this.toRotate.length;
            var fullTxt = this.toRotate[i];

            if (this.isDeleting) {
                this.txt = fullTxt.substring(0, this.txt.length - 1);
            } else {
                this.txt = fullTxt.substring(0, this.txt.length + 1);
            }

            this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

            var that = this;
            var delta = 300 - Math.random() * 100;

            if (this.isDeleting) {
                delta /= 2;
            }

            if (!this.isDeleting && this.txt === fullTxt) {
                delta = this.period;
                this.isDeleting = true;
            } else if (this.isDeleting && this.txt === '') {
                this.isDeleting = false;
                this.loopNum++;
                delta = 500;
            }

            setTimeout(function() {
                that.tick();
            }, delta);
        };

        window.onload = function() {
            var elements = document.getElementsByClassName('txt-rotate');
            for (var i = 0; i < elements.length; i++) {
                var toRotate = elements[i].getAttribute('data-rotate');
                var period = elements[i].getAttribute('data-period');
                if (toRotate) {
                    new TxtRotate(elements[i], JSON.parse(toRotate), period);
                }
            }
            // INJECT CSS
            var css = document.createElement("style");
            css.type = "text/css";
            css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666 }";
            document.body.appendChild(css);
        };
    </script>
</head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Main -->
        <div id="main">
            <div class="inner">

                <!-- Header -->
                <?php include "./header.html" ?>
                <br />
                <!-- <h1 style="text-align:center;color:#247814;">Save
                    <span class="txt-rotate" data-period="2000" data-rotate='[ "papers!", "trees!" ]'></span>
                </h1> -->
                <!-- Banner -->
                <section id="banner">
                    <div class="content">
                        <br/>
                        <header>
                            <h1>Rakathon 2021 Asahi</h1>
                            <p>Theme: Healthcare >> Automation</a></p>
                        </header>
                        <p>We are trying to establish a standard framework through which trust and accountability can be increased and funds can be streamlined. We want to increase the number of donors intuitively based on the trust factor added by this framework.</p>
                    </div>

                    <?php if(isset($_SESSION['login'])): ?>
                    <span class="image object">
						<h3 style="color:#cc242a;">Hi <?php echo $_SESSION['name']; ?></h3>
						<!-- <h2>Your Profile</h2>
						<h3 style="color:#7f888f;">Email: <?php echo $_SESSION['email']; ?></h3>
						<h3 style="color:#7f888f;">Date of Birth: <?php echo $_SESSION['dob']; ?></h3> -->
					</span>

                    <?php else: ?>
					<div class="formContainer">
                        <!-- <div class="formInnerContainer forgotPassword hide">
							<form method="post" class="form forgotPasswordForm formValidation" action="./serverside_scripts/v1/WebForgetPass.php">
								<div class="inputContainer inputValidation" data-validate="Valid email is required: ex@abc.xyz">
									<input class="input" type="text" name="usname" placeholder="Email">
									<span class="inputFocus"></span>
									<span class="inputIcon">
										<i class="fa fa-envelope" aria-hidden="true"></i>
									</span>
								</div>

								<div class="inputContainer inputValidation" data-validate="Date of Birth is required">
                                    <input class="input" type="date" name="dobirth" placeholder="Date of Birth">
                                    <span class="inputFocus"></span>
                                    <span class="inputIcon">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                    </span>
                                </div>
                                
								<div class="forgotPasswordButtonContainer right">
									<button class="forgotPasswordButton secondaryButton">Submit</button>
								</div>
							</form>
							<div class="textAlignment_center">
								<a class="link slide" id="signInForgotPassword" href="#">Back to login<i class="fa fa-long-arrow-right ml-5" aria-hidden="true"></i></a>
							</div>
						</div> -->
						
						<div class="formInnerContainer login visible">
                            <?php
                                $error = isset($_GET['error']) ? $_GET['error'] : '';
                                $msg = isset($_GET['msg']) ? $_GET['msg'] : '';
                                if($error == "true") {
                                    echo "<center><h4 style='color:red;'>" . $msg . "</h4></center>";
                                }
                                if($error == "false") {
                                    echo "<center><h4 style='color:green;'>" . $msg . "</h4></center>";

                                }
                            ?>
							<form method="post" class="form loginForm formValidation"  action="./serverside_scripts/v1/WebLogin.php">
                                <input name="redirect" id="redirect" type="hidden">

								<div class="inputContainer inputValidation" data-validate="">
									<input class="input" type="text" name="hospId" placeholder="Hospital ID">
									<span class="inputFocus"></span>
									<span class="inputIcon">
										<i class="fa fa-user" aria-hidden="true"></i>
									</span>
								</div>

								<div class="inputContainer inputValidation mb-0" data-validate="Password is required">
									<input class="input loginPassword" type="password" name="pass" placeholder="Password">
									<span class="inputFocus"></span>
									<span class="inputIcon">
										<i class="fa fa-lock" aria-hidden="true"></i>
									</span>
								</div>
								<div class="textAlignment_right mb-15">
									<!-- <a class="link" id="forgotPassword" href="#">Forgot Password?</a> -->
								</div>

								<div class="loginButtonContainer right">
									<button class="loginButton secondaryButton" onclick="getRedirectUrl()">Login</button>
								</div>
							</form>
							<div class="textAlignment_center">
								<!-- <a class="createAccount link slide" id="createAccount" href="#">New to DigiNotes? Sign Up <i class="fa fa-long-arrow-right ml-5" aria-hidden="true"></i></a> -->
							</div>
						</div>

						<!-- <div class="formInnerContainer signup hide">
							<form method="post" class="form loginForm formValidation" action="./serverside_scripts/v1/WebRegisterUser.php">
                                <div class="inputContainer inputValidation mb-12" data-validate="Name is required">
									<input class="input" type="text" name="username" placeholder="Name">
									<span class="inputFocus"></span>
									<span class="inputIcon">
										<i class="fa fa-user" aria-hidden="true"></i>
									</span>
								</div>

								<div class="inputContainer inputValidation" data-validate="Valid email is required: ex@abc.xyz">
									<input class="input" type="text" name="email" placeholder="Email">
									<span class="inputFocus"></span>
									<span class="inputIcon">
										<i class="fa fa-envelope" aria-hidden="true"></i>
									</span>
                                </div>
                                
                                <div class="inputContainer inputValidation" data-validate="Password should be of 8-32 characters">
									<input class="input" type="password" name="pwd" placeholder="Password">
									<span class="inputFocus"></span>
									<span class="inputIcon">
										<i class="fa fa-lock" aria-hidden="true"></i>
                                    </span>
                                </div>
                                
                                <div class="inputContainer inputValidation" data-validate="District is required">
									<select class="select" name="cDist">
                                        <option value="" disabled selected style="display:none;">District</option>
                                        <option value="OK">Others (Outside Karnataka)</option>
                                        <option value="BK">Bagalkot</option>
                                        <option value="BN">Bangalore Urban</option>
                                        <option value="BR">Bangalore Rural</option>
                                        <option value="BG">Belgaum</option>
                                        <option value="BL">Ballari</option>
                                        <option value="BD">Bidar</option>
                                        <option value="BJ">Bijapur</option>
                                        <option value="CJ">Chamarajanagara</option>
                                        <option value="CB">Chikballapur</option>
                                        <option value="CK">Chikkamagaluru</option>
                                        <option value="CT">Chitradurga</option>
                                        <option value="DK">Dakshina Kannada</option>
                                        <option value="DA">Davanagere</option>
                                        <option value="DH">Dharwad</option>
                                        <option value="GA">Gadag</option>
                                        <option value="GU">Gulbarga</option>
                                        <option value="HS">Hassan</option>
                                        <option value="HV">Haveri</option>
                                        <option value="KD">Kodagu</option>
                                        <option value="KL">Kolar</option>
                                        <option value="KP">Koppal</option>
                                        <option value="MA">Mandya</option>
                                        <option value="MY">Mysore</option>
                                        <option value="RA">Raichur</option>
                                        <option value="RN">Ramanagara</option>
                                        <option value="SH">Shimoga</option>
                                        <option value="TU">Tumkur</option>
                                        <option value="UD">Udupi</option>
                                        <option value="UK">Uttara Kannada</option>
                                        <option value="YG">Yadgir</option>
                                    </select>
									<span class="inputFocus"></span>
									<span class="inputIcon">
										<i class="fa fa-map-marker" aria-hidden="true"></i>
                                    </span>
								</div>

                                <div class="inputContainer inputValidation" data-validate="Date of Birth is required">
                                    <input class="input" type="date" name="dob" placeholder="Date of Birth">
                                    <span class="inputFocus"></span>
                                    <span class="inputIcon">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="inputContainer inputValidation" data-validate="Gender is required">
                                    <select class="select" name="gender">
                                        <option value="" disabled selected style="display:none;">Gender</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                        <option value="O">Others</option>
                                    </select>
                                    <span class="inputFocus"></span>
                                    <span class="inputIcon">
                                        <i class="fa fa-transgender" aria-hidden="true"></i>
                                    </span>
                                </div>

								<div class="loginButtonContainer right">
									<button class="loginButton secondaryButton">Sign Me Up!</button>
								</div>
							</form>
							<div class="textAlignment_center">
								<span><a class="createAccount link slide" id="signIn" href="#">Already have an account? Log In<i class="fa fa-long-arrow-left ml-5" aria-hidden="true"></i></a></span>
							</div>
						</div> -->
					</div>
                    <?php endif; ?>
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
    <script>
        function getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, '\\$&');
            var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }
        
        function getRedirectUrl() {
            var redirectUrl = getParameterByName('redirect');
            if(redirectUrl != null) {
                document.getElementById("redirect").value = redirectUrl;
            } else {
                document.getElementById("redirect").value = "http://localhost:8080/rakathon"
            }
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://powzgjpkx1w0hrwbbholpa-on.drv.tw/diginotes.co.in/mjs/browser.min.js"></script>
    <script src="https://powzgjpkx1w0hrwbbholpa-on.drv.tw/diginotes.co.in/mjs/breakpoints.min.js"></script>
    <script src="https://powzgjpkx1w0hrwbbholpa-on.drv.tw/diginotes.co.in/mjs/util.js"></script>
    <script src="https://powzgjpkx1w0hrwbbholpa-on.drv.tw/diginotes.co.in/mjs/main.js"></script>
    <script src="https://powzgjpkx1w0hrwbbholpa-on.drv.tw/diginotes.co.in/mjs/formValidation.js"></script>
    <script>
        $('.open-datetimepicker').click(function(event){
            event.preventDefault();
            $('#datetimepicker').click();
        });
    </script>

</body>

</html>