<!-- See slide 5, 6 of proposal
*
*   Clicking on an ethical issue option on index.php will redirect the user
*   to this page, where the user can add an ethical issue they wish to discuss.
*   When scripting and database is set up, this page will be able to hold multiple
*   issues that a given user has worked on
*
*-->
<?php
    session_start();
    // prevent non-logged in people from accessing pages like this
    if($_SESSION == NULL) {
        session_destroy();
        header("Location: login.php");
    }
    function determineStateOptions() {
        $uid = $_SESSION["uid"];
        $option = NULL;
        $isEmpty = true;
        try {
            $connString = "mysql:host=lowe-walker.org;dbname=rwalker_Ethics_Dashboard_1";
            $user = "rwalker_krieg";
            $pass = "rB87mkNG";
            $pdo = new PDO($connString, $user, $pass);
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // check for existing options to display
            $sql = "SELECT studentOption FROM ethical_options WHERE uid = '" .$uid ."';";
            $result = $pdo -> query($sql);
            $count = 0;
            while($row = $result -> fetch()) {
                $count ++;
                $isEmpty = false;
                $option = $row[0];
                echo "<h3>Option Number " .$count ."</h3>";
                echo "<div class = 'box'>";
                echo $option;
                echo "</div>";
            }
            if(isset($_POST['add-option'])) {
                $option = $_POST['option-text'];
                $stmt = $pdo -> prepare("INSERT INTO ethical_options VALUES (:uid, :option)");
                $stmt -> bindParam(":uid", $uid);
                $stmt -> bindParam(":option", $option);
                $stmt -> execute();

                $stmt = $pdo -> prepare("INSERT INTO utilitarianism (`uid`, `option`) VALUES (:uid, :option)");
                $stmt -> bindParam(":uid", $uid);
                $stmt -> bindParam(":option", $option);
                $stmt -> execute();

                $stmt = $pdo -> prepare("INSERT INTO virtueEthics (`uid`, `options`) VALUES (:uid, :options)");
                $stmt -> bindParam(":uid", $uid);
                $stmt -> bindParam(":options", $option);
                $stmt -> execute();
                header("Location: #");
            }
            echo "<textarea class = 'textarea' name = 'option-text' placeholder = 'Enter your option here.'></textarea>";
        }
        catch(PDOException $e) {
            die($e -> getMessage());
        }
    }
    function determineStateDilemma() {
        $uid = $_SESSION["uid"];
        $dilemma = 0;
        $isEmpty = true;
        try {
            $connString = "mysql:host=lowe-walker.org;dbname=rwalker_Ethics_Dashboard_1";
            $user = "rwalker_krieg";
            $pass = "rB87mkNG";
            $pdo = new PDO($connString, $user, $pass);
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // check if there's already a dilemma for this user
            $sql = "SELECT dilemma FROM ethical_issues WHERE uid = '" .$uid ."';";
            $result = $pdo -> query($sql);
            while($row = $result -> fetch()) {
                $isEmpty = false;
                $dilemma = $row[0];
            }

            // when the user tries to update the text, it should be put into the db
            if(isset($_POST['update-dilemma'])) {
                $dilemma = $_POST['dilemma-text'];
                // If there is no record for the dilemma, insert a new record under that uid
                if($isEmpty) {
                    $stmt = $pdo -> prepare("INSERT INTO ethical_issues VALUES (:uid, :dilemma");
                    $stmt -> bindParam(":uid", $uid);
                    $stmt -> bindParam(":dilemma", $dilemma);
                    $stmt -> execute();
                }
                // If there is a record, find it and update it instead.
                else {
                    $stmt = $pdo -> prepare("UPDATE ethical_issues SET dilemma = :dilemma WHERE uid = :uid");
                    $stmt -> bindParam(":dilemma", $dilemma);
                    $stmt -> bindParam(":uid", $uid);
                    $stmt -> execute();
                }
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
<!DOCTYPE html>
<hmtl>
    <head>
        <title>Ethical Issues</title>
        <meta name="author" content="">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel = "stylesheet" href = "../styles/bulma/css/bulma.css">
    </head>
    <body>
        <h1 class = "title has-background-grey-lighter">ETHICS DASHBOARD</h1>
        <h2 class = "subtitle has-background-danger-light">DECISION / ACTION UNDER CONSIDERATION</h2>
        <div class = "columns">
            <div class = "column is-two-fifths">
                <div class = "box has-background-primary">
                    <p>Describe the ethical issue or dilemma you would like to analyze. Remember, ethical values are
                    things that are important because they are right or wrong - lying, courage, loyalty, theft, etc.</p>
                </div>
                <form method = 'POST'>
                    <div class = 'box' id = 'dilemma-box'>
                        <?php
                            determineStateDilemma();
                        ?>
                    </div>
                    <button class = 'button' name = 'update-dilemma'>Update</button>
                </form>
            </div>
            <div class = "column is-two-fifths">
                <form method = 'POST'>
                    <div class = "box">
                        <?php
                            determineStateOptions();
                        ?>
                    </div>
                    <button class = 'button' name = 'add-option'>Add Option</button>    
                </form>
            </div>
            <div>
                <div class = "column has-fixed-size is-20">
                    <a class = "box has-background-grey has-text-white" id = "dashboard" href = "index.php">
                        DASHBOARD
                    </a>
                    <a class = "box has-background-grey has-text-white" id = "utilitarianism" href = "Utilitarianism/utilitarianism.php">
                        UTILITARIANISM
                    </a>
                    <a class = "box has-background-grey has-text-white" id = "deontology" href = "Deontology/Deontology1.php">
                        DEONTOLOGY
                    </a>
                    <a class = "box has-background-grey has-text-white" id = "virtue-ethics" href = "VirtueEthics/VirtueEthics1.php">
                        VIRTUE ETHICS
                    </a>
                    <a class = "box has-background-grey has-text-white" id = "care-ethics" href = "CareEthics/CareEthics.php">
                        CARE ETHICS
                    </a>
                    <a class = "box has-background-grey has-text-white" id = "my-progress" href = "MyProgress.php">
                        MY PROGRESS
                    </a>
                </div>
            </div>
        </div>
        <!--
        <script src = "../scripts/jquery-3.6.0.js"></script>
        <script src = "../scripts/user-event.js"></script>
        -->
    </body>
</hmtl>