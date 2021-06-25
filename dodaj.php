<?php

	if (isset($_POST['dodaj'])) {

		$nazwa = $_POST['nazwa'];
		$opis = trim($_POST['opis']);
		$zdjecie = $_FILES['zdjecie'];
		$cena = floatval($_POST['cena']);
		$kategoria = $_POST['kategoria'];

		$dalej = true;
		$zdjecieOK = true;

		$upload_dir = "img/";
		$target_dir = "img/";
		$base_name = basename($_FILES["zdjecie"]["name"]);
		$target_file = $upload_dir . $base_name;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		print_r($_FILES);

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

		if ($zdjecieOK == true && $dalej == true) {
		    if (!move_uploaded_file($_FILES["zdjecie"]["tmp_name"], $target_file)) {
		        $error['zdjecie'] = '<p>Wystapił błąd podczas dodawania zdjęcia</p>';
				$dalej == false;
		    }
		}

		if ($dalej == true) {
			require_once('db.php');
			$connection->query("INSERT INTO `produkty` (`id`, `nazwa`, `opis`, `img`, `cena`, `kategoria`) VALUES (NULL, '".$nazwa."', '".$opis."', '".$target_dir . $base_name."', '".$cena."', '".$kategoria."')");
			header('location:produkty.php');
		}
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<meta charset="utf-8">
		<title></title>
		
	</head>
	<body>
		<center>
		<div id="menu">

			
				<h3 class="button">Dodaj kartę graficzną do bazy danych</h3>
					
						<a href="gra.php">Powrót do panelu zarządzania</a><br></br>
			
			
		</div>

		<div id="contener">

			<form method="post" enctype="multipart/form-data">

				<table>
					<tr>
						<td>Nazwa produktu</td><td><input type="text" name="nazwa"
						<?php
							if (isset($nazwa)){
								echo 'value="'.$nazwa.'"';
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
						<td>Opis</td><td><textarea name="opis" rows="8" cols="50"><?php if (isset($opis)) echo $opis; ?></textarea>
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
						</td>
					</tr>
					<tr>
						<td>Cena</td><td><input type="text" name="cena"
						<?php
							if (isset($cena)){
								echo 'value="'.$cena.'"';
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
								<option value="nvidia" <?php if (isset($kategoria) && $kategoria == "nvidia") echo 'selected';?>>NVidia</option>
								<option value="amd" <?php if (isset($kategoria) && $kategoria == "amd") echo 'selected';?>>AMD</option>
								<option value="intel" <?php if (isset($kategoria) && $kategoria == "intel") echo 'selected';?>>Intel</option>
							</select>
						</td>
					</tr>
				</table>

				<br><br>

				<input class="button" type="submit" name="dodaj" value="Dodaj produkt">

			</form>

		</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
	<script src="js/bootstrap.min.js"></script>
</center>
	</body>
</html>
