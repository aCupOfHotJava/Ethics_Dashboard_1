<!-- slide 27 of the proposal
introduction to the virtue ethics 
no functionality yet-->
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
                top: 90px;
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
                left: 200px;
                top: -100px;
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
                left: 450px;
                top: 175px;
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
                left: 20px;
                top: 150px;
            }
            .attachmentsCircle {
                height: 100px;
                width: 100px;
                background-color: rgb(0, 255, 0);
                border-radius: 50%;
                display: flex;
                flex-wrap: wrap;
                align-content: center;
                color: white;
                position: relative;
                left: 450px;
                top: -300px;
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
                left: 250px;
                top: -50px;
            }
            .yourSoulCircle {
                height: 100px;
                width: 100px;
                background-color: rgb(128, 128, 128);
                border-radius: 50%;
                display: flex;
                flex-wrap: wrap;
                align-content: center;
                color: white;
                position: relative;
                left: 250px;
                top: -350px;
            }
        </style>
    </head>
    <body>
        <h1 class = "title has-background-grey-lighter">VIRTUE ETHICS</h1>

        <div class = "columns">
            <div class = "column is-two-thirds">
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
                <a class = "box has-background-grey has-text-white" id = "utilitarianism" href = "Utilitarianism/utilitarianism.php">
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
                <a class="button" href="VirtueEthics2.php">Balance ></a>
            </div>
        </div>

        <script src = "../../scripts/jquery-3.6.0.js"></script>
        <script src = "../../scripts/user-event.js"></script>
    </body>
</html>



<!--
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<style>
canvas {
    border:1px solid #d3d3d3;
    background-color: #f1f1f1;
}
</style>
</head>
<!DOCTYPE html>  
<html> 
<head> 

</head> 
<body> 
<canvas id="canvas" width="640" height="480"></canvas> 
<script> 
 
</script> 
</body> 


</html>
-->

<!--
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<style>
canvas {
    border:1px solid #d3d3d3;
    background-color: #f1f1f1;
}
</style>
</head>
<!DOCTYPE html>  
<html> 
<head> 

</head> 
<body> 
<canvas id="canvas" width="640" height="480"></canvas> 
<script> 
 
</script> 
</body> 


</html>
-->
