<!--slide 31 of proposal
functionality not added yet-->
<?php
    session_start();
    print_r($_SESSION);

    if (!isset($_SESSION["uid"])){
        header("Location: ../../login.php");  
    }

    function setAvgs1(){
        try{
            $connString = "mysql:host=lowe-walker.org;dbname=rwalker_Ethics_Dashboard_1";
            $user = "rwalker_joseph";
            $pass = "GRzQ8Gwh";
            $pdo = new PDO($connString, $user, $pass);
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $uid = $_SESSION["uid"];

            $sql1 =  "SELECT * FROM virtueEthics WHERE uid = '". $uid."'";
            $result1 = $pdo -> query($sql1);

            $isInTable = False;

            $blindDevotion = 5;
            $oversharing = 5;
            $courage = 5;

            while ($row = $result1 -> fetch()){
                $isInTable = True;

                $blindDevotion = $row['blindDevotionAvg'];
                $oversharing = $row['oversharingAvg'];
                $courage = $row['courageAvg'];

                echo '<div>
                        <div class="box">
                            <h2> O 3: COURAGE </h2>
                            <label>Virtue</label><input type="range" min="1" max="10" value="'.$courage.'" name="s1-1" id="s1-1"><label>Vice</label>
                        </div>
                    </div>
                    <br>
                    <div>
                        <div class="box">
                            <h2> O 2: OVER-SHARING </h2>
                            <label>Virtue</label><input type="range" min="1" max="10" value="'.$oversharing.'" name="s1-1" id="s1-1"><label>Vice</label>
                        </div>
                    </div>
                    <br>
                    <div>
                        <div class="box">
                            <h2> O 1: BLIND DEVOTION </h2>
                            <label>Virtue</label><input type="range" min="1" max="10" value="'.$blindDevotion.'" name="s1-1" id="s1-1"><label>Vice</label>
                        </div>
                    </div>
                    <br>';
            }

            if (!$isInTable){
                echo '<div>
                        <div class="box">
                            <h2> O 3: COURAGE </h2>
                            <label>Virtue</label><input type="range" min="1" max="10" value="'.$courage.'" name="s1-1" id="s1-1"><label>Vice</label>
                        </div>
                    </div>
                    <br>
                    <div>
                        <div class="box">
                            <h2> O 2: OVER-SHARING </h2>
                            <label>Virtue</label><input type="range" min="1" max="10" value="'.$oversharing.'" name="s1-1" id="s1-1"><label>Vice</label>
                        </div>
                    </div>
                    <br>
                    <div>
                        <div class="box">
                            <h2> O 1: BLIND DEVOTION </h2>
                            <label>Virtue</label><input type="range" min="1" max="10" value="'.$blindDevotion.'" name="s1-1" id="s1-1"><label>Vice</label>
                        </div>
                    </div>
                    <br>';
            }   
        }                
        catch(PDOException $e){
            die($e -> getMessage());
        }
    }

    function setAvgs2(){
        try{
            $connString = "mysql:host=lowe-walker.org;dbname=rwalker_Ethics_Dashboard_1";
            $user = "rwalker_joseph";
            $pass = "GRzQ8Gwh";
            $pdo = new PDO($connString, $user, $pass);
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $uid = $_SESSION["uid"];

            $sql2 =  "SELECT * FROM virtueEthics3 WHERE uid = '". $uid."'";
            $result2 = $pdo -> query($sql2);

            $isInTable = False;

            $integrity = 5;
            $prestige = 5;
            $greed = 5;

            while ($row = $result2 -> fetch()){
                $isInTable = True;

                $integrity = $row['integrityAvg'];
                $prestige = $row['prestigeAvg'];
                $greed = $row['greedAvg'];

                echo '<div>
                        <div class="box">
                            <h2> SI 2: INTEGRITY </h2>
                            <label>Virtue</label><input type="range" min="1" max="10" value="'.$integrity.'" name="s1-1" id="s1-1"><label>Vice</label>
                        </div>
                    </div>
                    <br>
                    <div>
                        <div class="box">
                            <h2> SI 2: PRESTIGE </h2>
                            <label>Virtue</label><input type="range" min="1" max="10" value="'.$prestige.'" name="s1-1" id="s1-1"><label>Vice</label>
                        </div>
                    </div>
                    <br>
                    <div>
                        <div class="box">
                            <h2> SI 1: GREED </h2>
                            <label>Virtue</label><input type="range" min="1" max="10" value="'.$greed.'" name="s1-1" id="s1-1"><label>Vice</label>
                        </div>
                    </div>
                    <br>';
            }

            if (!$isInTable){
                echo '<div>
                        <div class="box">
                            <h2> SI 2: INTEGRITY </h2>
                            <label>Virtue</label><input type="range" min="1" max="10" value="'.$integrity.'" name="s1-1" id="s1-1"><label>Vice</label>
                        </div>
                    </div>
                    <br>
                    <div>
                        <div class="box">
                            <h2> SI 2: PRESTIGE </h2>
                            <label>Virtue</label><input type="range" min="1" max="10" value="'.$prestige.'" name="s1-1" id="s1-1"><label>Vice</label>
                        </div>
                    </div>
                    <br>
                    <div>
                        <div class="box">
                            <h2> SI 1: GREED </h2>
                            <label>Virtue</label><input type="range" min="1" max="10" value="'.$greed.'" name="s1-1" id="s1-1"><label>Vice</label>
                        </div>
                    </div>
                    <br>';
            }   
        }                
        catch(PDOException $e){
            die($e -> getMessage());
        }
    }
?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Virtue Ethics - Actions</title>
            <link rel = "stylesheet" href = "../../styles/bulma/css/bulma.css">
        </head>
        <body>
            <h1 class = "title has-background-grey-lighter">VIRTUE ETHICS</h1>
    
            <div class = "columns">
                <div class = "column is-two-thirds">
                    <div class = "box has-background-primary">
                        <p> The Virtuous action is the one that balances the interests of the stakeholders in light of the relevant virtues. Note:
                            This is just a rough approximation of how Virtue Ethics can be applicaed to a particular case. Practicing the virtues 
                            is a life-long endeavor - meaning that you would evaluate success/failure in consideration of the consequences, re-evaluate 
                            your decisions and refine your understanding of the virtures actions flow from your character. 
                        </p>
                    </div>
                
                    <div class = "box has-background-grey-lighter">
                        <h1> OPTIONS RANKED BY MOST VIRTUOUS </h1>
                        <br>
                        <?php
                            setAvgs1();
                        ?>
                    </div>
    
                    <div class = "box has-background-grey-lighter">
                        <h1> INTERESTS RANKED BY MOST VIRTUOUS </h1>
                        <br>
                        <?php
                            setAvgs2();
                        ?>
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
                    <div class = "box has-background-light has-text-black" id = message>
                    <h3> ETHICAL DECISION/COURSE OF ACTION</h3>
                    <p> Sum up your analysis. Eg. Wealth and prestige were desired by the most stakeholders, but they were not the most
                        virtuous goals. Balancing the options and interests of stakeholders shows that the right things will be a combination
                        of courage, integrity, and self-confidence.
                    </p>
                    <h2> The virtuous option is Option 3. </h2>
                </div>
            </div>
            </div>
    
            <script src = "../../scripts/jquery-3.6.0.js"></script>
            <script src = "../../scripts/user-event.js"></script>
        </body>
    </html>