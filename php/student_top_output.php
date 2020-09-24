<?php 
    session_start();
    //获取登录页面的id号
	$studentsId=$_SESSION['id'];
	include("conn.php");
	//教师表中去匹配用户名
	$sql = "SELECT realname FROM students WHERE isuse=1 AND ID='$studentsId'";
	//执行一条MySQL查询
	$rs = mysqli_query($conn,$sql);
	if (!$rs) {
	    printf("Error: %s\n", mysqli_error($conn));
		exit();
	}
	$row=mysqli_fetch_array($rs);
	echo "<div id='welcome'><p>".$row['realname']."同学，欢迎进入管理系统</p></div>";
     mysqli_close($conn);

     // 提交表单
     if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//点击退出按钮
		if(!empty($_POST["exitBtn"]))
		{
			header("Location:index.php");
		}
	}
 ?>

