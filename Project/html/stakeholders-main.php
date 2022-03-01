<!-- Slide 7 on proposal
* Introducing the stakeholders options onto the dashboard,
* highlighting the Dashboard tab on the side
-->
<?php
    session_start();
    print_r($_SESSION);

    function setStakeholders(){
        try{
            $connString = "mysql:host=lowe-walker.org;dbname=rwalker_Ethics_Dashboard_1";
            $user = "rwalker_rampaul";
            $pass = "1xlu7OMJ";
            $pdo = new PDO($connString, $user, $pass);
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $uid = $_SESSION["uid"];

            $sql1 =  "SELECT `name` FROM stakeholders WHERE uid = '". $uid."'";
            $result1 = $pdo -> query($sql1);

            $isInTable = false;
            $count = 0;
            while ($row = $result1 -> fetch()){
                $isInTable = true;
                $count ++;

                echo "<br>
                    <p>STAKEHOLDER ".$count."</p>
                    <p>".$row['name']."</p>";
            }

            if (!$isInTable){
                echo "STAKEHOLDER 1
                <br>
                <br>
                STAKEHOLDER 2
                <br>
                <br>
                STAKEHOLDER 3
                <br>
                <br>
                STAKEHOLDER 4
                <br>
                <br>
                STAKEHOLDER 5
                <br>
                <br>
                STAKEHOLDER 6";
            }
        }
        catch(PDOException $e){
            die($e -> getMessage());
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ethical Issues</title>
        <meta name="author" content="">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel = "stylesheet" href = "../styles/bulma/css/bulma.css">
    </head>

    <body>
        <h1 class = "title has-background-grey-lighter">ETHICS DASHBOARD</h1>
        <div class = "columns">
            <div class = "column is-two-fifths">
                <div class = "box has-background-primary">
                    <p> ETHICS 1 <br>
                        The engineer asked to design the VW defeat device. <br>
                        OPTION 1 <br>
                        I can put loyalty to the company... <br>
                        OPTION 2 <br>
                        I can betray the company... <br>
                    </p>
                </div>
                    <div class = "box has-background-grey-lighter">
                        <p> UTILITARIANISM <br>
                            Option ? will produce the greatest happiness and is therefore the morally correct option.
                        </p>
                    </div>
                    <div class = "box has-background-grey-lighter">
                        <p> VIRTUE ETHICS <br>
                            The virtuous option is option ?
                        </p>
                    </div>
                </div>
                <!--
                <div class = "box" id = "dilemma-box">
                    <textarea class = "textarea" id = "dilemma-text" placeholder = "Enter your dilemma here."></textarea>
                </div>
                <button class = "button" id = "add-dilemma">Submit</button>
            </div>
        -->
            <div class = "column is-two-fifths">
                <div class = "box" id = "ethics-options-wrapper">
                    <p class = "stakeholders" id = "options">
                        <!--STAKEHOLDER 1
                        <br>
                        <br>
                        STAKEHOLDER 2
                        <br>
                        <br>
                        STAKEHOLDER 3
                        <br>
                        <br>
                        STAKEHOLDER 4
                        <br>
                        <br>
                        STAKEHOLDER 5
                        <br>
                        <br>
                        STAKEHOLDER 6-->

                        <?php
                            setStakeholders();
                        ?>
                    </p>
                </div>

                <div class = "box has-background-grey-lighter">
                    <p> CARE ETHICS <br>
                        Option ? responds to the needs identified
                    </p>
                </div>
                <a class="button" href="stakeholder-analysis.php">Proceed to Analysis ></a>
            </div>
            <div>
            <div class = "column has-fixed-size is-20">
                <a class = "box has-background-grey has-text-white" id = "dashboard" href = "index.php">
                    DASHBOARD
                </a>
                <a class = "box has-background-grey has-text-white" id = "utilitarianism" href = "../html/Utilitarianism/utilitarianism.php">
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
        <div class = "box" id = "comment-box">
                    <textarea class = "textarea" id = "dilemma-text" placeholder = "Comments:"></textarea>
                </div>
                <div class = "box has-background-grey-lighter">
                    <p> DEONTOLOGY <br>
                        The moral law dictates that option ? is the morally correct choice.
                    </p>
                </div>

        <script src = "../scripts/jquery-3.6.0.js"></script>
        <script src = "../scripts/user-event.js"></script>
    </body>
</html>