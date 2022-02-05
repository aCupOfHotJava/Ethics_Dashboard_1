<!--NEEDS SOME ADDED STYLING-->
<?php
    session_start();
    print_r($_SESSION);
    if (!isset($_SESSION["uid"])){
        header("Location: ../html/login.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>DEONTOLOGY 1</title>
        <link rel = "stylesheet" href = "../../styles/bulma/css/bulma.css">
    </head>
    <body>
        <h1 class = "title has-background-grey-lighter">Deontology</h1>
        <div class = "box has-background-primary">
            <p>A deontological approach to ethical decision making 
                begins with reasoning our way to understanding the 
                moral law that should govern the decision.  Kant called 
                these moral laws categorical (universal, timeless) 
                imperatives (must do’s that are not optional).  To begin, 
                consider the reasons supporting each option.</p>
        </div>

        <div class = "columns">
                <div class = "column is-two-fifths">

                    <div class = "options">
                        <div class = "box" id = "dilemma-box">
                        <form method = "POST">
                            <?php include '/Applications/XAMPP/xamppfiles/htdocs/Ethics_Dashboard_1/Project/server/deontology.php';
                                determineState();
                             ?>
                            <h3>Option 1</h3>
                            <input type = "textarea" class = "textarea required" name = "option1_1" placeholder = "OPTION 1:  I can put loyalty to the company..." rows="1"/>
                        </div>

                        <div class = "box" id = "dilemma-box">

                            <h3>What is your motivation?</h3>
                            <input type="checkbox" id="op1"value="Serves your interests">
                            <label for="op1"> Serves your interests</label><br>
                            <input type="checkbox" id="op2"value="Serves the interests of someone else you want to impress">
                            <label for="op2"> Serves the interests of someone else you want to impress</label><br>
                            <input type="checkbox" id="op3"value="It will look good">
                            <label for="op3"> It will look good</label><br>
                            <input type="checkbox" id="op4" value="It will pay off in the long run">
                            <label for="op4"> It will pay off in the long run</label><br>
                            <input type="checkbox" id="op5" value="Everybody wins">
                            <label for="op5"> Everybody wins</label><br>
                            <input type="checkbox" id="op6"value="It costs very little">
                            <label for="op6"> It costs very little</label><br>
                            <input type="checkbox" id="op7" value="Revenge">
                            <label for="op7"> Revenge</label><br>
                            <input type="checkbox" id="op8" value=" Other">
                            <label for="op8"> Other</label>
                            <input type="textarea"><br>
                            <input type="checkbox" id="op9" value="Its the right thing to do">
                            <label for="op9"> Its the right thing to do</label><br>       
                            <br>
                        </div>
                   

                    <input type = "submit" class="button" value = "Submit" name ="submit_option1">
                    </form>

                    </div>        
            </div>

            <div class = "column is-two-fifths">

                <div class = "options">
                    <div class = "box" id = "dilemma-box">
                        
                    <form method = "POST">
                            <?php include '/Applications/XAMPP/xamppfiles/htdocs/Ethics_Dashboard_1/Project/server/deontology1_2.php';
                                determineState1();
                             ?>   
                        <h3>Option 2</h3>
                        <input type = "textarea" name = "option1_2" class = "textarea required" placeholder = "OPTION 2: I can betray the company, go to the..." rows="1"/>
                    </div>

                    <div class = "box" id = "dilemma-box">
                        <h3>What is your motivation?</h3>
                        <input type="checkbox" id="op1"value="Serves your interests">
                        <label for="op1"> Serves your interests</label><br>
                        <input type="checkbox" id="op2"value="Serves the interests of someone else you want to impress">
                        <label for="op2"> Serves the interests of someone else you want to impress</label><br>
                        <input type="checkbox" id="op3"value="It will look good">
                        <label for="op3"> It will look good</label><br>
                        <input type="checkbox" id="op4" value="It will pay off in the long run">
                        <label for="op4"> It will pay off in the long run</label><br>
                        <input type="checkbox" id="op5" value="Everybody wins">
                        <label for="op5"> Everybody wins</label><br>
                        <input type="checkbox" id="op6"value="It costs very little">
                        <label for="op6"> It costs very little</label><br>
                        <input type="checkbox" id="op7" value="Revenge">
                        <label for="op7"> Revenge</label><br>
                        <input type="checkbox" id="op8" value=" Other">
                        <label for="op8"> Other</label>
                        <input type="textarea"><br>
                        <input type="checkbox" id="op9-2" value="Its the right thing to do">
                        <label for="op9-2"> Its the right thing to do</label><br>       
                        <br>
                    </div>

                    <input type = "submit" class="button" value = "Submit" name ="submit_option2">
                </form>
                    
                </div>        
        </div>
            
        <div>
            <div class = "column has-fixed-size is-20">
                <a class = "box has-background-grey has-text-white" id = "dashboard" href = "../index.php">
                    DASHBOARD
                </a>
                <a class = "box has-background-grey has-text-white" id = "utilitarianism" href = "../Utilitarianism/utilitarianism.php">
                    UTILITARIANISM
                </a>
                <a class = "box has-background-white has-text-black" id = "deontology" href = "../Deontology/Deontology1.php">
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
                <h3>Option 1:</h3>
                <p>
                    This reasoning is consistent 
                    with [hypothetical/ 
                    categorical] reasoning and 
                    therefore [cannot/may] 
                    support a moral action.
                </p>
                <br>
                <h3>Option 2:</h3>
                <p>
                    This reasoning is consistent 
                    with [hypothetical/ 
                    categorical] reasoning and 
                    therefore [cannot/may] 
                    support a moral action.
                </p>
                </div>
                <a class="button" href="../Deontology/Deontology2.php">Next</a>
            </div>
        </div>
    </div>
    <script src = "../../scripts/jquery-3.6.0.js"></script>
    <script src = "../../scripts/user-event.js"></script>
    <script src = "../../scripts/deontology.js"></script>
    </body>
</html>