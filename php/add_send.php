<?php
	if(!session_id()) session_start();
	function check($data,$pattern,$str){
		if(!preg_match($pattern, $data))
			echo "<script>alert('".$str."');</script>";
	}
	function emptyd($data){
		if(empty($data))
			echo "<script>alert('内容不能为空');</script>";
		header("add.php");
	}
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(isset($_POST['send']))
		{
			//初始化
			$sex="";
			//获取文本内容
			$id=$_POST['id'];
			$name=$_POST['name'];
			$sex=$_POST['sex'];
			$phone=$_POST['phone'];
			$college=$_POST['college'];
			$class=$_POST['class'];
			$year=$_POST['year'];
			$go=$_POST['go'];

			//校验是否为空
			emptyd($id);emptyd($name);emptyd($phone);emptyd($class);emptyd($year);
			//校验格式
			//id
			$pattern='/^\d{13}$/';$str="id长度不正确";
			check($id,$pattern,$str);
			//姓名
			$pattern='/^[\x{4e00}-\x{9fa5}]+$/u';$str="姓名为汉字";
			check($name,$pattern,$str);
			//电话号码
			$pattern='/^1[34578]\d{9}$/';$str="电话号码格式不对";
			check($phone,$pattern,$str);
			//班级
			$pattern='/^[\x{4e00}-\x{9fa5}]|\d{5,10}$/u';$str="班级格式不对，应为汉字+数字，例软工172";
			check($class,$pattern,$str);
			//年份校验，以1或2开头
			$pattern='/^[12]\d\d\d$/';$str="年份格式不对，应为：例2017";
			check($year,$pattern,$str);

			//插入数据
			if($go=="就业")
				$gonum=1;
			else if($go=="创业")
				$gonum=2;
			else if($go=="读研")
				$gonum=3;
			else if($go=="待业")
				$gonum=4;
			//连接数据库
			include("conn.php");
			$sql="INSERT INTO students (ID,realname,sex,phonenum,college,class,year,go) VALUES ('".$id."','".$name."','".$sex."','".$phone."','".$college."','".$class."','".$year."','".$gonum."')";
			if($gonum==1)
				$sql="INSERT INTO employment (ID) VALUES ('".$_POST['id']."')";
			else if($gonum==2)
				$sql="INSERT INTO business (ID) VALUES ('".$_POST['id']."')";
			else if($gonum==3)
				$sql="INSERT INTO graduate (ID) VALUES ('".$_POST['id']."')";
			else if($gonum==4)
				$sql="INSERT INTO wait (ID) VALUES ('".$_POST['id']."')";
			echo "<script>alert('添加成功');</script>";
			header('Location:teacher_main.php');
			mysqli_close($conn);
		}
	}
?>