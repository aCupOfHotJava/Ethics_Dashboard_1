<!DOCTYPE html>
<html>
    <?php
        try {

            $connString = "mysql:host=localhost;dbname=ethics_db";
            $user = "root";
            $pass = "";
            $pdo = new PDO($connString, $user, $pass);
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM student";
            $result = $pdo -> query($sql);

            while($row = $result -> fetch()) {
                echo $row['StudentID']. " - ". $row['UId']. " - "
                        .$row['PId']. "<br/>";
            }
        }
        catch(PDOException $e) {
            die($e -> getMessage());
        }
    ?>
</html>