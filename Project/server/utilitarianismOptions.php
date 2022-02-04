<!--THIS PAGE IS NOT DONE YET - IT WILL STORE THE USER'S ANSWERS IN THE APPROPRIATE DATABASE AND 
                    REDIRECT THEY BACK TO THE UTILITRIANISM.php PAGE-->

<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" href = "../styles/bulma/css/bulma.css">
    </head>
    <body>
        <?php
            session_start();

            if (!isset($_SESSION["uid"])){
                header("Location: ../html/login.php");
            }

            if($_SERVER["REQUEST_METHOD"] == "GET"){                
                exit("Invalid request method");
            }
            function setAnswers(){
                try{
                    $connString = "mysql:host=lowe-walker.org;dbname=rwalker_Ethics_Dashboard_1";
                    $user = "rwalker_rampaul";
                    $pass = "1xlu7OMJ";
                    $pdo = new PDO($connString, $user, $pass);
                    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $option1_1 = $_POST["option1-1"];
                    $option1_2 = $_POST["option1-2"];
                    $option2_1 = $_POST["option2-1"];
                    $option2_2 = $_POST["option2-2"];
                    $uid = $_SESSION["uid"];

                    $sql1 =  "SELECT * FROM utilitarianism WHERE uid = '". $uid."'";
                    $result1 = $pdo -> query($sql1);

                    $isInTable = False;
                    while ($row = $result1 -> fetch()){
                        $isInTable = True;
                    }

                    if ($isInTable){
                        // update database
                        $update = "UPDATE utilitarianism SET `option1`='".$option1_1."',`option1Ex`='".$option1_2."',`option2`='".$option2_1."',`option2Ex`='".$option2_2."' WHERE `uid` = '".$uid."'";
                        $pdo -> query($update);
                    }
                    else{
                        // insert into database

                    }

                }
                catch(PDOException $e){
                    die($e -> getMessage());
                }
            }
        
        ?>
    </body>

</html>