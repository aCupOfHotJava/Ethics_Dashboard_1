<!DOCTYPE html>
<html>
    <?php
        try {
            echo "test";
        }
        catch(PDOException $e) {
            die($e -> getMessage());
        }
    ?>
</html>