<?php
#$db = new PDO('mysql:host=127.0.0.1; dbname=demoinjection', 'root', '');
$db = new mysqli("localhost", "root", "", "demoinjection");

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    # die($username . $password);

    // die($email);				// display the value of input variable $email

	$user = $db->query("SELECT * FROM login_info WHERE username = '{$username}' && password = '{$password}'");

	if ($user->num_rows > 0) {
        while ($row = $user->fetch_assoc()) {
            echo "id: " . $row["id"] . " - username: " . $row["username"] . " - password: " . $row["password"] . "<br>";
        }
	}
}

?>


<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta characterset="UTF-8">
		<title>Login</title>
	</head>

	<body>
		<form action="login.php" method="post" autocomplete="off">
            <label for="username">
				Username
				<input type="text" name="username" id="username">
			</label>
            
            <label for="password">
				Password
				<input type="text" name="password" id="password">
			</label>
			
            <input type="submit" value="Login">
		</form>

		<h3>Example Scripts:</h3>

        <p>' or '1' = '1 [insert both fields]<p>
        <p>' or '1' = '1'; -- [or simply insert into username] </p>

		<p>'; SELECT sleep(10); --</p>
		<p>'; DROP TABLE forum_topics; --</p>


	</body>
</html>