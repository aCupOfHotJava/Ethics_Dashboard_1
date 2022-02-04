<!-- 
*       This is the login page that any user must complete before accessing
*       anything other than the login page or the index page that holds
*       all other groups projects
*
*       DO NOT start session on this page
*
-->

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel = "stylesheet" href = "../styles/bulma/css/bulma.css">
    </head>
    <body>
        <h1 class = "title has-background-grey-lighter">
            USER LOGIN PAGE
        </h1>
        <div class = "columns is-centered">
            <div class = "column is-half">
                <div class = "box">
                    <form action = "../server/processLogin.php" method = "POST"
                            id = "login-form">
                        User ID:
                        <br/>
                        <input type = "text" name = "form-uid" class = "required" id = "form-uid"/>
                        <br/>
                        <p id = "error0">
                            Must be an 8-digit number
                        </p>
                        <br/>
                        Password:
                        <br/>
                        <input type = "text" name = "form-pid" class = "required" id = "form-pid"/>
                        <br/>
                        <p id = "error1">
                            Must be 1-16 characters
                        </p>
                        <br/>
                        <input type = "submit" value = "Login">
                    </form>
                </div>
                <a href = "create-account.php">Create Account</a>
            </div>
        </div>
        <script src = "../scripts/jquery-3.6.0.js"></script>
        <script src = "../scripts/validate-login.js"></script>
    </body>
</html>