<!DOCTYPE html>
<html>
    <?php

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
            $uid = $_POST["sid"];
            $pid = $_POST["pid"];

            // Query
            $sql = "SELECT StudentID, PId FROM student WHERE StudentID = '". $uid.
                    "' AND Pid = '". $pid. "'";
            
            $result = $pdo -> query($sql);

            $count = 0;
            while($row = $result -> fetch()) {
                echo "Hello captain ". $row["PId"];
                $count ++;
            }
            if($count == 0) {
                echo "Invalid login information or account does not exist";
            }
        }
        catch(PDOException $e) {
            die($e -> getMessage());
        }
    ?>
</html>