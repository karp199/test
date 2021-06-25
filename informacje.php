<?php

	if (!(isset($_SESSION))) {
		session_start();
	}

	

?>
<!DOCTYPE html>
<html>
	<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Karty graficzne</title>
    <meta http-equiv="X-Ua-Compatible" content="IE=edge">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
    </head>
    <body>

<header>


        <nav class="navbar navbar-dark bg-jumpers navbar-expand-lg">
        
            
        
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Przełącznik nawigacji">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="mainmenu">
            
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
                    <button class="btn btn-light" type="submit">Znajdź</button>
                  
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

          
<cd>
</cd>
        </div>

		<div id="contener">
			<center>
			<b>NVIDIA</b><br>
			<img src="nvidia.png"></br>
			<p>Amerykańskie przedsiębiorstwo komputerowe będące jednym z największych na świecie producentów procesorów graficznych i innych układów scalonych przeznaczonych na rynek komputerowy. Nvidia jest także głównym dostawcą (pod względem udziału w rynku) kart graficznych dla komputerów osobistych ze swoją standardową serią GeForce. Firma produkuje także konsole (Nvidia Shield) oparte na Androidzie. Logo firmy to zielony prostokąt, na który częściowo zachodzi spirala.</p><br>
			<p>-----------------------------------------------------------------------------</p></br>
			<b>AMD</b><br>
			<img src="amd.jpg"></br>
			<p>Amerykańskie przedsiębiorstwo produkujące elektronikę (głównie układy scalone) dla użytkowników domowych i firm. Do głównych produktów AMD należą mikroprocesory, chipsety do płyt głównych, systemy wbudowane oraz procesory graficzne dla serwerów, stacji roboczych i komputerów PC.</p><br>
			<p>-----------------------------------------------------------------------------</p></br>
			<b>Intel</b><br>
			<img src="intel.png"></br>
			<p>Największy na świecie producent układów scalonych oraz twórca mikroprocesorów z rodziny x86, które znajdują się w większości komputerów osobistych.</p><br>
			<p>-----------------------------------------------------------------------------</p></br>
			</center>
			</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    
    <script src="js/bootstrap.min.js"></script>

	</body>
</html>
