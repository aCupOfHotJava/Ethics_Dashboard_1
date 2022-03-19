
<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" href = "../styles/bulma/css/bulma.css">
    </head>
    <body>
    <?php
    if($_SESSION == NULL) {
        session_destroy();
        header("Location: login.php");
    }
    function determineState() {
        $uid = $_SESSION["uid"];
        $sliderAttentiveness = 0;
        $sliderCompetence = 0;
        $sliderResponsiveness = 0;
        $isEmpty = true;
        try {
            $connString = "mysql:host=lowe-walker.org;dbname=rwalker_Ethics_Dashboard_1";
            $user = "rwalker_villafranca";
            $pass = "gapsd5W2";
            $pdo = new PDO($connString, $user, $pass);
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT sliderAttentiveness3_1, sliderCompetence3_1, sliderResponsiveness3_1, DutyofCare3 FROM careEthics3 WHERE uid = '" .$uid ."';";
            $result = $pdo -> query($sql);
            while($row = $result -> fetch()) {
                $isEmpty = false;
                $sliderAttentiveness = 0;
                $sliderCompetence = 0;
                $sliderResponsiveness = 0;
                $DutyofCare = 0;
                $sliderAttentiveness3 = 0;
                $sliderCompetence3 = 0;
                $sliderResponsiveness3 = 0;
            }

            // when the user tries to update the text, it should be put into the db
          
            if(isset($_POST['submit-CErange'])) {
                $sliderAttentiveness = $_POST['sliderAttentiveness3_1'];
                $sliderCompetence = $_POST['sliderCompetence3_1'];
                $sliderResponsiveness = $_POST['sliderResponsiveness3_1'];
                $sliderAttentiveness3 = $_POST['sliderAttentiveness3_2'];
                $sliderCompetence3 = $_POST['sliderCompetence3_2'];
                $sliderResponsiveness3 = $_POST['sliderResponsiveness3_2'];
                $DutyofCare = $_POST['doCAVG1'];
                // $sliderAttentivenes3 = $_POST['sliderAttentiveness3_2'];
                // $sliderCompetence3 = $_POST['sliderCompetence3_2'];
                // $sliderResponsiveness3 = $_POST['sliderResponsiveness3_2'];
                if($isEmpty) {
                    // $sql = "INSERT INTO careEthics3 VALUES ('" .$uid ."', '" .$sliderAttentiveness ."','" .$sliderCompetence ."','" .$sliderResponsiveness ."');";
                    // echo $sql;
                    // $pdo -> query($sql);
                    $stmt = $pdo -> prepare("INSERT INTO careEthics3(uid, sliderAttentiveness3_1, sliderCompetence3_1, sliderResponsiveness3_1,sliderAttentiveness3_2,sliderCompetence3_2,sliderResponsiveness3_2, DutyofCare3) VALUES ('" .$uid ."', '" .$sliderAttentiveness ."','" .$sliderCompetence ."','" .$sliderResponsiveness ."', '" .$sliderAttentiveness3 ."','" .$sliderCompetence3 ."','" .$sliderResponsiveness3 ."','".$DutyofCare ."');");
                    $stmt -> bindParam("uid", $uid);
                    $stmt -> bindParam("sliderAttentiveness3_1", $sliderAttentiveness);
                    $stmt -> bindParam("sliderCompetence3_1", $sliderCompetence);
                    $stmt -> bindParam("sliderResponsiveness3_1", $sliderResponsiveness);

                    $stmt -> bindParam("sliderAttentiveness3_2", $sliderAttentiveness2);
                    $stmt -> bindParam("sliderCompetence3_2", $sliderCompetence2);
                    $stmt -> bindParam("sliderResponsiveness3_2", $sliderResponsiveness2);
                    $stmt -> bindParam("DutyofCare3", $DutyofCare);
                    $stmt -> execute();
                    header("Refresh:0");


                }
                // If there is a record, find it and update it instead.
                else {
                    // $sql = "UPDATE careEthics3 SET sliderAttentiveness = '" .$sliderAttentiveness ."',sliderCompetence = '" .$sliderCompetence ."',sliderResponsiveness = '" .$sliderResponsiveness ."' WHERE uid = " .$uid .";";
                    // echo $sql;
                    // $pdo -> query($sql);
                    $stmt = $pdo -> prepare("UPDATE careEthics3 SET sliderAttentiveness3_1 = '" .$sliderAttentiveness ."',sliderCompetence3_1 = '" .$sliderCompetence ."',sliderResponsiveness3_1 = '" .$sliderResponsiveness ."' ,sliderAttentiveness3_2 = '" .$sliderAttentiveness3 ."',sliderCompetence3_2 = '" .$sliderCompetence3 ."',sliderResponsiveness3_2 = '" .$sliderResponsiveness3 ."',DutyofCare3 = '" .$DutyofCare ."' WHERE uid = " .$uid .";");
                    $stmt -> bindParam("sliderAttentiveness3_1", $sliderAttentiveness);
                    $stmt -> bindParam("sliderCompetence3_1", $sliderCompetence);
                    $stmt -> bindParam("sliderResponsiveness3_1", $sliderResponsiveness);

                    $stmt -> bindParam("sliderAttentiveness3_2", $sliderAttentiveness3);
                    $stmt -> bindParam("sliderCompetence3_2", $sliderCompetence3);
                    $stmt -> bindParam("sliderResponsiveness3_2", $sliderResponsiveness3);
                    $stmt -> bindParam("DutyofCare3", $DutyofCare);
                    $stmt -> bindParam("uid", $uid);
                    $stmt -> execute();

                }
            }

            if(!$isEmpty) {
         echo "Answer Submitted";
            }

        }
        catch(PDOException $e) {
            die($e -> getMessage());
        }
    }
    ?>
    </body>

</html>