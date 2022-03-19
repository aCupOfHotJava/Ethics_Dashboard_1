<!--slide 29 of proposal
no functionality added yet-->
<?php
    session_start();
    print_r($_SESSION);

    if (!isset($_SESSION["uid"])){
        header("Location: ../../login.php");  
    }

        function setAnswers(){
            try{
                $connString = "mysql:host=lowe-walker.org;dbname=rwalker_Ethics_Dashboard_1";
                $user = "rwalker_joseph";
                $pass = "GRzQ8Gwh";
                $pdo = new PDO($connString, $user, $pass);
                $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $uid = $_SESSION["uid"];

                $sql1 =  "SELECT * FROM virtueEthics WHERE uid = '". $uid."'";
                $result1 = $pdo -> query($sql1);

                $isInTable = False;
                while ($row = $result1 -> fetch()){
                    $isInTable = True;

                    $option1_1 = $row['option1_1'];
                    $option1_2 = $row['option1_2'];
                    $option2_1 = $row['option2_1'];
                    $option2_2 = $row['option2_2'];
                    $option3_1 = $row['option3_1'];
                    $option3_2 = $row['option3_2'];

                    echo '<div>
                        <h2>OPTION 1 - I can put loyalty to the company...</h2>
                        <br>
                        <div class="box">
                            <h2> VICE (EXCESS) - VIRTUE (MEAN) - VICE (DEFICIENCY) </h2>
                            <label>Blind Devotion</label><input type="range" min="1" max="10" value="'.$option1_1.'" name="option1_1" id="s1-1"><label>Loyalty</label><input type="range" min="1" max="10" value="'.$option1_2.'" name="option1_2" id="s1-1"><label>Disloyalty</label>
                        </div>

                        <h2>OPTION 2 - I can betray the company, go to the press ...</h2>
                        <br>
                        <div class="box">
                            <h2> VICE (EXCESS) - VIRTUE (MEAN) - VICE (DEFICIENCY) </h2>
                            <label>Over-Sharing</label><input type="range" min="1" max="10" value="'.$option2_1.'" name="option2_1" id="s1-1"><label>Honesty</label><input type="range" min="1" max="10" value="'.$option2_2.'" name="option2_2" id="s1-1"><label>Dishonesty</label>
                        </div>

                        <h2>OPTION 3 - I can stand up to my superiors, say no and organize ...</h2>
                        <br>
                        <div class="box">
                            <h2> VICE (EXCESS) - VIRTUE (MEAN) - VICE (DEFICIENCY) </h2>
                            <label>Rashness</label><input type="range" min="1" max="10" value="'.$option3_1.'" name="option3_1" id="s1-1"><label>Courage</label><input type="range" min="1" max="10" value="'.$option3_2.'" name="option3_2" id="s1-1"><label>Cowardice</label>
                        </div>
                        </div>';

                }

                if (!$isInTable){
                    echo '<div>
                            <h2>OPTION 1 - I can put loyalty to the company...</h2>
                            <br>
                            <div class="box">
                                <h2> VICE (EXCESS) - VIRTUE (MEAN) - VICE (DEFICIENCY) </h2>
                                <label>Blind Devotion</label><input type="range" min="1" max="10" value="5" name="option1_1" id="s1-1"><label>Loyalty</label><input type="range" min="1" max="10" value="5" name="option1_2" id="s1-1"><label>Disloyalty</label>
                            </div>

                            <h2>OPTION 2 - I can betray the company, go to the press ...</h2>
                            <br>
                            <div class="box">
                                <h2> VICE (EXCESS) - VIRTUE (MEAN) - VICE (DEFICIENCY) </h2>
                                <label>Over-Sharing</label><input type="range" min="1" max="10" value="5" name="option2_1" id="s1-1"><label>Honesty</label><input type="range" min="1" max="10" value="5" name="option2_2" id="s1-1"><label>Dishonesty</label>
                            </div>

                            <h2>OPTION 3 - I can stand up to my superiors, say no and organize ...</h2>
                            <br>
                            <div class="box">
                                <h2> VICE (EXCESS) - VIRTUE (MEAN) - VICE (DEFICIENCY) </h2>
                                <label>Rashness</label><input type="range" min="1" max="10" value="5" name="option3_1" id="s1-1"><label>Courage</label><input type="range" min="1" max="10" value="5" name="option3_2" id="s1-1"><label>Cowardice</label>
                            </div>
                        </div>
                        <br>';
                }
                
                if (isset($_POST['options'])){

                    $option1_1 = $_POST['option1_1'];
                    $option1_2 = $_POST['option1_2'];
                    $option2_1 = $_POST['option2_1'];
                    $option2_2 = $_POST['option2_2'];
                    $option3_1 = $_POST['option3_1'];
                    $option3_2 = $_POST['option3_2'];

                    if ($isInTable){
                        //update new answers the database
                        //$updateStatement = "UPDATE virtueEthics SET `option1`='".$option1"',`option2`='".$option2."',`option3`='".$option3."',`optionsRanked`='".$optionsRanked."' WHERE `uid` = '".$uid."'";
                        $updateStatement = "UPDATE `virtueEthics` SET `option1_1` = '".$option1_1."', `option1_2` = '".$option1_2."', `option2_1` = '".$option2_1."', `option2_2` = '".$option2_2."', `option3_1` = '".$option3_1."', `option3_2` = '".$option3_2."'WHERE `uid` = '".$uid."'";
                        $pdo -> query($updateStatement);

                        header("Refresh:0");
                    }
                    else{
                        //insert answers into the database
                        $insertStatement = "INSERT INTO `virtueEthics`(`uid`, `option1_1`, `option1_2`, `option2_1`, `option2_2`, `option3_1`, `option3_2`) VALUES (".$uid.", ".$option1_1.", ".$option1_2.",".$option2_1.",".$option2_2.",".$option3_1.",".$option3_2.")";
                        $pdo -> query($insertStatement);

                        header("Refresh:0");
                    }
                }         
            }                
            catch(PDOException $e){
                die($e -> getMessage());
            }
        }
