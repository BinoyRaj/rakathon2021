<?php
	session_start();
	session_destroy();
	echo "Redirecting...";
?>
<script>
	setTimeout(function() {
        var redirectUrl = window.location.href;
            window.location.href = "http://localhost:8080/rakathon/index.php?error=false&msg=You have been logged out successfully";
    }, 500);
</script>