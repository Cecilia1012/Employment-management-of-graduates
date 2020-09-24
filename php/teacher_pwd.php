<?php 
// ob_start();
include("teacher_top.php");
include("../html/teacher_nav.html");
include("teacher_administration.php");
include("../html/teacher_pwd.html");
include("../html/footer.html");
 ?>

 <?php 
//获取登录页的id号
 $editId=$_SESSION['id'];
 //初始化
 $pwdedT="";
 $newPwdT="";
 $newAgainT="";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	if(isset($_POST["newpwdBtn"]))
	{
		//获取信息
		$pwdedT=$_POST["pwdedT"];
		$newPwdT=$_POST["newPwdT"];
		$newAgainT=$_POST["newAgainT"];
		if(empty($pwdedT))
		{
			echo "<script>alert('请输入原始密码')</script>";
		}
		else if(empty($newPwdT))
		{
			echo"<script>alert('请输入新的密码')</script>";
		}
		else if(empty($newAgainT))
		{
			echo"<script>alert('请再一次确认密码')</script>";
		}
		else if($newAgainT != $newPwdT)
		{
			echo"<script>alert('新密码不一致')</script>";
		}
		else
		{
			include("conn.php");
			$sql="SELECT password FROM login WHERE ID='$editId' AND isuse=1";
			$rs=mysqli_query($conn,$sql);
			if(!$rs)
			{
				printf("Error: %s\n", mysqli_error($conn));
			    exit();
			}
			$row=mysqli_fetch_array($rs);
			if($row['password'] != $pwdedT)
			{
				echo"<script>alert('原始密码错误，修改失败')</script>";
			}
			else
			{
				$sql1="UPDATE login SET password='$newPwdT' WHERE ID='$editId'";
				$rs1=mysqli_query($conn,$sql1);
				if(!$rs1)
				{
					printf("Error: %s\n", mysqli_error($conn));
				    exit();
				}
				else
				{
					echo"<script>alert('修改成功')</script>";
					header("Refresh:0.1 url=formation.php");
				}

			}
			mysqli_close($conn);
		}
		
	}
}
 ?>