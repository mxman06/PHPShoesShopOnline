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

echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>ShoesWeb</title>
       <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

	   <link rel="stylesheet" media="screen" type="text/css" title="design" href="design_panier.css" />
	  </head>
<body>
	<div id="headeur"> <img alt="logo" src="image/logo.jpg"> </div>
	
	<div id="col">
			<table>
				<tr><td class="panier"><a href="panier.php"><img alt="panier" src="image/panier.jpg" /></a><br /><strong>Montant : ';echo $_SESSION["montant"];echo'<br /><a href="vider_panier.php">Vider</a><hr></td></tr>
				<tr><td height="25"></td></tr>
				<tr class="center"><td><a href="index_client.php"><strong>Accueil<hr></strong></a></td></tr>
				<tr class="center"><td><a href="nike.php"><strong>Nike<hr></strong></a></td></tr>
				<tr class="center"><td><a href="adidas.php"><strong>Adidas<hr></strong></a></td></tr>
				<tr class="center"><td><a href="dc.php"><strong>DC<hr></strong></a></td></tr>
				<tr class="center"><td><a href="logout.php"><strong>Deconnexion<hr></strong></a></td></tr>
			</table>
		</div>
	
	<div id="corps">
		<h3>Voici ce que votre panier contient </h3>
		';
			
			//je recupere nomclient pour la requete
			$nomclient = $_SESSION["nomclient"];
			
			
			

			//je recupere les données des produit acheté par le client
			$req="SELECT * FROM produit_achete WHERE username='$nomclient'";
			$result=mysql_query($req);
			
			$vide=0;
			
			while($tabresult = mysql_fetch_assoc($result)){
			
			echo '<table>
			<tr><td><hr><form name="form_commander" method="post" action="commande.php"><input name="ref" id="ref" value="';echo $tabresult["ref"]; echo'" type="hidden"> Référence : '; echo $tabresult["ref"]; echo'<hr></td>
			<td> <hr>Quantite : '; echo $tabresult["quantite"];echo'<hr></td>
			<td> <hr> Prix : '; echo $tabresult["montant_ligne"];echo'€<hr></td>
			<td> <hr>'; echo $tabresult["description"];echo'<hr></td>
			<td class="ligne" width="100">'; echo'<img alt="panier" width="80px" height="73px" src="'; echo $tabresult["image"];echo'"></td></tr>';
			
		    $vide=1;
			$_SESSION["commande"] = $tabresult["ref"];
			}
			if($vide==0){		
			echo '<h3> Panier Vide</h3>';
			}
			else{
			
			echo '</table>
			
					
					<input type="submit" name="commander" value="Commander">
					</form>';
			}
			echo '</table> <h3> Votre panier s\'eleve à '; echo $_SESSION["montant"]; echo'€</h3>';
			?>	
		
	</div>

<div id="footer"> <img alt="footer" src="image/footer.jpg" />	</div>
</body>
</html>






	