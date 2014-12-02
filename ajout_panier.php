<?php session_start();
//connexion base
$host="db2517.1and1.fr"; // Host name
$username="dbo331051526"; // Mysql username
$password="guigus06"; // Mysql password
$db_name="db331051526"; // Database name
$tbl_name="client"; // Table name




// Connect to server and select databse.
$conn = mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

//recuperation des var session pour la requete
$nomclient = $_SESSION["nomclient"];
$mdp=$_SESSION["mdp"];

//je recupere le montant du client au cas ou ce n'est pa le premier article qu'il prend
$req=" SELECT montant FROM client WHERE username='$nomclient' AND password='$mdp' ";


$result=mysql_query($req);
$recup = mysql_fetch_array($result);
$recup = $recup["montant"];



// je recupere la reference du produit
$ref=$_POST["ref"];

//je recupere la quantite ajoutée
$qte=$_POST["quantite"];

//je recupere le montant de lajout
$req="SELECT prix FROM produit WHERE ref='$ref' ";
$result=mysql_query($req);
$prix = mysql_fetch_array($result);
$prix = $prix["prix"];
$prix= $prix*$qte;




//je recupere le description
$req="SELECT description FROM produit WHERE ref='$ref' ";
$result=mysql_query($req);
$desc = mysql_fetch_array($result);
$desc = $desc["description"];

//je recupere l'image
$req="SELECT image FROM produit WHERE ref='$ref' ";
$result=mysql_query($req);
$image = mysql_fetch_array($result);
$image = $image["image"];

//Je test si le produit est en stock ou pas
$req="SELECT stock FROM produit WHERE ref='$ref'";
$result = mysql_query($req);
$stock = mysql_fetch_array($result);
$stock = $stock["stock"];


//il est pas en stock
if($stock == '0'){
	header("location:non_stock.php");
	}
// je test si le client a demander trop de quantite par rappor au stock

if($stock < $qte){
	header("location:non_stock.php");
	}

// il est en stock
else{
$new_stock = $stock - $qte;
//je met a jour le stock par raport a la quantite commandée
$req="UPDATE produit SET stock=$new_stock WHERE ref='$ref'";
$result=mysql_query($req);


//je test si le produit est deja dans le panier
$req="SELECT * FROM produit_achete WHERE ref='$ref'";
$result=mysql_query($req);
$count=mysql_num_rows($result);

//s'il est dans le panier alors on met a jour la quantite et le montant
if($count== 1){
$req="SELECT quantite FROM produit_achete WHERE ref='$ref'";
$result=mysql_query($req);
$tabresult = mysql_fetch_assoc($result);
$ancienneqte=$tabresult["quantite"];

$new_quantite = $ancienneqte + $qte;

$req="UPDATE produit_achete SET quantite=$new_quantite WHERE ref='$ref'";
$result=mysql_query($req);


//on met a jour le montant_ligne
$req="SELECT * FROM produit_achete WHERE ref='$ref'";

$result=mysql_query($req);
$anc_ligne = mysql_fetch_assoc($result);
$anc_ligne = $anc_ligne["montant_ligne"];


$new_montant_ligne= $prix + $anc_ligne;

$req="UPDATE produit_achete SET montant_ligne=$new_montant_ligne WHERE ref='$ref'";

$result=mysql_query($req);

//on met a jour le montant client

$recup += $prix;
$req="UPDATE client SET montant=$recup WHERE username='$nomclient'";
$result=mysql_query($req);
header("location:index_client.php");
}

//s'il n'est pas dans le panier
else{
// J'ajoute le produit ds la table prduit_acheté

$req="INSERT INTO produit_achete (ref,username,description,quantite,montant_ligne,image) VALUES ('$ref','$nomclient','$desc',$qte,$prix,'$image')";
$result=mysql_query($req);


//je met a jour le montant du client
$recup = $recup + $prix;
$req="UPDATE client SET montant='$recup' WHERE username='$nomclient' AND password='$mdp' ";
$result=mysql_query($req);
}


//je ferme la connexion
mysql_close($conn);

//je met a jour la variable session montant
$_SESSION["montant"] = $recup;
header("location:index_client.php");
}
?>