?>
<!---------------------------------------------------------------------------------------------------------------------------------------->
<!DOCTYPE html>
<html>
    <head>
        <title>Virtue Ethics - Options</title>
        <link rel = "stylesheet" href = "../../styles/bulma/css/bulma.css">
    </head>
        <body>
            <h1 class = "title has-background-grey-lighter">VIRTUE ETHICS</h1>
    
            <div class="columns">
                <div class="column is-two-thirds">
                    <div class = "box has-background-primary">
                        <p>Virtue ethics is a theory that focuses on the character of the decision maker. Building a virtuous character requires
                            practicing the virtues until the moral agent knows the right thing to do in the right time in the right place in the
                            right way. To begin, identify the relevant virtues and vices and indicate where each action falls on the virtue continuum.
                        </p>
                    </div>
    
                    <div class = "box has-background-grey-lighter">
                        <form method="POST">
                                <?php
                                    setAnswers();
                                ?>
                            <button class = "button" name="options">Submit</button>
                        </form>
                    </div>
                </div>
                <div>
                <div class="column has-fixed-size is-20">
                    <a class = "box has-background-grey has-text-white" id = "dashboard" href = "../index.php">
                        DASHBOARD
                    </a>
                    <a class = "box has-background-grey has-text-white" id = "utilitarianism" href = "Utilitarianism/utilitarianism.php">
                        UTILITARIANISM
                    </a>
                    <a class = "box has-background-grey has-text-white" id = "deontology" href = "../Deontology/Deontology1.php">
                        DEONTOLOGY
                    </a>
                    <a class = "box has-background-white has-text-black" id = "virtue-ethics" href = "../VirtueEthics/VirtueEthics1.php">
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
    
                    <div class = "box has-background-grey-lighter">
                        <h1> OPTIONS RANKED BY MOST VIRTUOUS </h1>
                        <br>
                        <form method="POST" action="../../server/virtueEthics-options.php">
                            <div>
                                <div class="box">
                                    <h2> O 3: COURAGE </h2>
                                    <label>Virtue</label><input type="range" min="1" max="10" value="5" name="s1-1" id="s1-1"><label>Vice</label>
                                </div>
                            </div>
                            <br>
                            <div>
                                <div class="box">
                                    <h2> O 2: OVER-SHARING </h2>
                                    <label>Virtue</label><input type="range" min="1" max="10" value="5" name="s1-1" id="s1-1"><label>Vice</label>
                                </div>
                            </div>
                            <br>
                            <div>
                                <div class="box">
                                    <h2> O 1: BLIND DEVOTION </h2>
                                    <label>Virtue</label><input type="range" min="1" max="10" value="5" name="s1-1" id="s1-1"><label>Vice</label>
                                </div>
                            </div>
                            <br>
                            <input type = "submit" class="button" name = "submitOptions" value = "Submit">
                        </form>
                    </div>
                    <a class="button" href="VirtueEthics3.php">Proceed></a>
                </div>
            </div>
            
            <script src = "../../scripts/jquery-3.6.0.js"></script>
            <script src = "../../scripts/user-event.js"></script>
        </body>
    </html>