<?php 
include("../html/student_administration.html");
 ?>
 <?php 

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	//点击基本资料按钮
	if(!empty($_POST["documentBtn"]))
	{
		header("Refresh:0.1;url=student_formation.php");
	}
	if(!empty($_POST["adminBtn"]))
	{
		header("Refresh:0.1;url=student_edit.php");
	}
	if(!empty($_POST["pwdBtn"]))
	{
		header("Refresh:0.1;url=student_pwd.php");
	}
}



  ?>
 