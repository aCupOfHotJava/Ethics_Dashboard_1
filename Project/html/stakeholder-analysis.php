<!-- slide 8 in the proposal
working on the stakeholder analysis page

* Needs to take and add the stakeholders from/to the stakeholders table in the database.
-->
<?php
    session_start();
    print_r($_SESSION);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Stakeholder Analysis</title>
        <meta name="author" content="">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel = "stylesheet" href = "../styles/bulma/css/bulma.css">
    </head>
    <body>
        <h1 class = "title has-background-grey-lighter">ETHICS DASHBOARD</h1>
        <h2 class = "subtitle has-background-danger-light">STAKEHOLDER ANALYSIS</h2>
        <div class = "columns">
            <div class = "column is-two-fifths">
                <div class = "box has-background-primary">
                    <p>Stakeholders are persons or groups that will be impacted by the decision/action taken. List the stakeholders and 
                        what they want in the simplest terms - wealth, social status, etc. Note: It's good to start with the decision-maker 
                        as the first stakeholder and then work out from there.
                    </p>
                </div>
                <div class = "box has-background-grey-lighter">
                    <p> STAKEHOLDER 1 <br>
                        The engineer asked to design the VW defeat device.
                    </p>
                </div>
                <div class = "box has-background-grey-lighter">
                    <p> STAKEHOLDER 2 <br>
                        The decision makers at VW who asked the engineer to create the device
                    </p>
                </div>
                <div class = "box has-background-grey-lighter">
                    <p> STAKEHOLDER 3 <br>
                        Consumers - vehicle buyers
                    </p>
                </div>
            </div>
            <div class = "column is-two-fifths">
                <div class = "box has-background-grey-lighter">
                    <p> INTERESTS <br>
                        Professional success, job security, a clear conscience
                    </p>
                </div>
                <div class = "box has-background-grey-lighter">
                    <p> INTERESTS <br>
                        Increase Profit, Satisfy Consumer needs
                    </p>
                </div>
                <div class = "box has-background-grey-lighter">
                    <p> INTERESTS <br>
                        A 'green' vehicle, a clear conscience, social status
                    </p>
                </div>
            </div>
            <div>
            <div class = "column has-fixed-size is-20">
                <a class = "box has-background-grey has-text-white" id = "dashboard" href = "index.php">
                    DASHBOARD
                </a>
                <a class = "box has-background-grey has-text-white" id = "utilitarianism" href = "Utilitarianism/utilitarianism.php">
                    UTILITARIANISM
                </a>
                <a class = "box has-background-grey has-text-white" id = "deontology" href = "Deontology/Deontology1.php">
                    DEONTOLOGY
                </a>
                <a class = "box has-background-grey has-text-white" id = "virtue-ethics" href = "VirtueEthics/VirtueEthics1.php">
                    VIRTUE ETHICS
                </a>
                <a class = "box has-background-grey has-text-white" id = "care-ethics" href = "CareEthics/CareEthics.php">
                    CARE ETHICS
                </a>
                <a class = "box has-background-grey has-text-white" id = "my-progress" href = "MyProgress.php">
                    MY PROGRESS
                </a>
            </div>
            </div>
            
        </div>
        <div class = "column is-three-fifths">
                    <div class = "box" id = "ethics-options-wrapper">
                        <p class = "heading" id = "empty">Add as many stakeholders as needed: </p>
                    </div>
                    <button class = "button" id = "add-option"> Add Stakeholder </button>
                </div>
        <script src = "../scripts/jquery-3.6.0.js"></script>
        <script src = "../scripts/user-event.js"></script>
    </body>
</html>