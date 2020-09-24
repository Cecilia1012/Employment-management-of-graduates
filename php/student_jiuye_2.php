<?php 
 $goView="";
 //获取登录页面的id号
	$studentsId=$_SESSION['id'];

	include("conn.php");
	$sql = "SELECT nickname,go,company,job,address,employment.phonenum FROM employment,students WHERE students.ID='$studentsId' AND employment.ID ='$studentsId' AND students.isuse=1 AND employment.isuse=1";
	$rs=mysqli_query($conn,$sql);

	if(!$rs)
	{
		printf("Error: %s\n", mysqli_error($conn));
		exit();
	}

	else
	{

		$row = mysqli_fetch_array($rs);
		if($row['go'] == "1")
		{
			$goView="就业";
		}
		echo "<p>".$goView."</p>";
		echo "<p>".$row['company']."</p>";
		echo "<p>".$row['job']."</p>";
		echo "<p>".$row['address']."</p>";
		echo "<p>".$row['phonenum']."</p>";
		echo "<p style='position:relative;top:0px;left:-450px'>".$row['nickname']."</p>";

	}
	mysqli_close($conn);
	//提交表单
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		if(isset($_POST['backJBtn']))
		{
			header("location:student_formation.php");
		}
	}

?>