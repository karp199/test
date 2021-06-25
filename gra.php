<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="stylesheet" href="style.css">
</head>

<body>

<?php

	echo "<p text align=".'right'.">Witaj ".$_SESSION['user'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>';
	
	
?>
<center>
<h3 class="button">Panel zarządzania bazą danych</h3><br>
<a href="dodaj.php">Dodaj nową kartę graficzną do bazy</a><br></br>
<a href="edytuj.php">Edytuj kartę graficzną w bazie danych</a><br></br>
<a href="usun.php">Usuń kartę graficzną z bazy danych</a>
</center>
</body>
</html>