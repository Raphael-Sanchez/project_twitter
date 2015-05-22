<?php  
/**
* 
*/

class Twitter
{
	private $pdo;

	function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function countUserByName ($name) {
	    $request = $this->pdo->prepare('SELECT COUNT(*) AS nb_user FROM users WHERE name = :name');
	    $response = $request->execute([
	        'name' => $name
	        ]);
	    $row = $request->fetch();
	    return $row;
	}

	public function addUser($name, $password) {
	    $request = $this->pdo->prepare('INSERT INTO users (name, password) VALUES (:name, :password)');
	    $response = $request->execute([
	        'name' => $name,
	        'password' => $password
	        ]);
	}

	public function getUserByNameAndPassword($name, $password) {
	    $request = $this->pdo->prepare('SELECT id, name FROM users WHERE name = :name AND password = :password');
	    $request->execute([
	        "name" => $name,
	        "password" => sha1($password)
	        ]);
	    $user = $request->fetch();
	    return $user;
	}

	public function getUserByName($name) {
	    $request = $this->pdo->prepare('SELECT id, name FROM users WHERE name = :name');
	    $result = $request->execute([
	        'name' => $name
	        ]);
	    $user = $request->fetch();
	    return $user;
	}
	
}




 ?>