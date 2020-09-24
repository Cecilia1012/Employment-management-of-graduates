<?php 
//获取登录页面的id号
	$studentsId=$_SESSION['id'];
	include("conn.php");
	$sql = "SELECT students.ID,nickname,students.realname,sex,phonenum,email,college,class,year,question,answer,go FROM students,login WHERE students.ID ='$studentsId' AND login.ID='$studentsId' AND students.isuse=login.isuse=1";
	$rs=mysqli_query($conn,$sql);
	if(!$rs)
	{
		printf("Error: %s\n", mysqli_error($conn));
		exit();
	}
	else
	{
		$row = mysqli_fetch_array($rs);
		if($row['sex'] == "1")
		{
			$sexView="女";
		}
		if($row['sex'] == "0")
		{
			$sexView="男";
		}
		echo "<p>".$studentsId."</p>";
		echo "<p>".$row['realname']."</p>";
		echo "<p>".$sexView."</p>";
		echo "<p>".$row['phonenum']."</p>";
		echo "<p>".$row['email']."</p>";
		echo "<p>".$row['college']."</p>";
		echo "<p>".$row['class']."</p>";
		echo "<p>".$row['year']."</p>";
		echo "<p>".$row['question']."</p>";
		echo "<p>".$row['answer']."</p>";
		echo "<p style='position:relative;top:-200px;left:-550px'>".$row['nickname']."</p>";

		//获取就业去向
		$path=$row['go'];

	}
	// ob_start();
	//提交表单
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		echo "enen$path";
		//点击就业按钮
		if(isset($_POST["path"]))
		{

			//1=就业
			if($path=="1")
			{
				header("location:student_jiuye.php");

			}
			//2=创业
			else if($path==2)
			{
				header("Location:student_chuangye.php");
			}
			//3=读研
			else if($path==3)
			{
				header("Location:student_duyan.php");
			}
			//4=待业
			else if($path==4)
			{
				header("Location:student_daiye.php");
			}

		}
	}
	
	mysqli_close($conn);
  ?>