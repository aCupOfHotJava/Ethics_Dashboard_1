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
                            echo "Ethical Issuesand Options Score: ";
                            echo $row[0];
                            echo "<br>";
                            echo "Stakeholder Score: ";
                            echo $row[1];
                            echo "<br>";
                            echo "Virtue Ethics Score: ";
                            echo $row[2];
                            echo "<br>";
                            echo "Deontology Score: ";
                            echo $row[3];
                            echo "<br>";
                            echo "Care Ethics Score: ";
                            echo $row[4];
                            echo "<br>";
                            echo "Utilitarianism Score: ";
                            echo $row[5];
                        }
                    }
                    catch(SQLException $e) {
                        die($e -> getMessage());
                    }
                ?>
              
                </a>
            </div>
            <form method='post' action='download.php'>
       
            <?php 
                try {
                    $sql = "SELECT * FROM myProgress WHERE uid = " .$uid;
                    $result = $pdo -> query($sql);
                    $user_arr = array();
                     while($row = $result -> fetch()) {
                     $comment1=$row['ethicalIssuesandOptionsText'];
                     $score1=$row['ethicalIssuesandOptionsScore'];

                     $comment2=$row['stakeholderText'];
                     $score2=$row['stakeholderScore'];

                     $comment3=$row['virtueEthicsText'];
                     $score3=$row['virtueEthicsScore'];

                     $comment4=$row['deontologyText'];
                     $score4=$row['deontologyScore'];

                     $comment5=$row['careEthicsText'];
                     $score5=$row['careEthicsScore'];

                     $comment6=$row['utilitarianismText'];
                     $score6=$row['utilitarianismScore'];


                     $user_arr[] = array($comment1,$score1,$comment2,$score2,$comment3,$score3,$comment4,$score4,$comment5,$score5,$comment6,$score6);

                         }
                            }
            catch(SQLException $e) {
              die($e -> getMessage());
                                }
   ?>
      <?php 
    $serialize_user_arr = serialize($user_arr);
   ?>
        <input type='submit' value='Download Report' name='export_data'>
  <textarea name='export_data' style='display: none;'><?php echo $serialize_user_arr; ?></textarea>
          
 
       
            </form>
        </div>
        </div>

    </body>

</html>