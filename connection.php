<?php

	$con= mysqli_connect("localhost","root","","id12217135_yourmerchandise");
	if(!$con)
	{
		echo "Not Connected to server";
	}
	else {
		echo "Connected";
	}
?>
