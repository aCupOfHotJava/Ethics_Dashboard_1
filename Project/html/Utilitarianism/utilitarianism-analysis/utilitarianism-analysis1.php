<!--FORM NEEDS TO BE SEND TO CLIENT VALIDATION AS WELL AS SERVER SIDE SCRIPTING TO SAVE ANSWERS
    STILL NEEDS TO HAVE A TOTAL BOARD ADDED UNDER THE SITE MENU - SEE SLIDE 12 OF PROPOSAL
    ADD OPTION 2 PROPERLY

Need to rethink architechture of tables and implement properly on here-->
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
                    echo "<h4>STAKEHOLDER ".$count."</h4>
                                <p>".$row['name']."</p>
                                <div class = \"box has-text-weight-bold\">
                                    <nav class=\"is-flex has-text-weight-bold\">
                                        <label id=\"Low\" class=\"has-text-left\">Low</label>
                                        <label id=\"High\" class=\"has-text-right\">High</label>
                                    </nav>

                                    <input type=\"range\" min=\"1\" max=\"10\" value=\"5\" class=\"slider\" id=\"Stakeholer1-1\">
                                    <span class=\"range-value\">5</span>

                                    <input type=\"text\" class=\"textarea\" name=\"s1-2\" id=\"s1-2\" placeholder=\"Guilt\" rows=\"1\">

                                    <p>Pleasure: </p>
                                    <label>High</label><input type=\"checkbox\" name=\"high1\" id=\"high1\" value=\"High\"/>
                                    <label>Low</label><input type=\"checkbox\" name=\"low1\" id=\"low1\" value=\"Low\"/>
                        </div>";
                }

                if (isset($_POST['update-options'])){
                    $analysis1 = $_POST["analysis1"];
                    $analysis2 = $_POST["analysis2"];
                    $analysis3 = $_POST["analysis3"];

                    print_r($analysis1);

                    if ($isInTable){
                        // update database
                        $update1 = "UPDATE `stakeholders` SET `utilitarianAnalysis`= '".$analysis1."' WHERE name = '".$namearray[0]."' and uid = ".$uid."";
                        $pdo -> query($update1);

                        $update2 = "UPDATE `stakeholders` SET `utilitarianAnalysis`= '".$analysis2."' WHERE name = '".$namearray[1]."' and uid = ".$uid."";
                        $pdo -> query($update2);

                        $update3 = "UPDATE `stakeholders` SET `utilitarianAnalysis`= '".$analysis3."' WHERE name = '".$namearray[2]."' and uid = ".$uid."";
                        $pdo -> query($update3);
       
                        header("Refresh:0");
                    }
                    else{
                        // insert into database
                        $insert1 = "INSERT INTO `stakeholders`(`utilitarianAnalysis`) VALUES (".$analysis1.") WHERE name = '".$namearray[0]."' and uid = ".$uid."";
                        $pdo -> query($insert1);

                        $insert2 = "INSERT INTO `stakeholders`(`utilitarianAnalysis`) VALUES (".$analysis2.") WHERE name = '".$namearray[1]."' and uid = ".$uid."";
                        $pdo -> query($insert2);

                        $insert3 = "INSERT INTO `stakeholders`(`utilitarianAnalysis`) VALUES (".$analysis3.") WHERE name = '".$namearray[2]."' and uid = ".$uid."";
                        $pdo -> query($insert3);

                        header("Refresh:0");
                    }
                }

                if (!$isInTable){
                    $count2 = 0;
                    while ($row = $result1 -> fetch()){
                        $count++;
                        echo "<div class = \"box\" id = \"dilemma-box\">
                                <h3>Stakeholder ".$count."</h3>
                                <p>".$row['name']."</p>
                                <textarea class = \"textarea\" id = \"dilemma-text\" placeholder = \"The engineer is directly, and significantly, impacted by the issue.  They could lose their job at VW, lose industry friends and suffer career set backs. \"></textarea>
                            </div>";
                    }
                   /*echo "<div class = \"box\" id = \"dilemma-box\">
                            <h3>Stakeholder 1</h3>
                            <p>The engineer asked to design the VW defeat... </p>
                            <textarea class = \"textarea\" id = \"dilemma-text\" placeholder = \"The engineer is directly, and significantly, impacted by the issue.  They could lose their job at VW, lose industry friends and suffer career set backs. \"></textarea>
                        </div>
                        <div class = \"box\" id = \"dilemma-box\">
                            <h3>Stakeholder 2</h3>
                            <p>The decision makers at VW who asked...</p>
                            <textarea class = \"textarea\" id = \"dilemma-text\" placeholder = \"Defend the inclusion of Stakeholder 2 –Rank by degree of impact\"></textarea>
                        </div>
                        <div class = \"box\" id = \"dilemma-box\">
                            <h3>Stakeholder 3</h3>
                            <p>Consumers –vehicle buyers...</p>
                            <textarea class = \"textarea\" id = \"dilemma-text\" placeholder = \"Defend the inclusion of Stakeholder 3 –Rank by degree of impact\"></textarea>
                        </div>";*/
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
                    <div class = "box">
                    <h2 class="title is-5"> Stakeholder 1- The engineer asked to design the VW defeat... </h2>
                    <h3 class="title is-6">Short-term Concequences</h3>

                    <!--<form method="POST" action="../../../server/utilitarianismAnalysis.php">-->
                        <div>
                            <h4>STAKEHOLDER 1</h4>
                            <p>The engineer asked to design the VW defeat... </p>
                            <div class = "box has-text-weight-bold">
                                <nav class="is-flex has-text-weight-bold">
                                    <label id="Low" class="has-text-left">Low</label>
                                    <label id=High class="has-text-right">High</label>
                                 </nav>

                                 <input type="range" min="1" max="10" value="5" class="slider" id="Stakeholer1-1">
                                 <span class="range-value">5</span>

                                <input type="text" class="textarea" name="s1-2" id="s1-2" placeholder="Guilt" rows="1">

                                <p>Pleasure: </p>
                                <label>High</label><input type="checkbox" name="high1" id="high1" value="High"/>
                                <label>Low</label><input type="checkbox" name="low1" id="low1" value="Low"/>
                            </div>

                            <h4>STAKEHOLDER 2</h4>
                            <p>The decision makers at VW who asked...</p>
                            <div class = "box has-text-weight-bold">
                                <nav class="is-flex">
                                    <label id="Low" class="has-text-left">Low</label>
                                    <label id=High class="has-text-right">High</label>
                                </nav>
                                
                                <input type="range" min="1" max="10" value="5" class="slider" id="Stakeholer1-2">
                                <span class="range-value">5</span>  

                                <input type="text" class="textarea" name="s2" id="s2-2" placeholder="Explanation" rows="1">

                                <p>Pleasure: </p>
                                <label>High</label><input type="checkbox" name="high2" id="high2" value="High"/>
                                <label>Low</label><input type="checkbox" name="low2" id="low2" value="Low"/>
                            </div>

                            <h4>STAKEHOLDER 3</h4>
                            <p>Consumers...</p>
                            <div class="box has-text-weight-bold">
                                <nav class="is-flex">
                                    <label id="Low" class="has-text-left">Low</label>
                                    <label id=High class="has-text-right">High</label>
                                </nav>
                                
                                <input type="range" min="1" max="10" value="5" class="slider" id="Stakeholer1-3">
                                <span class="range-value">5</span>  

                                <input type="text" class="textarea" name="s3" id="s3-2" placeholder="Explanation" rows="1">

                                <p>Pleasure: </p>
                                <label>High</label><input type="checkbox" name="high3" id="high3" value="High"/>
                                <label>Low</label><input type="checkbox" name="low3" id="low3" value="Low"/>
                            </div>

                            <h4>STAKEHOLDER 4</h4>
                            <p>VW Owners/Shareholders...</p>
                            <div class="box has-text-weight-bold">
                                <nav class="is-flex">
                                    <label id="Low" class="has-text-left">Low</label>
                                    <label id=High class="has-text-right">High</label>
                                </nav>
                                
                                <input type="range" min="1" max="10" value="5" class="slider" id="Stakeholer1-4">
                                <span class="range-value">5</span> 
        
                                <input type="text" class="textarea" name="s4" id="s4-2" placeholder="Explanation" rows="1">

                                <p>Pleasure: </p>
                                <label>High</label><input type="checkbox" name="high4" id="high4" value="High"/>
                                <label>Low</label><input type="checkbox" name="low4" id="low4" value="Low"/>
                            </div>
                        </div>
                        <br>
                       <!-- <input type = "submit" class="button" value = "Submit">
                    </form>-->
                    </div>

                    <a href= "utilitarianism-analysis1.php"><button class = "button is-primary" id = "option2" >Option 1 - Short-term</button>  </a>
                    <a href= "utilitarianism-analysis2.php"><button class = "button" id = "option2" >Option 1 - Long-term</button>  </a>
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

                <!--    Just moving this button to the bottom for better flow
                     <a class="button" href="../utilitarianism-summary.php">Proceed to Summary ></a> -->

                <h1>Option 1</h1>
                <h2>Aggregate of short-term outcomes:</h2>
                <nav class="is-flex has-text-weight-bold">
                    <label id="Low" class="has-text-left">Low</label>
                    <label id=High class="has-text-right">High</label>
                </nav>
                <div class="slider">
                    <input type="range" min="1" max="10" value="5" class="slider">
                    <span class="range-value">5</span>
                </div>
            
                <h2>Long-term outcomes:</h2>
                <nav class="is-flex has-text-weight-bold">
                    <label id="Low" class="has-text-left">Low</label>
                    <label id=High class="has-text-right">High</label>
                </nav>
                <div class="slider">
                    <input type="range" min="1" max="10" value="5" class="slider">
                    <span class="range-value">5</span>
                </div>

                <h1>Option 2</h1>
                <h2>Short-term outcomes:</h2>
                <nav class="is-flex has-text-weight-bold">
                    <label id="Low" class="has-text-left">Low</label>
                    <label id=High class="has-text-right">High</label>
                </nav>
                <div class="slider">
                    <input type="range" min="1" max="10" value="5" class="slider">
                    <span class="range-value">5</span>
                </div>

                <h2>Long-term outcomes:</h2>
                <nav class="is-flex has-text-weight-bold">
                    <label id="Low" class="has-text-left">Low</label>
                    <label id=High class="has-text-right">High</label>
                </nav>
                <div class="slider">
                    <input type="range" min="1" max="10" value="5" class="slider">
                    <span class="range-value">5</span>
                </div>

                <a class="button" href="../utilitarianism-summary.php">Proceed to Summary ></a>

            </div>
        </div>
    
        <script src = "../../../scripts/jquery-3.6.0.js"></script>
        <script src = "../../../scripts/user-event.js"></script>
    </body>
</html>