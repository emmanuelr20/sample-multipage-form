<?php
    error_reporting(0);
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['conditions'] = isset($_POST['conditions'])? $_POST['conditions']: '';
    }

    if (!$_SESSION['conditions']) {
        header('location:step3.php');
    }
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Preview</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <div class="container">
        <h2>Preview</h2><hr>
        <p><strong>Title: </strong> <?php echo $_SESSION['title']; ?></p>
        <p><strong>Type: </strong> <?php echo $_SESSION['type']; ?></p>
        <p><strong>Priority: </strong> <?php echo $_SESSION['priority']; ?></p>
        <p><strong>Location: </strong> <?php echo $_SESSION['location']; ?></p>
        <p><strong>Conditions: </strong></p>
        <ul>
            <?php for ($i=0; $i < count($_SESSION['conditions']); $i++) { ?>
                <li> <?php echo $_SESSION['conditions'][$i]; ?></li>
            <?php } ?>
        </ul>
        <form action="final.php" method="POST">
            <input type="submit" value="Confirm">
        </form>
    </div>
</body>
</html>