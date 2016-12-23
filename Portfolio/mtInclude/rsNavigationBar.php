<?php
// rsNavBar 1.0.2
// http://www.mediatafel.com (12/2008)
function rsNavigationBar($rsName,$delimiter,$whatNav = 1,$navItems = 11) {
	// $rsName = naam van de recordset.
	// $delimiter = Scheidingsteken.
	// $whatNav = Soort navigatie.
	// $navItems = Aantal gelijktijdig getoonde navitems
	// $currentPage = Absolute url van de pagina.
	global $currentPage; 
	// $totalRows = totaal aantal records in rsName
	eval("global \$totalRows_".$rsName.";");
	eval("\$totalRows = \$totalRows_".$rsName.";");
	// $maxRows = aantal gelijktijdig getoonde records
	eval("global \$maxRows_".$rsName.";");
	eval("\$maxRows = \$maxRows_".$rsName.";");
	// $pageNum = de getoonde reeks (start vanaf 0)
	eval("global \$pageNum_".$rsName.";");
	eval("\$pageNum = \$pageNum_".$rsName.";");
	
	// Bestaande URL parameters ophalen
	$urlString = "";
	$pNum = "pageNum_".$rsName;
	$tRows = "totalRows_".$rsName;
	if (!empty($_SERVER['QUERY_STRING'])) {
	  $params = explode("&", $_SERVER['QUERY_STRING']);
	  $newParams = array();
	  foreach ($params as $param) {
		if (stristr($param, $pNum) == false && stristr($param, $tRows) == false) {
		  array_push($newParams, $param);
		}
	  }
	  if (count($newParams) != 0) {
		$urlString = "&" . htmlentities(implode("&", $newParams));
	  }
	}
	
	switch ($whatNav){
	case (empty($maxRows)):
		echo("");
		break;
	case (1):
		// 1-10 | 11 - 20 | 21 - 30
		$thePage = -1;
		if ($totalRows > $maxRows) {
			echo('<span class="navBar">');
			for ($i=1;$i<=$totalRows;$i=$i+$maxRows){
				$thePage++; 
				$mt_rsNav = $i +$maxRows - 1;
				if ($mt_rsNav > $totalRows) {$mt_rsNav = $totalRows;}
					if ($thePage <> $pageNum) {
						echo("<a class=\"navBarLink\" href=\"".$currentPage."?pageNum_".$rsName."=".$thePage."&amp;totalRows_".$rsName."=".$totalRows.$urlString."\">". $i . "-" . $mt_rsNav . "</a>");
					} else {
						echo('<span class="navBarNoLink">' . $i . "-" . $mt_rsNav . '</span>');
					}
					//if ($thePage <> $pageNum) {echo();}
				if ($mt_rsNav <> $totalRows) {echo(" " . $delimiter . " ");}
			}
			echo('</span>');
		}	
		break;
	case (2):
		// 1 | 2 | 3
		$thePage = -1;
		$maxPage = ceil($totalRows / $maxRows);
		if ($totalRows > $maxRows) {
			echo('<span class="navBar">');
			for ($i=1;$i<=$maxPage;$i++){
				$thePage++; 
				if ($thePage <> $pageNum) {
					echo("<a class=\"navBarLink\" href=\"".$currentPage."?pageNum_".$rsName."=".$thePage."&amp;totalRows_".$rsName."=".$totalRows.$urlString."\">" . ($thePage + 1) . "</a>");
				} else {
					echo('<span class="navBarNoLink">' . ($thePage + 1) . '</span>');
				}
				if ($thePage <> $maxPage-1) {echo(" " . $delimiter . " ");}
			}
			echo('</span>');
		}
		break;
	case (3):
		// 1 [2] 3
		$thePage = -1;
		$maxPage = ceil($totalRows / $maxRows);
		if ($totalRows > $maxRows) {
			echo('<span class="navBar">');
			for ($i=1;$i<=$maxPage;$i++){
				$thePage++; 
				if ($thePage <> $pageNum) {
					echo("<a class=\"navBarLink\" href=\"".$currentPage."?pageNum_".$rsName."=".$thePage."&amp;totalRows_".$rsName."=".$totalRows.$urlString."\">" . ($thePage + 1) . "</a> ");
				} else {echo("<span class=\"navBarNoLink\">[".($thePage + 1)."]</span> ");}
			}
			echo('</span>');
		}
		break;
	default: echo("No navigation bar selected");
	}
}
?>