<?php 
	session_start();
	//初始化，防止出现未定义就使用的错误
	$id="";
	$password="";
	$profession="";
	
	//提交表单
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//点击登录按钮
		if(isset($_POST["loginBtn"]))
		{
			//用户名是否为空
			if(empty($_POST["id"]))
			{
				echo "<script>alert('用户名不可为空')</script>";
			}
			//密码是否为空
			if(empty($_POST["password"]))
			{
				echo "<script>alert('密码不可为空')</script>";
			}
			else
			{
				//获取文本框信息
				$id = $_POST["id"];
				$password = $_POST["password"];
				$profession = $_POST["profession"];
				//连接数据库
				include("conn.php");
				//如果单选按钮选择教师端
				if($profession == "teacher")
				{
					//登录表中去匹配用户名
					$sql = "SELECT ID FROM login WHERE isuse=1 AND ID='$id'";
					//执行一条MySQL查询
					$rs = mysqli_query($conn,$sql);
					if (!$rs) {
					printf("Error: %s\n", mysqli_error($conn));
					exit();
					}
					if(!mysqli_num_rows($rs))
					{
					    echo "<script>alert('该用户名不存在')</script>";
					}
					else
					{
						
					    //登录表中去匹配用户名和密码
						$sql = "SELECT ID,password FROM login WHERE isuse=1 AND ID='$id' AND password='$password'";
						//执行一条MySQL查询
						$rs = mysqli_query($conn,$sql);
						if (!$rs) 
						{
						    printf("Error: %s\n", mysqli_error($conn));
						    exit();
						}
						$row=mysqli_fetch_array($rs);
						//传参
					    $_SESSION["id"]=$row['ID'];
						if(!mysqli_num_rows($rs))
						{
						    echo "<script>alert('密码错误')</script>";
						    //传参
						    echo"<a href='forget.php?id=".$id."'  >忘记密码？</a>";
						    
						}
						else
						{
						    
						    echo "<script>alert('登陆成功')</script>";
						    header("Refresh:0.1 url=teacher_main.php");
						}
					}
				}
				//学生端
				else if($profession == "student")
				{
					//登录表中去匹配用户名
					$sql = "SELECT ID FROM login WHERE isuse=1 AND ID='$id'";
					//执行一条MySQL查询
					$rs = mysqli_query($conn,$sql);
					if (!$rs) {
					printf("Error: %s\n", mysqli_error($conn));
					exit();
					}
					if(!mysqli_num_rows($rs))
					{
					    echo "<script>alert('该用户名不存在')</script>";
					}
					else
					{

					    //登录表中去匹配用户名和密码
						$sql = "SELECT ID,password FROM login WHERE isuse=1 AND ID='$id' AND password='$password'";
						//执行一条MySQL查询
						$rs = mysqli_query($conn,$sql);
						if (!$rs) 
						{
						    printf("Error: %s\n", mysqli_error($conn));
						    exit();
						}
						$row=mysqli_fetch_array($rs);
						//传参
					    $_SESSION["id"]=$row['ID'];
						if(!mysqli_num_rows($rs))
						{
						    echo "<script>alert('密码错误')</script>";
						    echo"<a href='forget.php?id=".$id."'  >忘记密码？</a>";
						}
						else
						{
						    
						    echo "<script>alert('登陆成功')</script>";
						    header("Refresh:0.1 url=student_main.php");
						}
					}
				}
				mysqli_close($conn);
			}

		}
		//点击注册按钮
		else if(isset($_POST["createBtn"]))
		{
			header("location:create.php");

		}

	}
 ?>