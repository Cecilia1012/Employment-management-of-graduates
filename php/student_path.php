<?php 
include("student_top.php");
include("../html/student_nav.html");
include("student_administration.php");
include("../html/student_path.html");
include("../html/footer.html");
 ?>
 <?php 
//获取登录页的id号
 $editId=$_SESSION['id'];
//初始化
$pathEditS="";
$goDB="";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	//点击确认按钮
	if(isset($_POST["pathBtn"]))
	{
		//获取就业框信息
		$pathEditS=$_POST["pathEditS"];
		if($pathEditS=="就业")
		{
			$goDB=1;
		}
		else if($pathEditS=="创业")
		{
			$goDB=2;
		}
		else if($pathEditS=="读研")
		{
			$goDB=3;
		}
		else if($pathEditS=="待业")
		{
			$goDB=4;
		}
		// echo "go:$pathEditS";
		// echo "goDB:{$goDB}";
		include("conn.php");
		//修改学生表
		$sql="UPDATE students SET go='$goDB' WHERE isuse=1 AND ID='$editId'";
		$rs=mysqli_query($conn,$sql);
		if(!$rs)
		{
			printf("Error: %s\n", mysqli_error($conn));
		    exit();
		}
		if($pathEditS=="就业")
		{
			header("Refresh:0.1;url=student_edit_jiuye.php");
		}
		else if($pathEditS=="创业")
		{
			header("Refresh:0.1;url=student_edit_chuangye.php");
		}
		else if($pathEditS=="读研")
		{
			header("Refresh:0.1;url=student_edit_duyan.php");
		}
		else if($pathEditS=="待业")
		{
			header("Refresh:0.1;url=student_edit_daiye.php");
		}
		mysqli_close($conn);
	}
	//点击返回按钮
	else if(isset($_POST['pathBackBtn']))
	{
		header("Refresh:0.1;url=student_edit.php");
	}
}
 
  ?>