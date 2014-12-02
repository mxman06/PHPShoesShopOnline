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

//je recupere les données envoyer par le formulaire
$new_stock = $_POST["stock"];
$ref = $_POST["ref"];

//je met a jour le stock
$req="UPDATE produit SET stock=$new_stock WHERE ref='$ref' ";
$result = mysql_query($req);

header("location:modif_stock.php");
