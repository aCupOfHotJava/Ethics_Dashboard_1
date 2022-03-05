
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

            $sql = "SELECT sliderAttentiveness, sliderCompetence, sliderResponsiveness, dutyofCare1 FROM careEthics WHERE uid = '" .$uid ."';";
            $result = $pdo -> query($sql);
            while($row = $result -> fetch()) {
                $isEmpty = false;
                $sliderAttentiveness = 0;
                $sliderCompetence = 0;
                $sliderResponsiveness = 0;
                $dutyofCare = 0;
                $sliderAttentiveness2 = 0;
                $sliderCompetence2 = 0;
                $sliderResponsiveness2 = 0;
            }

            // when the user tries to update the text, it should be put into the db
          
            if(isset($_POST['submit-CErange'])) {
                $sliderAttentiveness = $_POST['sliderAttentiveness1_1'];
                $sliderCompetence = $_POST['sliderCompetence1_1'];
                $sliderResponsiveness = $_POST['sliderResponsiveness1_1'];
                $dutyofCare = $_POST['dutyofCare1'];
                // $sliderAttentivenes2 = $_POST['sliderAttentiveness1_2'];
                // $sliderCompetence2 = $_POST['sliderCompetence1_2'];
                // $sliderResponsiveness2 = $_POST['sliderResponsiveness1_2'];
                if($isEmpty) {
                    // $sql = "INSERT INTO careEthics VALUES ('" .$uid ."', '" .$sliderAttentiveness ."','" .$sliderCompetence ."','" .$sliderResponsiveness ."');";
                    // echo $sql;
                    // $pdo -> query($sql);
                    $stmt = $pdo -> prepare("INSERT INTO careEthics(uid, sliderAttentiveness, sliderCompetence, sliderResponsiveness) VALUES ('" .$uid ."', '" .$sliderAttentiveness ."','" .$sliderCompetence ."','" .$sliderResponsiveness ."');");
                    $stmt -> bindParam("uid", $uid);
                    $stmt -> bindParam("sliderAttentiveness", $sliderAttentiveness);
                    $stmt -> bindParam("sliderCompetence", $sliderCompetence);
                    $stmt -> bindParam("sliderResponsiveness", $sliderResponsiveness);
                    $stmt -> execute();
                    header("Refresh:0");


                }
                // If there is a record, find it and update it instead.
                else {
                    // $sql = "UPDATE careEthics SET sliderAttentiveness = '" .$sliderAttentiveness ."',sliderCompetence = '" .$sliderCompetence ."',sliderResponsiveness = '" .$sliderResponsiveness ."' WHERE uid = " .$uid .";";
                    // echo $sql;
                    // $pdo -> query($sql);
                    $stmt = $pdo -> prepare("UPDATE careEthics SET sliderAttentiveness = '" .$sliderAttentiveness ."',sliderCompetence = '" .$sliderCompetence ."',sliderResponsiveness = '" .$sliderResponsiveness ."' WHERE uid = " .$uid .";");
                    $stmt -> bindParam("sliderAttentiveness", $sliderAttentiveness);
                    $stmt -> bindParam("sliderCompetence", $sliderCompetence);
                    $stmt -> bindParam("sliderResponsiveness", $sliderResponsiveness);
                    $stmt -> bindParam("uid", $uid);
                    $stmt -> execute();

                }
            }

            if(!$isEmpty) {
                echo "<p class = 'textarea' name = 'sliderAttentiveness1_1' rows='5' cols='45'>";
                echo $sliderAttentiveness;
                echo "</p>";
                echo "<p class = 'textarea' name = 'sliderCompetence1_1' rows='5' cols='45'>";
                echo $sliderCompetence;
                echo "</p>";
                echo "<p class = 'textarea' name = 'sliderResponsiveness1_1' rows='5' cols='45'>";
                echo $sliderResponsiveness;
                
                echo "</p>";
            }
            if($isEmpty) {


            }
        }
        catch(PDOException $e) {
            die($e -> getMessage());
        }
    }
    ?>
    </body>

</html>