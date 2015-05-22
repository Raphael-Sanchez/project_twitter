<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ze Twitteur</title>
    <link rel="stylesheet" href="twitter.css">
</head>
<body>
    <div id="barHeader">
        <a href="index.php?page=home">
            <div id="logo">Ze Twitteur
            </div>
        </a>
    </div>
    <br/>
    <?php
        if (empty($_SESSION['user']) == false) {
            echo '<span id="userName">You are connected to : '.$_SESSION['user']['name'].'</span>'; 
            echo '<div id="myProfil"><a href="index.php?page=profil">My Profil</a></div>';
            echo '<div id="myProfil"><a href="logout.php">Logout</a></div>';
            echo '<div id="postMsg">';

            include 'message.php';
            
            echo '<br>';
            echo '<h2>Tweets :</h2>';
            echo "<br/>";

            $getMessage = new Message($pdo);
            $tweets = $getMessage->getAllMessages();
            foreach ($tweets as $value) {
                echo "<p>".$value['name'].": ".$value['tweet']."</p>";
            }

            echo '</div>';
        } elseif (empty($_SESSION['user'])) {
            echo '<div class="box"><a href="index.php?page=registration">Registration</a></div>';
            echo '<div class="box"><a href="index.php?page=login">Login</a></div>';
        }
    ?>
</body>
</html>