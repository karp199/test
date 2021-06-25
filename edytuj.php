<?php

	if (isset($_POST['edytuj'])) {

		$nazwa = $_POST['nazwa'];
		$opis = trim($_POST['opis']);
		$zdjecie = $_FILES['zdjecie'];
		$cena = floatval($_POST['cena']);
		$kategoria = $_POST['kategoria'];
		$id = $_POST['id'];

		$dalej = true;
		$zdjecieOK = true;

		$upload_dir = "img/";
		$target_dir = "img/";
		$base_name = basename($_FILES["zdjecie"]["name"]);
		$target_file = $upload_dir . $base_name;
		$destination_file = $target_dir . $base_name;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		if (strlen($nazwa) == 0) {
			$dalej = false;
			$error['nazwa'] = '<p> Proszę wpisać nazwę produktu </p>';
		}

		if (strlen($opis) == 0) {
			$dalej = false;
			$error['opis'] = '<p> Proszę wpisać opis </p>';
		}

		if (number_format($cena, 2, ".", "") != $_POST['cena']) {
			$dalej = false;
			$error['cena'] = '<p> Proszę wpisać cenę w formacie 000.00</p>';
		}

		if ($_FILES["zdjecie"]["size"] > 0) {
			if (file_exists($target_file)) {
				$dalej = false;
				$zdjecieOK = false;
				$error['zdjecie'] = '<p>Zdjęcie o takiej nazwie już istnieje</p>';
			}

			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
				$dalej = false;
				$zdjecieOK = false;
				$error['zdjecie'] = '<p>Proszę dodać zdjęcie o rozszerzeniu jpg, jpge lub png</p>';
			}
		}
		else {
			$zdjecieOK = false;
			$destination_file = $_POST['aktualne_zdjecie'];
		}

		if ($zdjecieOK == true && $dalej == true) {
		    if (!move_uploaded_file($_FILES["zdjecie"]["tmp_name"], $target_file)) {
		        $error['zdjecie'] = '<p>Wystapił błąd podczas dodawania zdjęcia</p>';
				$dalej = false;
				$zdjecieOK = false;
		    }
			if ($zdjecieOK == true) {
				if (!unlink( $_POST['aktualne_zdjecie'] )){
					$error['zdjecie'] = '<p>Nie udało się usunąć starego zdjęcia</p>';
					unlink( $target_file );
					$dalej = false;
				}
			}
		}

		if ($dalej == true) {
			require_once('db.php');
			$connection->query("UPDATE `produkty` SET `nazwa` = '".$nazwa."', `opis` = '".$opis."', `img` = '".$destination_file."', `cena` = '".$cena."', `kategoria` = '".$kategoria."' WHERE `produkty`.`id` = '".$id."'");
			header('location:edytuj1.php');
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

		<div id="menu">
			<center>
			
				<h3 class="button">Produkty</h3>
					
						<a href="gra.php">Powrót do panelu zarządzania</a><br></br>
						
					
				
			

			

		</div>
<center>
		<div id="contener">

			<?php if(!isset($_GET['id'])){

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

					</div>
					<div class="buttons">

						<form method="get">
							<input type="hidden" name="id" value="<?php echo $produkty['id']; ?>">
							<input class="button" type="submit" value="Edytuj">
						</form>

					</div>

				</div>

			<?php
				}
			}
			?>

			<?php if(isset($_GET['id']) && !empty($_GET['id'])){

				require_once('db.php');

				$query = "SELECT * FROM `produkty` WHERE `id` = '".$_GET['id']."'";

				$res = $connection->query($query);
				while($produkty = $res->fetch_assoc()) {

			?>

			<form method="post" enctype="multipart/form-data">

				<table>
					<tr>
						<td>Nazwa produktu</td><td><input type="text" name="nazwa"
						<?php
							if (isset($produkty['nazwa'])){
								echo 'value="'.$produkty['nazwa'].'"';
							}
						?>>
						<?php
							if (isset($error['nazwa'])){
								echo $error['nazwa'];
							}
						?>
						</td>
					</tr>
					<tr>
						<td>Opis</td><td><textarea name="opis" rows="8" cols="50"><?php if (isset($produkty['opis'])) echo $produkty['opis']; ?></textarea>
						<?php
							if (isset($error['opis'])){
								echo $error['opis'];
							}
						?>
					</td>
					</tr>
					<tr>
						<td>Zdjęcie</td><td><input type="file" name="zdjecie">
						<?php
							if (isset($error['zdjecie'])){
								echo $error['zdjecie'];
							}
						?>
						<input type="hidden" name="aktualne_zdjecie"
						<?php
							if (isset($produkty['img'])){
								echo 'value="'.$produkty['img'].'"';
							}
						?>>
						</td>
					</tr>
					<tr>
						<td>Cena</td><td><input type="text" name="cena"
						<?php
							if (isset($produkty['cena'])){
								echo 'value="'.$produkty['cena'].'"';
							}
						?>>
						<?php
							if (isset($error['cena'])){
								echo $error['cena'];
							}
						?>
						</td>
					</tr>
					<tr>
						<td>Kategoria</td>
						<td>
							<select name="kategoria">
								<option value="nvidia"
								<?php if (isset($produkty['kategoria']) && $produkty['kategoria'] == "nvidia") echo 'selected';?>>Nvidia
								</option>
								<option value="amd"
								<?php if (isset($produkty['kategoria']) && $produkty['kategoria'] == "amd") echo 'selected';?>>AMD
								</option>
								<option value="intel"
								<?php if (isset($produkty['kategoria']) && $produkty['kategoria'] == "intel") echo 'selected';?>>Intel
								</option>
							</select>
						</td>
					</tr>
				</table>

				<br><br>
				<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
				<input class="button" type="submit" name="edytuj" value="Edytuj produkt">

			</form>
</center>
		<?php
				}
			}
		?>

		</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
	<script src="js/bootstrap.min.js"></script>
</center>
	</body>
</html>
