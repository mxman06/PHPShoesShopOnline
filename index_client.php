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



//je met a jour la variable session montant
$nomclient = $_SESSION["nomclient"];
$req="SELECT montant FROM client WHERE username='$nomclient'";
$result=mysql_query($req);
$recup = mysql_fetch_assoc($result);
$recup = $recup["montant"];
$_SESSION["montant"] = $recup;


//recuperer les produit qui ne sont plus en stock
$req="SELECT * FROM produit WHERE stock = 0";
$result = mysql_query($req);





echo'
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
				<tr><td class="panier"><a href="panier.php"><img alt="panier" src="image/panier.jpg" /></a><br /><strong>Montant :'; echo $_SESSION["montant"]; echo'<br /><a href="vider_panier.php">Vider</a><hr></td></tr>
				<tr><td height="25"></td></tr>
				<tr class="center"><td><a href="index_client.php"><strong>Accueil<hr></strong></a></td></tr>
				'; if($nomclient == "guillaume")
						echo '<tr class="center"><td><a href="index_admin.php"><strong>Administration<hr></strong></a></td></tr>';echo'
				<tr class="center"><td><a href="nike.php"><strong>Nike<hr></strong></a></td></tr>
				<tr class="center"><td><a href="adidas.php"><strong>Adidas<hr></strong></a></td></tr>
				<tr class="center"><td><a href="dc.php"><strong>DC<hr></strong></a></td></tr>
				<tr class="center"><td><a href="logout.php"><strong>Deconnexion<hr></strong></a></td></tr>
			</table>
		</div>

		<div id="corps_client">
			<h3> Bienvenue dans le magasin ShoesWeb ! ! </h3>
			<table>
				<tr width="150px" height="129px"><td ><a href="nike.php"><img alt="nike" border="0" src="image/nike/logo.jpg" /></a></td>
				<td><a href="adidas.php"><img alt="adidas" border="0" src="image/adidas/logo.jpg" /></a></td>
				<td><a href="dc.php"><img alt="Dc" border="0" src="image/dc/logo.jpg" /></a></td></tr>
			</table>
			
			<p class="stock"> Il n\'y a plus de stock pour les produits suivants :<br />'; while($tabresult = mysql_fetch_assoc($result)){
			echo'<img src="';echo $tabresult["image"];echo'" />'; }echo'</p>
		</div>
		<div id="footer"> <img alt="footer" src="image/footer.jpg" />	</div>
</body>
</html>';?>