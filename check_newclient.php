<?php
$host="db2517.1and1.fr"; // Host name
$username="dbo331051526"; // Mysql username
$password="guigus06"; // Mysql password
$db_name="db331051526"; // Database name
$tbl_name="client"; // Table name





// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form
$myusername=$_POST['nomclient'];
$mypassword=$_POST['password'];


// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$nomclient=$_POST['nomclient'];

//vérification que le client n'existe pas deja
$req="SELECT * FROM client WHERE username='$nomclient'";
$result=mysql_query($req);
$count=mysql_num_rows($result);
if($count==1){
header("location:already_log.php");
}
else{

//Insertion du client dans la BDD
$requete="INSERT INTO client (username,password) VALUES('$myusername','$mypassword')";
$result=mysql_query($requete);



// Envoi d'un mail comme quoi le client est bien inscrit!!
$headers ='From: "ShoesWeb"<MA BITE .C OM>'."\n";
 $headers .='Reply-To: adresse_de_reponse@fai.fr'."\n";
 $headers .='Content-Type: text/plain; charset="iso-8859-1"'."\n";
 $headers .='Content-Transfer-Encoding: 8bit';
$email=$_POST['email'];

 mail($email, 'projet', 'Vous etes bien inscrit sur le site ShoesWeb ! !  ', $headers);

 
 
//Vérification que le client a ete bien ajouté
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

$count= mysql_num_rows($result);

if($count==1){
header("location:newclient.php");
}
else{
echo "Le nom d'utilisateur est déja pris ou mot de passe pas en nombre";
}
}

?>