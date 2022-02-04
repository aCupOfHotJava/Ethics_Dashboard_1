<!-- IF THE USER SELECTS THE RIGHT THING TO DO THEN THEY SHOULD END UP HERE-->
<?php
    session_start();
    print_r($_SESSION);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>DEONTOLOGY 3</title>
        <link rel = "stylesheet" href = "../../styles/bulma/css/bulma.css">
    </head>
    <body>
        <h1 class = "title has-background-grey-lighter">DEONTOLOGY 3</h1>

        <div class = "columns">
            <div class = "column is-two-thirds">
                <div class = "box has-background-primary">
                    <p>A deontological approach to ethical decision making 
                        begins with reasoning our way to understanding the 
                        moral law that should govern the decision.  Kant called 
                        these moral laws categorical (universal, timeless) 
                        imperatives (must do’s that are not optional).  To begin, 
                        consider the reasons supporting each option.</p>
                </div>

                <form method = "POST" action = "../../server/utilitarianismOptions.php" id = "utilitarianism-options-form">
                    <div class = "options">
                        <div class = "box" id = "dilemma-box">
                            <h3> CATEGORIACAL IMPERATIVES</h3>
                            <p>
                                The fundamental principle of our moral duties is a 
                                categorical imperative.
                                •It is an imperative because it is a command addressed 
                                to agents who could follow it but might not
                                •It is categorical in virtue of applying to us 
                                unconditionally – in all times and all places
                                Unlike hypothetical imperatives, categorical imperatives 
                                are not relative to a desire or goal
                            </p>
                        </div>

                        <div class = "box" id = "dilemma-box">
                            <h3>You selected the following reasons to support OPTION 2:</h3>
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
                            <label for="op8"> Other</label><br>
                            <input type="checkbox" id="op9" value="Its the right thing to do">
                            <label for="op9"> Its the right thing to do</label><br>   
                            <p>
                                This motivation is consistent with categorical reasoning and 
                                therefore may support a universal law of moral action; 
                                however, the law must be defined, universal and consistent.
                            </p>    
                            <br>
                            </div>

                        <input type = "submit" class="button" value = "Submit">
                    </div>
                </form>
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

                <a class="button" href="../Deontology/Deontology5.php">Next</a>
            </div>
        </div>
        <script src = ""></script>
    </body>
</html>
