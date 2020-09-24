<?php 
 $goView="";
 //获取登录页面的id号
	$studentsId=$_SESSION['id'];

	include("conn.php");
	$sql = "SELECT nickname,go,school,speciality,address,advisor,graduate.phonenum FROM graduate,students WHERE students.ID='$studentsId' AND graduate.ID ='$studentsId' AND students.isuse=1 AND graduate.isuse=1";
	$rs=mysqli_query($conn,$sql);

	if(!$rs)
	{
		printf("Error: %s\n", mysqli_error($conn));
		exit();
	}

	else
	{

		$row = mysqli_fetch_array($rs);
		if($row['go'] == "3")
		{
			$goView="读研";
		}
		echo "<p>".$goView."</p>";
		echo "<p>".$row['school']."</p>";
		echo "<p>".$row['speciality']."</p>";
		echo "<p>".$row['address']."</p>";
		echo "<p>".$row['advisor']."</p>";
		echo "<p>".$row['phonenum']."</p>";
		echo "<p style='position:relative;top:0px;left:-400px'>".$row['nickname']."</p>";

	}
	mysqli_close($conn);
	//提交表单
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		if(isset($_POST['backDBtn']))
		{
			header("location:student_formation.php");
		}
	}


  ?>