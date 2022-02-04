<!-- NEED TO MAKE SURE THAT ALL THE FIELDS ARE SET FOR SUBMISSION -->
<?php
    session_start();

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

                    $response1_1 = "";
                    $response1_2 = "";
                    $response2_1 = "";
                    $response2_2 = "";

                    $sql1 =  "SELECT * FROM utilitarianism WHERE uid = '". $uid."'";
                    $result1 = $pdo -> query($sql1);

                    $isInTable = False;
                    while ($row = $result1 -> fetch()){
                        $isInTable = True;
                        $response1_1 = $row['option1'];
                        $response1_2 = $row['option1Ex'];
                        $response2_1 = $row['option2'];
                        $response2_2 = $row['option2Ex'];
                    }

                    if (isset($_POST['update-options'])){
                        $option1_1 = $_POST["option1-1"];
                        $option1_2 = $_POST["option1-2"];
                        $option2_1 = $_POST["option2-1"];
                        $option2_2 = $_POST["option2-2"];

                        if ($isInTable){
                            // update database
                            $update = "UPDATE utilitarianism SET `option1`='".$option1_1."',`option1Ex`='".$option1_2."',`option2`='".$option2_1."',`option2Ex`='".$option2_2."' WHERE `uid` = '".$uid."'";
                            $pdo -> query($update);
                            header("Refresh:0");
                        }
                        else{
                            // insert into database
                            $insert = "INSERT INTO `utilitarianism`(`uid`, `option1`, `option1Ex`, `option2`, `option2Ex`) VALUES ('".$uid."','".$option1_1."','".$option1_2."','".$option2_1."','".$option2_2."')";
                            $pdo -> query($insert);
                            header("Refresh:0");
                        }
                    }

                    if ($isInTable){
                        echo "<div class = \"box\" id = \"dilemma-box\">
                                <h3>Option 1</h3>
                                <input type = \"text\" name = \"option1-1\" class = \"textarea required\" id = \"option1-1\" value = \"".$response1_1."\" rows=\"1\"/>
                                <textarea class = \"textarea required\" name=\"option1-2\" id = \"option1-2\" placeholder = \"Short term –personal guilt but I keep my job –the consumers are betrayed –the environment is damagedLong term -If the device is discovered I will likely lose my job and possibly my career –VW’s reputation, and business, will be damaged.\">".$response1_2."</textarea>
                            </div>
                            <div class = \"box\" id = \"dilemma-box\">
                                <h3>Option 2</h3>
                                <input type = \"text\" name = \"option2-1\" class = \"textarea required\" id = \"option2-1\" value = \"".$response2_1."\" rows=\"1\"/>
                                <textarea class = \"textarea required\" name=\"option2-2\" id = \"option2-2\" placeholder = \"Short term –I will have done the right thing, but I will likely lose my job and possibly my career.  The device will not be built and that will have a negative impact on VW’s ability to produce certain types of vehicles. Long term –I will feel good knowing that I did the right thing –consumers will not be betrayed –the environment is protected.\">".$response2_2."</textarea>
                            </div>";
                    }
                    else {
                       echo "<div class = \"box\" id = \"dilemma-box\">
                            <h3>Option 1</h3>
                            <input type = \"text\" name = \"option1-1\" class = \"textarea required\" id = \"option1-1\" placeholder = \"I can betray the company, go to the press ...\" rows=\"1\"/>
                            <textarea class = \"textarea required\" name=\"option1-2\" id = \"option1-2\" placeholder = \"Short term –personal guilt but I keep my job –the consumers are betrayed –the environment is damagedLong term -If the device is discovered I will likely lose my job and possibly my career –VW’s reputation, and business, will be damaged.\"></textarea>
                        </div>
                        <div class = \"box\" id = \"dilemma-box\">
                            <h3>Option 2</h3>
                            <input type = \"text\" name = \"option2-1\" class = \"textarea required\" id = \"option2-1\" placeholder = \"I can betray the company, go to the press ...\" rows=\"1\"/>
                            <textarea class = \"textarea required\" name=\"option2-2\" id = \"option2-2\" placeholder = \"Short term –I will have done the right thing, but I will likely lose my job and possibly my career.  The device will not be built and that will have a negative impact on VW’s ability to produce certain types of vehicles. Long term –I will feel good knowing that I did the right thing –consumers will not be betrayed –the environment is protected.\"></textarea>
                        </div>";
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