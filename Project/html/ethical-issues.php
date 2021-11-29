<!-- See slide 5, 6 of proposal
*
*   Clicking on an ethical issue option on index.php will redirect the user
*   to this page, where the user can add an ethical issue they wish to discuss.
*   When scripting and database is set up, this page will be able to hold multiple
*   issues that a given user has worked on
*
*-->
<?php
    session_start();
    print_r($_SESSION);
?>
<!DOCTYPE html>
<hmtl>
    <head>
        <title>Ethical Issues</title>
        <link rel = "stylesheet" href = "../styles/bulma/css/bulma.css">
    </head>
    <body>
        <h1 class = "title has-background-grey-lighter">ETHICS DASHBOARD</h1>
        <h2 class = "subtitle has-background-danger-light">DECISION / ACTION UNDER CONSIDERATION</h2>
        <div class = "columns">
            <div class = "column is-two-fifths">
                <div class = "box has-background-primary">
                    <p>Describe the ethical issue or dilemma you would like to analyze. Remember, ethical values are
                    things that are important because they are right or wrong - lying, courage, loyalty, theft, etc.</p>
                </div>
                <div class = "box" id = "dilemma-box">
                    <textarea class = "textarea" id = "dilemma-text" placeholder = "Enter your dilemma here."></textarea>
                </div>
                <button class = "button" id = "add-dilemma">Submit</button>
            </div>
            <div class = "column is-two-fifths">
                <div class = "box" id = "ethics-options-wrapper">
                    <p class = "heading" id = "empty">There's nothing here. Add an option that you could solve your dilemma with:</p>
                </div>
                <button class = "button" id = "add-option">Add Option</button>
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
                    <a class = "box has-background-grey has-text-white" id = "care-ethics" href = "CareEthics.php">
                        CARE ETHICS
                    </a>
                    <a class = "box has-background-grey has-text-white" id = "my-progress" href = "MyProgress.php">
                        MY PROGRESS
                    </a>
                </div>
            </div>
        </div>

        <script src = "../scripts/jquery-3.6.0.js"></script>
        <script src = "../scripts/user-event.js"></script>
    </body>
</hmtl>