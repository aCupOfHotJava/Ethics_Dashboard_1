<!-- ADD INSTRUCTOR FUNCTIONS -->
<?php
    session_start();

        if (!isset($_SESSION["uid"])){
            header("Location: ../login.php");  
        }

            function setAnswers(){
                try{
                    $connString = "mysql:host=lowe-walker.org;dbname=rwalker_Ethics_Dashboard_1";
                    $user = "rwalker_rampaul";
                    $pass = "1xlu7OMJ";
                    $pdo = new PDO($connString, $user, $pass);
                    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $uid = $_SESSION["uid"];

                    $sql1 =  "SELECT * FROM utilitarianism WHERE uid = '". $uid."'";
                    $result1 = $pdo -> query($sql1);

                    $isInTable = False;
                    $count = 0;
                    $optionArray = array();
                    while ($row = $result1 -> fetch()){
                        $isInTable = True;
                        $count++; 
                        array_push($optionArray, $row['option']);

                        $ex = $row['explanation'];
                        if ($ex == ""){
                            $ex = "Enter your explanation here";
                        }
                        
                        echo '<div class = "box" id = "dilemma-box">
                                <h3>Option '.$count.'</h3>
                                <input type = "text" name = "option1-1" class = "textarea required" id = "option1-1" value = "'.$row['option'].'" rows="1"/>
                                <textarea class = "textarea required" name="ex'.$count.'" id = "option1-2">'.$ex.'</textarea>
                            </div>'; 
                    }

                    if (isset($_POST['update-options'])){
                        if ($isInTable){
                            for ($i = 1; $i <= $count; $i++){
                                $strRep = strval($i);
                                $item = "ex$strRep";
                                $explanation = $_POST[$item]; 
                                $option = $optionArray[$i-1];

                                $update = "UPDATE `utilitarianism` SET `explanation`= '".$explanation."' WHERE `uid` = ".$uid." and `option` = '".$option."'";
                                $pdo -> query($update);

                                header("Refresh:0");
                            }
                        }
                    }

                    if (!$isInTable){
                        echo '<p>There are no options to analyze. To add options, go to the "ethical issues" page.</p>';
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
        <title>Utilitarianism</title>
        <meta name="author" content="">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel = "stylesheet" href = "../../styles/bulma/css/bulma.css">
    </head>
    <body>
        <h1 class = "title has-background-grey-lighter">UTILITARIANISM</h1>

        <div class = "columns">
            <div class = "column is-two-thirds">
                <div class = "box has-background-primary">
                    <p>Utilitarianism is a consequentialist theory –meaning that the moral worth of an action is determined 
                        by the consequences of the action.  The first step is to consider the consequences, both short-term 
                        and long-term, for the options you’ve identified.</p>
                </div>

                <form method = "POST">
                    <div class = "options"> 
                        <?php
                            setAnswers();
                        ?>

                        <button class = 'button' name = 'update-options'>Update</button>
                    </div>
                </form>
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
                <a class="button" href="utilitarianism-stakeholders.php">Proceed to Stakeholders ></a>
            </div>
        </div>
        <script src = "../../scripts/validate-utilitarianism-options.js"></script>
    </body>
</html>