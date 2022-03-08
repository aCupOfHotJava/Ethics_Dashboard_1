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

                    $slider = $row['1-long-slider'];
                    $ex = $row['1-long-ex'];
                    $pleasure = $row['1-long-pleasure'];

                    if ($slider == 0){
                        $slider = 5;
                    }
                    if ($ex == ""){
                        $ex = "Explaination";
                    }
                    if ($pleasure == ""){
                        $pleasure = "<label>High</label><input type=\"checkbox\" name=\"pleasure".$count."-1\" id=\"high1\" value=\"High\"/>
                                <label>Low</label><input type=\"checkbox\" name=\"pleasure".$count."-2\" id=\"low1\" value=\"Low\"/>";
                    }
                    elseif ($pleasure == "High"){
                        $pleasure = "<label>High</label><input type=\"checkbox\" name=\"pleasure".$count."-1\" id=\"high1\" value=\"High\" checked/>
                                    <label>Low</label><input type=\"checkbox\" name=\"pleasure".$count."-2\" id=\"low1\" value=\"Low\"/>";
                    }
                    else {
                        $pleasure = "<label>High</label><input type=\"checkbox\" name=\"pleasure".$count."-1\" id=\"high1\" value=\"High\"/>
                                    <label>Low</label><input type=\"checkbox\" name=\"pleasure".$count."-2\" id=\"low1\" value=\"Low\" checked/>";
                    }


                    echo "<h4>STAKEHOLDER ".$count."</h4>
                                <p>".$row['name']."</p>
                                <div class = \"box has-text-weight-bold\">
                                    <nav class=\"is-flex has-text-weight-bold\">
                                        <label id=\"Low\" class=\"has-text-left\">Low</label>
                                        <label id=\"High\" class=\"has-text-right\">High</label>
                                    </nav>

                                    <input type=\"range\" min=\"1\" max=\"10\" value=\"".$slider."\" class=\"slider\" id=\"Stakeholer1-1\" name = \"slider".$count."\" \">
                                    <span class=\"range-value\">".$slider."</span>

                                    <input type=\"text\" class=\"textarea\" name=\"ex".$count."\" id=\"s1-2\" placeholder=\"".$ex."\" rows=\"1\">

                                    <p>Pleasure: </p>
                                    ".$pleasure."
                        </div>";
                }

                if (isset($_POST['o1-long'])){
                    for ($i = 1; $i <= $count; $i++){
                        $strRep = strval($i);

                        $getSliderVal = "slider$strRep";
                        $sliderVal = $_POST[$getSliderVal];

                        $getExVal = "ex$strRep";
                        $exVal = $_POST[$getExVal];

                        $getPleasureVal1 = "pleasure$strRep-1";
                        $getPleasureVal2 = "pleasure$strRep-2";
                        $pleasureVal;
                        if (isset($_POST[$getPleasureVal1])){
                            $pleasureVal = $_POST[$getPleasureVal1]; 
                        }
                        elseif (isset($_POST[$getPleasureVal2])){
                            $pleasureVal = $_POST[$getPleasureVal2];
                        }

                        $update1 = "UPDATE `stakeholders` SET `1-long-slider`= ".$sliderVal." ,`1-long-ex`= '".$exVal."',`1-long-pleasure`= '".$pleasureVal."' WHERE name = '".$namearray[$i-1]."' and uid = ".$uid."";
                        $pdo -> query($update1);

                        header("Refresh:0");
                    }
                }

                if (!$isInTable){
                    $count2 = 0;
                    while ($row = $result1 -> fetch()){
                        $count++;
                        echo "<h4>STAKEHOLDER ".$count2."</h4>
                            <p>".$row['name']."</p>
                            <div class = \"box has-text-weight-bold\">
                                <nav class=\"is-flex has-text-weight-bold\">
                                    <label id=\"Low\" class=\"has-text-left\">Low</label>
                                    <label id=\"High\" class=\"has-text-right\">High</label>
                                </nav>

                                <input type=\"range\" min=\"1\" max=\"10\" value=\"5\" class=\"slider\" id=\"Stakeholer1-1\" name = \"slider".$count2."\" \">
                                <span class=\"range-value\">5</span>

                                <input type=\"text\" class=\"textarea\" name=\"ex".$count2."\" id=\"s1-2\" placeholder=\"Example\" rows=\"1\">

                                <p>Pleasure: </p>
                                <label>High</label><input type=\"checkbox\" name=\"pleasure".$count2."\" id=\"high1\" value=\"High\"/>
                                <label>Low</label><input type=\"checkbox\" name=\"pleasure".$count2."\" id=\"low1\" value=\"Low\"/>
                            </div>";
                    }
                }

            }
            catch(PDOException $e){
                die($e -> getMessage());
            }
        }

        function setSummary(){
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
                $o1ShortSlider= 0;
                $o1LongSlider= 0;
                $o2ShortSlider= 0;
                $o2LongSlider= 0;

                $count = 0;

                $o1ShortAvg = 50;
                $o1LongAvg = 50;
                $o2ShortAvg = 50;
                $o2LongAvg = 50;

                while ($row = $result1 -> fetch()){
                    $isInTable = True;
                    $count ++;

                    $o1ShortSlider += $row['1-short-slider'];
                    $o1LongSlider += $row['1-long-slider'];
                    $o2ShortSlider += $row['2-short-slider'];
                    $o2LongSlider += $row['2-long-slider'];
                }

                if ($o1ShortSlider != 0){
                    $o1ShortAvg = ($o1ShortSlider / $count) * 10;
                }
                if ($o1LongSlider != 0){
                    $o1LongAvg = ($o1LongSlider / $count) * 10;
                }
                if ($o2ShortSlider != 0){
                    $o2ShortAvg = ($o2ShortSlider / $count) * 10;
                }
                if ($o2LongSlider != 0){
                    $o2LongAvg = ($o2LongSlider / $count) * 10;
                }
               
                echo '<h1>Option 1</h1>
                        <h2>Aggregate of short-term outcomes:</h2>
                        <nav class="is-flex has-text-weight-bold">
                            <label id="Low" class="has-text-left">Low</label>
                            <label id=High class="has-text-right">High</label>
                        </nav>
                        <div class="slider">
                            <input type="range" min="1" max="100" value="'.$o1ShortAvg.'" class="slider">
                            
                        </div>
                    
                        <h2>Aggregate of long-term outcomes:</h2>
                        <nav class="is-flex has-text-weight-bold">
                            <label id="Low" class="has-text-left">Low</label>
                            <label id=High class="has-text-right">High</label>
                        </nav>
                        <div class="slider">
                            <input type="range" min="1" max="100" value="'.$o1LongAvg.'" class="slider">
                            
                        </div>

                        <h1>Option 2</h1>
                        <h2>Aggregate of short-term outcomes:</h2>
                        <nav class="is-flex has-text-weight-bold">
                            <label id="Low" class="has-text-left">Low</label>
                            <label id=High class="has-text-right">High</label>
                        </nav>
                        <div class="slider">
                            <input type="range" min="1" max="100" value="'.$o2ShortAvg.'" class="slider">
                            
                        </div>

                        <h2>Aggregate of long-term outcomes:</h2>
                        <nav class="is-flex has-text-weight-bold">
                            <label id="Low" class="has-text-left">Low</label>
                            <label id=High class="has-text-right">High</label>
                        </nav>
                        <div class="slider">
                            <input type="range" min="1" max="100" value="'.$o2LongAvg.'" class="slider">
                            
                        </div>';


                $sql2 =  "SELECT * FROM utilAnalysisSummary WHERE uid = '". $uid."'";
                $result2 = $pdo -> query($sql2);

                $isInTable2 = false;
                while ($row = $result2 -> fetch()){
                    $isInTable2 = true;
                }

                if($isInTable2){
                    //update table
                   $updateSummary = 'UPDATE `utilAnalysisSummary` SET `1-short-avg`='.$o1ShortAvg.',`1-long-avg`='.$o1LongAvg.',`2-short-avg`='.$o2ShortAvg.',`2-long-avg`='.$o2LongAvg.' WHERE `uid` = '.$uid.'';
                   $update = $pdo -> query($updateSummary);
                }
                else{
                    //insert into table
                    $InsertSummary = 'INSERT INTO `utilAnalysisSummary`(`uid`, `1-short-avg`, `1-long-avg`, `2-short-avg`, `2-long-avg`) VALUES ('.$uid.','.$o1ShortAvg.','.$o1LongAvg.','.$o2ShortAvg.','.$o2LongAvg.')';
                    $insert = $pdo -> query($InsertSummary);
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
            <title>Utilitarianism - Analyses - Option 1</title>
            <link rel = "stylesheet" href = "../../../styles/bulma/css/bulma.css">
            <link rel="stylesheet" href="../../../styles/main.css">
        </head>
        <body>
            <h1 class = "title has-background-grey-lighter">UTILITARIANISM</h1>
    
            <div class="columns">
                <div class="column is-two-thirds">
                    <div class = "box has-background-primary">
                        <p>The Greatest Happiness Principle, actions are right if they promote happiness (pleasure) 
                            and wrong if they promote unhappiness (pain).  Consider the relative stakeholder pleasures 
                            or pains for the options you identified.  Identify the pleasures as higher or lower by 
                            ticking the box.</p>
                    </div>
    
                    <div>
                        <h1 class="title is-3 has-text-centered">OPTION 1</h1>
                        <p class="subtitle is-5 has-text-centered">I can put loyalty to the company first ...</p>
                        <div class="box">
                        <h3 class="title is-5">Long-term Concequences</h3>
    
                        <form method="POST">
                            <div>  
                                <?php
                                    setAnswers();
                                ?>
                            </div>
                            <br>
                            <button class = "button" name="o1-long">Submit</button>
                        </form>
                        </div>
    
                        <a href= "utilitarianism-analysis1.php"><button class = "button" id = "option2" >Option 1 - Short-term</button>  </a>
                        <a href= "utilitarianism-analysis2.php"><button class = "button is-primary" id = "option2" >Option 1 - Long-term</button>  </a>
                        <a href= "utilitarianism-analysis3.php"><button class = "button" id = "option3" >Option 2 - Short-term</button>  </a>
                        <a href= "utilitarianism-analysis4.php"><button class = "button" id = "option4" >Option 2 - Long-term</button>  </a>
                    </div>
    
                    
                </div>
                <div>
                <div class="column has-fixed-size is-20">
                    <a class = "box has-background-grey has-text-white" id = "dashboard" href = "../../index.php">
                        DASHBOARD
                    </a>
                    <a class = "box has-background-white has-text-black" id = "utilitarianism" href = "../utilitarianism.php">
                        UTILITARIANISM
                    </a>
                    <a class = "box has-background-grey has-text-white" id = "deontology" href = "../../Deontology/Deontology1.php">
                        DEONTOLOGY
                    </a>
                    <a class = "box has-background-grey has-text-white" id = "virtue-ethics" href = "../../VirtueEthics/VirtueEthics1.php">
                        VIRTUE ETHICS
                    </a>
                    <a class = "box has-background-grey has-text-white" id = "care-ethics" href = "../../CareEthics/CareEthics.php">
                        CARE ETHICS
                    </a>
                    <a class = "box has-background-grey has-text-white" id = "my-progress" href = "../../MyProgress.php">
                        MY PROGRESS
                    </a>
                </div>
                </div>
                </div>
    
                <?php
                    setSummary();
                ?>
                
                <a class="button" href="../utilitarianism-summary.php">Proceed to Summary ></a>

                </div>
            </div>

            <script src = "../../../scripts/jquery-3.6.0.js"></script>
            <script src = "../../../scripts/user-event.js"></script>
        
        </body>
    </html>