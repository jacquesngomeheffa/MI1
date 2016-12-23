<!DOCTYPE html>
<html lang="fr">
<head>

<meta charset="utf-8" >
<title>Buc motor</title>
<link rel="shortcut icon" href="favicon.ico" />
<meta name="viewport" content="width=device-width, height=device-height" />
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="header-algemeneContainer">
	<div class="header">
		<div class="logo"><h1>BUC motor</h1>
		</div>
		<div class="menu">
        	<ul>
        		<li><a href="index.php" >ACCUEIL</a></li>
           
                <li><a href="Article vente.php">VENTES</a></li>
                
              <li><div class="autremenu center"><a href="contact.php">CONTACT</a></div></li>
              <li><a href="about.php">NOUS BUC</a></li> 
              <li><a href="inscription.php">INSCRIPTION </a>|<a href="Connexion.php"> CONNEXION</a></li>
        	</ul>
        </div>
	</div>
</div><!---header-algemeneContainer--->

<div class="algemeneContainer">
	<div class="linksContainer">
		<div class="recherche">
			<div class="title">
            	<h1>Site Search</h1>
                <div class="recherche-input"><input name="" type="text" class="input-style"/></div>
                <div class="recherche-btn"><img src="images/recherche-btn.jpg" alt="recherche" /></div>
            </div>
        </div>


        <div class="block2">
        	<?php include_once('Personnels/personnel.php'); ?>

                </div>
            </div>
	</div><!---linksContainer--->


<div class="rechtsContainer">
  <div class="page">
		<div class="panel mar-bottom">
			<div class="title">
  
           	  <h1>&nbsp;</h1>
           	  <h1>Votre mail a été bien transmis, nous vous</h1>
           	  <h1> remercions pour	votre mail. </h1>
</div>
        </div>
        
       
	</div><!---page--->
</div><!---Rightcol--->
</div>
<?php include_once('footer/footer.php'); ?>

</body>
</html>
