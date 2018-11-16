<!doctype html>
<html>
	<head>
		<title>Make Me Elvis - Remove Email</title>
	</head>
	<body>
		<h2>MakeMeElvis.com</h2>
		<?php
			$dbc = mysqli_connect('localhost', 'skscalzi', 'Alien2018!', 'elvis_store_sks') 
				or die('Error connecting to MySQL server.');

			$email = $_POST['email'];

			$query = "DELETE FROM email_list WHERE email = '$email'";

			mysqli_query($dbc, $query)
				or die('Error querying database.');

			echo 'Customer removed: ' . $email;

			mysqli_close($dbc);
		?>
	</body>
</html>
