
<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" href = "../styles/bulma/css/bulma.css">
        
    </head>
    <body>

        <?php
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
                    if($isEmpty) {
                        $sql = "INSERT INTO deontology VALUES ('" .$uid ."', '" .$option1 ."');";
                        echo $sql;
                        $pdo -> query($sql);
                    }
                    else {
                        $sql = "UPDATE deontology SET option1 = '" .$option1 ."' WHERE uid = " .$uid .";";
                        echo $sql;
                        $pdo -> query($sql);
                    }
                }
    
                if(!$isEmpty) {
                    echo "<p class = 'textarea' name = 'option1_1' rows='5' cols='45'>";
                    echo $option1;
                    echo "</p>";
                }
                if($isEmpty) {
                 echo "<textarea class = 'textarea' name = 'option1_1'></textarea>";

                }
            }
            
            catch(PDOException $e) {
                die($e -> getMessage());
            }
        }
    ?>
    </body>

</html>