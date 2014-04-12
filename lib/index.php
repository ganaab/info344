<html>
 <head>
  <title>NBA Player Statistics</title>
  	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	 <!-- hot link to Bootstrap stylesheet -->
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<!-- tells the browser to get style information from styles.css in our 'css' sub-directory -->
	<link rel="stylesheet" href="../css/style.css">
 </head>
 <body>
 <div class="searchArea">
 <form action="index.php" method="post">
 	Enter Name:	<input name="name" type="text">
 	<input type="submit">
 </form>
</div>

<div class="resultArea">
	<?php
	$name = $_POST["name"];
 	$username = 'ganaab';
 	$password = '10023991fedran';
		try {

			$conn = new PDO('mysql:host=info344.c7bq6jjmbyw1.us-west-2.rds.amazonaws.com;dbname=nba', $username, $password);

			$stmt = $conn->prepare("SELECT * FROM nbaTable WHERE playerName LIKE :name");

			$stmt->execute(array('name' => '%'.$name.'%'));

			foreach ($stmt as $row ){
				echo '<pre>';
				echo '<h1>';
					print "Player Name";
					echo '<br>';
					print_r($row[0]);
				echo '</h1>';
				echo '<h1>';
					print "GP";
					echo '<br>';
					print_r($row[1]);
				echo '</h1>';
				echo '<h1>';
					print "FGP";
					echo '<br>';
					print_r($row[2]);
				echo '</h1>';
				echo '<h1>';
					print "TPP";
					echo '<br>';
					print_r($row[3]);
				echo '</h1>';
				echo '<h1>';
					print "FTP";
					echo '<br>';
					print_r($row[4]);
				echo '</h1>';
				echo '<h1>';
					print "PPG";
					echo '<br>';
					print_r($row[5]);
				echo '</h1>';
				echo '</pre>';
			}

		} catch(PDOException $e) {

		                echo 'ERROR: ' . $e->getMessage();

		}
 	?>
</div>
 </body>
</html>