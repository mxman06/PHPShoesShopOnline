<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>ShoesWeb</title>
       <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

	   <link rel="stylesheet" media="screen" type="text/css" title="design" href="design_index.css" />
	  </head>
<body>
	<div id="headeur"> <img alt="logo" src="image/logo.jpg"> </div>
	
	
		<div id="col">
			<table>
				<tr><td class="panier"><a href="panier.php"><img alt="panier" src="image/panier.jpg" /></a><br /><strong>Montant : <?php echo $_SESSION["montant"]; ?><br /><a href="vider_panier.php">Vider</a><hr></td></tr>
				<tr><td height="25"></td></tr>
				<tr class="center"><td><a href="index_client.php"><strong>Accueil<hr></strong></a></td></tr>
				<tr class="center"><td><a href="nike.php"><strong>Nike<hr></strong></a></td></tr>
				<tr class="center"><td><a href="adidas.php"><strong>Adidas<hr></strong></a></td></tr>
				<tr class="center"><td><a href="dc.php"><strong>DC<hr></strong></a></td></tr>
				<tr class="center"><td><a href="logout.php"><strong>Deconnexion<hr></strong></a></td></tr>
			</table>
		</div>
		
		<div id="corps_modele">
			<h3> Voici la gamme DC Shoes dont nous disposons</h3>
			<table><tr>
				<td><a href="galactica.php"> Galactica <br /> <img alt="Nike" src="image/dc/galactica/1.jpg" /></a></td>
				<td><a href="major.php"> Major <br /> <img alt="Nike" src="image/dc/major/1.jpg" /></a></td>
				<td><a href="charactere.php"> Charactere <br /> <img alt="Nike" src="image/dc/charactere/1.jpg" /></a></td>
				<td><a href="spartan.php"> Spartan <br /> <img alt="Nike" src="image/dc/spartan/1.jpg" /></a></td>
			</tr></table>
			<a href="index_client.php"><h2> Retourner voir les marques de chaussures </h2></a>
		</div>
		<div id="footer"> <img alt="footer" src="image/footer.jpg" />	</div>
</body>
</html>