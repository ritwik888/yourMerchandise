<?php

	$con= mysql_connect("localhost","root","");
	if($con)
	{
		$db=mysql_select_db("yourmerchandise");
		if($db)
		{
			//echo "Connected to database";
		}
		else
		{
			echo "Database not connected";
		}
	}
	else
	{
		echo "Not Connected to server";
	}
?>