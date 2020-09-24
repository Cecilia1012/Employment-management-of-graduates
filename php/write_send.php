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
	function change($data,$num){
		if($data=="就业")
			$num=1;
		else if($data=="创业")
			$num=2;
		else if($data=="读研")
			$num=3;
		else if($data=="待业")
			$num=4;
	}
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(isset($_POST['send']))
		{
			
			//获取原就业方向
			$sql="SELECT go FROM students WHERE id='$id'";
			$rs=mysqli_query($conn,$sql);
			$row=mysqli_fetch_array($rs);
			$old=$row['go'];
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

			//刷新数据
			$gonum=0;
			change($go,$gonum);
			//连接数据库
			include("conn.php");
			$sql="UPDATE students SET ID='$id',realname='$name',sex='$sex',phonenum='$phone',college='$college',class='$class',year='$year',go='$gonum' WHERE ID='$id'";
			mysqli_query($conn,$sql);
			//如果就业去向改变
			if($old!=$gonum)
			{
				//判断新的就业去向中是否已存在该毕业生
				if($old==1)
					$sql="SELECT ID FROM employment WHERE ID='$id'";
				else if($old==2)
					$sql="SELECT ID FROM business WHERE ID='$id'";
				else if($old==3)
					$sql="SELECT ID FROM graduate WHERE ID='$id'";
				else if($old==4)
					$sql="SELECT ID FROM wait WHERE ID='$id'";
				$rs=mysqli_query($conn,$sql);
				if($row=mysqli_fetch_array($rs))
				{
					//恢复存在状态
					if($old==1)
						$sql="UPDATE employment SET isuse=1 WHERE ID='$id'";
					else if($old==2)
						$sql="UPDATE business SET isuse=1 WHERE ID='$id'";
					else if($old==3)
						$sql="UPDATE graduate SET isuse=1 WHERE ID='$id'";
					else if($old==4)
						$sql="UPDATE wait SET isuse=1 WHERE ID='$id'";
					mysqli_query($conn,$sql);
				}
				else{
					//删除原有就业去向
					if($old==1)
						$sql="UPDATE employment SET isuse=0 WHERE ID='$id'";
					else if($old==2)
						$sql="UPDATE business SET isuse=0 WHERE ID='$id'";
					else if($old==3)
						$sql="UPDATE graduate SET isuse=0 WHERE ID='$id'";
					else if($old==4)
						$sql="UPDATE wait SET isuse=0 WHERE ID='$id'";
					mysqli_query($conn,$sql);
					//添加新的就业去向
					if($gonum==1)
						$sql="INSERT INTO employment (ID) VALUES ('".$_POST['id']."')";
					else if($gonum==2)
						$sql="INSERT INTO business (ID) VALUES ('".$_POST['id']."')";
					else if($gonum==3)
						$sql="INSERT INTO graduate (ID) VALUES ('".$_POST['id']."')";
					else if($gonum==4)
						$sql="INSERT INTO wait (ID) VALUES ('".$_POST['id']."')";
					mysqli_query($conn,$sql);
				}	
			}
			echo "<script>alert('编辑成功');</script>";
			header('Location:teacher_main.php');
			mysqli_close($conn);
		}
	}
?>