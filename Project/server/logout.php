<!DOCTYPE html>
<html>
    <?php
        session_start();
        echo "Logged out successfully<br>Redirecting to the login page in 3 seconds...";
        session_destroy();
        header("Refresh: 3; URL = ../html/login.html");
    ?>
</html>