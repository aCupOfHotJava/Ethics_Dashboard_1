
<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" href = "../styles/bulma/css/bulma.css">
        
    </head>
    <body>

        <?php
            function determineState1() {

                $uid = $_SESSION["uid"];
                $option2 =0;
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
                    $option2 = $_POST['option1_2'];
                    if($isEmpty) {
                        $sql = "INSERT INTO deontology VALUES ('" .$uid ."', '" .$option2 ."');";
                        echo $sql;
                        $pdo -> query($sql);
                    }
                    else {
                        $sql = "UPDATE deontology SET option2 = '" .$option2 ."' WHERE uid = " .$uid .";";
                        echo $sql;
                        $pdo -> query($sql);
                    }
                }
    
                if(!$isEmpty) {
                    echo "<p class = 'textarea' name = 'option1_1' rows='5' cols='45'>";
                    echo $option2;
                    echo "</p>";
                
                }
                if($isEmpty) {
                    echo "<textarea class = 'textarea' name = 'option1_2'></textarea>";
                }
            }
            
            catch(PDOException $e) {
                die($e -> getMessage());
            }
        }
    ?>
    </body>

</html>