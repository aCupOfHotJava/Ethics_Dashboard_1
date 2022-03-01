<!DOCTYPE html>
<html>
    <?php
        session_start();
        // DO NOT handle login requests if request method is GET!!
        if($_SERVER["REQUEST_METHOD"] == "GET") {
            exit("Invalid request method!");
        }

        try {

            $connString = "mysql:host=lowe-walker.org;dbname=rwalker_Ethics_Dashboard_1";
            $user = "rwalker_krieg";
            $pass = "rB87mkNG";
            $pdo = new PDO($connString, $user, $pass);
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Get form data in preparation for login query
            $uid = $_POST["form-uid"];
            $pid = $_POST["form-pid"];
            $admin = NULL;

            $sql = "SELECT pid FROM user WHERE uid = '" .$uid ."';";
            $result = $pdo -> query($sql);
            $hpid = $result -> fetch();
            $hpid = $hpid[0];
            $pverify = password_verify($pid, $hpid);
            if($pverify) {
                // Query
                $sql = "SELECT uid, pid, isAdmin FROM user WHERE uid = '". $uid.
                "' AND pid = '". $hpid. "'";
                
                $result = $pdo -> query($sql);

                $count = 0;
                while($row = $result -> fetch()) {
                    $count ++;
                    // Successful login should then lead the user to the homepage WITH A SESSION STATE
                    // that persists until logout or exit!
                    $_SESSION['uid'] = $uid;
                    // Also add the admin status to the session! This will affect the view of the user
                    $_SESSION['isAdmin'] = $row[2];
                    header("Location: ../html/index.php");
                }

            }

           
            if(!$pverify) {
                // We should be redirected to the login page again with some error info
                // instead of being stuck on this empty php.
                session_destroy();
                echo "Invalid login information or account does not exist.<br>You will be redirected in 3 seconds...";
                //sleep(3);
                header("Refresh: 3; URL = ../html/login.php");
            }
        }
        catch(PDOException $e) {
            die($e -> getMessage());
        }
    ?>
</html>