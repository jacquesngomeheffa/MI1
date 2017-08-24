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

        <meta charset="utf-8">
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
                <div class="logo">
                    <h1>BUC motor</h1>
                </div>
                <div class="menu">
                    <ul>
                        <li><a href="index.php">ACCUEIL</a></li>

                        <li><a href="Article-vente.php">VENTES</a></li>

                        <li>
                            <div class="autremenu center"><a href="contact.php">CONTACT</a></div>
                        </li>
                        <li><a href="about.php">NOUS BUC</a></li>
                        <li><a href="inscription.php">INSCRIPTION </a>|<a href="Connexion.php"> CONNEXION</a></li>
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
                        <div class="recherche-input"><input name="" type="text" class="input-style" /></div>
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
            <div class="page">
                <div class="panel mar-bottom">
                    <div class="title">

                        <h1>&nbsp;</h1>
                        <h1 class="cssbutton">SOUHAITEZ-VOUS COMMANDER UNE PIÈCE CHEZ BUC !</h1>
                        <p>&nbsp;</p>
                        <h2 class="align"> Veuillez remplir ce formulaire si-dessous! </h2>
                    </div>
                    <div class="content">
                        <form action="<?php echo $editFormAction; ?>" method="post" id="form2" name="form2">
                            <table width="">
                                <tr>
                                    <td width="" height="60">
                                        <h2>Nom*:</h2>
                                    </td>
                                    <td width=""><label for="Nom"></label>
                                        <div class="align"><span id="sprytextfield4">
                      <input name="Nom" type="text" class="inputtextfield" id="Nom" size="25" />
                    <span class="textfieldRequiredMsg">Een waarde is verplicht.</span></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="60">
                                        <h2>Prénom*:</h2>
                                    </td>
                                    <td><label for="Prenom"></label>
                                        <div class="align"><span id="sprytextfield5">
                      <input name="Prenom" type="text" class="inputtextfield" id="Prenom" size="25" />
                    <span class="textfieldRequiredMsg">Een waarde is verplicht.</span></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="60">
                                        <h2>Numéro de telephone*:</h2>
                                    </td>
                                    <td>
                                        <div class="align">
                                            <input name="Telephone" type="text" class="inputtextfield" id="Telephone" size="25" />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="60">
                                        <h2>Nom Entreprise:</h2>
                                    </td>
                                    <td>
                                        <div class="align">
                                            <input name="Entreprise" type="text" class="inputtextfield" id="prenom2" size="25" />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="60">
                                        <h2>Votre adresse:</h2>
                                    </td>
                                    <td>
                                        <div class="align">
                                            <input name="Adresse" type="text" class="inputtextfield" id="Adresse" size="25" />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="60">
                                        <h2>E-mail*:</h2>
                                    </td>
                                    <td>
                                        <div class="align"><span id="sprytextfield1">
                    <input name="Email" type="text" class="inputtextfield" id="Email" size="25" />
                    <span class="textfieldRequiredMsg">Een waarde is verplicht.</span><span class="textfieldInvalidFormatMsg">Ongeldige notatie.</span></span>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <p>&nbsp;</p>
                            <p class="align">
                                <input name="Suivant" type="submit" class="cssbutton" id="Suivant" value="Poursuivre la commande" />


                            </p>
                            <input type="hidden" name="MM_insert" value="form2" />
                        </form>
                    </div>
                </div>


            </div>
            <!---page--->
        </div>
        <!---Rightcol--->
        </div>
        <?php include_once('footer/footer.php'); ?>

        <p>&nbsp;</p>
        <script type="text/javascript">
            var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "email", {
                validateOn: ["blur"]
            });
            var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
            var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");

        </script>
    </body>

    </html>
