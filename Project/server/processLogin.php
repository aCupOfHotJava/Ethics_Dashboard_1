<!DOCTYPE html>
<html>
    <?php
        session_start();
        // DO NOT handle login requests if request method is GET!!
        if($_SERVER["REQUEST_METHOD"] == "GET") {
            exit("Invalid request method!");
        }

        try {

            $connString = "mysql:host=localhost;dbname=ethics_db";
            $user = "root";
            $pass = "";
            $pdo = new PDO($connString, $user, $pass);
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Get form data in preparation for login query
            $uid = $_POST["form-uid"];
            $pid = $_POST["form-pid"];

            // Query
            $sql = "SELECT uid, pid, isAdmin FROM user WHERE uid = '". $uid.
                    "' AND pid = '". $pid. "'";
            
            $result = $pdo -> query($sql);

            $count = 0;
            while($row = $result -> fetch()) {
                echo "Hello user ". $row["uid"] ."<br>"  ."Admin functionality: " .$row["isAdmin"];
                $count ++;
                // Successful login should then lead the user to the homepage WITH A SESSION STATE
                // that persists until logout or exit!
                $_SESSION['userid'] = $uid;
                echo "<br>You will be redirected to home in 3 seconds...";
                header("Refresh: 3; URL = ../html/index.html");
            }
            if($count == 0) {
                // We should be redirected to the login page again with some error info
                // instead of being stuck on this empty php.
                echo "Invalid login information or account does not exist.<br>You will be redirected in 3 seconds...";
                //sleep(3);
                header("Refresh: 3; URL = ../html/login.html");
            }
        }
        catch(PDOException $e) {
            die($e -> getMessage());
        }
    ?>
</html>