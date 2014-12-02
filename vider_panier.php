<?php
session_start();


//connexion base
$host="db2517.1and1.fr"; // Host name
$username="dbo331051526"; // Mysql username
$password="guigus06"; // Mysql password
$db_name="db331051526"; // Database name
$tbl_name="client"; // Table name

// Connect to server and select databse.
$conn = mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

//recuperation des variables session pour la requete
$nomclient = $_SESSION["nomclient"];
$mdp=$_SESSION["mdp"];

//je met le montant à zéro
$req="UPDATE client SET montant=0 WHERE username='$nomclient' AND password='$mdp' ";
$result=mysql_query($req);

//je met le stock à jour
//je prend dabord toute les quantite de chaque produit achete par le client
$sql=" SELECT * FROM produit_achete WHERE username='$nomclient' ";

$results=mysql_query($sql);
$count=mysql_num_rows($results);


while($tab = mysql_fetch_array($results) ){
$laquantite = $tab["quantite"];
$laref = $tab["ref"];


$req="SELECT stock FROM produit WHERE ref='$laref' ";
$result2=mysql_query($req);
$ancienstock=mysql_fetch_assoc($result2);
$ancienstock = $ancienstock["stock"];

$nouveaustock = $ancienstock + $laquantite;


$req="UPDATE produit SET stock=$nouveaustock WHERE ref='$laref' ";
$result=mysql_query($req);
}

//je supprime le panier du client
$req="DELETE FROM produit_achete WHERE username='$nomclient'";
$result=mysql_query($req);


//je recupere le montant du client pour pouvoir mettre la var session a jour
$req=" SELECT montant FROM $tbl_name WHERE username='$nomclient' AND password='$mdp' ";

$result=mysql_query($req);
$recup = mysql_fetch_array($result);
$recup = $recup["montant"];


//je met a jour la variable session montant
$_SESSION["montant"] = $recup;
mysql_close($conn);
header("location:index_client.php");

?>