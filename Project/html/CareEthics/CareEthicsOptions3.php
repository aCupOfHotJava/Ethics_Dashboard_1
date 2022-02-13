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
            <h1 class="title is-3 has-text-centered">Option 3</h1>
            <p class="subtitle is-5 has-text-centered">I can stand up to my superiors, say no ...</p>
            <div class="box">
            <h2 class="title is-5"> Stakeholder 1- The engineer asked to design the VW defeat... </h2>
            <p>Attentiveness</p>
            <nav class="is-flex has-text-weight-bold">
                <label id="Low" class="has-text-left">Low</label>
                <label id=High class="has-text-right">High</label>
            </nav>
          
          
            <input type="range" min="1" max="10" value="5" class="slider" id="Stakeholer1-1">
            <span class="range-value">5</span>
           
            <p>Competence</p>
            <nav class="is-flex has-text-weight-bold">
                <label id="Low" class="has-text-left">Low</label>
                <label id=High class="has-text-right">High</label>
            </nav>
            <input type="range" min="1" max="10" value="5" class="slider" id="Stakeholer1-1">
            <span class="range-value">5</span>        
            <p>Responsiveness</p>
            <nav class="is-flex has-text-weight-bold">
                <label id="Low" class="has-text-left">Low</label>
                <label id=High class="has-text-right">High</label>
            </nav>
            <input type="range" min="1" max="10" value="5" class="slider" id="Stakeholer1-1">
            <span class="range-value">5</span></div>
            <br>
            <div class="box">
            <h2 class="title is-5"> Stakeholder 2- The decision makers at VW who asked...</h2>
            <p>Attentiveness</p>
            <nav class="is-flex has-text-weight-bold">
                <label id="Low" class="has-text-left">Low</label>
                <label id=High class="has-text-right">High</label>
            </nav>
            <input type="range" min="1" max="10" value="5" class="slider" id="Stakeholer1-1">
            <span class="range-value">5</span>  
            <p>Competence</p>
            <nav class="is-flex has-text-weight-bold">
                <label id="Low" class="has-text-left">Low</label>
                <label id=High class="has-text-right">High</label>
            </nav>
            <input type="range" min="1" max="10" value="5" class="slider" id="Stakeholer1-1">
            <span class="range-value">5</span>        
            <p>Responsiveness</p>
            <nav class="is-flex has-text-weight-bold">
                <label id="Low" class="has-text-left">Low</label>
                <label id=High class="has-text-right">High</label>
            </nav>
            <input type="range" min="1" max="10" value="5" class="slider" id="Stakeholer1-1">
            <span class="range-value">5</span></div>
            <a href= "CareEthics.php"><button class = "button" id = "option1" >Option 1</button>  </a>
            <a href= "CareEthicOption2.php"><button class = "button" id = "option2" >Option 2</button>  </a>

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
            <a class = "box has-background-grey has-text-white" id = "virtue-ethics" href = "../VirtueEthics/VirtueEthics1.php">
                VIRTUE ETHICS
            </a>
            <a class = "box has-background-white has-text-black" id = "care-ethics" href = "CareEthics.php">
                CARE ETHICS
            </a>
            <a class = "box has-background-grey has-text-white" id = "my-progress" href = "../MyProgress.php">
                MY PROGRESS
            </a>
        <!-- FIX THIS WALL OF DIVS SOMETIME
            I think that some divs above weren't closed but this
            is a really quick fix so that the nav panel has an appropriate
            size consistent with the other pages. Also necessary to get the
            sliders (coded below) to appear at the bottom of the page, instead
            of being connected to the nav panel like they were before. -->
        </div>
        </div>

            <div class="box">
            <h1>Option 1</h1>
            <h2>Duty of Care</h2>
            <nav class="is-flex has-text-weight-bold">
                <label id="Low" class="has-text-left">Low</label>
                <label id=High class="has-text-right">High</label>
            </nav>
            <div class="slider">
            <input type="range" min="1" max="10" value="5" class="slider">
            <span class="range-value">5</span></div>
            
            <h1>Option 2</h1>
            <h2>Duty of Care</h2>
            <nav class="is-flex has-text-weight-bold">
                <label id="Low" class="has-text-left">Low</label>
                <label id=High class="has-text-right">High</label>
            </nav>
            <div class="slider">
            <input type="range" min="1" max="10" value="5" class="slider">
            <span class="range-value">5</span></div>

            <h1>Option 3</h1>
            <h2>Duty of Care</h2>
            <nav class="is-flex has-text-weight-bold">
                <label id="Low" class="has-text-left">Low</label>
                <label id=High class="has-text-right">High</label>
            </nav>
            <div class="slider">
            <input type="range" min="1" max="10" value="5" class="slider">
            <span class="range-value">5</span></div>
            <input type="text" class="average" name="" id="" value="" size="30">
        </div>
        </div>
    </div>
    <script src = "../../scripts/jquery-3.6.0.js"></script>
    <script src = "../../scripts/careEthics.js"></script>

</body>

</html>