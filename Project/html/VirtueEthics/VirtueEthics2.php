<!-- slide 28 of proposal
functionality not added yet-->
<?php
    session_start();
    print_r($_SESSION);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Virtue Ethics </title>
        <link rel = "stylesheet" href = "../../styles/bulma/css/bulma.css">
        <style>
            .traditionsCircle {
                height: 100px;
                width: 100px;
                background-color: rgb(165, 160, 160);
                border-radius: 50%;
                display: flex;
                flex-wrap: wrap;
                align-content: center;
                color: white;
                position: relative;
                top: 300px;
                left: 50px;
            }
            .expectationsCircle {
                height: 100px;
                width: 100px;
                background-color: rgb(0, 100, 0);
                border-radius: 50%;
                display: flex;
                flex-wrap: wrap;
                align-content: center;
                color: white;
                position: relative;
                left: 350px;
                top: -30px;
            }
            .desiresCircle {
                height: 100px;
                width: 100px;
                background-color: rgb(218, 38, 38);
                border-radius: 50%;
                display: flex;
                flex-wrap: wrap;
                align-content: center;
                color: white;
                position: relative;
                left: 400px;
                top: 300px;
            }
            .conventionsCircle {
                height: 100px;
                width: 100px;
                background-color: rgb(39, 39, 219);
                border-radius: 50%;
                display: flex;
                flex-wrap: wrap;
                align-content: center;
                color: white;
                position: relative;
                left: 100px;
                top: -225px;
            }
            .attachmentsCircle {
                height: 100px;
                width: 100px;
                background-color: rgb(27, 151, 27);
                border-radius: 50%;
                display: flex;
                flex-wrap: wrap;
                align-content: center;
                color: white;
                position: relative;
                top: 90px;
                left: 150px;
            }
            .impulsesCircle {
                height: 100px;
                width: 100px;
                background-color: rgb(218, 158, 47);
                border-radius: 50%;
                display: flex;
                flex-wrap: wrap;
                align-content: center;
                color: white;
                position: relative;
                top: -190px;
                left: 450px;
            }
            .yourSoulCircle {
                height: 200px;
                width: 200px;
                background-color: rgb(255, 255, 0);
                border-radius: 50%;
                display: flex;
                flex-wrap: wrap;
                align-content: center;
                color: white;
                position: relative;
                top: -350px;
                left: 200px;
            }
        </style>
    </head>
    <body>
        <h1 class = "title has-background-grey-lighter">VIRTUE ETHICS</h1>

        <div class = "columns">
            <div class =  "column is-two-thirds">
                <div class = "box has-background-primary">
                    <p>Virtue ethics is a theory that focuses on the character of the decision maker. Building a virtuous character requires
                        practing the virtues until the moral agent knows the right thing to do in the right time in the right place in the
                        right way. To begin, one must achieve a stable equilibrium of the soul by balancing various influences - both internal
                        and external that might interfere with good judgement. Click the button to balance the balls.
                    </p>
                </div>

            <div class = "box has-background-light has-text-black" id = "circles">
                <div class = "traditionsCircle"> Traditions </div>
                <div class = "expectationsCircle"> Expectations </div>
                <div class = "desiresCircle"> Desires </div>
                <div class = "conventionsCircle"> Conventions </div>
                <div class = "attachmentsCircle"> Attachments </div>
                <div class = "impulsesCircle"> Impulses </div>
                <div class = "yourSoulCircle"> Your Soul </div>
            </div> 

            </div>

            <div>
            <div class = "column has-fixed-size is-20">
                <a class = "box has-background-grey has-text-white" id = "dashboard" href = "../index.php">
                    DASHBOARD
                </a>
                <a class = "box has-background-grey has-text-white" id = "utilitarianism" href = "../Utilitarianism/utilitarianism.php">
                    UTILITARIANISM
                </a>
                <a class = "box has-background-grey has-text-white" id = "deontology" href = "../Deontology/Deontology1.php">
                    DEONTOLOGY
                </a>
                <a class = "box has-background-white has-text-black" id = "virtue-ethics" href = "../VirtueEthics/VirtueEthics1.php">
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
                <div class = "box has-background-light has-text-black" id = "message">
                    <h3> CONGRATULATIONS! </h3>
                    <p> Your soul is now in a stable equilibrium which is essential to understanding virtue. However,
                        this achievement is fleeting. Life will constantly challenge your ability to balance the many
                        influences that will make it difficult to see the virtuous path.
                    </p>
                   
            </div>
            <a class="button" href="VirtueEthics-options.php">Proceed ></a>
            </div>
            
        </div>

        <script src = "../../scripts/jquery-3.6.0.js"></script>
        <script src = "../../scripts/user-event.js"></script>
    </body>
</html>
