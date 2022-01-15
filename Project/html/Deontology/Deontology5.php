<!--NEEDS SOME ADDED STYLING-->
<?php
    session_start();
    print_r($_SESSION);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Deontology</title>
        <link rel = "stylesheet" href = "../../styles/bulma/css/bulma.css">
    </head>
    <body>
        <h1 class = "title has-background-grey-lighter">Deontology</h1>

        <div class = "columns">
            <div class = "column is-two-thirds">
                <div class = "box has-background-primary">
                    <p>TESTING CATEGORICAL IMPERATIVES</p>
                </div>

                <form method = "POST" action = "" id = "">
                    <div class = "options">
                        <div class = "box" id = "dilemma-box">
                            <h3>Describe the moral issues governing the decision described 
                                in Option 2.  </h3>
                            <textarea class = "textarea required" name="option1-2" id = "option1-2" placeholder = "Cheating is wrong and should be exposed. Blowing the whistle is the right thing to do because I will be revealing the truth about what is going on."></textarea>
                        </div>

                        <div class = "box" id = "dilemma-box">
                            <h3>Define the moral law(s) that govern the actions you will 
                                take if you choose Option 2.</h3>
                                <textarea class = "textarea required" name="option2-1" id = "option2-1" placeholder = "Moral Law 1:  Cheating is wrong."></textarea>
                                <br>
                                <textarea class = "textarea required" name="option2-2" id = "option2-2" placeholder = "Moral Law 2:  Revealing the truth is right."></textarea>
                                <br>
                                <textarea class = "textarea required" name="option2-3" id = "option2-3" placeholder = "Moral Law 3:  Honesty is right."></textarea>
                                <br>
                        </div>
                        <!-- feedback suggests we should only have
                            one next/submit button that accomplished
                            both tasks. just going to comment this
                            out for the peer testing on friday -->
                        <!-- <input type = "submit" class="button" value = "Submit"> -->
                    </div>
                </form>
            </div>
            <div>
            <div class = "column has-fixed-size is-20">
                <a class = "box has-background-grey has-text-white" id = "dashboard" href = "../index.php">
                    DASHBOARD
                </a>
                <a class = "box has-background-grey has-text-white" id = "utilitarianism" href = "../Utilitarianism/utilitarianism.php">
                    UTILITARIANISM
                </a>
                <a class = "box has-background-white has-text-black" id = "deontology" href = "../Deontology/Deontology1.php">
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
            <!-- feedback suggests we should only have
                one next/submit button that accomplished
                both tasks -->
            <a class="button" href="../Deontology/Deontology6.php">Next</a>
        </div>
        <script src = ""></script>
    </body>
</html>