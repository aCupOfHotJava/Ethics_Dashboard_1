<?php
    session_start();
    print_r($_SESSION);
?>
<!DOCTYPE html>
<html>
    <head>
        <!--<link rel="stylesheet" href="Project/styles/main.css">-->
        <link rel = "stylesheet" href = "../styles/bulma/css/bulma.css">
        <title>My Progress</title>
        <meta name="author" content="">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        
        <h1 class = "title has-background-grey-lighter">ETHICS DASHBOARD</h1>
        
        <div class="columns">
        <div class="column is-two-fifths">
            <div class=" box has-background-grey-lighter">
                <h3>ETHICAL ISSUE & OPTIONS</h3>
                <h4>Comments Summary:</h4>
                <p>This summary lists all comments posted in-text by the marker. </p>

            </div>

            <div class=" box has-background-grey-lighter">
              <h3>Stakeholder </h3>
              <h4>Comments:</h4>
            </div>

            <div class="virtueEthics box has-background-grey-lighter">
              <h3>VIRTUE ETHICS</h3>
              <h4>Comments:</h4>
            </div>

 
        </div>

        <div class = "column is-two-fifths">
      
            <div class="deontology box has-background-grey-lighter">
              <h3>DEONTOLOGY</h3>
              <h4>Comments Summary:</h4>
          </div>

          <div class="careEthics box has-background-grey-lighter">
              <h3>CARE ETHICS</h3>
              <h4>Comments:</h4>
            </div>

            <div class="utilitarianism box has-background-grey-lighter">
                <h3>UTILITARIANISM</h3>
                <h4>Comments Summary:</h4>
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
                <p>
                  Issue & Options: 6/10
                  Stakeholders: 7.5/10
                  Utilitarianism: 12/15
                  Deontology: 0/15
                  VirtueEthics: 0/15
                  Care Ethics: 12.5/15
                </p>
              
                </a>
            </div>
            <a href="Project/html/MyProgress.php" download>
            <h3>Download Report</h3>
          </a>
        </div>
        </div>

    </body>

</html>