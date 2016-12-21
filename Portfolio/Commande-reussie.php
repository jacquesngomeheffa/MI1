<!DOCTYPE html>
<html lang="fr">
<head>
<meta name="viewport" content="width=device-width, height=device-height" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Buc motor</title>
<link rel="shortcut icon" href="favicon.ico" />
<link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="header-wrap">
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
</div><!---header-wrap--->

<div class="wrap">
	<div class="leftcol">
		<div class="search">
			<div class="title">
            	<h1>Site Search</h1>
                <div class="search-input"><input name="" type="text" class="input-style"/></div>
                <div class="search-btn"><img src="images/search-btn.jpg" alt="search" /></div>
            </div>
        </div>


        <div class="block2">
        	<?php include_once('Personnels/personnel.php'); ?>

                </div>
            </div>
	</div><!---leftcol--->


<div class="rightcol">
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
