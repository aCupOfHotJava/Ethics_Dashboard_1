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
    function determineState() {
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
                    $sql = "INSERT INTO ethical_issues VALUES ('" .$uid ."', '" .$dilemma ."');";
                    echo $sql;
                    $pdo -> query($sql);
                }
                // If there is a record, find it and update it instead.
                else {
                    $sql = "UPDATE ethical_issues SET dilemma = '" .$dilemma ."' WHERE uid = " .$uid .";";
                    echo $sql;
                    $pdo -> query($sql);
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
                            determineState();
                        ?>
                    </div>
                    <button class = 'button' name = 'update-dilemma'>Update</button>
                </form>
            </div>
            <div class = "column is-two-fifths">
                <div class = "box" id = "ethics-options-wrapper">
                    <p class = "heading" id = "empty">There's nothing here. Add an option that you could solve your dilemma with:</p>
                </div>
                <button class = "button" id = "add-option">Add Option</button>
            </div>
            <div>
                <div class = "column has-fixed-size is-20">
                    <a class = "box has-background-grey has-text-white" id = "dashboard" href = "index.php">
                        DASHBOARD
                    </a>
                    <a class = "box has-background-grey has-text-white" id = "utilitarianism" href = "../Utilitarianism/utilitarianism.php">
                        UTILITARIANISM
                    </a>
                    <a class = "box has-background-grey has-text-white" id = "deontology" href = "../Deontology/Deontology1.php">
                        DEONTOLOGY
                    </a>
                    <a class = "box has-background-grey has-text-white" id = "virtue-ethics" href = "../VirtueEthics/VirtueEthics1.php">
                        VIRTUE ETHICS
                    </a>
                    <a class = "box has-background-grey has-text-white" id = "care-ethics" href = "../CareEthics/CareEthics.php">
                        CARE ETHICS
                    </a>
                    <a class = "box has-background-grey has-text-white" id = "my-progress" href = "MyProgress.php">
                        MY PROGRESS
                    </a>
                </div>
            </div>
        </div>

        <script src = "../scripts/jquery-3.6.0.js"></script>
        <script src = "../scripts/user-event.js"></script>
    </body>
</hmtl>