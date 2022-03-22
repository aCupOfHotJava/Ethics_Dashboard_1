<?php
    session_start();
    print_r($_SESSION);
    if (!isset($_SESSION["uid"])){
        header("Location: ../html/login.php");
    }

    function determineState() {

        $uid = $_SESSION["uid"];
        $describe1 = 0;
        $moralLaw1 = 0;
        $moralLaw2 = 0;
        $moralLaw3 = 0;
        $isEmpty = true;

        try{
            $connString = "mysql:host=lowe-walker.org;dbname=rwalker_Ethics_Dashboard_1";
            $user = "rwalker_villafranca";
            $pass = "gapsd5W2";
            $pdo = new PDO($connString, $user, $pass);
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $uid = $_SESSION["uid"];
            $sql = "SELECT describe1, moralLaw1, moralLaw2,moralLaw3 FROM deontology5 WHERE uid = '" .$uid ."';";
            $result = $pdo -> query($sql);
            while($row = $result -> fetch()) {
                $isEmpty = false;
                $describe1 = 0;
                $moralLaw1 = 0;
                $moralLaw2 = 0;
                $moralLaw3 = 0;
            }   

            if(isset($_POST['submit_option1'])) {
                $describe1 = $_POST['describe1'];
                $moralLaw1 = $_POST['moralLaw1'];
                $moralLaw2 = $_POST['moralLaw2'];
                $moralLaw3 = $_POST['moralLaw3'];

                if($isEmpty) {

                    $stmt = $pdo -> prepare("INSERT INTO deontology5(uid,describe1, moralLaw1,moralLaw2,moralLaw3) VALUES ('" .$uid ."', '" .$describe1 ."','" .$moralLaw1 ."','" .$moralLaw2 ."', '" .$moralLaw3 ."');");

                    $stmt -> bindParam("uid", $uid);
                    $stmt -> bindParam("describe1", $describe1);
                    $stmt -> bindParam("moralLaw1", $moralLaw1);
                    $stmt -> bindParam("moralLaw2", $moralLaw2);
                    $stmt -> bindParam("moralLaw3", $moralLaw3);
                    $stmt -> execute();

                }
                else {
                    $stmt = $pdo -> prepare("UPDATE deontology5 SET describe1 = '" .$describe1 ."',moralLaw1 = '" .$moralLaw1 ."',moralLaw2 = '" .$moralLaw2 ."' ,moralLaw3 = '" .$moralLaw3 ."' WHERE uid = " .$uid .";");

                    $stmt -> bindParam("describe1", $describe1);
                    $stmt -> bindParam("moralLaw1", $moralLaw1);
                    $stmt -> bindParam("moralLaw2", $moralLaw2);
                    $stmt -> bindParam("moralLaw3", $moralLaw3);
                    $stmt -> bindParam("uid", $uid);
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
        <title>Deontology</title>
        <meta name="author" content="">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel = "stylesheet" href = "../../styles/bulma/css/bulma.css">
    </head>
    <body>
        <h1 class = "title has-background-grey-lighter">Deontology</h1>

        <div class = "columns">
            <div class = "column is-two-thirds">
                <div class = "box has-background-primary">
                    <p>TESTING CATEGORICAL IMPERATIVES</p>
                </div>

                <form method = "POST">
                <?php
                                    determineState();
                                ?>
                    <div class = "options">
                        <div class = "box" id = "dilemma-box">
                            <h3>Describe the moral issues governing the decision described 
                                in Option 2.  </h3>
                            <textarea class = "textarea required" name="describe1" placeholder = "Cheating is wrong and should be exposed. Blowing the whistle is the right thing to do because I will be revealing the truth about what is going on."></textarea>
                        </div>

                        <div class = "box" id = "dilemma-box">
                            <h3>Define the moral law(s) that govern the actions you will 
                                take if you choose Option 2.</h3>
                                <textarea class = "textarea required" name="moralLaw1" placeholder = "Moral Law 1:  Cheating is wrong."></textarea>
                                <br>
                                <textarea class = "textarea required" name="moralLaw2" placeholder = "Moral Law 2:  Revealing the truth is right."></textarea>
                                <br>
                                <textarea class = "textarea required" name="moralLaw3" placeholder = "Moral Law 3:  Honesty is right."></textarea>
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
            <!-- feedback suggests we should only have
                one next/submit button that accomplished
                both tasks -->
            <a class="button" href="../Deontology/Deontology6.php">Next</a>
        </div>
        <script src = ""></script>
    </body>
</html>