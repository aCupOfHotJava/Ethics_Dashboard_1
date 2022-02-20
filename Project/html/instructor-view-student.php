<?php
    $connString = "mysql:host=lowe-walker.org;dbname=rwalker_Ethics_Dashboard_1";
    $user = "rwalker_krieg";
    $pass = "rB87mkNG";
    $uid = $_POST['students'];
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
    try {
        $pdo = new PDO($connString, $user, $pass);
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        die($e -> getMessage());
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Instructor Home Page</title>
        <link rel = "stylesheet" href = "../styles/bulma/css/bulma.css">
    </head>
    <body>
        <div class = "title is-6">Student Ethical Issues and Options</div>
            <header>Student Issue</header>
            <div class = "box has-background-lighter">
                <?php
                    $sql = "SELECT dilemma FROM ethical_issues WHERE uid = " .$uid;
                    $result = $pdo -> query($sql);
                    while($row = $result -> fetch()) {
                        echo $row[0];
                    }
                ?>
            </div>
            <header>Student Options</header>
            <div class = "box has-background-lighter">
                <?php
                    $sql = "SELECT studentOption FROM ethical_options WHERE uid = " .$uid;
                    $result = $pdo -> query($sql);
                    while($row = $result -> fetch()) {
                        echo "<div class = box>";
                        echo $row[0];
                        echo "</div>";
                    }
                ?>
            </div>
        </div>
        <div class = "title is-6">Student Stakeholder Analysis</div>
            
        </div>
    </body>
</html>