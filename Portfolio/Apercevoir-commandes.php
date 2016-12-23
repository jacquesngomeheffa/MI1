<?php require_once('Connections/connexion.php'); ?>


<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_rsApercuCommande = "-1";
if (isset($_GET['IDclient'])) {
  $colname_rsApercuCommande = $_GET['IDclient'];
}
mysql_select_db($database_connexion, $connexion);
$query_rsApercuCommande = sprintf("SELECT ficheclient.Nom, ficheclient.Prenom, ficheclient.Email, commandeclient.IDclient, commandeclient.Reference, commandeclient.Nompiece, commandeclient.Quantite, commandeclient.DateDeReservation, ficheclient.Telephone, commandeclient.Facture FROM commandeclient, ficheclient WHERE ficheclient.IDclient= %s AND commandeclient.IDclient=%s AND commandeclient.Facture= 'Non Payee'", GetSQLValueString($colname_rsApercuCommande, "int"),GetSQLValueString($colname_rsApercuCommande, "int"));
$rsApercuCommande = mysql_query($query_rsApercuCommande, $connexion) or die(mysql_error());
$row_rsApercuCommande = mysql_fetch_assoc($rsApercuCommande);
$totalRows_rsApercuCommande = mysql_num_rows($rsApercuCommande);

$colnameID_rsPrix = "-1";
if (isset($_GET['IDclient'])) {
  $colnameID_rsPrix = $_GET['IDclient'];
}
mysql_select_db($database_connexion, $connexion);
$query_rsPrix = sprintf("SELECT commandeclient.Quantite, gestionstock.PrixVente FROM gestionstock, commandeclient WHERE IDclient= %s AND commandeclient.reference= gestionstock.reference AND commandeclient.Facture= 'Non Payee'", GetSQLValueString($colnameID_rsPrix, "int"));
$rsPrix = mysql_query($query_rsPrix, $connexion) or die(mysql_error());
$row_rsPrix = mysql_fetch_assoc($rsPrix);
$totalRows_rsPrix = mysql_num_rows($rsPrix);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO ficheclient (Nom, Prenom, Telephone, Entreprise, Adresse, Email) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Nom'], "text"),
                       GetSQLValueString($_POST['Prenom'], "text"),
                       GetSQLValueString($_POST['Telephone'], "int"),
                       GetSQLValueString($_POST['Entreprise'], "text"),
                       GetSQLValueString($_POST['Adresse'], "text"),
                       GetSQLValueString($_POST['Email'], "text"));

  mysql_select_db($database_connexion, $connexion);
  $Result1 = mysql_query($insertSQL, $connexion) or die(mysql_error());

  $insertGoTo = "ValiderCommandes.php?Email=".$_POST['Email'];
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
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
<style type="text/css">
.momaie {
	color: #F00;
	font-size: 16px;
}
</style>
<script language="javascript">
function printdiv(printpage)
{
var headstr = "<html><head><title></title></head><body>";
var footstr = "</body>";
var newstr = document.all.item(printpage).innerHTML;
var oldstr = document.body.innerHTML;
document.body.innerHTML = headstr+newstr+footstr;
window.print();
document.body.innerHTML = oldstr;
return false;
}
</script>
</head>
<body>

<div class="header-algemeneContainer">
	<div class="header">
		<div class="logo"><h1>BUC motor</h1>
		</div>
		<div class="menu">
        	<ul>
        		<li><a href="index.php" >ACCUEIL</a></li>
           
                <li><a href="Article-vente.php" >VENTES</a></li>
                
              <li><a href="contact.php">CONTACT</a></li>
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
		<div id="Facture" class="panel mar-bottom">
			<div class="title">
  
           	  <h1 align="center">&nbsp;</h1>
           	  <h1 align="center" class="cssbutton">VOTRE COMMANDE</h1>
			</div>
            <div class="content">
              <form id="form1" name="form1" method="post" action="">
                <div align="center">
                  <table width="">
                    <tr>
                      <td width="250" height="60"><h2>Nr Client:</h2></td>
                      <td width="250" height="60"><h3 align="center"><?php echo $row_rsApercuCommande['IDclient']; ?></h3></td>
                    </tr>
                    <tr>
                      <td width="250" height="60"><h2>Nom:</h2></td>
                      <td width="250" height="60"><h3 align="center"><?php echo $row_rsApercuCommande['Nom']; ?></h3></td>
                    </tr>
                    <tr>
                      <td width="250" height="60"><h2>Prenom:</h2></td>
                      <td width="250" height="60"><h3 align="center"><?php echo $row_rsApercuCommande['Prenom']; ?></h3></td>
                    </tr>
                    <tr>
                      <td width="250" height="60"><h2>Numero de Telephone:</h2></td>
                      <td width="250" height="60"><h3 align="center"><?php echo $row_rsApercuCommande['Telephone']; ?></h3></td>
                    </tr>
                    <tr>
                      <td width="250" height="60"><h2>Adresse E-mail:</h2></td>
                      <td width="250" height="60"><h3 align="center"><?php echo $row_rsApercuCommande['Email']; ?></h3></td>
                    </tr>
                  </table>
                </div>
                <p align="center">&nbsp;</p>
                <h1 align="center" class="cssbutton">COMMANDE</h1>
                <p align="center">&nbsp;</p>
             
                <div align="center">
                  <table width="">
                    <tr>
                      <td width="250" height="60"><h2 align="center">Reference</h2></td>
                      <td width="250" height="60"><h2 align="center">Pièce</h2></td>
                      <td width="250" height="60"><h2 align="center">Quantité</h2></td>
                      <td width="250" height="60"><h2 align="center">Date </h2></td>
                    </tr>
                    <?php do { ?>
                    <tr>
                      <td width="250" height="60"><div align="center"><?php echo $row_rsApercuCommande['Reference']; ?></div></td>
                      <td width="250" height="60"><div align="center"><?php echo $row_rsApercuCommande['Nompiece']; ?></div></td>
                      <td width="250" height="60"><div align="center"><?php echo $row_rsApercuCommande['Quantite']; ?></div></td>
                      <td width="250" height="60"><div align="center"><?php echo $row_rsApercuCommande['DateDeReservation']; ?></div></td>
                    </tr>
                      <?php } while ($row_rsApercuCommande = mysql_fetch_assoc($rsApercuCommande)); ?>
                  </table>
                  
                  
                  
                  
                </div>
              </form>
                <p align="center">&nbsp;</p>
              
             
          </div>
        </div>
        
      <div align="center">
        <input type="button" class="cssbutton" onclick="printdiv('Facture');" value="Imprimer votre facture!" />
      </div>
  </div><!---page--->
</div><!---Rightcol--->
</div>
<?php include_once('footer/footer.php'); ?>

</body>
</html>
<?php
mysql_free_result($rsApercuCommande);

mysql_free_result($rsPrix);
?>
