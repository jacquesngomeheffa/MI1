<?php
/*
Author: Javed Ur Rehman
Website: https://htmlcssphptutorial.wordpress.com/
*/
?>
<?php
include('Connections/db.php');
if($_POST['id'])
{
$id=$_POST['id'];
$sql=mysql_query("select * from gestionstock where reference='$id'");
while($row=mysql_fetch_array($sql))
{
echo '<option value="'.$row['nompiece'].'">'.$row['nompiece'].'</option>';
}
}

?>