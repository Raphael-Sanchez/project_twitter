<?php
    if ((isset($_POST['pseudo']) || isset($_POST['password']))) {
        $row = new Twitter($pdo);
        $rowResult = $row->countUserByName($_POST['pseudo']);
        // COMPTE DANS LA BASE DE DONNEE TOUT LES LES NOMS QUI CORRESPONDE AU PSEUDO POSTÉ

    if ($rowResult['nb_user'] > 0) {
        echo '<span class="msg">Pseudo already taken, choose another !</span>';
        // SI IL EST PRIS IL ECHO ÇA 

    } else {
        $newUser = new Twitter($pdo);
        $newUser->addUser($_POST['pseudo'], sha1($_POST['password']));
        $getUserForSession = new Twitter($pdo);
        $_SESSION['user'] = $getUserForSession->getUserByName($_POST['pseudo']);
        header('location: index.php?page=home');
        exit; 
        // SINON IL ENREGISTRE LE NAME ET LE PASSWORD EN BASE DE DONNEE 
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="twitter.css">
</head>
<body>
    <div id="barHeader">
        <a href="index.php?page=home">
            <div id="logo">Registration
            </div>
        </a>
    </div>
    <br>
    <div class="box">
        <form action="index.php?page=registration" method="POST">
            <label for="pseudo">Name :</label>
            <input type="text" required="required" placeholder="Ex : Ares77" name="pseudo" id="pseudo">
            <br/>
            <label for="password">Password :</label>
            <input type="password" required="required" placeholder="Password" name="password" id="password">
            <br/>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>