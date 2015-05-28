<?php 

header('Access-Control-Allow-Origin: *');

$pdo = new PDO('mysql:host=localhost;dbname=tweeter', 'root', 'root',[
            PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION
]);

$request = $pdo->prepare('SELECT tweet.id, tweet.tweet, users.name FROM tweet INNER JOIN users ON tweet.user_id = users.id ORDER BY tweet.id DESC');
		    $request->execute();
		    $result = $request->fetchAll();

		    foreach ($result as $value) {
                echo "<p>".$value['name'].": ".$value['tweet']."</p>";
            }

?>