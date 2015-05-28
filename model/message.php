<?php 

class Message
{
	private $pdo;

	function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function getAllMessages() {
		    // affiche tout les tweet de tweet 
		    $request = $this->pdo->prepare('SELECT tweet.id, tweet.tweet, users.name FROM tweet INNER JOIN users ON tweet.user_id = users.id ORDER BY tweet.id DESC');
		    $request->execute();
		    return $request->fetchAll();   
		}

	public function getMessagesByUser($user_id) {
		// retourne tous les messages de l’user
		$request = $this->pdo->prepare('SELECT * FROM tweet WHERE user_id = :id');
		$request->execute(["id" => $user_id]);
		return $request->fetchAll();
	}

	public function addMessage($user_id, $message) {
	    $request = $this->pdo->prepare('INSERT INTO tweet (tweet, user_id) VALUES (:tweet, :user_id)');
	    $request->execute([
	        'tweet' => $message,
	        'user_id' => $user_id
	        ]);
	}

}

 ?>