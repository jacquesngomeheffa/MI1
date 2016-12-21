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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_rsPieces = 15;
$pageNum_rsPieces = 0;
if (isset($_GET['pageNum_rsPieces'])) {
  $pageNum_rsPieces = $_GET['pageNum_rsPieces'];
}
$startRow_rsPieces = $pageNum_rsPieces * $maxRows_rsPieces;

mysql_select_db($database_connexion, $connexion);
$query_rsPieces = "SELECT * FROM gestionstock";
$query_limit_rsPieces = sprintf("%s LIMIT %d, %d", $query_rsPieces, $startRow_rsPieces, $maxRows_rsPieces);
$rsPieces = mysql_query($query_limit_rsPieces, $connexion) or die(mysql_error());
$row_rsPieces = mysql_fetch_assoc($rsPieces);

if (isset($_GET['totalRows_rsPieces'])) {
  $totalRows_rsPieces = $_GET['totalRows_rsPieces'];
} else {
  $all_rsPieces = mysql_query($query_rsPieces);
  $totalRows_rsPieces = mysql_num_rows($all_rsPieces);
}
$totalPages_rsPieces = ceil($totalRows_rsPieces/$maxRows_rsPieces)-1;

$queryString_rsPieces = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsPieces") == false && 
        stristr($param, "totalRows_rsPieces") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsPieces = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsPieces = sprintf("&totalRows_rsPieces=%d%s", $totalRows_rsPieces, $queryString_rsPieces);
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

$query_rsPieces = "SELECT * FROM gestionstock";
$rsPieces = mysql_query($query_rsPieces, $connexion) or die(mysql_error());
$row_rsPieces = mysql_fetch_assoc($rsPieces);
$totalRows_rsPieces = mysql_num_rows($rsPieces);
$query_rsPieces = "SELECT * FROM gestionstock";
$rsPieces = mysql_query($query_rsPieces, $connexion) or die(mysql_error());
$row_rsPieces = mysql_fetch_assoc($rsPieces);
$totalRows_rsPieces = mysql_num_rows($rsPieces);
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
<style type="text/css">
.couleur {
	font-family: Arial, Helvetica, sans-serif;
	color: #09F;
}
</style>
</head>
<body>

<div class="header-wrap">
	<div class="header">
		<div class="logo"><h1>BUC motor</h1>
		</div>
		<div class="menu">
        	<ul>
        		<li><a href="index.php" >ACCUEIL</a></li>
           
                <li><a href="Article-vente.php" class="active">VENTES</a></li>
                
              <li><div class="autremenu center"><a href="contact.php">CONTACT</a></div></li>
              <li><a href="about.php"> NOUS BUC</a></li> 
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


<div class="rightcol"><!---page--->
  <h1 class="cssbutton center" >LES PIECES DE VENTES DISPONIBLE</h1>

  <div class="center">
    <?php if ($totalRows_rsPieces > 0) { // Show if recordset not empty ?>
  <table width="" class="table" >
    <tr class="table-head">
      <td width="300" height="40" class="center">Pièces</td>
      <td width="300" height="40" class="center">Aperçue</td>
      <td width="300" height="40" class="center">Commandez</td>
    </tr>
    <?php do { ?>
      <tr>

        <td width="300" height="30" class="couleur center"><?php echo $row_rsPieces['nompiece']; ?></td>
        <td width="300" height="30" class="couleur center">Photo</td>
        <td width="300" height="30" class="couleur center"><a href="Commandes.php">Pré-Commander</a></td>
      </tr>
      <?php } while ($row_rsPieces = mysql_fetch_assoc($rsPieces)); ?>
  </table>
  <?php } // Show if recordset not empty ?>
  <p>&nbsp;</p>
   <p>&nbsp;</p>
   <div  class="center">
   <table border="0">
     <tr>
       <td><?php if ($pageNum_rsPieces > 0) { // Show if not first page ?>
           <a href="<?php printf("%s?pageNum_rsPieces=%d%s", $currentPage, 0, $queryString_rsPieces); ?>"><img src="images/First.gif" /></a>
           <?php } // Show if not first page ?></td>
       <td><?php if ($pageNum_rsPieces > 0) { // Show if not first page ?>
           <a href="<?php printf("%s?pageNum_rsPieces=%d%s", $currentPage, max(0, $pageNum_rsPieces - 1), $queryString_rsPieces); ?>"><img src="images/Previous.gif" /></a>
           <?php } // Show if not first page ?></td>
       <td><?php if ($pageNum_rsPieces < $totalPages_rsPieces) { // Show if not last page ?>
           <a href="<?php printf("%s?pageNum_rsPieces=%d%s", $currentPage, min($totalPages_rsPieces, $pageNum_rsPieces + 1), $queryString_rsPieces); ?>"><img src="images/Next.gif" /></a>
           <?php } // Show if not last page ?></td>
       <td><?php if ($pageNum_rsPieces < $totalPages_rsPieces) { // Show if not last page ?>
           <a href="<?php printf("%s?pageNum_rsPieces=%d%s", $currentPage, $totalPages_rsPieces, $queryString_rsPieces); ?>"><img src="images/Last.gif" /></a>
           <?php } // Show if not last page ?></td>
     </tr>
   </table>
   </div>
<?php if ($totalRows_rsPieces == 0) { // Show if recordset empty ?>
  <h1> PIÈCE DE VENTE NON DISPONIBLE </h1>
  <?php } // Show if recordset empty ?>
  </div>
</div><!---Rightcol--->
</div>
<?php include_once('footer/footer.php'); ?>
</body>
</html>
<?php
mysql_free_result($rsPieces);
?>
