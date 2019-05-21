<?php
    error_reporting(0);
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Step 1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
    <div class="container">
        <?php if (isset($_SESSION['error'])) { ?>
        <div class="error-content">
            <?php echo $_SESSION['error']; ?>
        </div>
        <?php 
            }
            unset($_SESSION['error']);
        ?>
        <h2>Step 1</h2><hr>
        <form action="step2.php" method="post">
            <h4>Enter Title</h4>
            <input type="text" name="title" value="<?php echo isset($_SESSION['title'])? $_SESSION['title'] : '' ; ?>">
            <h4>Choose Type</h4>
            <label>
                Product 
                <input type="radio" name="type" value="Product" 
                    <?php echo (isset($_SESSION['type']) && $_SESSION['type'] == "Product")? 'checked' : '' ; ?>
                >
            </label><br>
            <label>
                Service 
                <input type="radio" name="type" value="Service" 
                    <?php echo (isset($_SESSION['type']) && $_SESSION['type'] == "Service")? 'checked' : '' ; ?>
                >
            </label><br>
            <label>
                Both 
                <input type="radio" name="type" value="Both" 
                    <?php echo (isset($_SESSION['type']) && $_SESSION['type'] == "Both")? 'checked' : '' ; ?>
                >
            </label><br>
            <input type="submit" value="Next">
        </form>
    </div>
</body>
</html>