<!-- for virtue ethics options page, not completed yet-->
<!--
                    <!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" href = "../styles/bulma/css/bulma.css">
    </head>
    <body>
        
        // <php here
        /*
            if($_SERVER["REQUEST_METHOD"] == "POST"){                
                echo "
                    <h3>Submission Successful!</h3>
                    <a class=\"button\" href ='../html/VirtueEthics/VirtueEthics-options.php'>Submit</a>
                    ";
            }
        */
        //>
        
    </body>

</html>
        -->
<!-- a few database implementations added - not completed yet -->
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
            try{
                $connString = "mysql:host=lowe-walker.org;dbname=rwalker_Ethics_Dashboard_1";
                $user = "rwalker_joseph";
                $pass = "GRzQ8Gwh";
                $pdo = new PDO($connString, $user, $pass);
                $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                //options 1-3 with submit buttons
                /*$option1 = $_POST["option2"]; 
                $option2 = $_POST["option2"];
                $option3 = $_POST["option3"];
                //options ranked by most virtuous
                $optionsRanked = $_POST["optionsRanked"];*/

                $uid = $_SESSION["uid"];

                $sql1 =  "SELECT * FROM virtueEthics WHERE uid = '". $uid."'";
                $result1 = $pdo -> query($sql1);

                $isInTable = False;
                while ($row = $result1 -> fetch()){
                    $isInTable = True;
                }

                if ($isInTable){
                    //update new answers the database
                    //$updateStatement = "UPDATE virtueEthics SET `option1`='".$option1"',`option2`='".$option2."',`option3`='".$option3."',`optionsRanked`='".$optionsRanked."' WHERE `uid` = '".$uid."'";
                    $updateStatement = "UPDATE `virtueEthics` SET `option1` = '".$option1."', `option2` = '".$option2."', `option3` = '".$option3."', `optionsRanked` = '".$optionsRanked."' WHERE `uid` = '".$uid."'";
                    $pdo -> query($updateStatement);
                }
                else{
                    //insert answers into the database
                }
            }
            catch(PDOException $e){
                die($e -> getMessage());
            }
        
        ?>
    </body>

</html>
