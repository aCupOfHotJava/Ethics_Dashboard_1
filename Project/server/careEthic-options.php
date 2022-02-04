
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
                $user = "rwalker_villafranca";
                $pass = "gapsd5W2";
                $pdo = new PDO($connString, $user, $pass);
                $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $uid = $_SESSION["uid"];

                $sql1 =  "SELECT * FROM careEthics WHERE uid = '". $uid."'";
                $result1 = $pdo -> query($sql1);

                $isInTable = False;
                while ($row = $result1 -> fetch()){
                    $isInTable = True;
                }

                if ($isInTable){
                }
                else{
                }

            }
            catch(PDOException $e){
                die($e -> getMessage());
            }
        
        ?>
    </body>

</html>