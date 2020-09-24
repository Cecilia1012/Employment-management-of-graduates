<?php 
include("student_top.php");
include("../html/student_nav.html");
include("student_administration.php");
include("../html/student_path.html");
include("../html/student_edit_jiuye.html");
include("../html/footer.html");
 ?>
<?php 
//获取登录页的id号
 $editId=$_SESSION['id'];
//初始化
$companyEditT="";
$jobEditT="";
$companyAddressEditT="";
$companyPhoneEditT="";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	//点击确认按钮
	if(isset($_POST["jiuyeEditBtn"]))
	{
		include("conn.php");
		$sql="SELECT ID,company,job,address,phonenum FROM employment WHERE isuse=1 AND ID='$editId'";
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
			//如果就业表中本来存在该用户,变0为1
			if($test!=0)
			{
				$row = mysqli_fetch_array($rs);
				//信息判断及校验
				if(empty($_POST["companyEditT"]))
				{
					$companyEditT=$row["company"];
				}
				else
				{
					$companyEditT=$_POST["companyEditT"];
				}
				if(empty($_POST["jobEditT"]))
				{
					$jobEditT=$row["job"];
				}
				else
				{
					$jobEditT=$_POST["jobEditT"];
				}
				if(empty($_POST["companyAddressEditT"]))
				{
					$companyAddressEditT=$row["address"];
				}
				else
				{
					$companyAddressEditT=$_POST["companyAddressEditT"];
				}
				if(empty($_POST["companyPhoneEditT"]))
				{
					$companyPhoneEditT=$row["phonenum"];
				}
				else
				{
					//电话号码校验
					$pattern='/^1[34578]\d{9}$/';
					if(!preg_match($pattern,$_POST["companyPhoneEditT"]))
					{
						echo "<script>alert('电话号码格式不对')</script>";
					}
					else
					{
						$companyPhoneEditT=$_POST["companyPhoneEditT"];
					}
				}
				//修改就业表中的信息
				$sql2="UPDATE employment SET company='$companyEditT',job='$jobEditT',address='$companyAddressEditT',phonenum='$companyPhoneEditT'  WHERE ID='$editId' AND isuse=1";
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
			//如果就业表中本来不存在该用户,需要新建
			else
			{
				//信息判断及校验
				if(empty($_POST["companyEditT"]))
				{
					echo "<script>alert('请输入创业公司信息')</script>";
				}
				else
				{
					$companyEditT=$_POST["companyEditT"];
				}
				if(empty($_POST["jobEditT"]))
				{
					echo "<script>alert('请输入职务信息')</script>";
				}
				else
				{
					$jobEditT=$_POST["jobEditT"];
				}
				if(empty($_POST["companyAddressEditT"]))
				{
					echo "<script>alert('请输入公司地址')</script>";
				}
				else
				{
					$companyAddressEditT=$_POST["companyAddressEditT"];
				}
				if(empty($_POST["companyPhoneEditT"]))
				{
					echo "<script>alert('请输入公司电话')</script>";
				}
				else
				{
					//电话号码校验
					$pattern='/^1[34578]\d{9}$/';
					if(!preg_match($pattern,$_POST["companyPhoneEditT"]))
					{
						echo "<script>alert('电话号码格式不对')</script>";
					}
					else
					{
						$companyPhoneEditT=$_POST["companyPhoneEditT"];
					}
				}

				$sql2="INSERT INTO employment (ID,company,job,address,phonenum,isuse) VALUES('$editId','$companyEditT','$jobEditT','$companyAddressEditT','$companyPhoneEditT',1)";
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
	else if(isset($_POST["jiuyeBackEditBtn"]))
	{
		header("Refresh:0.1;url=student_formation.php");
	}
}
  ?>
