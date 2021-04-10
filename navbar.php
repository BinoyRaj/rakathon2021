<div class="inner">
    <!-- Menu -->
        <nav id="menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <!-- <li>
                    <span class="opener">Study Materials</span>
                    <ul>
                        <li><a href="study_materials/maths.php">Department of Mathematics</a></li>    
                        <li><a href="study_materials/basic_sciences.php">Basic Science</a></li>
                        <li><a href="study_materials/cse.php">CSE/ISE</a></li>
                        <li><a href="study_materials/ece.php">ECE</a></li>
                        <li><a href="study_materials/eee.php">EEE</a></li>
                        <li><a href="study_materials/civil.php">CIVIL</a></li>
                        <li><a href="study_materials/mech.php">MECH</a></li>
                    </ul>
                </li> -->
                <li><a href="fri-history.php">FRI Submission History</a></li>
                <li><a href="new-fri-form.php">New Submission</a></li>
                <!-- <li><a href="contact.php">Contact Us</a></li> -->
                <!-- <li><a href="#"><img src="https://powzgjpkx1w0hrwbbholpa-on.drv.tw/diginotes.co.in/images/googleplay.png" width="100%" alt="Play Store link"/></a></li> -->
            </ul>
            <br/>
            <!-- <ul class="icons">
                <div class="row gtr-uniform">
                    <div class="col-4">
                        <center><li><a href="https://www.facebook.com/DigiNotesOfficial/" class="icon brands fa-facebook-f" style="font-size:20px;" target="_blank"></a></li></center>
                    </div>
                    <div class="col-4">
                        <center><li><a href="https://www.instagram.com/diginotesofficial/" class="icon brands fa-instagram" style="font-size:20px;" target="_blank"></a></li></center>
                    </div>
                    <div class="col-4">
                        <center><li><a href="https://www.youtube.com/watch?v=7g5Y6Dst3FI" class="icon brands fa-youtube" style="font-size:20px;" target="_blank"></a></li></center>
                    </div>
                </div>
            </ul> -->
            <?php if(isset($_SESSION['login'])): ?>
                <center><li style="list-style-type: none;"><button class="secondaryButton" onclick="window.location='http://localhost:8080/rakathon/logout.php'">Logout</button></li></center>
            <?php endif; ?>
            
        </nav>

    <!-- Section -->
         <!-- <section>
            <header class="major">
                <h2>Advertisement</h2>
            </header>
            <div class="mini-posts">
                <article>
                    <a href="https://youtu.be/RMXdj6d3FX4" target="_blank" class="image"><img src="images/coming_soon_bakken.jpg" alt="Bakken" /></a>
                   <p>Advertisement 1</p>
                </article>
               <article>
                    <a href="#" class="image"><img src="images/pic07.jpg" alt="" /></a>
                    <p>Advertisement 2</p>
                </article>
            </div>
        </section> -->
</div>