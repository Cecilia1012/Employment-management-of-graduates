<?php 
include("student_top.php");
include("../html/student_nav.html");
include("student_administration.php");
include("../html/student_path.html");
include("../html/student_edit_duyan.html");
include("../html/footer.html");
 ?>
 <?php 
//获取登录页的id号
 $editId=$_SESSION['id'];
//初始化
$schoolEditT="";
$jobEditT="";
$schoolAddressEditT="";
$advisorEditT="";
$advisorPhoneEditT="";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	//点击确认按钮
	if(isset($_POST["duyanEditBtn"]))
	{
		include("conn.php");
		$sql="SELECT ID,school,speciality,address,advisor,phonenum FROM graduate WHERE isuse=1 AND ID='$editId'";
		$rs=mysqli_query($conn,$sql);
		if(!$rs)
		{
			printf("Error: %s\n", mysqli_error($conn));
		    exit();
		}
		else
		{
			//获取执行行数
			$test=mysqli_num_rows($rs);
			// echo "test:{$test}";
			//如果读研表中本来存在该用户,变0为1
			if($test!=0)
			{
				$row = mysqli_fetch_array($rs);
				//信息判断及校验
				if(empty($_POST["schoolEditT"]))
				{
					$schoolEditT=$row["school"];
				}
				else
				{
					$schoolEditT=$_POST["schoolEditT"];
				}
				if(empty($_POST["jobEditT"]))
				{
					$jobEditT=$row["job"];
				}
				else
				{
					$jobEditT=$_POST["jobEditT"];
				}
				if(empty($_POST["schoolAddressEditT"]))
				{
					$schoolAddressEditT=$row["address"];
				}
				else
				{
					$schoolAddressEditT=$_POST["schoolAddressEditT"];
				}
				if(empty($_POST["advisorEditT"]))
				{
					$advisorEditT=$row["advisor"];
				}
				else
				{
					$advisorEditT=$_POST["advisorEditT"];
				}
				if(empty($_POST["advisorPhoneEditT"]))
				{
					$advisorPhoneEditT=$row["phonenum"];
				}
				else
				{
					//电话号码校验
					$pattern='/^1[34578]\d{9}$/';
					if(!preg_match($pattern,$_POST["advisorPhoneEditT"]))
					{
						echo "<script>alert('电话号码格式不对')</script>";
					}
					else
					{
						$advisorPhoneEditT=$_POST["advisorPhoneEditT"];
					}
				}
				//修改读研表中的信息
				$sql2="UPDATE graduate SET school='$schoolEditT',speciality='$jobEditT',address='$schoolAddressEditT',advisor='$advisorEditT',phonenum='$advisorPhoneEditT' WHERE ID='$editId' AND isuse=1";
				$rs2=mysqli_query($conn,$sql2);
				if(!$rs2)
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

			}
			//如果读研表中本来不存在该用户,需要新建
			else
			{
				//信息判断及校验
				if(empty($_POST["schoolEditT"]))
				{
					echo "<script>alert('请输入就读学校')</script>";
				}
				else
				{
					$schoolEditT=$_POST["schoolEditT"];
				}
				if(empty($_POST["jobEditT"]))
				{
					echo "<script>alert('请输入专业')</script>";
				}
				else
				{
					$jobEditT=$_POST["jobEditT"];
				}
				if(empty($_POST["schoolAddressEditT"]))
				{
					echo "<script>alert('请输入学校地址')</script>";
				}
				else
				{
					$schoolAddressEditT=$_POST["schoolAddressEditT"];
				}
				if(empty($_POST["advisorEditT"]))
				{
					echo "<script>alert('请输入导师')</script>";
				}
				else
				{
					$advisorEditT=$_POST["advisorEditT"];
				}
				if(empty($_POST["advisorPhoneEditT"]))
				{
					echo "<script>alert('请输入导师联系电话')</script>";
				}
				else
				{
					//电话号码校验
					$pattern='/^1[34578]\d{9}$/';
					if(!preg_match($pattern,$_POST["advisorPhoneEditT"]))
					{
						echo "<script>alert('电话号码格式不对')</script>";
					}
					else
					{
						$advisorPhoneEditT=$_POST["advisorPhoneEditT"];
					}
				}

				$sql2="INSERT INTO graduate (ID,school,speciality,address,advisor,phonenum,isuse) VALUES('$editId','$schoolEditT','$jobEditT','$schoolAddressEditT','$advisorEditT','$advisorPhoneEditT',1)";
				$rs2 = mysqli_query($conn,$sql2);
				if(!$rs2)
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

			}
		}
		mysqli_close($conn);
	}
	//点击返回按钮
	else if(isset($_POST["duyanBackEditBtn"]))
	{
		header("Refresh:0.1;url=student_formation.php");
	}
}
  ?>
