
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

            $sql = "SELECT sliderAttentiveness, sliderCompetence, sliderResponsiveness, DutyofCare1 FROM careEthics WHERE uid = '" .$uid ."';";
            $result = $pdo -> query($sql);
            while($row = $result -> fetch()) {
                $isEmpty = false;
                $sliderAttentiveness = 0;
                $sliderCompetence = 0;
                $sliderResponsiveness = 0;

                $sliderAttentiveness1_2 = 0;
                $sliderCompetence1_2 = 0;
                $sliderResponsiveness1_2 = 0;

                $DutyofCare = 0;
                $sliderAttentiveness2 = 0;
                $sliderCompetence2 = 0;
                $sliderResponsiveness2 = 0;

            }

            // when the user tries to update the text, it should be put into the db
          
            if(isset($_POST['submit-CErange'])) {
                $sliderAttentiveness = $_POST['sliderAttentiveness1_1'];
                $sliderCompetence = $_POST['sliderCompetence1_1'];
                $sliderResponsiveness = $_POST['sliderResponsiveness1_1'];

                $sliderAttentiveness1_2 = $_POST['sliderAttentiveness1_2'];
                $sliderCompetence1_2 = $_POST['sliderCompetence1_2'];
                $sliderResponsiveness1_2 = $_POST['sliderResponsiveness1_2'];
                // If there is no record for the dilemma, insert a new record under that uid
                if($isEmpty) {
                    $sql = "INSERT INTO careEthics VALUES ('" .$uid ."', '" .$sliderAttentiveness ."','" .$sliderCompetence ."','" .$sliderResponsiveness ."', '" .$sliderAttentiveness1_2 ."','" .$sliderCompetence1_2 ."','" .$sliderResponsiveness1_2 ."');";
                    //echo $sql;
                    $pdo -> query($sql);
                }
                // If there is a record, find it and update it instead.
                else {
                    $sql = "UPDATE careEthics SET sliderAttentiveness = '" .$sliderAttentiveness ."',sliderCompetence = '" .$sliderCompetence ."',sliderResponsiveness = '" .$sliderResponsiveness ."' ,sliderAttentiveness1_2 = '" .$sliderAttentiveness1_2 ."',sliderCompetence1_2 = '" .$sliderCompetence1_2 ."',sliderResponsiveness1_2 = '" .$sliderResponsiveness1_2 ."' WHERE uid = " .$uid .";";
                    //echo $sql;
                    $pdo -> query($sql);

                $sliderAttentiveness2 = $_POST['sliderAttentiveness1_2'];
                $sliderCompetence2 = $_POST['sliderCompetence1_2'];
                $sliderResponsiveness2 = $_POST['sliderResponsiveness1_2'];
                $DutyofCare = $_POST['doCAVG1'];
                // $sliderAttentivenes2 = $_POST['sliderAttentiveness1_2'];
                // $sliderCompetence2 = $_POST['sliderCompetence1_2'];
                // $sliderResponsiveness2 = $_POST['sliderResponsiveness1_2'];
                if($isEmpty) {
                    // $sql = "INSERT INTO careEthics VALUES ('" .$uid ."', '" .$sliderAttentiveness ."','" .$sliderCompetence ."','" .$sliderResponsiveness ."');";
                    // echo $sql;
                    // $pdo -> query($sql);
                    $stmt = $pdo -> prepare("INSERT INTO careEthics(uid, sliderAttentiveness, sliderCompetence, sliderResponsiveness,sliderAttentiveness1_2,sliderCompetence1_2,sliderResponsiveness1_2, DutyofCare1) VALUES ('" .$uid ."', '" .$sliderAttentiveness ."','" .$sliderCompetence ."','" .$sliderResponsiveness ."', '" .$sliderAttentiveness2 ."','" .$sliderCompetence2 ."','" .$sliderResponsiveness2 ."','".$DutyofCare ."');");
                    $stmt -> bindParam("uid", $uid);
                    $stmt -> bindParam("sliderAttentiveness", $sliderAttentiveness);
                    $stmt -> bindParam("sliderCompetence", $sliderCompetence);
                    $stmt -> bindParam("sliderResponsiveness", $sliderResponsiveness);

                    $stmt -> bindParam("sliderAttentiveness1_2", $sliderAttentiveness2);
                    $stmt -> bindParam("sliderCompetence1_2", $sliderCompetence2);
                    $stmt -> bindParam("sliderResponsiveness1_2", $sliderResponsiveness2);
                    $stmt -> bindParam("DutyofCare1", $DutyofCare);
                    $stmt -> execute();
                    header("Refresh:0");


                }
                // If there is a record, find it and update it instead.
                else {
                    // $sql = "UPDATE careEthics SET sliderAttentiveness = '" .$sliderAttentiveness ."',sliderCompetence = '" .$sliderCompetence ."',sliderResponsiveness = '" .$sliderResponsiveness ."' WHERE uid = " .$uid .";";
                    // echo $sql;
                    // $pdo -> query($sql);
                    $stmt = $pdo -> prepare("UPDATE careEthics SET sliderAttentiveness = '" .$sliderAttentiveness ."',sliderCompetence = '" .$sliderCompetence ."',sliderResponsiveness = '" .$sliderResponsiveness ."' ,sliderAttentiveness1_2 = '" .$sliderAttentiveness2 ."',sliderCompetence1_2 = '" .$sliderCompetence2 ."',sliderResponsiveness1_2 = '" .$sliderResponsiveness2 ."',DutyofCare1 = '" .$DutyofCare ."' WHERE uid = " .$uid .";");
                    $stmt -> bindParam("sliderAttentiveness", $sliderAttentiveness);
                    $stmt -> bindParam("sliderCompetence", $sliderCompetence);
                    $stmt -> bindParam("sliderResponsiveness", $sliderResponsiveness);

                    $stmt -> bindParam("sliderAttentiveness1_2", $sliderAttentiveness2);
                    $stmt -> bindParam("sliderCompetence1_2", $sliderCompetence2);
                    $stmt -> bindParam("sliderResponsiveness1_2", $sliderResponsiveness2);
                    $stmt -> bindParam("DutyofCare1", $DutyofCare);
                    $stmt -> bindParam("uid", $uid);
                    $stmt -> execute();


                }
            }

            if(!$isEmpty) {


            }
            if($isEmpty) {
                echo "<text name='average2' class='average2' value='' readonly></text>";

            }
            }
        }
          
       
               

        catch(PDOException $e) {
            die($e -> getMessage());
        }
    }
    ?>
    </body>

</html>