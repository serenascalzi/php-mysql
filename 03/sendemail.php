<!doctype html>
<html>
	<head>
		<title>Make Me Elvis - Send Email</title>
	</head>
	<body>
		<h2>MakeMeElvis.com</h2>
		<?php
			$from = 'serenascalzi@yahoo.com';

			$subject = $_POST['subject'];

			$text = $_POST['elvismail'];

			$dbc = mysqli_connect('localhost', 'skscalzi', 'Alien2018!', 'elvis_store_sks') 
				or die('Error connecting to MySQL server.');

			$query = "SELECT * FROM email_list";
			$result = mysqli_query($dbc, $query)
				or die('Error querying database.');

			while($row = mysqli_fetch_array($result)) {
				$first_name = $row['first_name'];
				$last_name = $row['$last_name'];

				$msg = "Dear $first_name $last_name, \n $text";

				$to = $row['email'];

				mail($to, $subject, $msg, 'From:' . $from);

				echo 'Email sent to: ' . $to . '<br />';
			}

			mysqli_close($dbc);
		?>
	</body>
</html>
