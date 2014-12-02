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


$ref=$_POST["ref"];
$nomclient = $_SESSION["nomclient"];
$montant = $_SESSION["montant"];
$mail = $_SESSION["mail"];

//je met a jour la table facturation
$req="INSERT INTO facturation (username,ref,montant_facture,mail) VALUES ('$nomclient','$ref',$montant,'$mail')";
$result=mysql_query($req);

$message="";
//je recupere la commande pour le message
$req="select * FROM produit_achete WHERE username = '$nomclient'";
$result = mysql_query($req);
while ($tabresult = mysql_fetch_assoc($result)){
	$mess .= "\n". "\n" . "\n" . " Ref : " . $tabresult["ref"] . "\n";
	$mess .= " Description : " . $tabresult["description"] . "\n";
	$mess .= "  Quantité : " . $tabresult["quantite"] . "\n";
	$mess .= " Montant : " . $tabresult["montant_ligne"] . "€" . "\n";
	}




// Envoi d'un mail comme quoi le client a bien commandé
$headers ='From: "ShoesWeb"<shoesweb@hotmail.fr>'."\n";
 $headers .='Reply-To: adresse_de_reponse@fai.fr'."\n";
 $headers .='Content-Type: text/plain; charset="iso-8859-1"'."\n";
 $headers .='Content-Transfer-Encoding: 8bit';
 $req="SELECT mail FROM client WHERE username='$nomclient' ";
 $result=mysql_query($req);
 $result=mysql_fetch_assoc($result);
 $email=$result["mail"];
 $message = "Vous avez bien passé commande chez ShoesWeb. Votre commande s'élève à $montant €. vous avez commandé : $mess"; 
 mail($email, 'projet', $message, $headers);
 
 //Remise a zero du montant du client 
 $req="UPDATE client SET montant=0";
 $result = mysql_query($req);
 
 //je supprime lachate dans la table produit achete
 $req="DELETE FROM produit_achete WHERE username= '$nomclient'";
 $result=mysql_query($req);
 
 //je met a jour la variable de session
 $req="SELECT montant FROM client WHERE username='$nomclient' ";
 $result=mysql_query($req);
 $recup = mysql_fetch_assoc($result);
 $recup = $recup["montant"];
 
 $_SESSION["montant"] = $recup;
 
 
 
 
?>
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
		
		<div id="corps">
			<h3> Vous venez de passer commande, vous avez reçu un mail attestant de votre commande</h3>
		</div>
		<div id="footer"> <img alt="footer" src="image/footer.jpg" />	</div>
</body>
</html>
