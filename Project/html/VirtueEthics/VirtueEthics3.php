<!--slide 30 of proposal
functionality needs to be added-->
<?php
    ob_start();
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

            $sql1 =  "SELECT * FROM virtueEthics3 WHERE uid = '". $uid."'";
            $result1 = $pdo -> query($sql1);

            $isInTable = False;
            while ($row = $result1 -> fetch()){
                $isInTable = True;

                $interest1Ex = $row['interest1Ex'];
                $interest2Ex = $row['interest2Ex'];
                $interest3Ex = $row['interest3Ex'];
                $interest1Slider1 = $row['interest1Slider1'];
                $interest1Slider2 = $row['interest1Slider2'];
                $interest2Slider1 = $row['interest2Slider1'];
                $interest2Slider2 = $row['interest2Slider2'];
                $interest3Slider1 = $row['interest3Slider1'];
                $interest3Slider2 = $row['interest3Slider2'];

                echo '<h3>STAKEHOLDER INTEREST #1 </h3><textarea class = "textarea" id = "dilemma-text" placeholder = "WEALTH (10)" name = "interest1Ex">'.$interest1Ex.'</textarea>
                    <div>
                        <div class="box">
                            <h2> VICE (EXCESS) - VIRTUE (MEAN) - VICE (DEFICIENCY) </h2>
                            <label>Blind Devotion</label><input type="range" min="1" max="10" value="'.$interest1Slider1.'" name="interest1Slider1" id="s1-1"><label>Loyalty</label><input type="range" min="1" max="10" value="'.$interest1Slider2.'" name="interest1Slider2" id="s1-1"><label>Disloyalty</label>
                        </div>
                    </div>
                    <br>
                    <h3>STAKEHOLDER INTEREST #2 </h3><textarea class = "textarea" id = "dilemma-text" placeholder = "Prestige (7)" name = "interest2Ex">'.$interest2Ex.'</textarea>
                    <div>
                        <div class="box">
                            <h2> VICE (EXCESS) - VIRTUE (MEAN) - VICE (DEFICIENCY) </h2>
                            <label>Vanity</label><input type="range" min="1" max="10" value="'.$interest2Slider1.'" name="interest2Slider1" id="s1-1"><label>Self Confidence</label><input type="range" min="1" max="10" value="'.$interest2Slider2.'" name="interest2Slider2" id="s1-1"><label>Modesty</label>
                        </div>
                    </div>
                    <br>
                    <h3>STAKEHOLDER INTEREST #3</h3><textarea class = "textarea" id = "dilemma-text" placeholder = "Integrity (3)" name = "interest3Ex">'.$interest3Ex.'</textarea>
                    <div>
                        <div class="box">
                            <h2> VICE (EXCESS) - VIRTUE (MEAN) - VICE (DEFICIENCY) </h2>
                            <label>Vanity</label><input type="range" min="1" max="10" value="'.$interest1Slider2.'" name="interest3Slider1" id="s1-1"><label>Self Confidence</label><input type="range" min="1" max="10" value="'.$interest3Slider2.'" name="interest3Slider2" id="s1-1"><label>Modesty</label>
                        </div>
                    </div>
                    <br>';

            }

            if (!$isInTable){
                echo '<h3>STAKEHOLDER INTEREST #1 </h3><textarea class = "textarea" id = "dilemma-text" placeholder = "WEALTH (10)" name = "interest1Ex"></textarea>
                <div>
                    <div class="box">
                        <h2> VICE (EXCESS) - VIRTUE (MEAN) - VICE (DEFICIENCY) </h2>
                        <label>Blind Devotion</label><input type="range" min="1" max="10" value="5" name="interest1Slider1" id="s1-1"><label>Loyalty</label><input type="range" min="1" max="10" value="5" name="interest1Slider2" id="s1-1"><label>Disloyalty</label>
                    </div>
                </div>
                <br>
                <h3>STAKEHOLDER INTEREST #2 </h3><textarea class = "textarea" id = "dilemma-text" placeholder = "Prestige (7)" name = "interest2Ex"></textarea>
                <div>
                    <div class="box">
                        <h2> VICE (EXCESS) - VIRTUE (MEAN) - VICE (DEFICIENCY) </h2>
                        <label>Vanity</label><input type="range" min="1" max="10" value="5" name="interest2Slider1" id="s1-1"><label>Self Confidence</label><input type="range" min="1" max="10" value="5" name="interest2Slider2" id="s1-1"><label>Modesty</label>
                    </div>
                </div>
                <br>
                <h3>STAKEHOLDER INTEREST #3</h3><textarea class = "textarea" id = "dilemma-text" placeholder = "Integrity (3)" name = "interest3Ex"></textarea>
                <div>
                    <div class="box">
                        <h2> VICE (EXCESS) - VIRTUE (MEAN) - VICE (DEFICIENCY) </h2>
                        <label>Vanity</label><input type="range" min="1" max="10" value="5" name="interest3Slider1" id="s1-1"><label>Self Confidence</label><input type="range" min="1" max="10" value="5" name="interest3Slider2" id="s1-1"><label>Modesty</label>
                    </div>
                </div>
                <br>';
            }
            
            if (isset($_POST['virtueEthics3'])){

                $interest1Ex = $_POST['interest1Ex'];
                $interest2Ex = $_POST['interest2Ex'];
                $interest3Ex = $_POST['interest3Ex'];
                $interest1Slider1 = $_POST['interest1Slider1'];
                $interest1Slider2 = $_POST['interest1Slider2'];
                $interest2Slider1 = $_POST['interest2Slider1'];
                $interest2Slider2 = $_POST['interest2Slider2'];
                $interest3Slider1 = $_POST['interest3Slider1'];
                $interest3Slider2 = $_POST['interest3Slider2'];

                if ($isInTable){
                    //update new answers the database
                    //$updateStatement = "UPDATE virtueEthics SET `option1`='".$option1"',`option2`='".$option2."',`option3`='".$option3."',`optionsRanked`='".$optionsRanked."' WHERE `uid` = '".$uid."'";
                    $updateStatement = "UPDATE `virtueEthics3` SET `interest1Ex`='".$interest1Ex."',`interest1Slider1`=".$interest1Slider1.",`interest1Slider2`=".$interest1Slider2.",`interest2Ex`='".$interest2Ex."',`interest2Slider1`=".$interest2Slider1.",`interest2Slider2`=".$interest2Slider2.",`interest3Ex`='".$interest3Ex."',`interest3Slider1`=".$interest3Slider1.",`interest3Slider2`=".$interest3Slider2." WHERE `uid` = ".$uid."";
                    $pdo -> query($updateStatement);

                    header("Refresh:0");
                }
                else{
                    //insert answers into the database
                    $insertStatement = "INSERT INTO `virtueEthics3`(`uid`, `interest1Ex`, `interest1Slider1`, `interest1Slider2`, `interest2Ex`, `interest2Slider1`, `interest2Slider2`, `interest3Ex`, `interest3Slider1`, `interest3Slider2`) VALUES (".$uid.",'".$interest1Ex."',".$interest1Slider1.",".$interest1Slider2.",'".$interest2Ex."',".$interest2Slider1.",".$interest2Slider2.",'".$interest3Ex."',".$interest3Slider1.",".$interest3Slider2.")";
                    $pdo -> query($insertStatement);

                    header("Refresh:0");
                }
            }         
        }                
        catch(PDOException $e){
            die($e -> getMessage());
        }
    }

    function setAvgs(){
        try{
            $connString = "mysql:host=lowe-walker.org;dbname=rwalker_Ethics_Dashboard_1";
            $user = "rwalker_joseph";
            $pass = "GRzQ8Gwh";
            $pdo = new PDO($connString, $user, $pass);
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $uid = $_SESSION["uid"];

            $sql1 =  "SELECT * FROM virtueEthics3 WHERE uid = '". $uid."'";
            $result1 = $pdo -> query($sql1);

            $isInTable = False;
            $integrity = 5;
            $prestige = 5;
            $greed = 5;

            while ($row = $result1 -> fetch()){
                $isInTable = True;

                $integrity = ($row['interest3Slider1'] + $row['interest3Slider2']) / 2;
                $prestige = ($row['interest2Slider1'] + $row['interest2Slider2']) / 2;
                $greed = ($row['interest1Slider1'] + $row['interest1Slider2']) / 2;

                echo '<div>
                        <div class="box">
                            <h2> SI 2: INTEGRITY </h2>
                            <label>Virtue</label><input type="range" min="1" max="10" value="'.$integrity.'" name="s1-1" id="s1-1"><label>Vice</label>
                        </div>
                    </div>
                    <br>
                    <div>
                        <div class="box">
                            <h2> SI 2: PRESTIGE </h2>
                            <label>Virtue</label><input type="range" min="1" max="10" value="'.$prestige.'" name="s1-1" id="s1-1"><label>Vice</label>
                        </div>
                    </div>
                    <br>
                    <div>
                        <div class="box">
                            <h2> SI 1: GREED </h2>
                            <label>Virtue</label><input type="range" min="1" max="10" value="'.$greed.'" name="s1-1" id="s1-1"><label>Vice</label>
                        </div>
                    </div>
                    <br>';
            }

            if (!$isInTable){
                echo '<div>
                        <div class="box">
                            <h2> SI 2: INTEGRITY </h2>
                            <label>Virtue</label><input type="range" min="1" max="10" value="'.$integrity.'" name="s1-1" id="s1-1"><label>Vice</label>
                        </div>
                    </div>
                    <br>
                    <div>
                        <div class="box">
                            <h2> SI 2: PRESTIGE </h2>
                            <label>Virtue</label><input type="range" min="1" max="10" value="'.$prestige.'" name="s1-1" id="s1-1"><label>Vice</label>
                        </div>
                    </div>
                    <br>
                    <div>
                        <div class="box">
                            <h2> SI 1: GREED </h2>
                            <label>Virtue</label><input type="range" min="1" max="10" value="'.$greed.'" name="s1-1" id="s1-1"><label>Vice</label>
                        </div>
                    </div>
                    <br>';
            }   

            if ($isInTable){
                //update new answers the database
                //$updateStatement = "UPDATE virtueEthics SET `option1`='".$option1"',`option2`='".$option2."',`option3`='".$option3."',`optionsRanked`='".$optionsRanked."' WHERE `uid` = '".$uid."'";
                $updateStatement = "UPDATE `virtueEthics3` SET `integrityAvg` = '".$integrity."', `prestigeAvg` = '".$prestige."', `greedAvg` = '".$greed."' WHERE `uid` = '".$uid."'";
                $pdo -> query($updateStatement);

                header("Refresh:0");
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
            <title>Virtue Ethics</title>
            <link rel = "stylesheet" href = "../../styles/bulma/css/bulma.css">
        </head>
        <body>
            <h1 class = "title has-background-grey-lighter">VIRTUE ETHICS</h1>
    
            <div class = "columns">
                <div class = "column is-two-thirds">
                    <div class = "box has-background-primary">
                        <p>Consider the context. The virtues are practiced (and understood) in the context of 
                            a community. Identify the relevant virtues and vices relevant to the stakeholder
                            interests you've listed.
                        </p>
                    </div>
                
                    <div class = "box" id = "dilemma-box">
                        <form method="POST">
                            <?php
                                setAnswers();
                            ?>
                            <button class = "button" name="virtueEthics3">Submit</button>
                        </form>
                    </div>
    
                </div>
                <div>
                <div class = "column has-fixed-size is-20">
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
                        <?php
                            setAvgs();
                        ?>
                    </div>
                    <a class="button" href="VirtueEthics4.php">Proceed></a>
                </div>
            </div>
            <script src = "../../scripts/jquery-3.6.0.js"></script>
            <script src = "../../scripts/user-event.js"></script>
        </body>
    </html>