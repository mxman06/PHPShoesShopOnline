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
			<h3> Voici les différentes couleurs des Nizza. Prix : 100€</h3>
			<table><tr>
				<td>Blanc<br /><img alt="Nike" src="image/adidas/nizza/1.jpg" /><br />
				<form name="ajout" method="post" action="ajout_panier.php">
				Ref :<input type="text" readonly="readonly" name="ref" size="1" value="a05" />
				Quantite :<input type="text" name="quantite" size="1" value="1" /><br />	
				<input type="submit" name="ajout" value="Ajouter au Panier">
				
				</form></td>
				
				<td>Bleu/Blanc/Rouge<br /><img alt="Nike" src="image/adidas/nizza/2.jpg" /><br />
				<form name="ajout" method="post" action="ajout_panier.php">
				Ref :<input type="test" readonly="readonly" name="ref" size="1" value="a06" />
				Quantite :<input type="text" name="quantite" size="1" value="1" /><br />
				<input type="submit" name="ajout" value="Ajouter au Panier">
				</form></td>
				<td>Rose<br /><img alt="Nike" src="image/adidas/nizza/3.jpg" /><br />
				<form name="ajout" method="post" action="ajout_panier.php">
				Ref :<input type="text" readonly="readonly" name="ref" size="1" value="a07" />	
				Quantite :<input type="text" name="quantite" size="1" value="1" /><br />
				<input type="submit" name="ajout" value="Ajouter au Panier">
				</form></td>
			
			</tr></table>
			<a href="adidas.php"><h2> Retourner Voir les modèles Adidas </h2></a>
		</div>
		<div id="footer"> <img alt="footer" src="image/footer.jpg" />	</div>
</body>
</html>