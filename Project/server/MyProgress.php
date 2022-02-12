<?php
    session_start();
    if($_SESSION == NULL) {
        session_destroy();
        header("Location: login.php");
    }
    function determineState() {
        $uid = $_SESSION["uid"];
        $dilemma = 0;
        $isEmpty = true;
        try {
            $connString = "mysql:host=lowe-walker.org;dbname=rwalker_Ethics_Dashboard_1";
            $user = "rwalker_villafranca";
            $pass = "gapsd5W2";
            $pdo = new PDO($connString, $user, $pass);
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // check if there's already a dilemma for this user
            $sql = "SELECT dilemma FROM ethical_issues WHERE uid = '" .$uid ."';";
            $result = $pdo -> query($sql);
            while($row = $result -> fetch()) {
                $isEmpty = false;
                $dilemma = $row[0];
            }

            $sel = mysql_query("SELECT * FROM table_name") or die(mysql_error());
            while($row = mysql_fetch_array($sel)){
                echo $row['column_1']." ".$row['column_2']."<br>";
            }

            if(!$isEmpty) {
                echo "<textarea class = 'textarea' name = 'dilemma-text'>";
                echo $dilemma;
                echo "</textarea>";
            }
            if($isEmpty) {
                echo "<textarea class = 'textarea' name = 'dilemma-text' placeholder = 'Enter your dilemma here.'></textarea>";
            }
        }
        catch(PDOException $e) {
            die($e -> getMessage());
        }
    }
?>