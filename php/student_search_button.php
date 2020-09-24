<?php
	if(!session_id()) session_start();
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(isset($_POST['search']))
		{
			//获取查询框的内容
			$message=$_POST['searchtext'];
			//获取单选按钮的内容
			$radio=$_POST['searchop'];
			//连接数据库
			include("conn.php");

			//按学院、班级、入学年份查询
			if($radio==0||$radio==1||$radio==2)
			{
				if($radio==0)
					$sql="SELECT ID,realname,phonenum,college,class,year,go FROM students WHERE college='$message' AND isuse=1";
				else if($radio==1)
					$sql="SELECT ID,realname,phonenum,college,class,year,go FROM students WHERE class='$message' AND isuse=1";
				else if($radio==2)
					$sql="SELECT ID,realname,phonenum,college,class,year,go FROM students WHERE year='$message' AND isuse=1";
				$rs=mysqli_query($conn,$sql);
				//创建表格
				echo "<table>
					<tr>
						<td>用户名</td>
						<td>姓名</td>
						<td>电话号码</td>
						<td>所在学院</td>
						<td>所在班级</td>
						<td>入学年份</td>
						<td>就业去向</td>
						</tr>";
				while($row=mysqli_fetch_array($rs))
				{
					//添加数据
					$str="";
					if($row['go']==1)
						$str="就业";
					else if($row['go']==2)
						$str="创业";
					else if($row['go']==3)
						$str="读研";
					else if($row['go']==4)
						$str="待业";
					echo "<tr>
							<td>".$row['ID']."</td>
							<td>".$row['realname']."</td>
							<td>".$row['phonenum']."</td>
							<td>".$row['college']."</td>
							<td>".$row['class']."</td>
							<td>".$row['year']."</td>
							<td>".$str."</td>
						</tr>";
				}
				echo "</table>";
			}

			//按就业方向查询
			if($radio==3)
			{
				if($message=="就业")
					$num=1;
				else if($message=="创业")
					$num=2;
				else if($message=="读研")
					$num=3;
				else if($message=="待业")
					$num=4;
				$sql="SELECT ID,realname,phonenum,college,class,year,go FROM students WHERE go='$num' AND isuse=1";
				//创建表格
				echo "<table>
					<tr>
						<td>用户名</td>
						<td>姓名</td>
						<td>电话号码</td>
						<td>所在学院</td>
						<td>所在班级</td>
						<td>入学年份</td>
						<td>就业去向</td>
						</tr>";
				while($row=mysqli_fetch_array($rs))
				{
					//添加数据
					$str="";
					if($row['go']==1)
						$str="就业";
					else if($row['go']==2)
						$str="创业";
					else if($row['go']==3)
						$str="读研";
					else if($row['go']==4)
						$str="待业";
					echo "<tr>
							<td>".$row['ID']."</td>
							<td>".$row['realname']."</td>
							<td>".$row['phonenum']."</td>
							<td>".$row['college']."</td>
							<td>".$row['class']."</td>
							<td>".$row['year']."</td>
							<td>".$str."</td>
						</tr>";
				}
				echo "</table>";
			}
			//关闭数据库
			mysqli_close($conn);
		}
	}
?>