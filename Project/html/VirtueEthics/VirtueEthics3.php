<!--slide 30 of proposal
functionality needs to be added-->
<?php
    session_start();
    print_r($_SESSION);
?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Virtue Ethics</title>
            <link rel = "stylesheet" href = "../../styles/bulma/css/bulma.css">
        </head>
        <body>
            <h1 class = "title has-background-grey-lighter">VIRTUE ETHICS</h1>
    
            <div class = "columns">
                <div class = "column is-two-fifths">
                    <div class = "box has-background-primary">
                        <p>Consider the context. The virtues are practiced (and understood) in the context of 
                            a community. Identify the relevant virtues and vices relevant to the stakeholder
                            interests you've listed.
                        </p>
                    </div>
                
                    <div class = "box" id = "dilemma-box">
                        <h3>STAKEHOLDER INTEREST #1 </h3><textarea class = "textarea" id = "dilemma-text" placeholder = "WEALTH (10)"></textarea>
                        <form method="POST" action="../../server/virtueEthics-options.php">
                            <div>
                                <div class="box">
                                    <h2> VICE (EXCESS) - VIRTUE (MEAN) - VICE (DEFICIENCY) </h2>
                                    <label>Blind Devotion</label><input type="range" min="1" max="10" value="5" name="s1-1" id="s1-1"><label>Loyalty</label><input type="range" min="1" max="10" value="5" name="s1-1" id="s1-1"><label>Disloyalty</label>
                                </div>
                            </div>
                            <br>
                            <input type = "submit" class="button" value = "Submit">
                        </form>
                    </div>

                    <div class = "box" id = "dilemma-box">
                        <h3>STAKEHOLDER INTEREST #2 </h3><textarea class = "textarea" id = "dilemma-text" placeholder = "Prestige (7)"></textarea>
                        <form method="POST" action="../../server/virtueEthics-options.php">
                            <div>
                                <div class="box">
                                    <h2> VICE (EXCESS) - VIRTUE (MEAN) - VICE (DEFICIENCY) </h2>
                                    <label>Vanity</label><input type="range" min="1" max="10" value="5" name="s1-1" id="s1-1"><label>Self Confidence</label><input type="range" min="1" max="10" value="5" name="s1-1" id="s1-1"><label>Modesty</label>
                                </div>
                            </div>
                            <br>
                            <input type = "submit" class="button" value = "Submit">
                        </form>
                    </div>
                    
                    <div class = "box" id = "dilemma-box">
                        <h3>STAKEHOLDER INTEREST #3</h3><textarea class = "textarea" id = "dilemma-text" placeholder = "Integrity (3)"></textarea>
                        <form method="POST" action="../../server/virtueEthics-options.php">
                            <div>
                                <div class="box">
                                    <h2> VICE (EXCESS) - VIRTUE (MEAN) - VICE (DEFICIENCY) </h2>
                                    <label>Vanity</label><input type="range" min="1" max="10" value="5" name="s1-1" id="s1-1"><label>Self Confidence</label><input type="range" min="1" max="10" value="5" name="s1-1" id="s1-1"><label>Modesty</label>
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
                    <a class="button" href="VirtueEthics4.php">Proceed></a>
                </div>
            </div>
            <script src = "../../scripts/jquery-3.6.0.js"></script>
            <script src = "../../scripts/user-event.js"></script>
        </body>
    </html>