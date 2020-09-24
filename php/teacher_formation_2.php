
<?php 
    //获取登录页面的id号
	$teachersId=$_SESSION['id'];
	include("conn.php");
	$sql = "SELECT teachers.ID,nickname,teachers.realname,sex,phonenum,email,college,class,year,question,answer FROM teachers,login WHERE teachers.ID ='$teachersId' AND login.ID='$teachersId' AND teachers.isuse=login.isuse=1";
	$rs=mysqli_query($conn,$sql);
	if(!$rs)
	{
		printf("Error: %s\n", mysqli_error($conn));
		exit();
	}
	else
	{
		$row = mysqli_fetch_array($rs);
		if($row['sex'] == 1)
		{
			$sexView="女";
		}
		if($row['sex'] == 0)
		{
			$sexView="男";
		}
		echo "<p >".$teachersId."</p>";
		echo "<p >".$row['realname']."</p>";
		echo "<p >".$sexView."</p>";
		echo "<p >".$row['phonenum']."</p>";
		echo "<p >".$row['email']."</p>";
		echo "<p >".$row['college']."</p>";
		echo "<p>".$row['class']."</p>";
		echo "<p >".$row['year']."</p>";
		echo "<p >".$row['question']."</p>";
		echo "<p>".$row['answer']."</p>";
		echo "<h1 style='position:relative;top:-1000px;left:180px'>".$row['nickname']."</h1>";

	}
	mysqli_close($conn);

 ?>