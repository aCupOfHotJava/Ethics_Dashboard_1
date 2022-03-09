<?php
    session_start();
    print_r($_SESSION);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Care Ethics</title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel = "stylesheet" href = "../../styles/bulma/css/bulma.css">
  <link rel="stylesheet" href="../../styles/main.css">

  <style>
   
    </style>
</head>

<body>
    <h1 class = "title has-background-grey-lighter">Care Ethics</h1>
    <h2 class = "subtitle has-background-danger-light">DECISION / ACTION UNDER CONSIDERATION</h2>
    <div class = "columns">
        <div class = "column is-two-thirds">
            <div class = "box has-background-primary">
                <p>Care ethics we come to understand the right thing to do by considering how we can care for others.  
                    There are three main features of care. Attentiveness: Being aware of needs in others.  
                    Competence: The ability to deliver what is needed Responsiveness: Empathy for the position of others in need of care.</p>
            </div>
            <form  method = "POST">
            <?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/Ethics_Dashboard_1/Project/server/careEthic-options3.php');
                                    determineState();
                             ?>
            <h1 class="title is-3 has-text-centered">Option 3</h1>
            <p class="subtitle is-5 has-text-centered">I can stand up to my superiors, say no ...</p>
            <div class="box">
            <h2 class="title is-5"> Stakeholder 1- The engineer asked to design the VW defeat... </h2>
            <p>Attentiveness</p>
            <nav class="is-flex has-text-weight-bold">
                <label id="Low" class="has-text-left">Low</label>
                <label id=High class="has-text-right">High</label>
            </nav>
            <input type="range" min="1" max="10" value="5" class="slider s3" name="sliderAttentiveness3_1">
            <span class="range-value">5</span>
           
            <p>Competence</p>
            <nav class="is-flex has-text-weight-bold">
                <label id="Low" class="has-text-left">Low</label>
                <label id=High class="has-text-right">High</label>
            </nav>
            <input type="range" min="1" max="10" value="5" class="slider s3" name="sliderCompetence3_1">
            <span class="range-value">5</span>        

            <p>Responsiveness</p>
            <nav class="is-flex has-text-weight-bold">
                <label id="Low" class="has-text-left">Low</label>
                <label id=High class="has-text-right">High</label>
            </nav>
            <input type="range" min="1" max="10" value="5" class="slider s3" name="sliderResponsiveness3_1">
            <span class="range-value">5</span>
        </div>
            <br>
            <div class="box">
            <h2 class="title is-5"> Stakeholder 2- The decision makers at VW who asked...</h2>
            <p>Attentiveness</p>
            <nav class="is-flex has-text-weight-bold">
                <label id="Low" class="has-text-left">Low</label>
                <label id=High class="has-text-right">High</label>
            </nav>
            <input type="range" min="1" max="10" value="5" class="slider s3" name="sliderAttentiveness3_2">
            <span class="range-value">5</span>  
            <p>Competence</p>
            <nav class="is-flex has-text-weight-bold">
                <label id="Low" class="has-text-left">Low</label>
                <label id=High class="has-text-right">High</label>
            </nav>
            <input type="range" min="1" max="10" value="5" class="slider s3" name="sliderCompetence3_2">
            <span class="range-value">5</span>        
            <p>Responsiveness</p>
            <nav class="is-flex has-text-weight-bold">
                <label id="Low" class="has-text-left">Low</label>
                <label id=High class="has-text-right">High</label>
            </nav>
            <input type="range" min="1" max="10" value="5" class="slider s3" name="sliderResponsiveness3_2">
            <span class="range-value">5</span>   
        </div>

            <a class="button" href="CareEthics.php">Option 1</a>
            <a class="button" href="CareEthicOption2.php">Option 2</a>
 

        </div>
       
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
            <a class = "box has-background-grey has-text-white" id = "virtue-ethics" href = "../VirtueEthics/VirtueEthics1.php">
                VIRTUE ETHICS
            </a>
            <a class = "box has-background-white has-text-black" id = "care-ethics" href = "CareEthics.php">
                CARE ETHICS
            </a>
            <a class = "box has-background-grey has-text-white" id = "my-progress" href = "../MyProgress.php">
                MY PROGRESS
            </a>
        </div>  
        </div>


        <div class="box">
            <br>
            <br>
            <h1>Option 1</h1>
            <h2>Duty of Care</h2>
            <nav class="is-flex has-text-weight-bold">
                <label id="AVG" class="has-text-left">Average</label>          
            <input type="text" name="doCAVG1" class="average" value="" readonly>
            </nav>
            <br>
            <br>
            <h1>Option 2</h1>
            <h2>Duty of Care</h2>
            <nav class="is-flex has-text-weight-bold">
                <label id="AVG" class="has-text-left">Average</label>          
            <input type="text" name="doCAVG2" class="average2" value="" readonly>
            </nav>

            <br>
            <br>
            <h1>Option 3</h1>
            <h2>Duty of Care</h2>
            <nav class="is-flex has-text-weight-bold">
                <label id="AVG" class="has-text-left">Average</label>          
            <input type="text" name="doCAVG3" class="average3" value="" readonly>
            </nav>

            <br>
            <br>
                <a href= "#"><button class = "button submitpopup" name = "submit-CErange" >Submit</button>  </a>
                </form>
        </div>
        </div>
    </div>
</div>

    <script src = "../../scripts/jquery-3.6.0.js"></script>
    <script src = "../../scripts/careEthics.js?ver=0.8"></script>

</body>

</html>