
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

            $sql = "SELECT sliderAttentiveness2_1, sliderCompetence2_1, sliderResponsiveness2_1, DutyofCare2 FROM careEthics2 WHERE uid = '" .$uid ."';";
            $result = $pdo -> query($sql);
            while($row = $result -> fetch()) {
                $isEmpty = false;
                $sliderAttentiveness = 0;
                $sliderCompetence = 0;
                $sliderResponsiveness = 0;
                $DutyofCare = 0;
                $sliderAttentiveness2 = 0;
                $sliderCompetence2 = 0;
                $sliderResponsiveness2 = 0;
            }

            // when the user tries to update the text, it should be put into the db
          
            if(isset($_POST['submit-CErange'])) {
                $sliderAttentiveness = $_POST['sliderAttentiveness2_1'];
                $sliderCompetence = $_POST['sliderCompetence2_1'];
                $sliderResponsiveness = $_POST['sliderResponsiveness2_1'];
                $sliderAttentiveness2 = $_POST['sliderAttentiveness2_2'];
                $sliderCompetence2 = $_POST['sliderCompetence2_2'];
                $sliderResponsiveness2 = $_POST['sliderResponsiveness2_2'];
                $DutyofCare = $_POST['doCAVG1'];
                // $sliderAttentivenes2 = $_POST['sliderAttentiveness2_2'];
                // $sliderCompetence2 = $_POST['sliderCompetence2_2'];
                // $sliderResponsiveness2 = $_POST['sliderResponsiveness2_2'];
                if($isEmpty) {
                    // $sql = "INSERT INTO careEthics2 VALUES ('" .$uid ."', '" .$sliderAttentiveness ."','" .$sliderCompetence ."','" .$sliderResponsiveness ."');";
                    // echo $sql;
                    // $pdo -> query($sql);
                    $stmt = $pdo -> prepare("INSERT INTO careEthics2(uid, sliderAttentiveness2_1, sliderCompetence2_1, sliderResponsiveness2_1,sliderAttentiveness2_2,sliderCompetence2_2,sliderResponsiveness2_2, DutyofCare2) VALUES ('" .$uid ."', '" .$sliderAttentiveness ."','" .$sliderCompetence ."','" .$sliderResponsiveness ."', '" .$sliderAttentiveness2 ."','" .$sliderCompetence2 ."','" .$sliderResponsiveness2 ."','".$DutyofCare ."');");
                    $stmt -> bindParam("uid", $uid);
                    $stmt -> bindParam("sliderAttentiveness2_1", $sliderAttentiveness);
                    $stmt -> bindParam("sliderCompetence2_1", $sliderCompetence);
                    $stmt -> bindParam("sliderResponsiveness2_1", $sliderResponsiveness);

                    $stmt -> bindParam("sliderAttentiveness2_2", $sliderAttentiveness2);
                    $stmt -> bindParam("sliderCompetence2_2", $sliderCompetence2);
                    $stmt -> bindParam("sliderResponsiveness2_2", $sliderResponsiveness2);
                    $stmt -> bindParam("DutyofCare2", $DutyofCare);
                    $stmt -> execute();
                    header("Refresh:0");


                }
                // If there is a record, find it and update it instead.
                else {
                    // $sql = "UPDATE careEthics2 SET sliderAttentiveness = '" .$sliderAttentiveness ."',sliderCompetence = '" .$sliderCompetence ."',sliderResponsiveness = '" .$sliderResponsiveness ."' WHERE uid = " .$uid .";";
                    // echo $sql;
                    // $pdo -> query($sql);
                    $stmt = $pdo -> prepare("UPDATE careEthics2 SET sliderAttentiveness2_1 = '" .$sliderAttentiveness ."',sliderCompetence2_1 = '" .$sliderCompetence ."',sliderResponsiveness2_1 = '" .$sliderResponsiveness ."' ,sliderAttentiveness2_2 = '" .$sliderAttentiveness2 ."',sliderCompetence2_2 = '" .$sliderCompetence2 ."',sliderResponsiveness2_2 = '" .$sliderResponsiveness2 ."',DutyofCare2 = '" .$DutyofCare ."' WHERE uid = " .$uid .";");
                    $stmt -> bindParam("sliderAttentiveness2_1", $sliderAttentiveness);
                    $stmt -> bindParam("sliderCompetence2_1", $sliderCompetence);
                    $stmt -> bindParam("sliderResponsiveness2_1", $sliderResponsiveness);

                    $stmt -> bindParam("sliderAttentiveness2_2", $sliderAttentiveness2);
                    $stmt -> bindParam("sliderCompetence2_2", $sliderCompetence2);
                    $stmt -> bindParam("sliderResponsiveness2_2", $sliderResponsiveness2);
                    $stmt -> bindParam("DutyofCare2", $DutyofCare);
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