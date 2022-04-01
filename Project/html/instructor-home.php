<?php
    $connString = "mysql:host=lowe-walker.org;dbname=rwalker_Ethics_Dashboard_1";
    $user = "rwalker_krieg";
    $pass = "rB87mkNG";
    session_start();
    // Prevent access to people without privileges or people who are 
    // not logged in.
    if($_SESSION == NULL) {
        session_destroy();
        echo "You are not logged in.";
        header("Location: login.php");
    }
    if($_SESSION['isAdmin'] == 0) {
        session_destroy();
        echo "You are forbidden from accessing this resource.";
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Instructor Home Page</title>
        <link rel = "stylesheet" href = "../styles/bulma/css/bulma.css">
    </head>
    <body>
        <div class = "columns">
            <div class = "column is-two-fifths">
                <div class = "box has-background-lighter">
                    <label for = "students">View Student Answers</label>
                    <select name = "students" id = "students" form = "studentform">
                        <?php
                            $sql = "SELECT uid FROM user";
                            try {
                                $pdo = new PDO($connString, $user, $pass);
                                $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $result = $pdo -> query($sql);
                                while($row = $result -> fetch()) {
                                    echo "<option value = '" .$row[0] ."'>" .$row[0] ."</option>";
                                }
                            }
                            catch(PDOException $e) {
                                die($e -> getMessage());
                            }
                        ?>
                    </select>
                    <form action = "instructor-view-student.php" id = "studentform" method = "POST">
                        <input type = "submit">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>