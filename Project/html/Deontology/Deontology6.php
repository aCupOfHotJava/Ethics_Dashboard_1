<!--NEEDS SOME ADDED STYLING-->
<?php
    session_start();
    print_r($_SESSION);


    function determineState() {

        $uid = $_SESSION["uid"];
        global $yesOrNo1;
        $yesOrNo1 = 0;
        $option1 = 0;
        $yesOrNo2 = 0;
        $option2 = 0;
        $isEmpty = true;

        try{
            $connString = "mysql:host=lowe-walker.org;dbname=rwalker_Ethics_Dashboard_1";
            $user = "rwalker_villafranca";
            $pass = "gapsd5W2";
            $pdo = new PDO($connString, $user, $pass);
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $uid = $_SESSION["uid"];
            $sql = "SELECT yesOrNo1 ,option1, yesOrNo2 ,option2  FROM deontology6 WHERE uid = '" .$uid ."';";
            $result = $pdo -> query($sql);
            while($row = $result -> fetch()) {
                $isEmpty = false;
                $yesOrNo1 = 0;
                $option1 = 0;
                $yesOrNo2 = 0;
                $option2 = 0;
            }   

            if(isset($_POST['submit_option1'])) {
                $yesOrNo1 = $_POST['yesOrNo1'];
                $option1 = $_POST['option1'];
                $yesOrNo2 = $_POST['yesOrNo2'];
                $option2 = $_POST['option2'];

                if($isEmpty) {

                    $stmt = $pdo -> prepare("INSERT INTO deontology6(uid,yesOrNo1, option1,yesOrNo2,option2) VALUES ('" .$uid ."', '" .$yesOrNo1 ."','" .$option1 ."','" .$yesOrNo2 ."', '" .$option2 ."');");

                    $stmt -> bindParam("uid", $uid);
                    $stmt -> bindParam("yesOrNo1", $yesOrNo1);
                    $stmt -> bindParam("option1", $option1);
                    $stmt -> bindParam("yesOrNo2", $yesOrNo2);
                    $stmt -> bindParam("option2", $option2);
                    $stmt -> execute();

                }
                else {
                    $stmt = $pdo -> prepare("UPDATE deontology6 SET yesOrNo1 = '" .$yesOrNo1 ."',option1 = '" .$option1 ."',yesOrNo2 = '" .$yesOrNo2 ."' ,option2 = '" .$option2 ."' WHERE uid = " .$uid .";");

                    $stmt -> bindParam("yesOrNo1", $yesOrNo1);
                    $stmt -> bindParam("option1", $option1);
                    $stmt -> bindParam("yesOrNo2", $yesOrNo2);
                    $stmt -> bindParam("option2", $option2);
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

                <form method = "POST" action = "" id = "">
                <?php
                                    determineState();
                                ?>
                    <div class = "options">
                        <div class = "box" id = "dilemma-box">
                            <h3>Moral Law 1:  Cheating is wrong</h3><br>
                                <p>TEST IT’S UNIVERSALIZABILITY:  Can you restate the law 
                                    as a universal law of moral action?  </p>
                                    <input type="radio" id="yes1" name="yesOrNo1" value="yes">
                                    <label for="yes1">Yes</label>
                                    <input type="radio" id="no1" name="yesOrNo1" value="no">
                                    <label for="no1">No</label><br> 
                            <textarea class = "textarea required" name="option1" placeholder = "Cheating is wrong in all circumstances, times and all places."></textarea>
                            <p>*if the moral law cannot be expressed as a universal law of 
                                moral action is fails the universalizability test.</p>
                        </div>


                        <div class = "box" id = "dilemma-box">
                                <p>TEST ITS CONSISTENCY:  Could you live in a world where 
                                    everyone followed this law?</p>
                                    <input type="radio" id="yes2" name="yesOrNo2" value="yes">
                                    <label for="yes2">Yes</label>
                                    <input type="radio" id="no2" name="yesOrNo2" value="no">
                                    <label for="no2">No</label><br> 
                            <textarea class = "textarea required" name="option2" placeholder = "I could live in a society where the moral wrongness of cheating informed everyone’s idea of right and wrong."></textarea>
                            <p>*If you could not live in a world where everyone (including 
                                you) followed this law, it fails the consistency test.</p>
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
                <div class= "box">
                    <h1>OPTION 2</h1>
                    <div class='box has-background-grey-lighter'>
            <h2>Moral Law 1: Cheating is Wrong</h2>
            <?php
            echo $yesOrNo1;
                ?>

            <p>Universal - Yes</p>
            <p>Consistent - Yes</p>
        </div>

            <div class='box has-background-grey-lighter'>

            <h2>Moral Law 2: Revealing the Truth is Right</h2>
            
            <p>Universal - Yes / No</p>
            <p>Consistent - Yes</p>
        </div>
            <div class='box has-background-grey-lighter'>

            <h2>Moral Law 3: Honesty is Right</h2>
            <p>Universal - Yes / No</p>
            <p>Consistent - Yes / No</p>
        </div>   
        </div>
                <a class="button" href="../Deontology/Deontology7.php">Next</a>
            </div>
        </div>
        <script src = ""></script>
    </body>
</html>