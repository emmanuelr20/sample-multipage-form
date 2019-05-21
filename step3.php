<?php
    error_reporting(0);
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['priority'] = isset($_POST['priority'])? $_POST['priority']: '';
        $_SESSION['location'] = isset($_POST['location'])? $_POST['location']: '';
    }

    if (!$_SESSION['priority'] || !$_SESSION['location']) {
        header('location:step2.php');
    }
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Step 3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
    <div class="container">
        <h2>Step 3</h2><hr>
        <form action="preview.php" method="post">
            <h4>Select Condition(s)</h4>
            <label>
                Registered Users only 
                <input type="checkbox" name="conditions[]"  value="Registered Users only" 
                    <?php echo (isset($_SESSION['conditions']) && in_array('Registered Users only', $_SESSION['conditions'])) ? 'checked' : '' ; ?>
                >
            </label><br>
            <label>
                User must have experience(s) 
                <input type="checkbox" name="conditions[]" value="User must have experience(s)" 
                    <?php echo (isset($_SESSION['conditions']) && in_array('User must have experience(s)', $_SESSION['conditions'])) ? 'checked' : '' ; ?>
                >
            </label><br>
            <label>
                User must be within my location 
                <input type="checkbox" name="conditions[]" value="User must be within my location" 
                    <?php echo (isset($_SESSION['conditions']) && in_array('User must be within my location', $_SESSION['conditions'])) ? 'checked' : '' ; ?>
                >
            </label><br>
            <label>
                User must be available full time 
                <input type="checkbox" name="conditions[]" value="User must be available full time" 
                    <?php echo (isset($_SESSION['conditions']) && in_array('User must be available full time', $_SESSION['conditions'])) ? 'checked' : '' ; ?>
                >
            </label><br>
            <input type="submit" value="Finish">
        </form>
    </div>
</body>
</html>