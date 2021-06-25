<?php

	if (!(isset($_SESSION))) {
		session_start();
	}

	if (isset($_POST['id']) && $_POST['id'] != "") {
		if (!isset($_SESSION['koszyk'][$_POST['id']])) {
			$_SESSION['koszyk'][$_POST['id']] = 1;
		}
		header('location:'.$_SERVER['PHP_SELF']);
		exit();
	}

?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>Sklep komputerowy</title>

	<meta name="author" content="Jan Kowalski">
	<meta http-equiv="X-Ua-Compatible" content="IE=edge">
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
	

	
</head>
	<body>
<header>

		
		
			<nav class="navbar navbar-dark bg-jumpers navbar-expand-lg">
		
			<div class="collapse navbar-collapse" id="mainmenu">

			</button>
			
				<ul class="navbar-nav mr-auto">
				
					<li class="nav-item active">
						<a class="nav-link" href="index.php"> Home </a>
					</li>
					
					<li class="nav-item active">
						<a class="nav-link" href="index.php?kategoria=nvidia"> Nvidia </a>
					</li>
					
					<li class="nav-item active">
						<a class="nav-link" href="index.php?kategoria=amd"> AMD </a>
					</li>
					
					<li class="nav-item active">
						<a class="nav-link" href="index.php?kategoria=intel"> Intel </a>
					</li>

					<li class="nav-item active">
						<a class="nav-link" href="informacje.php"> Informacje o firmach </a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="loguj.php"> Panel logowania </a>
					</li>
				</ul>
				
				<form class="form-inline" method="get">
				
					<input class="form-control mr-1" type="text" name="szukaj"placeholder="Wyszukaj" aria-label="Wyszukaj">
					<p></p><button class="btn btn-light" type="submit">Znajdź</button><p></p>

				 
				</form>

						<span id="clock"></span>


<script type="text/javascript">
function GetClock(){
var d=new Date();
var nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getFullYear();
var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

if(nmin<=9) nmin="0"+nmin;
if(nsec<=9) nsec="0"+nsec;

var clocktext=""+(nmonth+1)+"."+ndate+"."+nyear+" "+nhour+":"+nmin+":"+nsec+"";
document.getElementById('clock').innerHTML=clocktext;
}

GetClock();
setInterval(GetClock,1000);
</script>

			</div>
		
		</nav>
	
	</header>

			&nbsp;&nbsp;
			<form class="form-inline" method="get">
				<?php
				if(isset($_GET['kategoria']))
					echo '<input type="hidden" name="kategoria" value="'.$_GET['kategoria'].'">';
				?>
				<br>
				<select class="form-control mr-1" name="cena">
					<option value="ASC">Cena malejąco</option>
					<option value="DESC">Cena rosnąco</option>
				</select>

				<input class="btn btn-light" type="submit" value="Sortuj">
			</form>
		     </br>
<cd>
</cd>
		</div>

		<div id="contener">
			<center>
			<?php

				require_once('db.php');

				$query = "SELECT * FROM `produkty`";

				if (isset($_GET['kategoria']) && $_GET['kategoria'] != "") {
					$query = "SELECT * FROM `produkty` WHERE `kategoria` = '".$_GET['kategoria']."'";
				}

				if (isset($_GET['cena']) && ($_GET['cena'] == "ASC" || $_GET['cena'] == "DESC")) {
					$query = "SELECT * FROM `produkty` ORDER BY `cena` ".$_GET['cena'];
				}

				if ((isset($_GET['kategoria']) && $_GET['kategoria'] != "") &&
					(isset($_GET['cena']) && $_GET['cena'] != "")) {
					$query = "SELECT * FROM `produkty` WHERE `kategoria` = '".$_GET['kategoria']."' ORDER BY `cena` ".$_GET['cena'];
				}

				if (isset($_GET['szukaj']) && $_GET['szukaj'] != "") {
					$query = "SELECT * FROM `produkty` WHERE `nazwa` LIKE '%".$_GET['szukaj']."%' OR `opis` LIKE '%".$_GET['szukaj']."%'";
				}

				$res = $connection->query($query);
				while($produkty = $res->fetch_assoc()) {

				?>

				<div>

					<div class="img">
						<img src="<?php echo $produkty['img']; ?>"width="600" height="500" alt="" onclick="window.open('<?php echo $produkty['img']; ?>', '_blank');">

					</div>
					<div class="info">

						<table width="700" height="200">
								Nazwa: <?php echo $produkty['nazwa']; ?>
								<td rowspan="5"><p><?php echo $produkty['opis']; ?></td>
						</table>
						<table>
								<td><p>Cena: </p></td><td><p><?php echo $produkty['cena']; ?> zł</p></td>
						</table>

					</div>
                      <br>
					<div class="buttons">

						<form method="post">
							<input type="hidden" name="id" value="<?php echo $produkty['id']; ?>">
							
							
						</form>

					</div>
                      </br>
				</div>

				<?php
				}
			 ?>
			</center>
		</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
	<script src="js/bootstrap.min.js"></script>

	</body>
</html>
