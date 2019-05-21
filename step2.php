<?php
    error_reporting(0);
    session_start();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['title'] = isset($_POST['title'])? $_POST['title']: '';
        $_SESSION['type'] = isset($_POST['type'])? $_POST['type']: '';
    }

    if (!$_SESSION['title'] || !$_SESSION['type']) {
        header('location:index.php');
    }
    
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Step 2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
    <div class="container">
        <h2>Step 2</h2><hr>
        <form action="step3.php" method="post">
            <h4>Enter Location</h4>
            <input type="text" name="location" value="<?php echo isset($_SESSION['location'])? $_SESSION['location'] : '' ; ?>">
            <h4>Choose Priority</h4>
            <label>
                Low Level 
                <input type="radio" name="priority" value="Low Level" 
                    <?php echo (isset($_SESSION['priority']) && $_SESSION['priority'] == "Low Level")? 'checked' : '' ; ?>
                >
            </label><br>
            <label>
                Mid Level 
                <input type="radio" name="priority" value="Mid Level" 
                    <?php echo (isset($_SESSION['priority']) && $_SESSION['priority'] == "Mid Level")? 'checked' : '' ; ?>
                >
            </label><br>
            <label>
                High Level 
                <input type="radio" name="priority" value="High Level" 
                    <?php echo (isset($_SESSION['priority']) && $_SESSION['priority'] == "High Level")? 'checked' : '' ; ?>
                >
            </label><br>
            <input type="submit" value="Next">
        </form>
    </div>
</body>
</html>

