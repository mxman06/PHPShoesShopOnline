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
$ref=$_POST["reference"];
echo $ref;

//je recupere la quantite ajoutée
$qte=$_POST["qte"];





//je test si le client ne ve pa enlever plus dobjet qu'il en a
$req=" SELECT quantite FROM produit_achete WHERE username='$nomclient' AND ref='$ref' ";
$result=mysql_query($req);
$ancienneqte = mysql_fetch_array($result);
$ancienneqte = $ancienneqte["quantite"];


if($ancienneqte < $qte){
//le client s'est tromper sur la quantite
header("location:erreur_quantite.php");
}
else{
//le client ne s'est pas tromper sur la quantite

//je test si le client s'est tromper sur la ref
$req=" SELECT ref FROM produit_achete WHERE username='$nomclient' AND ref='$ref' ";
$result=mysql_query($req);
$count=mysql_num_rows($result);
if($count != 1){
//le client s'est tromper sur la ref
header("location:erreur_ref.php");

}

else{
//mise a jour quantite
$new_qte = $ancienneqte - $qte;
$req=" UPDATE produit_achete SET quantite=$new_qte WHERE ref='$ref'";
$result=mysql_query($req);

//mise a jour montant_ligne
$req=" SELECT prix FROM produit WHERE ref='$ref' ";
$result=mysql_query($req);
$prix = mysql_fetch_array($result);
$prix = $prix["prix"];
$prix = $prix * $qte;

$req=" SELECT montant_ligne FROM produit_achete WHERE ref='$ref' ";
$result=mysql_query($req);
$ancien_montant_ligne = mysql_fetch_array($result);
$ancien_montant_ligne = $ancien_montant_ligne["montant_ligne"];

$new_montant_ligne = $ancien_montant_ligne - $prix;

$req=" UPDATE produit_achete SET montant_ligne=$new_montant_ligne WHERE ref='$ref'";

$result=mysql_query($req);

//mise a jour montant_client
$req=" SELECT montant FROM client WHERE username='$username' AND password='$mdp' ";
$result=mysql_query($req);
$montant_client = mysql_fetch_array($result);
$montant_client = $montant_client["montant"];
echo $montant_client;

$new_montant_client = $montant_client-$prix;
echo $new_montant_client;
//$req=" UPDATE client SET montant=$new_montant_ligne WHERE username='$nomclient' and password='$mdp'";
//echo $req;
//$result=mysql_query($req);

$sql="SELECT * FROM client WHERE username='$nomclient' and password='$mdp'";
//$temp=mysql_query( $sql );
//$montant = mysql_fetch_array($temp);
//$lemontant = $montant["montant"];
//$_SESSION["montant"] = $lemontant;




}

//header("location:index_client.php");
}




















