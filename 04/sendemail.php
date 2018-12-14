<!doctype html>
<html>
	<head>
		<title>Make Me Elvis - Send Email</title>
	</head>
	<body>
		<h2>MakeMeElvis.com</h2>
		<?php
			if (isset($_POST['submit'])) {
				$from = 'serenascalzi@yahoo.com';
				$subject = $_POST['subject'];
				$text = $_POST['elvismail'];
				$output_form = false;

				if (empty($subject) && empty($text)) {
					echo 'You forgot the email subject and body text<br />';
					$output_form = true;
				}
				if (empty($subject) && (!empty($text))) {
					echo 'You forgot the email subject<br />';
					$output_form = true;
				}
				if ((!empty($subject)) && empty($text)) {
					echo 'You forgot the email body text<br />';
					$output_form = true;
				}
				if ((!empty($subject)) && (!empty($text))) {
					$dbc = mysqli_connect('localhost', 'skscalzi', 'Alien2018!', 'elvis_store_sks') 
						or die('Error connecting to MySQL server.');

					$query = "SELECT * FROM email_list";
					$result = mysqli_query($dbc, $query)
						or die('Error querying database.');

					while($row = mysqli_fetch_array($result)) {
						$to = $row['email'];
						$first_name = $row['first_name'];
						$last_name = $row['$last_name'];
						$msg = "Dear $first_name $last_name, \n $text";
						mail($to, $subject, $msg, 'From:' . $from);
						echo 'Email sent to: ' . $to . '<br />';
					}
					mysqli_close($dbc);
				}

			}
			else {
				$output_form = true;
			}
			if ($output_form) {
		?>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<label for="subject">Subject of email:</label><br />
				<input id="subject" name="subject" type="text" size="30" value="<?php echo $subject; ?>" /><br />
				<label for="elvismail">Body of email:</label><br />
				<textarea id="elvismail" name="elvismail" rows="8" cols="40"><?php echo $text; ?></textarea><br />
				<input type="submit" name="submit" value="Submit" />
			</form>	
		<?php	
			}
		?>
	</body>
</html>
