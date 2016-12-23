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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO commandeclient (IDclient, Reference, Nompiece, Quantite) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['IDClient'], "int"),
                       GetSQLValueString($_POST['reference'], "text"),
                       GetSQLValueString($_POST['Nompiece'], "text"),
                       GetSQLValueString($_POST['Quantite'], "int"));

  mysql_select_db($database_connexion, $connexion);
  $Result1 = mysql_query($insertSQL, $connexion) or die(mysql_error());

  $insertGoTo = "ValiderCommandes.php?Email=".$_POST['Email'];
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$colname_rsIDclient = "-1";
if (isset($_GET['Email'])) {
  $colname_rsIDclient = $_GET['Email'];
}
mysql_select_db($database_connexion, $connexion);
$query_rsIDclient = sprintf("SELECT ficheclient.IDclient  FROM ficheclient WHERE Email = %s", GetSQLValueString($colname_rsIDclient, "text"));
$rsIDclient = mysql_query($query_rsIDclient, $connexion) or die(mysql_error());
$row_rsIDclient = mysql_fetch_assoc($rsIDclient);
$totalRows_rsIDclient = mysql_num_rows($rsIDclient);
?>
             <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
 $(".reference").change(function()
 {
  var id=  $(this).val();
  var dataString = 'id='+ id;
 
  $.ajax
  ({
   type: "POST",
   url: "Nompiece.php",
   data: dataString,
   cache: false,
   success: function(html)
   {
      $(".Nompiece").html(html);
   } 
   });
  });
 
});
</script>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8" >
<title>Buc motor</title>
<link rel="shortcut icon" href="favicon.ico" />
<meta name="viewport" content="width=device-width, height=device-height" />
<link href="css/styles.css" rel="stylesheet" type="text/css" />

</head>
<body>

<p>&nbsp;</p>
<div class="header-algemeneContainer">
	<div class="header">
		<div class="logo"><h1>BUC motor</h1>
		</div>
		<div class="menu">
        	<ul>
        		<li><a href="index.php" >ACCUEIL</a></li>
           
                <li><a href="Article-vente.php" >VENTES</a></li>
                
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
           	  <h1 align="center" class="cssbutton">COMMANDER VOS PIÈCES CHEZ BUC !</h1>
            </div>
            <div class="content">

                <form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
             
                <table width="360">
                  <tr>
                    <td width="163" height="60"><h2>Reference:</h2></td>
                    <td width="185"><label for="reference"></label>
                      <label for="reference"></label>
                       <select name="reference" class="reference">
                      <option selected="selected" value="0">--Select reference--</option>
                      <?php
include('Connections/db.php');
$sql=mysql_query("select * from gestionstock");
while($row=mysql_fetch_array($sql))
{
echo '<option value="'.$row['reference'].'">'.$row['reference'].'</option>';
} ?>
                  </select>
                  <tr>
                    <td height="60"><h2>Nom de la piece:</h2></td>
                     
                    <td><label for="Nompiece"></label>
                    
                      <select name="Nompiece" class="Nompiece">
                        <option  selected="selected">Automatique</option>

                      </select></td>
                  </tr>
                
                  <tr>
                    <td height="60"><h2>Quantité:</h2></td>
                    <td><input name="Quantite" type="text" class="inputtextfield" id="Quantite" /></td>
                  </tr>
                </table>

                
                <p>&nbsp;</p>
              <p align="center">
                <input type="hidden" name="IDClient" id="IDClient"value="<?php echo $row_rsIDclient['IDclient']; ?>" />
                 <input  name="Commandez" type="submit" class="cssbutton" id="Commandez" value="Commander" />
              </p>
               
     <input type="hidden"  name="IDclient" id="IDclient" value="<?php $_POST['IDclient']?>"/>
     <input type="hidden" name="MM_insert" value="form1" />
              </form>
              <form id="form1" name="form1" method="POST" action="Apercevoir-commandes.php?IDclient=<?php echo $row_rsIDclient['IDclient']; ?>">
               <button class="cssbutton" type="submit" name="fincommande" id="fincommande" value="<?php echo $row_rsIDclient['IDclient']; ?>" >Fin de commande</button> 
               </form>
              <p>&nbsp;</p>
          </div>
        </div>
        
       
	</div><!---page--->
</div><!---Rightcol--->
</div>
<?php include_once('footer/footer.php'); ?>
</body>
</html>
<?php
mysql_free_result($rsIDclient);
?>
