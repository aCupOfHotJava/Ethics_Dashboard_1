<?php
    session_start();
    print_r($_SESSION);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Create Account</title>
        <meta name="author" content="">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel = "stylesheet" href = "../styles/bulma/css/bulma.css">
    </head>
    <body>
        <h1 class = "title has-background-grey-lighter">
            USER ACCOUNT CREATION
        </h1>
        <div class = "columns is-centered">
            <div class = "column is-half">
                <div class = "box">
                    <form action = "../server/createAccount.php" method = "POST"
                            id = "create-form">
                        Student ID:
                        <br/>
                        <input type = "text" name = "form-uid" class = "required"/>
                        <br/>
                        <p class = "error-message">
                            Must be an 8-digit number
                        </p>
                        <br/>
                        Password:
                        <br/>
                        <input type = "text" name = "form-pid" class = "required"/>
                        <br/>
                        <p class = "error-message">
                            Must be 1-16 characters
                        </p>
                        <br/>
                        Password Again:
                        <br/>
                        <input type = "text" name = "assertPid" class = 
                                "required"/>
                        <br/>
                        <p class = "error-message">
                            Passwords must match!
                        </p>
                        <br/>
                        <input type = "submit" value = "Create Account">
                    </form>
                </div>
            </div>
        </div>
        <script src = "../scripts/jquery-3.6.0.js"></script>
        <script src = "../scripts/validate-acc-create.js"></script>
    </body>
</html>