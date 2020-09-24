<?php 
include("student_top.php");
include("../html/student_nav.html");
include("student_administration.php");
include("../html/student_path.html");
include("../html/student_edit_daiye.html");
include("../html/footer.html");
 ?>
<?php 
//获取登录页的id号
 $editId=$_SESSION['id'];
//初始化
$homeAddressEditT="";
$homePhoneEditT="";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	//点击确认按钮
	if(isset($_POST["daiyeEditBtn"]))
	{
		include("conn.php");
		$sql="SELECT ID,address,phonenum FROM wait WHERE isuse=1 AND ID='$editId'";
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
			//如果待业表中本来存在该用户
			if($test!=0)
			{
				$row = mysqli_fetch_array($rs);
				//信息判断及校验
				if(empty($_POST["homeAddressEditT"]))
				{
					$homeAddressEditT=$row["address"];
				}
				else
				{
					$companyAddressEditT=$_POST["homeAddressEditT"];
				}
				
				if(empty($_POST["homePhoneEditT"]))
				{
					$homePhoneEditT=$row["phonenum"];
				}
				else
				{
					//电话号码校验
					$pattern='/^1[34578]\d{9}$/';
					if(!preg_match($pattern,$_POST["homePhoneEditT"]))
					{
						echo "<script>alert('电话号码格式不对')</script>";
					}
					else
					{
						$homePhoneEditT=$_POST["homePhoneEditT"];
					}
				}
				//修改创业表中的信息
				$sql2="UPDATE wait SET address='$homeAddressEditT',phonenum='addressPhoneEditT' WHERE ID='$editId' AND isuse=1";
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
			//如果创业表中本来不存在该用户,需要新建
			else
			{
				//信息判断及校验
				if(empty($_POST["homeAddressEditT"]))
				{
					echo "<script>alert('请输入居住地址')</script>";
				}
				else
				{
					$homeAddressEditT=$_POST["homeAddressEditT"];
				}
				if(empty($_POST["homePhoneEditT"]))
				{
					echo "<script>alert('请输入家庭电话')</script>";
				}
				else
				{
					//电话号码校验
					$pattern='/^1[34578]\d{9}$/';
					if(!preg_match($pattern,$_POST["homePhoneEditT"]))
					{
						echo "<script>alert('电话号码格式不对')</script>";
					}
					else
					{
						$homePhoneEditT=$_POST["homePhoneEditT"];
					}
				}

				$sql2="INSERT INTO wait (ID,address,phonenum,isuse) VALUES('$editId','$homeAddressEditT','$homePhoneEditT',1)";
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
	else if(isset($_POST["daiyeBackEditBtn"]))
	{
		header("Refresh:0.1;url=student_formation.php");
	}
}
  ?>
