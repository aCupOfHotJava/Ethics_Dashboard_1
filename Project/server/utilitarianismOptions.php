<!--THIS PAGE IS NOT DONE YET - IT WILL STORE THE USER'S ANSWERS IN THE APPROPRIATE DATABASE AND 
                    REDIRECT THEY BACK TO THE UTILITRIANISM.HTML PAGE-->

<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" href = "../styles/bulma/css/bulma.css">
    </head>
    <body>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){                
                echo "
                    <h3>Submission Successful!</h3>
                    <a class=\"button\" href ='../html/Utilitarianism/utilitarianism-stakeholders.html'>Proceed to Stakeholders</a>
                    ";
            }
        
        ?>
    </body>

</html>