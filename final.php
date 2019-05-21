<?php 
error_reporting(0);
session_start();

$pdo = new PDO("sqlite:sqlite.db");

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
$pdo->exec("CREATE TABLE IF NOT EXISTS data_items (
    id INTEGER PRIMARY KEY, 
    title TEXT NOT NULL,  
    type TEXT NOT NULL,  
    location TEXT NOT NULL,  
    priority TEXT NOT NULL,  
    conditions TEXT 
)");

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $insert = "INSERT INTO data_items (title, location, priority, type, conditions) 
                    VALUES (:title, :location, :priority, :type, :conditions)";

    $stmt = $pdo->prepare($insert);

    $stmt->bindParam(':title', $_SESSION['title']);
    $stmt->bindParam(':location', $_SESSION['location']);
    $stmt->bindParam(':priority', $_SESSION['priority']);
    $stmt->bindParam(':type', $_SESSION['type']);
    $stmt->bindParam(':conditions', json_encode($_SESSION['conditions']));


    try {
        $stmt->execute();
        session_destroy();
    }
    catch (Exception $e) {
        $_SESSION['error'] = "Fill all fields";
        header('location:index.php');
    }
}


$stmt = $pdo->prepare('SELECT * FROM data_items');

$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Preview</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
    <div class="container">
        <h2>All Entries</h2><hr>
        <?php for ($i=0; $i < count($data); $i++) { ?> 
            <div class="card">
                <p><strong>Title: </strong> <?php echo $data[$i]['title']; ?></p>
                <p><strong>Type: </strong> <?php echo $data[$i]['type']; ?></p>
                <p><strong>Priority: </strong> <?php echo $data[$i]['priority']; ?></p>
                <p><strong>Location: </strong> <?php echo $data[$i]['location']; ?></p>
                <p><strong>Conditions: </strong></p>
                <ul>
                    <?php 
                        $conditions = json_decode($data[$i]['conditions']);
                        for ($j=0; $j < count($conditions); $j++) { 
                    ?>
                        <li> <?php echo $conditions[$j]; ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
    </div>
</body>
</html>