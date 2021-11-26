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

            // Verify not already existing user
            $sql = "SELECT uid FROM user WHERE uid = '" .$uid ."';";
            $result = $pdo -> query($sql);

            $count = 0;
            while($row = $result -> fetch()) {
                $count ++;
            }
            if($count > 0) {
                echo "Account under that username already exists.";
            }
            else {
                // Insert
                $sql = "INSERT INTO user VALUES (" .$uid .", '" .$pid ."', 0.00, 0);";
                $result = $pdo -> query($sql);
                
                header("location: ../html/index.html");
                // successful account creation leads user to the home page. A persistent
                // session state keeping them logged in until logout or application exit needs
                // to be added. 

            }

        }
        catch(PDOException $e) {
            die($e -> getMessage());
        }
        
    ?>
</html>