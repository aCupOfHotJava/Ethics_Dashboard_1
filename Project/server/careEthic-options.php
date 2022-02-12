
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
            // check if there's already a dilemma for this user
            $sql = "SELECT sliderAttentiveness, sliderCompetence, sliderResponsiveness FROM careEthics WHERE uid = '" .$uid ."';";
            $result = $pdo -> query($sql);
            while($row = $result -> fetch()) {
                $isEmpty = false;
                $sliderAttentiveness = 0;
                $sliderCompetence = 0;
                $sliderResponsiveness = 0;
                $sliderAttentiveness2 = 0;
                $sliderCompetence2 = 0;
                $sliderResponsiveness2 = 0;
            }

            // when the user tries to update the text, it should be put into the db
            if(isset($_POST['submit-CErange'])) {
                $sliderAttentiveness = $_POST['sliderAttentiveness1_1'];
                $sliderCompetence = $_POST['sliderCompetence1_1'];
                $sliderResponsiveness = $_POST['sliderResponsiveness1_1'];
                $sliderAttentivenes2 = $_POST['sliderAttentiveness1_2'];
                $sliderCompetence2 = $_POST['sliderCompetence1_2'];
                $sliderResponsiveness2 = $_POST['sliderResponsiveness1_2'];
                // If there is no record for the dilemma, insert a new record under that uid
                if($isEmpty) {
                    $sql = "INSERT INTO careEthics VALUES ('" .$uid ."', '" .$sliderAttentiveness ."','" .$sliderCompetence ."','" .$sliderResponsiveness ."');";
                    echo $sql;
                    $pdo -> query($sql);
                }
                // If there is a record, find it and update it instead.
                else {
                    $sql = "UPDATE careEthics SET sliderAttentiveness = '" .$sliderAttentiveness ."',sliderCompetence = '" .$sliderCompetence ."',sliderResponsiveness = '" .$sliderResponsiveness ."' WHERE uid = " .$uid .";";
                    echo $sql;
                    $pdo -> query($sql);
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