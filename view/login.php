<?php
    if ((isset($_POST['pseudo']) || isset($_POST['password']))) {
        $functions = New Twitter($pdo);
        $resultUser = $functions->getUserByNameAndPassword($_POST['pseudo'], $_POST['password']);
        
        // VERIFIE EN BASE DE DONNEE SI LE NOM POSTÉ ET LE PASSWORD SONT DEJA ENREGISTREE 
        if (!empty($resultUser)) {
                $_SESSION['user'] = $resultUser;
                header('Location: index.php?page=home');
                exit;
            // SI OUI ALORS ON ENREGISTRE L'ID ET LE NOM DANS LE $_SESSION ET ON REDIRIGE TOUT CA VERS LA HOME 
        } else {
            echo '<span class="msg">Pseudo or password are wrong !</span>';
        }
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="ressources/css/style.css">
</head>
<body>
    <div id="barHeader">
        <a href="index.php?page=home">
            <div id="logo">Login
            </div>
        </a>
    </div>
    <br/>
        <?php
            if (isset($_SESSION['alert'])) {
        ?>
            <div class="alert">
        <?php echo $_SESSION['alert']; ?>
            </div>
        <?php
        unset($_SESSION['alert']);
        }
        ?>
        <div class="box">
            <form action="index.php?page=login" method="POST">
                <label for="pseudo">Name :</label>
                <input type="text" required="required" placeholder="Ex : Ares77" name="pseudo" id="pseudo">
                <br/>
                <label for="password">Password :</label>
                <input type="password" required="required" placeholder="Password" name="password" id="password">
                <br/>
                <input type="submit" value="Connection">
            </form>
        </div>
</body>
</html>