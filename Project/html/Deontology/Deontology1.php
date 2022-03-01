<!--NEEDS SOME ADDED STYLING-->
<?php
    session_start();
    print_r($_SESSION);
    if (!isset($_SESSION["uid"])){
        header("Location: ../html/login.php");
    }

    function determineState() {

        $uid = $_SESSION["uid"];
        $option1 = 0;
        $isEmpty = true;

        try{
            $connString = "mysql:host=lowe-walker.org;dbname=rwalker_Ethics_Dashboard_1";
            $user = "rwalker_villafranca";
            $pass = "gapsd5W2";
            $pdo = new PDO($connString, $user, $pass);
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $uid = $_SESSION["uid"];
            $sql = "SELECT option1 FROM deontology WHERE uid = '" .$uid ."';";
            $result = $pdo -> query($sql);
            while($row = $result -> fetch()) {
                $isEmpty = false;
                $option1 = $row[0];
            }   

            if(isset($_POST['submit_option1'])) {
                $option1 = $_POST['option1_1'];
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
                if(isset($_POST['otheranswer'])) {
                    $checks_string = $checks_string .", OTHER(" .$_POST['otheranswer'] .")";
                }
                if($isEmpty) {
                    //$sql = "INSERT INTO deontology VALUES ('" .$uid ."', '" .$option1 ."');";
                    //echo $sql;
                    //$pdo -> query($sql);
                    //PSTMT
                    $stmt = $pdo -> prepare("INSERT INTO deontology(uid, option1, checkbox1) VALUES
                            (:uid, :option1, :checkbox1);");
                    $stmt -> bindParam(":uid", $uid);
                    $stmt -> bindParam(":option1", $option1);
                    $stmt -> bindParam(":checkbox1", $checks_string);
                    $stmt -> execute();

                }
                else {
                    //$sql = "UPDATE deontology SET option1 = '" .$option1 ."' WHERE uid = " .$uid .";";
                    //echo $sql;
                    //$pdo -> query($sql);
                    //PSTMT
                    $stmt = $pdo -> prepare("UPDATE deontology SET option1 = :option1, checkbox1 = :checkbox1 
                            WHERE uid = :uid;");
                    $stmt -> bindParam(":option1", $option1);
                    $stmt -> bindParam(":checkbox1", $checks_string);
                    $stmt -> bindParam(":uid", $uid);
                    $stmt -> execute();
                }
            }
            if(!$isEmpty) {
                echo "<h3>Option 1</h3>";
                echo "<textarea class = 'textarea' name = 'option1_1'>" .$option1 ."</textarea>";
            }
            if($isEmpty) {
                echo "<h3>Option 1</h3>";
                echo "<textarea class = 'textarea' name = 'option1_1'></textarea>";
            }
        }
        
        catch(PDOException $e) {
            die($e -> getMessage());
        }
    }

    function determineState1() {

        $uid = $_SESSION["uid"];
        $option1 = 0;
        $isEmpty = true;

        try{
            $connString = "mysql:host=lowe-walker.org;dbname=rwalker_Ethics_Dashboard_1";
            $user = "rwalker_villafranca";
            $pass = "gapsd5W2";
            $pdo = new PDO($connString, $user, $pass);
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $uid = $_SESSION["uid"];
            $sql = "SELECT option2 FROM deontology WHERE uid = '" .$uid ."';";
            $result = $pdo -> query($sql);
            while($row = $result -> fetch()) {
                $isEmpty = false;
                $option2 = $row[0];
            }   

            if(isset($_POST['submit_option2'])) {
                $option2 = $_POST['option2_1'];
                if(isset($_POST['ops2'])) {
                    $checks = $_POST['ops2'];
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
                if(isset($_POST['otheranswer'])) {
                    $checks_string = $checks_string .", OTHER(" .$_POST['otheranswer'] .")";
                }
                if($isEmpty) {
                    //$sql = "INSERT INTO deontology VALUES ('" .$uid ."', '" .$option1 ."');";
                    //echo $sql;
                    //$pdo -> query($sql);
                    //PSTMT
                    $stmt = $pdo -> prepare("INSERT INTO deontology(uid, option2, checkbox2) VALUES
                            (:uid, :option2, :checkbox2);");
                    $stmt -> bindParam(":uid", $uid);
                    $stmt -> bindParam(":option2", $option2);
                    $stmt -> bindParam(":checkbox2", $checks_string);
                    $stmt -> execute();

                }
                else {
                    //$sql = "UPDATE deontology SET option1 = '" .$option1 ."' WHERE uid = " .$uid .";";
                    //echo $sql;
                    //$pdo -> query($sql);
                    //PSTMT
                    $stmt = $pdo -> prepare("UPDATE deontology SET option2 = :option2, checkbox2 = :checkbox2 
                            WHERE uid = :uid;");
                    $stmt -> bindParam(":option2", $option2);
                    $stmt -> bindParam(":checkbox2", $checks_string);
                    $stmt -> bindParam(":uid", $uid);
                    $stmt -> execute();
                }
            }
            if(!$isEmpty) {
                echo "<h3>Option 2</h3>";
                echo "<textarea class = 'textarea' name = 'option2_1'>" .$option2 ."</textarea>";
            }
            if($isEmpty) {
                echo "<h3>Option 2</h3>";
                echo "<textarea class = 'textarea' name = 'option2_1'></textarea>";
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
                                <?php
                                    // changed from importation to function called within this file
                                    // this solved a lot of path errors
                                    determineState();
                                ?>
                        </div>

                        <div class = "box" id = "dilemma-box">

                            <h3>What is your motivation?</h3>
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
                            <label for="op8"> Other</label>
                            <input type="textarea" name = "otheranswer"><br>
                            <input type="checkbox" name = "ops1[]" id="op9" value="Its the right thing to do">
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
                            <?php
                                // changed from importation to function called within this file
                                // this solved a lot of path errors
                                determineState1();
                            ?>
                    </div>

                    <div class = "box" id = "dilemma-box">
                        <h3>What is your motivation?</h3>
                        <input type="checkbox" name = "ops2[]" id="op1"value="Serves your interests">
                        <label for="op1"> Serves your interests</label><br>
                        <input type="checkbox" name = "ops2[]" id="op2"value="Serves the interests of someone else you want to impress">
                        <label for="op2"> Serves the interests of someone else you want to impress</label><br>
                        <input type="checkbox" name = "ops2[]" id="op3"value="It will look good">
                        <label for="op3"> It will look good</label><br>
                        <input type="checkbox" name = "ops2[]" id="op4" value="It will pay off in the long run">
                        <label for="op4"> It will pay off in the long run</label><br>
                        <input type="checkbox" name = "ops2[]" id="op5" value="Everybody wins">
                        <label for="op5"> Everybody wins</label><br>
                        <input type="checkbox" name = "ops2[]" id="op6"value="It costs very little">
                        <label for="op6"> It costs very little</label><br>
                        <input type="checkbox" name = "ops2[]" id="op7" value="Revenge">
                        <label for="op7"> Revenge</label><br>
                        <input type="checkbox" name = "ops2[]" id="op8" value=" Other">
                        <label for="op8"> Other</label>
                        <input type="textarea"><br>
                        <input type="checkbox" name = "ops2[]" id="op9-2" value="Its the right thing to do">
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