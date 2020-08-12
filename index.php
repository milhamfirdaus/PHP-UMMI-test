<?php

if (isset($_GET['controller']) ) {	
	require_once('controller/'.$_GET['controller'].".php");
}
else{
	require_once('controller/mahasiswa.php');		
}

?>
