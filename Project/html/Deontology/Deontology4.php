<?php
    session_start();
    print_r($_SESSION);
    if (!isset($_SESSION["uid"])){
        header("Location: ../html/login.php");
    }

    function determineState() {

        $uid = $_SESSION["uid"];
        $isEmpty = true;

        try{
            $connString = "mysql:host=lowe-walker.org;dbname=rwalker_Ethics_Dashboard_1";
            $user = "rwalker_villafranca";
            $pass = "gapsd5W2";
            $pdo = new PDO($connString, $user, $pass);
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $uid = $_SESSION["uid"];
            $sql = "SELECT checkbox1 FROM deontology3 WHERE uid = '" .$uid ."';";
            $result = $pdo -> query($sql);
            while($row = $result -> fetch()) {
                $isEmpty = false;
            }   

            if(isset($_POST['submit_option1'])) {
                if(isset($_POST['ops1'])) {
                    $checks = $_POST['ops1'];
                }
                else {
                    $checks = "";
                }
                $checks_string = "";
                for($i = 0; $i < sizeof($checks); $i ++) {
                    if($i == 0) {
                        $checks_string = $checks_string .$checks[$i];
                    }
                    else {
                        $checks_string = $checks_string .", " .$checks[$i];
                    }
                }

                if($isEmpty) {
                    //$sql = "INSERT INTO deontology VALUES ('" .$uid ."', '" .$option1 ."');";
                    //echo $sql;
                    //$pdo -> query($sql);
                    //PSTMT
                    $stmt = $pdo -> prepare("INSERT INTO deontology3(uid, checkbox1) VALUES
                            (:uid, :checkbox1);");
                    $stmt -> bindParam(":uid", $uid);
                    $stmt -> bindParam(":checkbox1", $checks_string);
                    $stmt -> execute();

                }
                else {
                    //$sql = "UPDATE deontology SET option1 = '" .$option1 ."' WHERE uid = " .$uid .";";
                    //echo $sql;
                    //$pdo -> query($sql);
                    //PSTMT
                    $stmt = $pdo -> prepare("UPDATE deontology3 SET  checkbox1 = :checkbox1 
                            WHERE uid = :uid;");
                    $stmt -> bindParam(":checkbox1", $checks_string);
                    $stmt -> bindParam(":uid", $uid);
                    $stmt -> execute();
                }
            }
 
        }
        
        catch(PDOException $e) {
            die($e -> getMessage());
        }
    }
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

                <form method = "POST">
                <?php
                                    determineState();
                                ?>
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
                            <input type="checkbox" name = "ops1[]" id="op1"value="Serves your interests">
                            <label for="op1"> Serves your interests</label><br>
                            <input type="checkbox" name = "ops1[]" id="op2"value="Serves the interests of someone else you want to impress">
                            <label for="op2"> Serves the interests of someone else you want to impress</label><br>
                            <input type="checkbox" name = "ops1[]" id="op3"value="It will look good">
                            <label for="op3"> It will look good</label><br>
                            <input type="checkbox" name = "ops1[]" id="op4" value="It will pay off in the long run">
                            <label for="op4"> It will pay off in the long run</label><br>
                            <input type="checkbox" name = "ops1[]" id="op5" value="Everybody wins">
                            <label for="op5"> Everybody wins</label><br>
                            <input type="checkbox" name = "ops1[]" id="op6"value="It costs very little">
                            <label for="op6"> It costs very little</label><br>
                            <input type="checkbox" name = "ops1[]" id="op7" value="Revenge">
                            <label for="op7"> Revenge</label><br>
                            <input type="checkbox" name = "ops1[]" id="op8" value=" Other">
                            <label for="op8"> Other</label><br>
                            <input type="checkbox" name = "ops1[]" id="op9" value="Its the right thing to do">
                            <label for="op9"> Its the right thing to do</label><br>   
                            <p>
                                This motivation is consistent with categorical reasoning and 
                                therefore may support a universal law of moral action; 
                                however, the law must be defined, universal and consistent.
                            </p>    
                            <br>
                            </div>

                            <input type = "submit" class="button" value = "Submit" name ="submit_option1">
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
