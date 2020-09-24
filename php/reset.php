<?php
	if(!session_id()) session_start();
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(isset($_POST['reset']))
		{
			header('Location:teacher_main.php');
		}
	}
?>