<?php

$db = new PDO('mysql:host=127.0.0.1; dbname=demoinjection', 'root', '');

if (isset($_POST['email'])) {
	$email = $_POST['email'];

	// die($email);				// display the value of input variable $email

	$user = $db->query("SELECT * FROM users WHERE email = '{$email}'");

	if ($user->rowCount()) {
		die('Send email');
	}
}

?>

<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta characterset="UTF-8">
		<title>Reset password</title>
	</head>
	<body>
		<form action="sqlinjection.php" method="post" autocomplete="off">
			<label for="email">
				Email address
				<input type="text" name="email" id="email">
			</label>
			<input type="submit" value="Recover">
		</form>

		<h3>Example Scripts:</h3>
		<p>'; SELECT sleep(10); --</p>
		


	</body>
</html>