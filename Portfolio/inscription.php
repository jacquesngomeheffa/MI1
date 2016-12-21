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
 
// Hash Password field
if (isset($_POST['motdepasse']) && $_POST['motdepasse'] <> ""){$_POST['motdepasse'] = md5($_POST['motdepasse']);}
 
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
 
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO ficheclient (Nom, Prenom, Telephone, Entreprise, Adresse, Email) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nom'], "text"),
                       GetSQLValueString($_POST['prenom'], "text"),
                       GetSQLValueString($_POST['telephone'], "text"),
                       GetSQLValueString($_POST['entreprise'], "text"),
                       GetSQLValueString($_POST['adresse'], "text"),
                       GetSQLValueString($_POST['email'], "text"));
 
  mysql_select_db($database_connexion, $connexion);
  $Result1 = mysql_query($insertSQL, $connexion) or die(mysql_error());
 
  $insertGoTo = "Inscription-reussi.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
 
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO connecter (AdresEmail, mot_de_passe) VALUES (%s, %s)",
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['motdepasse'], "text"));
 
  mysql_select_db($database_connexion, $connexion);
  $Result1 = mysql_query($insertSQL, $connexion) or die(mysql_error());
}
?>
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
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
</head>
<body>
 
<div class="header-wrap">
    <div class="header">
        <div class="logo"><h1>BUC motor</h1>
        </div>
        <div class="menu">
            <ul>
                <li><a href="index.php" >ACCUEIL</a></li>
           
                <li><a href="Article-vente.php" >VENTES</a></li>
               
              <li><div class="autremenu center"><a href="contact.php">CONTACT</a></div></li>
              <li><a href="about.php">NOUS BUC</a></li>
              <li><a href="inscription.php" class="active">INSCRIPTION </a>|<a href="Connexion.php"> CONNEXION</a></li>
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
              <h1 align="center" class="cssbutton">INSCRIVEZ-VOUS</h1>
              <p>&nbsp;</p>
              <form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
                <table width="">
                  <tr>
                    <td height="60"><div class="textlabel">Nom*:</div></td>
                    <td><span id="sprytextfield1">
                      <input name="nom" type="text" class="inputtextfield" id="nom" size="25" />
                    <span class="textfieldRequiredMsg">Une valeur est obligatoire.</span></span></td>
                  </tr>
                  <tr>
                    <td height="60"><div class="textlabel">Prénom*:</div></td>
                    <td><span id="sprytextfield2">
                      <input name="prenom" type="text" class="inputtextfield" id="prenom" size="25" />
                    <span class="textfieldRequiredMsg">Une valeur est obligatoire.</span></span></td>
                  </tr>
                  <tr>
                    <td height="60"><div class="textlabel">Numero de telephone*:</div></td>
                    <td><span id="sprytextfield3">
                      <input name="telephone" type="text" class="inputtextfield" id="telephone" size="25" />
                    <span class="textfieldRequiredMsg">Une valeur est obligatoire.</span></span></td>
                  </tr>
                  <tr>
                    <td><div class="textlabel">Nom Entreprise:</div></td>
                    <td><input name="entreprise" type="text" class="inputtextfield" id="entreprise" size="25" /></td>
                  </tr>
                  <tr>
                    <td height="60"><div class="textlabel">Votre adresse:</div></td>
                    <td><input name="adresse" type="text" class="inputtextfield" id="adresse" size="25" /></td>
                  </tr>
                  <tr>
                    <td height="60"><div class="textlabel">Adresse e-mail*:</div></td>
                    <td><span id="sprytextfield4">
                    <input name="email" type="text" class="inputtextfield" id="email" size="25" />
                    <span class="textfieldRequiredMsg">Une valeur est obligatoire.</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></td>
                  </tr>
                  <tr>
                    <td height="60"><div class="textlabel">Mot de passe*:</div></td>
                    <td><span id="sprypassword1">
                    <input name="motdepasse" type="password" class="inputtextfield" id="motdepasse" size="25" />
                  <span class="passwordRequiredMsg">Une valeur est obligatoire.</span><span class="passwordMinCharsMsg">Er zijn minder dan het minimum aantal tekens.</span></span></tr>
                  <tr>
                    <td height="60"><div class="textlabel">Confirmer mot de passe:</div></td>
                    <td><span id="spryconfirm1">
                      <input name="motdepasse2" type="password" class="inputtextfield" id="motdepasse2" size="25" />
                    <span class="confirmRequiredMsg">Une valeur est obligatoire.</span><span class="confirmInvalidMsg">De waarden komen niet overeen.</span></span></td>
                  </tr>
               
                </table>
                <p class="center">
                  <input name="Inscrivez-vous" type="submit" class="cssbutton" id="Inscrivez-vous" value="Inscrivez-vous" />
                </p>
                <input type="hidden" name="MM_insert" value="form1" />
              </form>
              <p>&nbsp;</p>
          </div>
        </div>
       
       
    </div><!---page--->
</div><!---Rightcol--->
</div>
<?php include_once('footer/footer.php'); ?>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "email");
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {validateOn:["blur"], minChars:8});
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "motdepasse");
</script>
</body>
</html>