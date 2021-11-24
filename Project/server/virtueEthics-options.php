<!-- for virtue ethics options page, not completed yet-->

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
                    <a class=\"button\" href ='../html/VirtueEthics/VirtueEthics-options.html'>Submit</a>
                    ";
            }
        
        ?>
    </body>

</html>