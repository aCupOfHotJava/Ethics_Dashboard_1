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
    <body class = "box has-background-dark">
        <div class = "box has-background-primary-light">
            <div class = "title is-6">Student Ethical Issues and Options</div>
            <header>Student Issue</header>
            <div class = "box has-background-lighter">
                <?php
                    try {
                        $sql = "SELECT dilemma FROM ethical_issues WHERE uid = " .$uid;
                        $result = $pdo -> query($sql);
                        while($row = $result -> fetch()) {
                            echo $row[0];
                        }
                    }
                    catch(SQLException $e) {
                        die($e -> getMessage());
                    }
                ?>
            </div>
            <header>Student Options</header>
            <div class = "box has-background-lighter">
                <?php
                    try {
                        $sql = "SELECT studentOption FROM ethical_options WHERE uid = " .$uid;
                        $result = $pdo -> query($sql);
                        while($row = $result -> fetch()) {
                            echo "<div class = 'box'>";
                            echo $row[0];
                            echo "</div>";
                        }
                    }
                    catch(SQLException $e) {
                        die($e -> getMessage());
                    }
                ?>
            </div>
        </div>
        <div class = "box has-background-primary-light">
            <div class = "title is-6">Student Stakeholder Analysis</div>
            <div class = "box has-background-lighter">
                <?php
                    echo "Stakeholder analysis not ready for SQL";
                ?>
            </div>
        </div>
        <div class = "box has-background-primary-light">
            <div class = "title is-6">Student Utilitarianism</div>
            <div class = "box has-background-lighter">
                <?php
                    try {
                        $sql = "SELECT option1, option1Ex, option2, option2Ex FROM utilitarianism WHERE uid = " .$uid;
                        $result = $pdo -> query($sql);
                        while($row = $result -> fetch()) {
                            echo "Student Option 1";
                            echo "<div class = 'box'>";
                            echo $row[0];
                            echo "</div>";
                            echo "Student Explanation 1";
                            echo "<div class = 'box'>";
                            echo $row[1];
                            echo "</div>";
                            echo "Student Option 2";
                            echo "<div class = 'box'>";
                            echo $row[2];
                            echo "</div>";
                            echo "Student Explanation 2";
                            echo "<div class = 'box'>";
                            echo $row[3];
                            echo "</div>";
                        }
                    }
                    catch(SQLException $e) {
                        die($e -> getMessage());
                    }
                ?>
            </div>
        </div>
        <div class = "box has-background-primary-light">
            <div class = "title is-6">Student Deontology</div>
            <div class = "box has-background-lighter">
                <?php
                    $sql = "SELECT option1, option2, checkbox1, checkbox2 FROM deontology WHERE uid = " .$uid;
                    $result = $pdo -> query($sql);
                    while($row = $result -> fetch()) {
                        echo "Student Option 1";
                        echo "<div class = 'box'>";
                        echo $row[0];
                        echo "</div>";
                        echo "Student Reasons 1";
                        echo "<div class = 'box'>";
                        echo $row[2];
                        echo "</div>";
                        echo "Student Option 2";
                        echo "<div class = 'box'>";
                        echo $row[1];
                        echo "</div>";
                        echo "Student Reasons 2";
                        echo "<div class = 'box'>";
                        echo $row[3];
                        echo "</div>";
                    }
                ?>
            </div>
        </div>
    </body>
</html>