<?php
$host="db2517.1and1.fr"; // Host name
$username="dbo331051526"; // Mysql username
$password="guigus06"; // Mysql password
$db_name="db331051526"; // Database name
$tbl_name="client"; // Table name





// Connect to server and select databse.
$conn = mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form
$nomclient=$_POST["nomclient"];
$mdp=$_POST["mdp"];
//echo $nomclient;

// To protect MySQL injection (more detail about MySQL injection)
$nomclient = stripslashes($nomclient);
$mdp = stripslashes($mdp);
$nomclient = mysql_real_escape_string($nomclient);
$mdp = mysql_real_escape_string($mdp);


//test dautentification du client
$sql="SELECT * FROM $tbl_name WHERE username='$nomclient' and password='$mdp'";
$temp=mysql_query( $sql );
$count=mysql_num_rows($temp);






if($count==1){

		// Ouveture Session
		session_start();

		//Enregistrement des variables de session
		$_SESSION["nomclient"] = $_POST["nomclient"];
		$nomclient = $_SESSION["nomclient"];

		$_SESSION["mdp"] = $mdp;
		
		$req="SELECT mail FROM client WHERE username='$nomclient'";
		$result=mysql_query($req);
		$result=mysql_fetch_assoc($result);
		$mail=$result["mail"];
		$_SESSION["mail"] = $mail;
		
		$result = mysql_fetch_array($temp);
		$adminame=$result["username"];
		$adminpass = $result["password"];
		
		if($adminame == "guillaume" && $adminpass == "projetweb"){
			$montant = mysql_fetch_array($temp);
			$lemontant = $montant["montant"];
			$_SESSION["montant"] = $lemontant;
			header("location:index_admin.php");
		}
		else{

		$montant = mysql_fetch_array($temp);
		$lemontant = $montant["montant"];
		$_SESSION["montant"] = $lemontant;


		
		if(!isset($_SESSION["nomclient"])){
			header("location:index.php");
		}
		else{
			header("location:index_client.php");
		}
		mysql_close($conn);
		}
}
else {
header("location:erreur_log.php");
}
?>