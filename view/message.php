<?php
  if (isset($_POST['message'])) {
  	$userAddMsg = New Message($pdo);
  	$userAddMsg->addMessage($_SESSION['user']['id'], $_POST['message']);
  }
?>
<fieldset>
    <form method="POST" action="index.php?page=home">
        <label for="msg">Message :</label>
        <input type="text" placeholder="Hello, how are you today?" name="message" id="msg" size="100" required="required">
        <input type="submit" value="Post A Message">
    </form>
</fieldset>
