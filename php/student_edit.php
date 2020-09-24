<?php 
ob_start();//屏蔽掉后面一个PHPheader的错误
include("student_top.php");
include("../html/student_nav.html");
include("student_administration.php");
include("../html/student_edit.html");
include("../html/footer.html");
 ?>
 <?php 
//获取登录页的id号
 $editId=$_SESSION['id'];
//初始化
$trueNameEditT="";
$nichengEditT="";
$sex="";
$phoneNumEditT="";
$emailEditT="";
$departmentEditS="";
$classEditT="";
$yearEditT="";
$problemEditT="";
$answerEditT="";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	//点击确认按钮
	if(isset($_POST["editBtn"]))
	{
		include("conn.php");
		$sql="SELECT ID,nickname,realname,sex,phonenum,email,college,class,year FROM students WHERE isuse=1 AND ID='$editId'";
		$rs=mysqli_query($conn,$sql);
		if(!$rs)
		{
			printf("Error: %s\n", mysqli_error($conn));
		    exit();
		}
		$row = mysqli_fetch_array($rs);
		//信息判断及校验
		if(empty($_POST["trueNameEditT"]))
		{
			$trueNameEditT=$row["realname"];
			
		}
		else
		{
			//真实姓名为汉字
			$pattern = '/^[\x{4e00}-\x{9fa5}]+$/u';
			if(!preg_match($pattern,$_POST["trueNameEditT"]))
			{
				echo "<script>alert('真实姓名格式不对')</script>";
			}
			else
			{
				$trueNameEditT=$_POST["trueNameEditT"];
			}
			
		}

		if(empty($_POST["nichengEditT"]))
		{
			$nichengEditT=$row["nickname"];
		}
		else
		{
			$nichengEditT=$_POST["nichengEditT"];
		}
		if(empty($_POST["sex"]))
		{
			$sex=$row["sex"];
		}
		//女
		else if($_POST["sex"] == "女")
		{
			$sex=1;
		}
		//男
		else if($_POST["sex"] == "男")
		{
			$sex=0;
		}
		if(empty($_POST["phoneNumEditT"]))
		{
			$phoneNumEditT=$row["phonenum"];
		}
		else
		{
			//电话号码校验
			$pattern='/^1[34578]\d{9}$/';
			if(!preg_match($pattern,$_POST["phoneNumEditT"]))
			{
				echo "<script>alert('电话号码格式不对')</script>";
			}
			else
			{
				$phoneNumEditT=$_POST["phoneNumEditT"];
			}
		}
		if(empty($_POST["emailEditT"])){
			$emailEditT=$row["email"];
		}
		else
		{
			//邮箱校验
			$pattern='/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/';
			if(!preg_match($pattern,$_POST["emailEditT"]))
			{
				echo "<script>alert('邮箱格式不对')</script>";
			}
			else
			{
				$emailEditT=$_POST["emailEditT"];
			}	
		}
		if(empty($_POST["departmentEditS"]))
		{
			$departmentEditT=$row["college"];
		}
		else
		{
			$departmentEditT=$_POST["departmentEditS"];
		}
		if(empty($_POST["classEditT"]))
		{
			$classEditT=$row["class"];
		}
		else{
			//班级校验：汉字+数字5~10位
			$pattern = '/^[\x{4e00}-\x{9fa5}]|\d{5,10}$/u';
			if(!preg_match($pattern,$_POST["classEditT"]))
			{
				echo "<script>alert('班级格式不对')</script>";
			}
			else
			{
				$classEditT=$_POST["classEditT"];
			}
		}
		if(empty($_POST["yearEditT"]))
		{
			$yearEditT=$row["year"];
		}
		else
		{
			//年份校验，以12开头
			$pattern='/^[12]\d\d\d$/';
			if(!preg_match($pattern,$_POST["yearEditT"]))
			{
				echo "<script>alert('年份格式不对')</script>";
			}
			else{
				$yearEditT=$_POST["yearEditT"];
			}
		}
		
		$sql1="SELECT ID,question,answer FROM login WHERE isuse=1 AND ID='$editId'";
		$rs1=mysqli_query($conn,$sql1);
		if(!$rs1)
		{
			printf("Error: %s\n", mysqli_error($conn));
		    exit();
		}
		$row1 = mysqli_fetch_array($rs1);
		if(empty($_POST["problemEditT"]))
		{
			$problemEditT=$row1["question"];
		}
		else
		{
			$problemEditT=$_POST["problemEditT"];
		}
		if(empty($_POST["answerEditT"]))
		{
			$answerEditT=$row1["answer"];
		}
		else
		{
			$answerEditT=$_POST["answerEditT"];
		}

		$sql2="UPDATE login SET question='$problemEditT',realname='$trueNameEditT',answer='$answerEditT' WHERE ID='$editId'";
		$rs2=mysqli_query($conn,$sql2);
		if(!$rs2)
		{
			printf("Error: %s\n", mysqli_error($conn));
			exit();
		}
		
		$sql3="UPDATE students SET nickname='$nichengEditT',sex='$sex',phonenum='$phoneNumEditT',email='$emailEditT',college='$departmentEditT',class='$classEditT',year='$yearEditT' WHERE ID='$editId'";
		$rs3=mysqli_query($conn,$sql3);
		if(!$rs3)
		{
			printf("Error: %s\n", mysqli_error($conn));
			exit();
		}
		else
		{
			echo "<script>alert('修改成功')</script>";
			header("Refresh:0.1;url=student_formation.php");
			exit();
		}
		mysqli_close($conn);
	}
	//点击修改就业方向按钮
	else if(isset($_POST['pathEditBtn']))
	{
		header("Refresh:0.1;url=student_path.php");
	}
}
  ?>
