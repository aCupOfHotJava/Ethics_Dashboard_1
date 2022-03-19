<?php
    session_start();
    print_r($_SESSION);
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" href = "../styles/bulma/css/bulma.css">
        <title>My Progress</title>
        <meta name="author" content="">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        
        <h1 class = "title has-background-grey-lighter">ETHICS DASHBOARD</h1>
        <?php
    if($_SESSION == NULL) {
        session_destroy();
        header("Location: login.php");
    }

        $uid = $_SESSION["uid"];
        $isEmpty = true;
        try {
            $connString = "mysql:host=lowe-walker.org;dbname=rwalker_Ethics_Dashboard_1";
            $user = "rwalker_villafranca";
            $pass = "gapsd5W2";
            $pdo = new PDO($connString, $user, $pass);
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            }
        catch(PDOException $e) {
            die($e -> getMessage());
        }
    
    ?>
        <div class="columns">
        <div class="column is-two-fifths">
            <div class=" box has-background-grey-lighter">
                <h3>ETHICAL ISSUE & OPTIONS</h3>

                <h4>Comments Summary:</h4>
                <?php
                try {
                        $sql = "SELECT ethicalIssuesandOptionsText FROM myProgress WHERE uid = " .$uid;
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

            <div class=" box has-background-grey-lighter">
              <h3>Stakeholder </h3>
              <h4>Comments:</h4>
              <?php
                try {
                        $sql = "SELECT stakeholderText FROM myProgress WHERE uid = " .$uid;
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

            <div class="virtueEthics box has-background-grey-lighter">
              <h3>VIRTUE ETHICS</h3>
              <h4>Comments:</h4>
              <?php
                try {
                        $sql = "SELECT virtueEthicsText FROM myProgress WHERE uid = " .$uid;
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

 
        </div>

        <div class = "column is-two-fifths">
      
            <div class="deontology box has-background-grey-lighter">
              <h3>DEONTOLOGY</h3>
              <h4>Comments Summary:</h4>
              <?php
                try {
                        $sql = "SELECT deontologyText FROM myProgress WHERE uid = " .$uid;
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

          <div class="careEthics box has-background-grey-lighter">
              <h3>CARE ETHICS</h3>
              <h4>Comments:</h4>
              <?php
                try {
                        $sql = "SELECT careEthicsText FROM myProgress WHERE uid = " .$uid;
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

            <div class="utilitarianism box has-background-grey-lighter">
                <h3>UTILITARIANISM</h3>
                <h4>Comments Summary:</h4>
                <?php
                try {
                        $sql = "SELECT utilitarianismText FROM myProgress WHERE uid = " .$uid;
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

        </div>
        <div>
            <div class = "column has-fixed-size is-20">
                <a class = "box has-background-grey has-text-white" id = "dashboard" href = "index.php">
                    DASHBOARD
                </a>
                <a class = "box has-background-grey has-text-white" id = "utilitarianism" href = "../html/Utilitarianism/utilitarianism.php">
                    UTILITARIANISM
                </a>
                <a class = "box has-background-grey has-text-white" id = "deontology" href = "Deontology/Deontology1.php">
                    DEONTOLOGY
                </a>
                <a class = "box has-background-grey has-text-white" id = "virtue-ethics" href = "VirtueEthics/VirtueEthics1.php">
                    VIRTUE ETHICS
                </a>
                <a class = "box has-background-grey has-text-white" id = "care-ethics" href = "../html/CareEthics/CareEthics.php">
                    CARE ETHICS
                </a>
                <a class = "box has-background-white has-text-black" id = "my-progress" href = "#">
                    MY PROGRESS
                </a>
                </div>
                </div>
                </div>
                <a class="box has-background-danger-light">
                <h3>TOTAL</h3>
                <?php
                    try {
                        $sql = "SELECT ethicalIssuesandOptionsScore, stakeholderScore, virtueEthicsScore, deontologyScore,careEthicsScore,utilitarianismScore FROM myProgress WHERE uid = " .$uid;
                        $result = $pdo -> query($sql);
                        while($row = $result -> fetch()) {
                            echo "ethicalIssuesandOptionsScore: ";
                            echo $row[0];
                            echo "<br>";
                            echo "stakeholderScore: ";
                            echo $row[1];
                            echo "<br>";
                            echo "virtueEthicsScore: ";
                            echo $row[2];
                            echo "<br>";
                            echo "deontologyScore: ";
                            echo $row[3];
                            echo "<br>";
                            echo "careEthicsScore: ";
                            echo $row[4];
                            echo "<br>";
                            echo "utilitarianismScore: ";
                            echo $row[5];
                        }
                    }
                    catch(SQLException $e) {
                        die($e -> getMessage());
                    }
                ?>
              
                </a>
            </div>
            <a href="Project/html/MyProgress.txt" download>
            <h3>Download Report</h3>
          </a>
        </div>
        </div>

    </body>

</html>