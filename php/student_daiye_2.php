<?php 
 $goView="";
 //获取登录页面的id号
	$studentsId=$_SESSION['id'];

	include("conn.php");
	$sql = "SELECT nickname,go,address,wait.phonenum FROM wait,students WHERE students.ID='$studentsId' AND wait.ID ='$studentsId' AND students.isuse=1 AND wait.isuse=1";
	$rs=mysqli_query($conn,$sql);

	if(!$rs)
	{
		printf("Error: %s\n", mysqli_error($conn));
		exit();
	}

	else
	{

		$row = mysqli_fetch_array($rs);
		if($row['go'] == "4")
		{
			$goView="待业";
		}
		echo "<p>".$goView."</p>";
		echo "<p>".$row['address']."</p>";
		echo "<p>".$row['phonenum']."</p>";
		echo "<p style='position:relative;left:-400px'>".$row['nickname']."</p>";

	}
	mysqli_close($conn);
	//提交表单
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		if(isset($_POST['backDYBtn']))
		{
			header("location:student_formation.php");
		}
	}


  ?>