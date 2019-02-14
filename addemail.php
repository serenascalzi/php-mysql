<!doctype html>
<html>
	<head>
		<title>Make Me Elvis - Add Email</title>
	</head>
	<body>
		<h2>MakeMeElvis.com</h2>
		<?php
			$dbc = mysqli_connect('localhost', 'skscalzi', 'Alien2018!', 'elvis_store_sks') 
				or die('Error connecting to MySQL server.');

			$first_name = $_POST['firstname'];
			$last_name = $_POST['lastname'];
			$email = $_POST['email'];

			$query = "INSERT INTO email_list (first_name, last_name, email) " . 
				"VALUES ('$first_name', '$last_name', '$email')";

			mysqli_query($dbc, $query)
				or die('Error querying database.');

			echo 'Customer added.';

			mysqli_close($dbc);
		?>
	</body>
</html>
