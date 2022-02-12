<!--THIS FILE WILL BE USED TO DISPLAY A SUMMARY OF THE USER'S ANSWERS FROM SLIDE 15 AS PICTURED IN SLIDE 16 OF THE PROPOSAL-->
<?php
    session_start();
    print_r($_SESSION);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Utilitarianism - Summary</title>
        <meta name="author" content="">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel = "stylesheet" href = "../../styles/bulma/css/bulma.css">
        <link rel="stylesheet" href="../../styles/main.css">
    </head>
    <body>
        <h1 class = "title has-background-grey-lighter">UTILITARIANISM</h1>

        <div class="columns">
            <div class="column is-two-thirds">
                <div class = "box has-background-primary">
                    <p>The last thing to consider is the type of pleasures 
                        contributing to the greatest happiness. It isn’t just how many 
                        stakeholders experience higher pleasures – you have to
                        judge how much the higher pleasure should be worth in 
                        your final analysis.</p>
                </div>

                <div class="box">
                <h1>Option 1</h1>
                <h2>Aggregate of short-term outcomes:</h2>
                <nav class="is-flex has-text-weight-bold">
                    <label id="Low" class="has-text-left">Low</label>
                    <label id=High class="has-text-right">High</label>
                </nav>
                <div class="slider">
                    <input type="range" min="1" max="10" value="5" class="slider">
                    <span class="range-value">5</span>
                </div>
                <div class=" box level">
                    <h3 class=level-item>Higher: <p class = "higher-val"> 0</p></h3>
                    <h3 class=level-item>Lower: <p class = "lower-val">0</p></h3>
                </div>
                
                <h2>Long-term outcomes:</h2>
                <nav class="is-flex has-text-weight-bold">
                    <label id="Low" class="has-text-left">Low</label>
                    <label id=High class="has-text-right">High</label>
                </nav>
                <div class="slider">
                    <input type="range" min="1" max="10" value="5" class="slider">
                    <span class="range-value">5</span>
                </div>
                <div class=" box level">
                    <h3 class=level-item>Higher: <p class = "higher-val"> 0</p></h3>
                    <h3 class=level-item>Lower: <p class = "lower-val">0</p></h3>
                </div>
                </div>

                <div class="box">
                <h1>Option 2</h1>
                <h2>Short-term outcomes:</h2>
                <nav class="is-flex has-text-weight-bold">
                    <label id="Low" class="has-text-left">Low</label>
                    <label id=High class="has-text-right">High</label>
                </nav>
                <div class="slider">
                    <input type="range" min="1" max="10" value="5" class="slider">
                    <span class="range-value">5</span>
                </div>
                <div class=" box level">
                    <h3 class=level-item>Higher: <p class = "higher-val"> 0</p></h3>
                    <h3 class=level-item>Lower: <p class = "lower-val">0</p></h3>
                </div>

                <h2>Long-term outcomes:</h2>
                <nav class="is-flex has-text-weight-bold">
                    <label id="Low" class="has-text-left">Low</label>
                    <label id=High class="has-text-right">High</label>
                </nav>
                <div class="slider">
                    <input type="range" min="1" max="10" value="5" class="slider">
                    <span class="range-value">5</span>
                </div>
                <div class=" box level">
                    <h3 class=level-item>Higher: <p class = "higher-val"> 0</p></h3>
                    <h3 class=level-item>Lower: <p class = "lower-val">0</p></h3>
                </div>
                </div>
            </div>
            <div>
            <div class="column has-fixed-size is-20">
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
                <div class="box">
                    <h2>ETHICAL DECISION/COURSE OF ACTION</h2>
                    <p class="has-text-grey-light">Sum up your analysis.  Eg.
                        Although Option 1 produces 
                        pleasures in the short-term, 
                        they are lower pleasures.  
                        Option 2 results in less overall 
                        pain and higher pleasures to 
                        the stakeholders most 
                        impacted by the issue.</p>
                        <form method="POST" action="#">
                            <textarea class = "textarea required" name="option1-2" id = "option1-2" placeholder = "Add concluding statement here."></textarea>
                            <input type = "submit" class="button" value = "Submit">
                        </form>
                </div>
                
            </div>

        </div>
    </body>
</html>