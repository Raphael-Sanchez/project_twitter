<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ze Twitteur</title>
    <link rel="stylesheet" href="ressources/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
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
    ?>
        <span id="userName">You are connected to : <?php echo $_SESSION['user']['name']; ?></span>
        <div id="myProfil"><a href="index.php?page=profil">My Profil</a></div>
        <div id="myProfil"><a href="index.php?page=logout">Logout</a></div>
        <div id="postMsg">
            <?php  
                include 'message.php'; 
            ?>
        </div>
            <h2>Tweets :</h2>
        <div id="msg-list">
            <?php  
                $getMessage = new Message($pdo);
                $tweets = $getMessage->getAllMessages();
                foreach ($tweets as $value) {
                    echo "<p>".$value['name'].": ".$value['tweet']."</p>";
                }
            ?>
        </div>
        <?php 
            } elseif (empty($_SESSION['user'])) {
                echo '<div class="box"><a href="index.php?page=registration">Registration</a></div>';
                echo '<div class="box"><a href="index.php?page=login">Login</a></div>';
            }
        ?>   
</body>
<script src="ressources/js/script.js"></script>
</html>