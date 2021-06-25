<?php

	if (isset($_POST['id'])) {

		$dalej = true;
		$id = $_POST['id'];
		$zdjecie = $_POST['zdjecie'];

		if (!unlink( $zdjecie )){
			$error['zdjecie'] = '<p>Nie udało się usunąć zdjęcia. Rekord nie został usunięty</p>';
			$dalej = false;
		}

		if ($dalej == true) {
			require_once('db.php');
			$connection->query("DELETE FROM `sklep`.`produkty` WHERE `produkty`.`id` = '".$id."'");
			header('location:usun1.php');
		}
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<center>
		<div id="menu">

			
				<h3 class="button">Produkty</h3>
					
						<a href="gra.php">Powrót do panelu zarządzania</a><br></br>
			
		</div>

		<div id="contener">

			<?php

				require_once('db.php');

				$query = "SELECT * FROM `produkty`";

				$res = $connection->query($query);
				while($produkty = $res->fetch_assoc()) {

			?>

				<div class="wrapper">

					<div class="img">
						<img src="<?php echo $produkty['img']; ?>" alt="">
					</div>
					<div class="info">

						<table>
							<tr>
								<td><p>Nazwa: </p></td><td><p><?php echo $produkty['nazwa']; ?></p></td>
								<td rowspan="2"><p><?php echo $produkty['opis']; ?></p></td>
							</tr>
							<tr>
								<td><p>Cena: </p></td><td><p><?php echo $produkty['cena']; ?> zł</p></td>
							</tr>
						</table>

					<?php
						if (isset($error['zdjecie'])) {
							echo $error['zdjecie'];
						}
					?>

					</div>
					<div class="buttons">

						<form method="post">
							<input type="hidden" name="zdjecie" value="<?php echo $produkty['img']; ?>">
							<input type="hidden" name="id" value="<?php echo $produkty['id']; ?>">
							<input class="button" type="submit" value="Usuń">
						</form>

					</div>

				</div>

			<?php
				}
			?>

		</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
	<script src="js/bootstrap.min.js"></script>
</center>
	</body>
</html>
