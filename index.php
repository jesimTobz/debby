<?php 
    $active = session_start();

	if (!empty($active)) {
		echo "Welcome Here";
	} else {
		header("location: login.php");
	}

 ?>