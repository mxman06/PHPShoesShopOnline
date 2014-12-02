<?php session_start();?>

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
			<tr><td><a href="index_admin.php"><strong>Accueil<hr></strong></td></a></tr>
			<tr><td><a href="index_client.php"><strong>Voir mon Magasin<hr></strong></td></a></tr>
			<tr><td><strong><a href="voir_produit.php">Voir les produits du magasin</a><hr></strong></td></tr>
			<tr><td><strong><a href="voir_commande.php">Voir les commandes des clients</a><hr></strong></td></tr>
			<tr><td><strong><a href="modif_stock.php">Modifier le stock des produit</a><hr></strong></td></tr>
			<tr><td><strong><a href="suppr_produit.php">Supprimer des produits</a><hr></strong></td></tr>
			<tr><td><a href="logout.php"><strong>Deconnexion<hr></strong></td></a></tr>
			</table>
		</div>
		
	<div id="corps_admin">
		<h2> Partie Admin du site </h2>
		<h3> Que voulez-vous faire?</h3>
		
	
	
	</div>
	
	<div id="footer"> <img alt="footer" src="image/footer.jpg" />	</div>
</body>
</html>