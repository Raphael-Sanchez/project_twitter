<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My Profil</title>
	<link rel="stylesheet" href="twitter.css">
</head>
<body>
	<div id="barHeader">
        <a href="index.php?page=home">
            <div id="logo">My Profil
            </div>
        </a>
    </div>
    <?php 

    echo '<div id="postMsg">';
    echo '<br>';
    echo '<h2>My Tweets :</h2>';
    echo "<br/>";

    $getMsgProfil = New Message($pdo);
    $result = $getMsgProfil->getMessagesByUser($_SESSION['user']['id']);
    foreach ($result as $value) {
        echo "<p>".$value['tweet']."</p>";  
    }

    echo "</div>";
    
     ?>
</body>
</html>