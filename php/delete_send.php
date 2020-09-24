<?php
	if(!session_id()) session_start();
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(isset($_POST['send']))
		{
			$id=$_GET['id'];
			include("conn.php");
			$sql="SELECT ID,go FROM students WHERE ID='$id'";
			$rs=mysqli_query($conn,$sql);
			$row=mysqli_fetch_array($rs);
			$gonum=$row['go'];
			$sql="UPDATE students SET isuse=0 WHERE ID='$id'";
			mysqli_query($conn,$sql);
			if($gonum==1)
				$sql="UPDATE employment SET isuse=0 WHERE ID='$id'";
			else if($gonum==2)
				$sql="UPDATE business SET isuse=0 WHERE ID='$id'";
			else if($gonum==3)
				$sql="UPDATE graduate SET isuse=0 WHERE ID='$id'";
			else if($gonum==4)
				$sql="UPDATE wait SET isuse=0 WHERE ID='$id'";
			mysqli_query($conn,$sql);
			echo "<script>alert('编辑成功');</script>";
			header('Location:teacher_main.php');
			mysqli_close($conn);
		}
	}
?>