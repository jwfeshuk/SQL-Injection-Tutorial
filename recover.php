<?php

#$db = new PDO('mysql:host=127.0.0.1; dbname=demoinjection', 'root', '');
$db = new mysqli("localhost", "root", "", "demoinjection");

if (isset($_POST['email'])) {
	$email = $_POST['email'];

	// die($email);				// display the value of input variable $email

	$user = $db->query("SELECT * FROM users WHERE email = '{$email}'");

	#if ($user->rowCount() > 0) {
	if ($user->num_rows > 0) {
		echo ('Sent email' . '<br>');
		while ($row = $user->fetch_assoc()) {
			# printf($row['id']);
			echo "id: " . $row["id"] . " - username: " . $row["username"] . " - password: " 
			. $row["password"] . "<br>";
        }

	} else {
		echo ('Email not found!');
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
		<h2>
		Recovering Password
		</h2>

		<form action="sqlinjection.php" method="post" autocomplete="off">
			<label for="email">
				Email address
				<input type="text" name="email" id="email">
			</label>
			<input type="submit" value="Recover">
		</form>

		<h3>Example Scripts:</h3>
		<p>' or '1' = '1</p>
		<p>'; SELECT sleep(10); --</p>
		<p>'; DROP TABLE forum_topics; --</p>
		


	</body>
</html>