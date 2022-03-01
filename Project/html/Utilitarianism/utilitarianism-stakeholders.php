<!--NEED TO BE ABLE TO MOVE THE STAKEHOLDERS UP AND DOWN IN ORDER TO RANK THEM-->
<?php
    session_start();
    print_r($_SESSION);

    if (!isset($_SESSION["uid"])){
        header("Location: ../html/login.php");  
    }

        function setAnswers(){
            try{
                $connString = "mysql:host=lowe-walker.org;dbname=rwalker_Ethics_Dashboard_1";
                $user = "rwalker_rampaul";
                $pass = "1xlu7OMJ";
                $pdo = new PDO($connString, $user, $pass);
                $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $uid = $_SESSION["uid"];

                $sql1 =  "SELECT * FROM stakeholders WHERE uid = '". $uid."'";
                $result1 = $pdo -> query($sql1);

                $isInTable = False;
                $count = 0;
                $namearray = array();
                while ($row = $result1 -> fetch()){
                    array_push($namearray, $row['name']);
                    $count += 1;
                    $isInTable = True;
                    echo "<div class = \"box\" id = \"dilemma-box\">
                            <h3>Stakeholder ".$count."</h3>
                            <p>".$row['name']."</p>
                            <textarea class = \"textarea\" id = \"dilemma-text\" name = \"analysis".$count."\">".$row['utilitarianAnalysis']."</textarea>
                        </div>";
                }

                if (isset($_POST['update-stakeholders'])){

                    for ($i = 1; $i <= $count; $i++){
                        $strRep = strval($i);
                        $getpost = "analysis$strRep";
                        $analysis = $_POST[$getpost];

                        $update1 = "UPDATE `stakeholders` SET `utilitarianAnalysis`= '".$analysis."' WHERE name = '".$namearray[$i-1]."' and uid = ".$uid."";
                        $pdo -> query($update1);

                        header("Refresh:0");
                    }
                   
                }

                if (!$isInTable){
                    $count2 = 0;
                    while ($row = $result1 -> fetch()){
                        $count++;
                        echo "<div class = \"box\" id = \"dilemma-box\">
                                <h3>Stakeholder ".$count2."</h3>
                                <p>".$row['name']."</p>
                                <textarea class = \"textarea\" id = \"dilemma-text\" placeholder = \"The engineer is directly, and significantly, impacted by the issue.  They could lose their job at VW, lose industry friends and suffer career set backs. \"></textarea>
                            </div>";
                    }
                }

            }
            catch(PDOException $e){
                die($e -> getMessage());
            }
        }

        function addStakeholder(){
            try{
                $connString = "mysql:host=lowe-walker.org;dbname=rwalker_Ethics_Dashboard_1";
                $user = "rwalker_rampaul";
                $pass = "1xlu7OMJ";
                $pdo = new PDO($connString, $user, $pass);
                $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $uid = $_SESSION["uid"];

                if (isset($_POST['addStake'])){

                    $newStakeholder = $_POST["newStake"];
                    $newStakeholderAnalysis = $_POST["newStakeAnalysis"];
                    
                        // insert into database
                        $insert = "INSERT INTO `stakeholders`(`uid`, `name`, `utilitarianAnalysis`) VALUES (".$uid.",'".$newStakeholder."','".$newStakeholderAnalysis."')";
                        $pdo -> query($insert);
       
                        header("Refresh:0");
                   
                }

            }
            catch(PDOException $e){
                die($e -> getMessage());
            }
        }
?>
<!------------------------------------------------------------------------------------------------>
<!DOCTYPE html>
<html>
    <head>
        <title>Utilitarianism - Stakeholders</title>
        <meta name="author" content="">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel = "stylesheet" href = "../../styles/bulma/css/bulma.css">
    </head>
    <body>
        <h1 class = "title has-background-grey-lighter">UTILITARIANISM</h1>

        <div class = "columns">
            <div class = "column is-two-fifths">
                <div class = "box has-background-primary">
                    <p>Provide reasons why you have included each stakeholder. Move stakeholders up or down to rank according to the degree of impact. 
                                (Stakeholder 1 experiences the highest impact) Note: You may want to removed stakeholders if you can’t identify how they will 
                                be impacted or if there is very little impact.  Also, you may add stakeholders at any time.</p>
                </div>
                
                <form method = "POST">
                    <?php
                        setAnswers();
                    ?>

                    <button class = 'button' name = 'update-stakeholders'>Update</button>
                </form>
            </div>

            <div class = "column is-two-fifths">
                <div class = "box" id = "ethics-options-wrapper">
                    <p class = "heading" id = "empty">Add Stakeholder</p>
                    <form method = "POST">
                        <textarea class = "textarea" id = "dilemma-text" placeholder = "Enter New Stakeholder" name = "newStake"></textarea>
                        <textarea class = "textarea" id = "dilemma-text" placeholder = "Enter new Stakeholder Analysis" name = "newStakeAnalysis"></textarea>
                        <?php
                            addStakeholder();
                        ?>
                        <button class = "button" name="addStake">Submit</button>
                    </form>
                </div>
            </div>
            <div>
            <div class = "column has-fixed-size is-20">
                <a class = "box has-background-grey has-text-white" id = "dashboard" href = "../index.php">
                    DASHBOARD
                </a>
                <a class = "box has-background-white has-text-black" id = "utilitarianism" href = "../Utilitarianism/utilitarianism.php">
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
                <a class = "box has-background-grey has-text-white" id = "my-progress" href = "../MyProgress.php">
                    MY PROGRESS
                </a>
                </div>
                </div>
                </div>
                <a class="button" href="utilitarianism-analysis/utilitarianism-analysis1.php">Proceed to Analysis ></a>
            </div>
        </div>

        <script src = "../../scripts/jquery-3.6.0.js"></script>
    </body>
</html>