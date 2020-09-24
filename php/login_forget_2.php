<?php 
    session_start();
    //初始化，防止出现未定义就使用的错误
    $answer="";
    //获取登录页面的id号
	$forgetId=$_GET['id'];

    // echo "enen$forgetId";
    //连接数据库
    include("conn.php");
    $sql = "SELECT ID, question FROM login WHERE ID='$forgetId' AND ISUSE=1";
    $rs=mysqli_query($conn,$sql);
	if(!$rs)
	{
	    printf("Error: %s\n", mysqli_error($conn));
		exit();
	}
	else
	{
		$row=mysqli_fetch_array($rs);
		echo "<input type='text' name='forgetId' value='".$row["ID"]."' style='position:relative;top:-20px' >";
		echo "<input type='text' name='problemView' value='".$row["question"]."' >";
	}
    //提交表单
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//点击找回按钮
		if(isset($_POST["findBtn"]))
		{
			//答案框是否为空
			if(empty($_POST["answer"]))
			{
				echo "<script>alert('请输入答案')</script>";
			}
			else
			{
				$answer=$_POST["answer"];
				$sql1 = "SELECT answer,password FROM login WHERE isuse=1 AND ID='$forgetId' AND answer='$answer'";
				$rs = mysqli_query($conn,$sql1);
				if (!$rs) {
					printf("Error: %s\n", mysqli_error($conn));
					exit();
				}
				if(!mysqli_num_rows($rs))
				{
					echo "<script>alert('回答错误')</script>";
				}
				else
				{
					$row = mysqli_fetch_array($rs);
					echo "<script>alert('密码是：".$row["password"]."')</script>";
					header("Refresh:0.2 url=login.php");
				}
			}
		}

	}
	mysqli_close($conn);
  ?>