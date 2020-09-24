<!-- 版权声明
	Author:廖一凡
    Date:2019.6.3
    Version:v3.0 
 -->
 <?php 
    //头部
	include("../html/login_top_create.html");
	//注册表单
	include("../html/login_create.html");
	//版权
	include("../html/footer.html");
 ?>
 <?php 
    session_start();
	//初始化，防止出现未定义就使用的错误
	$newId="";
	$newPwd="";
	$againPwd="";
	$newTrueName="";
	$newProfession="";
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//点击提交按钮
		if(isset($_POST["createBtnB"]))
		{
			//用户名是否为空
			if(empty($_POST["newId"]))
			{
				echo "<script>alert('用户名不可为空')</script>";
			}
			//密码是否为空
			if(empty($_POST["newPwd"]))
			{
				echo "<script>alert('密码不可为空')</script>";
			}
			//确认密码是否为空
			if(empty($_POST["againPwd"]))
			{
				echo "<script>alert('请再次确认密码')</script>";
			}
			//真实姓名是否为空
			if(empty($_POST["newTrueName"]))
			{
				echo "<script>alert('真实姓名不可为空')</script>";
			}
			else
			{
				//获取文本框信息
				$newId=$_POST["newId"];
				$newPwd=$_POST["newPwd"];
				$againPwd=$_POST["againPwd"];
				$newTrueName=$_POST["newTrueName"];
				$newProfession=$_POST["newProfession"];
				
				//用户名文本框信息校验
				//字符+数字3~10位
			    $pattern = '/^[A-Za-z0-9]{3,15}+$/u';
				// $pattern = '/^\d{6,15}$/';
				if(!preg_match($pattern,$newId))
				{
					echo "<script>alert('用户名格式不正确')</script>";
				}
				//真实姓名信息校验
				//真实姓名为汉字
				$pattern = '/^[\x{4e00}-\x{9fa5}]+$/u';
				if(!preg_match($pattern,$newTrueName))
				{
					echo "<script>alert('真实姓名格式不正确')</script>";
				}
				if($newPwd != $againPwd)
				{
					echo "<script>alert('密码不一致')</script>";
				}
				else
				{
					//连接数据库
					include("conn.php");
					//登录表中去匹配用户名
					$sql1 = "SELECT ID FROM login WHERE isuse=1 AND ID='$newId'";
					$rs1 = mysqli_query($conn,$sql1);
					if(!$rs1)
					{
						printf("Error: %s\n", mysqli_error($conn));
						exit();
					}
					//是否已存在
					if(mysqli_num_rows($rs1))
					{
						echo "<script>alert('该用户已存在')</script>";
					}
					else
					{
						//教师注册
						if($newProfession == "createTeacher")
						{
							$sql21 = "INSERT INTO teachers (ID,nickname,realname,sex,phonenum,email,college,class,year,isuse) VALUES ('$newId','null','$newTrueName',0,'null','null','null','null','null',1)";
							$rs21 = mysqli_query($conn,$sql21);
							if(!$rs21)
							{
								printf("Error: %s\n", mysqli_error($conn));
							    exit();
							}
						}
						//学生注册
						else if($newProfession == "createStudent")
						{
							$sql22 = "INSERT INTO students (ID,nickname,realname,sex,phonenum,email,college,class,year,go,isuse) VALUES ('$newId','null','$newTrueName',0,'null','null','null','null','null',1,1)";
							$rs22 = mysqli_query($conn,$sql22);
							if(!$rs22)
							{
								printf("Error: %s\n", mysqli_error($conn));
							    exit();
							}
						}
						$sql2 = "INSERT INTO login (ID,password,question,answer,realname,isuse) VALUES ('$newId','$newPwd','null','null','$newTrueName',1)";
						$rs2 = mysqli_query($conn,$sql2);
						if(!$rs2)
						{
							printf("Error: %s\n", mysqli_error($conn));
						    exit();
						}
						else
						{
							echo "<script>alert('注册成功！')</script>";
				 		    header("location:login.php");
						}
					}
					mysqli_close($conn);
				}
			}
		}
	}
 ?>