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
			<tr><td><a href="index.php"><strong>Accueil<hr></strong></td></a></tr>
			<tr><td><a href="form_client.php"><strong>Connexion<hr></strong></td></a></tr>
			<tr><td></tr></td>
			</table>
		</div>
	
	<div id="sur_form_new_client">	
		<div id="form_new_client">	
			<h3>Inscrivez-vous</h3><br />
			<form name="form2" method="post" action="check_newclient.php">
			
				<strong> Nouveau client </strong><br /><br />
				<p align="left">NomClient :
				<input name="nomclient" type="text" size="10" id="nomclient"><br />
				<p align="left">Password :&nbsp;
				<input name="password" type="password" id="password" size="15">(15 car max)<br />
				<p align="left">Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
				<input name="email" type="text" id="email" size="30" value="votre@email.fr"	><br />
				&nbsp;&nbsp;</p>
				<input align="center" type="submit" name="Submit" value="S'enregistrer">
			</form>
		</div>
	</div>
	<div id="footer"> <img alt="footer" src="image/footer.jpg" />	</div>
</body>
</html>