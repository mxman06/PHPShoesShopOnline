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
			<h3> Voici les différentes modèle des Charactere. Prix : 79€</h3>
			<table><tr>
				<td>Blanc<br /><img alt="Nike" src="image/dc/charactere/1.jpg" /><br />
				<form name="ajout" method="post" action="ajout_panier.php">
				Ref :<input type="test" readonly="readonly" name="ref" size="1" value="d06" />
				Quantite :<input type="text" name="quantite" size="1" value="1" /><br />
				<input type="submit" name="ajout" value="Ajouter au Panier">
				</form></td>
				
				<td>Marron<br /><img alt="Nike" src="image/dc/charactere/2.jpg" /><br />
				<form name="ajout" method="post" action="ajout_panier.php">
				Ref :<input type="test" readonly="readonly" name="ref" size="1" value="d07" />
				Quantite :<input type="text" name="quantite" size="1" value="1" /><br />
				<input type="submit" name="ajout" value="Ajouter au Panier">
				</form></td>
				
				<td>Noir<br /><img alt="Nike" src="image/dc/charactere/3.jpg" /><br />
				<form name="ajout" method="post" action="ajout_panier.php">
				Ref :<input type="test" readonly="readonly" name="ref" size="1" value="d08" />
				Quantite :<input type="text" name="quantite" size="1" value="1" /><br />
				<input type="submit" name="ajout" value="Ajouter au Panier">
				</form></td>
			</tr>
			<tr>
				<td>Noir/Bleu<br /><img alt="Nike" src="image/dc/charactere/4.jpg" /><br />
				<form name="ajout" method="post" action="ajout_panier.php">
				Ref :<input type="test" readonly="readonly" name="ref" size="1" value="d09" />
				Quantite :<input type="text" name="quantite" size="1" value="1" /><br />
				<input type="submit" name="ajout" value="Ajouter au Panier">
				</form></td>
				
				<td>Blanc<br /><img alt="Nike" src="image/dc/charactere/5.jpg" /><br />
				<form name="ajout" method="post" action="ajout_panier.php">
				Ref :<input type="test" readonly="readonly" name="ref" size="1" value="d10" />
				Quantite :<input type="text" name="quantite" size="1" value="1" /><br />
				<input type="submit" name="ajout" value="Ajouter au Panier">
				</form></td>
				
				<td>Blanc/Bleu<br /><img alt="Nike" src="image/dc/charactere/6.jpg" /><br />
				<form name="ajout" method="post" action="ajout_panier.php">
				Ref :<input type="test" readonly="readonly" name="ref" size="1" value="d11" />
				Quantite :<input type="text" name="quantite" size="1" value="1" /><br />
				<input type="submit" name="ajout" value="Ajouter au Panier">
				</form></td>
				
			</tr></table>
			<a href="dc.php"><h2> Retourner Voir les modèles DC Shoes </h2></a>
		</div>
		<div id="footer"> <img alt="footer" src="image/footer.jpg" />	</div>
</body>
</html>