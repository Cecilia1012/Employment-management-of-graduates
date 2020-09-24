<link rel="stylesheet" type="text/css" href="../css/style.css">
<?php
	if (!session_id()) session_start();
	//连接数据库
	include("conn.php");
	//sql语句
	$isuse=1;
	$sql="SELECT ID,realname,phonenum,college,class,year,go FROM students WHERE isuse='$isuse'";
	//执行sql语句
	$rs=mysqli_query($conn,$sql);
	//创建表格
	echo "<table>
			<tr>
				<td>用户名</td>
				<td>姓名</td>
				<td>电话</td>
				<td>学院</td>
				<td>班级</td>
				<td>入学年份</td>
				<td>就业去向</td>
			</tr>
	";
	while($row=mysqli_fetch_array($rs))
	{
		//添加数据
		if($row['go']==1)
			$go='就业';
		else if($row['go']==2)
			$go='创业';
		else if($row['go']==3)
			$go='读研';
		else if($row['go']==4)
			$go='待业';
		echo "<tr>
				<td>".$row['ID']."</td>
				<td>".$row['realname']."</td>
				<td>".$row['phonenum']."</td>
				<td>".$row['college']."</td>
				<td>".$row['class']."</td>
				<td>".$row['year']."</td>
				<td>$go</td>
		</tr>";
	}
	echo "</table>";
	//关闭数据库
	mysqli_close($conn);
?>