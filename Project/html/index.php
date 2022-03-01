<?php
    session_start();
    if($_SESSION == NULL) {
        session_destroy();
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <!--<link rel="stylesheet" href="Project/styles/main.css">-->
        <link rel = "stylesheet" href = "../styles/bulma/css/bulma.css">
        <!-- Simple driver to make it intuitive that these boxes are links -->
        <style>
            #clickable0, #clickable1 {
                cursor: pointer;
            }
        </style>
        <title>Ethics Dashboard</title>
        <meta name="author" content="">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class = "title has-background-grey-lighter">
            <h1>ETHICS DASHBOARD</h1>
            <a href = "../server/logout.php" class = "is-size-6">Logout</a>
            <?php
                if($_SESSION['isAdmin'] == 1) {
                    echo "<br><a href = 'instructor-home.php' class = 'is-size-6'>Instructor Home</a>";
                }
            ?>
        </div>

        <div class="columns">
        <div class="column is-two-fifths">
            <div class="box has-background-primary " onclick = "window.location = 'ethical-issues.php';" id = "clickable0">
                <h3>ETHICAL ISSUE</h3>
                <p>OPTION 1</p>
                <p>OPTION 2</p>
                <p>OPTION ...</p>
            </div>

            <div class="virtueEthics box has-background-grey-lighter">
              <h3>VIRTUE ETHICS</h3>
              <p>The virtuous option is option ?.</p>
            </div>

            <div class="deontology box has-background-grey-lighter">
                <h3>DEONTOLOGY</h3>
                <p>The moral law dictates that option ? is the morally correct choice.</p>
            </div>

            <div class="careEthics box has-background-grey-lighter">
                <h3>CARE ETHICS</h3>
                <p>Option ? responds to the needs identified.</p>
              </div>
        </div>

        <div class = "column is-two-fifths">
            <div class="box link has-background-primary" onclick = "window.location = 'stakeholders-main.php';" id = "clickable1">
                <h3>STAKEHOLDERS</h3>
                <br>
                <p>STAKEHOLDER 1</p>
                <br>
                <p>STAKEHOLDER 2</p>
                <br>
                <p>STAKEHOLDER 3</p>
                <br>
                <p>STAKEHOLDER 4</p>
                <br>
                <p>STAKEHOLDER 5</p>
                <br>
                <p>STAKEHOLDER ...</p>
            </div>

            <div class="utilitarianism box has-background-grey-lighter">
                <h3>UTILITARIANISM</h3>
                <p>Option ? will produce the greatest happiness and is therefore the morally correct option.</p>
            </div>           

        </div>
        <!-- NOTE: navigation box must be placed in a div wrapper
             for the fixed sizing to work! -->
        <div>
            <div class = "column has-fixed-size is-20">
                <a class = "box has-background-white has-text-black" id = "dashboard" href = "index.php">
                    DASHBOARD
                </a>
                <a class = "box has-background-grey has-text-white" id = "utilitarianism" href = "../html/Utilitarianism/utilitarianism.php">
                    UTILITARIANISM
                </a>
                <a class = "box has-background-grey has-text-white" id = "deontology" href = "../html/Deontology/Deontology1.php">
                    DEONTOLOGY
                </a>
                <a class = "box has-background-grey has-text-white" id = "virtue-ethics" href = "../html/VirtueEthics/VirtueEthics1.php">
                    VIRTUE ETHICS
                </a>
                <a class = "box has-background-grey has-text-white" id = "care-ethics" href = "../html/CareEthics/CareEthics.php">
                    CARE ETHICS
                </a>
                <a class = "box has-background-grey has-text-white" id = "my-progress" href = "MyProgress.php">
                    MY PROGRESS
                </a>
            </div>
        </div>
        </div>

    </body>

</html>