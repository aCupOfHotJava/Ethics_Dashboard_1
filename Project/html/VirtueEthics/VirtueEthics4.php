<!--slide 31 of proposal
functionality not added yet-->
<?php
    session_start();
    print_r($_SESSION);
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
                <div class = "column is-two-fifths">
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
                        <form method="POST" action="../../server/virtueEthics-options.php">
                            <div>
                                <div class="box">
                                    <h2> O 3: COURAGE </h2>
                                    <label>Virtue</label><input type="range" min="1" max="10" value="5" name="s1-1" id="s1-1"><label>Vice</label>
                                </div>
                            </div>
                            <br>
                            <div>
                                <div class="box">
                                    <h2> O 2: OVER-SHARING </h2>
                                    <label>Virtue</label><input type="range" min="1" max="10" value="5" name="s1-1" id="s1-1"><label>Vice</label>
                                </div>
                            </div>
                            <br>
                            <div>
                                <div class="box">
                                    <h2> O 1: BLIND DEVOTION </h2>
                                    <label>Virtue</label><input type="range" min="1" max="10" value="5" name="s1-1" id="s1-1"><label>Vice</label>
                                </div>
                            </div>
                            <br>
                            <input type = "submit" class="button" value = "Submit">
                        </form>
                    </div>
    
                    <div class = "box has-background-grey-lighter">
                        <h1> INTERESTS RANKED BY MOST VIRTUOUS </h1>
                        <br>
                        <form method="POST" action="../../server/virtueEthics-options.php">
                            <div>
                                <div class="box">
                                    <h2> SI 2: INTEGRITY </h2>
                                    <label>Virtue</label><input type="range" min="1" max="10" value="5" name="s1-1" id="s1-1"><label>Vice</label>
                                </div>
                            </div>
                            <br>
                            <div>
                                <div class="box">
                                    <h2> SI 2: PRESTIGE </h2>
                                    <label>Virtue</label><input type="range" min="1" max="10" value="5" name="s1-1" id="s1-1"><label>Vice</label>
                                </div>
                            </div>
                            <br>
                            <div>
                                <div class="box">
                                    <h2> SI 1: GREED </h2>
                                    <label>Virtue</label><input type="range" min="1" max="10" value="5" name="s1-1" id="s1-1"><label>Vice</label>
                                </div>
                            </div>
                            <br>
                            <input type = "submit" class="button" value = "Submit">
                        </form>
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