<?php

session_start();

$host="db2517.1and1.fr"; // Host name
$username="dbo331051526"; // Mysql username
$password="guigus06"; // Mysql password
$db_name="db331051526"; // Database name
$tbl_name="client"; // Table name





// Connect to server and select databse.
$conn = mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");



$req="SELECT * FROM facturation ";

$result=mysql_query($req);


echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
		
	<div id="corps_produit">
		
		
		<h3>Voici La liste des commandes du magasin :</h3>
		<table>';
		while($tabresult=mysql_fetch_array($result)){
			echo '<tr><td>Nom Client : ';echo $tabresult["username"];echo'</td><td>
			Montant :';echo $tabresult["montant_facture"];echo'�</td><td>Email : ';echo $tabresult["mail"];echo'</td></tr>';
		}
		echo'</table>
		
		
	
	
	</div>
	
	<div id="footer"> <img alt="footer" src="image/footer.jpg" />	</div>
</body>
</html>';?>