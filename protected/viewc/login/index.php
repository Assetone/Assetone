<?php
	if(isset($_POST["btnLogin"])) {
		Doo::loadClass('class.userMgmt');

		$userMgmt = new userMgmt();
		if($userMgmt->login($_POST["inputUsername"], $_POST["inputPassword"])) {
			header("Location: rooms/");
		} else {
			header("Location: index.php");
		}
	}
?>
<div class="content fl">
	<div class="contentbox">
		<h5>Login-Screen</h5>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" autocomplete="off">
			<input type="text" name="inputUsername" placeholder="Benutzername">
			<input type="password" name="inputPassword" placeholder="Passwort">
			<button type="submit" name="btnLogin">Einloggen</button>
		</form>
	</div>
</div>
