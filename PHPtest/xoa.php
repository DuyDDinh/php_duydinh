<?php
	require "condb.php";
?>
<?php
	if( isset($_GET["id"])){
	 $id =$_GET["id"] ;
	}

 

?>
<?php
    $sql  = "DELETE FROM thick where id = $id";
    $qr = mysql_query($sql) ;
    header("location: index.php")


?>