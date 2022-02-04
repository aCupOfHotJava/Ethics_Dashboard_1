<!--NEEDS A WAY OF SUBMITTING USER ANSWERS
    NEED TO BE ABLE TO MOVE THE STAKEHOLDERS UP AND DOWN IN ORDER TO RANK THEM-->
<?php
    session_start();
    print_r($_SESSION);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Utilitarianism - Stakeholders</title>
        <link rel = "stylesheet" href = "../../styles/bulma/css/bulma.css">
    </head>
    <body>
        <h1 class = "title has-background-grey-lighter">UTILITARIANISM</h1>

        <div class = "columns">
            <div class = "column is-two-fifths">
                <div class = "box has-background-primary">
                    <p>Provide reasons why you have included each stakeholder. Move stakeholders up or down to rank according to the degree of impact. 
                        (Stakeholder 1 experiences the highest impact) Note: You may want to removed stakeholders if you can’t identify how they will 
                        be impacted or if there is very little impact.  Also, you may add stakeholders at any time.</p>
                </div>
            
                <div class = "box" id = "dilemma-box">
                    <h3>Stakeholder 1</h3>
                    <p>The engineer asked to design the VW defeat... </p>
                    <textarea class = "textarea" id = "dilemma-text" placeholder = "The engineer is directly, and significantly, impacted by the issue.  They could lose their job at VW, lose industry friends and suffer career set backs. "></textarea>
                </div>
                <div class = "box" id = "dilemma-box">
                    <h3>Stakeholder 2</h3>
                    <p>The decision makers at VW who asked...</p>
                    <textarea class = "textarea" id = "dilemma-text" placeholder = "Defend the inclusion of Stakeholder 2 –Rank by degree of impact"></textarea>
                </div>
                <div class = "box" id = "dilemma-box">
                    <h3>Stakeholder 3</h3>
                    <p>Consumers –vehicle buyers...</p>
                    <textarea class = "textarea" id = "dilemma-text" placeholder = "Defend the inclusion of Stakeholder 3 –Rank by degree of impact"></textarea>
                </div>
                <button class = "button">Submit</button>
            </div>

            <div class = "column is-two-fifths">
                <div class = "box" id = "ethics-options-wrapper">
                    <p class = "heading" id = "empty">Add Stakeholder</p>
                </div>
                <button class = "button" id = "add-option">Add</button>
            </div>
            <div>
            <div class = "column has-fixed-size is-20">
                <a class = "box has-background-grey has-text-white" id = "dashboard" href = "../index.php">
                    DASHBOARD
                </a>
                <a class = "box has-background-white has-text-black" id = "utilitarianism" href = "../Utilitarianism/utilitarianism.php">
                    UTILITARIANISM
                </a>
                <a class = "box has-background-grey has-text-white" id = "deontology" href = "../Deontology/Deontology1.php">
                    DEONTOLOGY
                </a>
                <a class = "box has-background-grey has-text-white" id = "virtue-ethics" href = "../VirtueEthics/VirtueEthics1.php">
                    VIRTUE ETHICS
                </a>
                <a class = "box has-background-grey has-text-white" id = "care-ethics" href = "../CareEthics/CareEthics.php">
                    CARE ETHICS
                </a>
                <a class = "box has-background-grey has-text-white" id = "my-progress" href = "../MyProgress.php">
                    MY PROGRESS
                </a>
                </div>
                </div>
                </div>
                <a class="button" href="utilitarianism-analysis/utilitarianism-analysis1.php">Proceed to Analysis ></a>
            </div>
        </div>

        <script src = "../../scripts/jquery-3.6.0.js"></script>
        <script src = "../../scripts/user-event.js?ver=0.1"></script>
    </body>
</html>