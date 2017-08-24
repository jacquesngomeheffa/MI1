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
?>
        <?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['adresEmail'])) {
  $loginUsername=$_POST['adresEmail'];
  $password=$_POST['motdepasse'];
  $MM_fldUserAuthorization = "userlevel";
  $MM_redirectLoginSuccess = "Admin/index.php";
  $MM_redirectLoginFailed = "Connexion.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_connexion, $connexion);
  	
  $LoginRS__query=sprintf("SELECT AdresEmail, mot_de_passe, userlevel FROM connecter WHERE AdresEmail=%s AND mot_de_passe=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $connexion) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'userlevel');
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
            <!DOCTYPE html>
            <html lang="fr">

            <head>
                <meta charset="utf-8">
                <title>Buc motor</title>
                <link rel="shortcut icon" href="favicon.ico" />
                <meta name="viewport" content="width=device-width, height=device-height" />
                <link href="css/styles.css" rel="stylesheet" type="text/css" /> </head>

            <body>
                <div class="header-algemeneContainer">
                    <div class="header">
                        <div class="logo">
                            <h1>BUC motor</h1> </div>
                        <div class="menu">
                            <ul>
                                <li><a href="index.php">ACCUEIL</a></li>
                                <li><a href="Article-vente.php">VENTES</a></li>
                                <li>
                                    <div class="autremenu center"><a href="contact.php">CONTACT</a></div>
                                </li>
                                <li><a href="about.php">NOUS BUC</a></li>
                                <li><a href="inscription.php">INSCRIPTION </a>|<a href="Connexion.php" class="active"> CONNEXION</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!---header-algemeneContainer--->
                <div class="algemeneContainer">
                    <div class="linksContainer">
                        <div class="recherche">
                            <div class="title">
                                <h1>Site Search</h1>
                                <div class="recherche-input">
                                    <input name="" type="text" class="input-style" /> </div>
                                <div class="recherche-btn"><img src="images/recherche-btn.jpg" alt="recherche" /></div>
                            </div>
                        </div>
                        <div class="block2">
                            <?php include_once('Personnels/personnel.php'); ?>
                        </div>
                    </div>
                </div>
                <!---linksContainer--->
                <div class="rechtsContainer">
                    <div class="onthaalFoto center">
                        <?php include_once('photo-Slider/index.html'); ?>
                    </div>
                    <div class="page center">
                        <div class="panel mar-bottom">
                            <div class="title ">
                                <form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
                                    <table width="324" class="align">
                                        <tr>
                                            <td width="166" height="39">
                                                <h2>Adresse Email:</h2> </td>
                                            <td width="146">
                                                <label for="adresEmail"></label>
                                                <input name="adresEmail" type="text" class="inputtextfield" id="adresEmail" /> </td>
                                        </tr>
                                        <tr>
                                            <td height="36">
                                                <h2>Mot de passe:</h2> </td>
                                            <td>
                                                <label for="motdepasse"></label>
                                                <input name="motdepasse" type="password" class="inputtextfield" id="motdepasse" /> </td>
                                        </tr>
                                        <tr>
                                            <td height="32">&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </table>
                                    <p class="align">
                                        <input name="Connecter" type="submit" class="cssbutton" id="Connecter" value="Connexion" /> </p>
                                </form>
                                <h1>&nbsp;</h1> </div>
                            <div class="content"> </div>
                        </div>
                    </div>
                    <!---page--->
                </div>
                <!---Rightcol--->
                </div>
                <?php include_once('footer/footer.php'); ?>
            </body>

            </html>