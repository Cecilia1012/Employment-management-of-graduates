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

			//按就业去向查询
			if($radio==3)
			{
				if($message=="就业")
				{
					$sql="SELECT employment.ID,realname,college,class,company,job,address,employment.phonenum FROM employment,students WHERE employment.isuse=1 AND employment.ID=students.ID";
					$rs=mysqli_query($conn,$sql);
					//创建表格
					echo "<table>
					<tr>
						<td>用户名</td>
						<td>姓名</td>
						<td>所在学院</td>
						<td>所在班级</td>
						<td>就业去向</td>
						<td>就职公司</td>
						<td>职务</td>
						<td>公司地址</td>
						<td>公司电话</td>
						</tr>";
						if(!$rs)
						{
							printf("Error: %s\n", mysqli_error($conn));
							exit();
						}
					while($row=mysqli_fetch_array($rs))
					{
						//添加数据
						echo "<tr>
							<td>".$row[0]."</td>
							<td>".$row['realname']."</td>
							<td>".$row['college']."</td>
							<td>".$row['class']."</td>
							<td>就业</td>
							<td>".$row['company']."</td>
							<td>".$row['job']."</td>
							<td>".$row['address']."</td>
							<td>".$row[7]."</td>
						</tr>";
					}
					echo "</table>";
				}
				if($message=="创业")
				{
					$sql="SELECT business.ID,realname,college,class,company,job,address,business.phonenum FROM business,students WHERE business.isuse=1 AND business.ID=students.ID";
					$rs=mysqli_query($conn,$sql);
					//创建表格
					echo "<table>
					<tr>
						<td>用户名</td>
						<td>姓名</td>
						<td>所在学院</td>
						<td>所在班级</td>
						<td>就业去向</td>
						<td>创业公司</td>
						<td>职务</td>
						<td>公司地址</td>
						<td>公司电话</td>
						</tr>";
						if(!$rs)
						{
							printf("Error: %s\n", mysqli_error($conn));
							exit();
						}
					while($row=mysqli_fetch_array($rs))
					{
						//添加数据
						echo "<tr>
							<td>".$row[0]."</td>
							<td>".$row['realname']."</td>
							<td>".$row['college']."</td>
							<td>".$row['class']."</td>
							<td>创业</td>
							<td>".$row['company']."</td>
							<td>".$row['job']."</td>
							<td>".$row['address']."</td>
							<td>".$row[7]."</td>
						</tr>";
					}
					echo "</table>";
				}
				if($message=="读研")
				{
					$sql="SELECT graduate.ID,realname,college,class,school,speciality,address,advisor,graduate.phonenum FROM graduate,students WHERE graduate.isuse=1 AND graduate.ID=students.ID";
					$rs=mysqli_query($conn,$sql);
					//创建表格
					echo "<table>
						<tr>
						<td>用户名</td>
						<td>姓名</td>
						<td>所在学院</td>
						<td>所在班级</td>
						<td>就业去向</td>
						<td>就读学校</td>
						<td>专业</td>
						<td>学校地址</td>
						<td>导师</td>
						<td>导师电话</td>
						</tr>";
					while($row=mysqli_fetch_array($rs))
					{
						//添加数据
						echo "<tr>
							<td>".$row[0]."</td>
							<td>".$row['realname']."</td>
							<td>".$row['college']."</td>
							<td>".$row['class']."</td>
							<td>读研</td>
							<td>".$row['school']."</td>
							<td>".$row['speciality']."</td>
							<td>".$row['address']."</td>
							<td>".$row['advisor']."</td>
							<td>".$row[6]."</td>
						</tr>";
					}
					echo "</table>";
				}
				if($message=="待业")
				{
					$sql="SELECT wait.ID,realname,college,class,address,wait.phonenum FROM wait,students WHERE wait.isuse=1 AND wait.ID=students.ID";
					$rs=mysqli_query($conn,$sql);
					//创建表格
					echo "<table>
						<tr>
						<td>用户名</td>
						<td>姓名</td>
						<td>所在学院</td>
						<td>所在班级</td>
						<td>就业去向</td>
						<td>家庭住址</td>
						<td>家庭电话</td>
						</tr>";
					while($row=mysqli_fetch_array($rs))
					{
						//添加数据
						echo "<tr>
							<td>".$row[0]."</td>
							<td>".$row['realname']."</td>
							<td>".$row['college']."</td>
							<td>".$row['class']."</td>
							<td>待业</td>
							<td>".$row['address']."</td>
							<td>".$row[5]."</td>
						</tr>";
					}
					echo "</table>";
				}
			}
			//关闭数据库
			mysqli_close($conn);
		}
	}
?>