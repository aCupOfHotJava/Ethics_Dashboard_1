<!--THIS FILE WILL BE USED TO DISPLAY A SUMMARY OF THE USER'S ANSWERS FROM SLIDE 15 AS PICTURED IN SLIDE 16 OF THE PROPOSAL-->
<?php
    ob_start();
    session_start();
    print_r($_SESSION);

    if (!isset($_SESSION["uid"])){
        header("Location: ../login.php");  
    }

    function setSummary (){
        try{
            $connString = "mysql:host=lowe-walker.org;dbname=rwalker_Ethics_Dashboard_1";
            $user = "rwalker_rampaul";
            $pass = "1xlu7OMJ";
            $pdo = new PDO($connString, $user, $pass);
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $uid = $_SESSION["uid"];

            $sql1 =  "SELECT * FROM utilAnalysisSummary WHERE uid = '". $uid."'";
            $result1 = $pdo -> query($sql1);

            $count = 0;
            $isInTable = false;
            $o1Short = 0;
            $o1Long = 0;
            $o2Short = 0;
            $o2Long = 0;
            while ($row = $result1 -> fetch()){
                $o1Short = $row['1-short-avg'];
                $o1Long = $row['1-long-avg'];
                $o2Short = $row['2-short-avg'];
                $o2Long = $row['2-long-avg'];
            }

            echo '<div class="box">
                    <h1>Option 1</h1>
                    <h2>Aggregate of short-term outcomes:</h2>
                    <nav class="is-flex has-text-weight-bold">
                        <label id="Low" class="has-text-left">Low</label>
                        <label id=High class="has-text-right">High</label>
                    </nav>
                    <div class="slider">
                        <input type="range" min="1" max="100" value="'.$o1Short.'" class="slider">
                        <span class="range-value">'.$o1Short.'</span>
                    </div>
                    <div class=" box level">
                        <h3 class=level-item>Higher: <p class = "higher-val"> 0</p></h3>
                        <h3 class=level-item>Lower: <p class = "lower-val">0</p></h3>
                    </div>
                    
                    <h2>Long-term outcomes:</h2>
                    <nav class="is-flex has-text-weight-bold">
                        <label id="Low" class="has-text-left">Low</label>
                        <label id=High class="has-text-right">High</label>
                    </nav>
                    <div class="slider">
                        <input type="range" min="1" max="100" value="'.$o1Long.'" class="slider">
                        <span class="range-value">'.$o1Long.'</span>
                    </div>
                    <div class=" box level">
                        <h3 class=level-item>Higher: <p class = "higher-val"> 0</p></h3>
                        <h3 class=level-item>Lower: <p class = "lower-val">0</p></h3>
                    </div>
                </div>

                <div class="box">
                    <h1>Option 2</h1>
                    <h2>Short-term outcomes:</h2>
                    <nav class="is-flex has-text-weight-bold">
                        <label id="Low" class="has-text-left">Low</label>
                        <label id=High class="has-text-right">High</label>
                    </nav>
                    <div class="slider">
                        <input type="range" min="1" max="100" value="'.$o2Short.'" class="slider">
                        <span class="range-value">'.$o2Short.'</span>
                    </div>
                    <div class=" box level">
                        <h3 class=level-item>Higher: <p class = "higher-val"> 0</p></h3>
                        <h3 class=level-item>Lower: <p class = "lower-val">0</p></h3>
                    </div>

                    <h2>Long-term outcomes:</h2>
                    <nav class="is-flex has-text-weight-bold">
                        <label id="Low" class="has-text-left">Low</label>
                        <label id=High class="has-text-right">High</label>
                    </nav>
                    <div class="slider">
                        <input type="range" min="1" max="100" value="'.$o2Long.'" class="slider">
                        <span class="range-value">'.$o2Long.'</span>
                    </div>
                    <div class=" box level">
                        <h3 class=level-item>Higher: <p class = "higher-val"> 0</p></h3>
                        <h3 class=level-item>Lower: <p class = "lower-val">0</p></h3>
                    </div>
                </div>';
        }
        catch(PDOException $e){
            die($e -> getMessage());
        }

        function setConclusion(){
            try{
                $connString = "mysql:host=lowe-walker.org;dbname=rwalker_Ethics_Dashboard_1";
                $user = "rwalker_rampaul";
                $pass = "1xlu7OMJ";
                $pdo = new PDO($connString, $user, $pass);
                $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                $uid = $_SESSION["uid"];
    
                $sql1 =  "SELECT * FROM utilAnalysisSummary WHERE uid = '". $uid."'";
                $result1 = $pdo -> query($sql1);

                $isInTable = false;
                $concl = "";
                while ($row = $result1 -> fetch()){
                    if ($row['conclusion'] != ""){
                        $isInTable = true;
                        $concl = $row['conclusion'];
                    }
                }

                if ($isInTable){
                    echo '<textarea class = "textarea required" name="conclusion" id = "option1-2" placeholder = "Add concluding statement here.">'.$concl.'</textarea>';
                }
                else{
                    echo '<textarea class = "textarea required" name="conclusion" id = "option1-2" placeholder = "Add concluding statement here."></textarea>';
                }

                if (isset($_POST['submitCon'])){
                    // update database

                    $updateConcl = 'UPDATE `utilAnalysisSummary` SET `conclusion`= "'.$_POST['conclusion'].'" WHERE `uid` = '.$uid.';';
                    $update= $pdo -> query($updateConcl);

                    header("Refresh:0");
                }
            }
            catch(PDOException $e){
                die($e -> getMessage());
            }
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Utilitarianism - Summary</title>
        <meta name="author" content="">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel = "stylesheet" href = "../../styles/bulma/css/bulma.css">
        <link rel="stylesheet" href="../../styles/main.css">
    </head>
    <body>
        <h1 class = "title has-background-grey-lighter">UTILITARIANISM</h1>

        <div class="columns">
            <div class="column is-two-thirds">
                <div class = "box has-background-primary">
                    <p>The last thing to consider is the type of pleasures 
                        contributing to the greatest happiness. It isn’t just how many 
                        stakeholders experience higher pleasures – you have to
                        judge how much the higher pleasure should be worth in 
                        your final analysis.</p>
                </div>

                <?php
                    setSummary();
                ?>

            </div>

            <div>
            <div class="column has-fixed-size is-20">
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
                <div class="box">
                    <h2>ETHICAL DECISION/COURSE OF ACTION</h2>
                    <p class="has-text-grey-light">Sum up your analysis.  Eg.
                        Although Option 1 produces 
                        pleasures in the short-term, 
                        they are lower pleasures.  
                        Option 2 results in less overall 
                        pain and higher pleasures to 
                        the stakeholders most 
                        impacted by the issue.</p>
                        <form method="POST" action="#">
                            <?php
                                setConclusion();
                            ?>
                            <button class = "button" name="submitCon">Submit</button>
                        </form>
                </div>
                
            </div>

        </div>
    </body>
</html>