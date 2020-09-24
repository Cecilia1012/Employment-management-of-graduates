<link rel="stylesheet" type="text/css" href="../css/delete_message.css">
<div>
	<span class="title">删除毕业生信息</span>
	<form class="container" action="" method="POST">
		<!-- 左边信息 -->
		<div class="left">
			<?php
				if(!session_id())session_start();
				include("conn.php");
				$id=$_GET['id'];
				$sql="SELECT image FROM students WHERE id='$id'";
				$rs=mysqli_query($conn,$sql);
				if($row=mysqli_fetch_array($rs))
				echo "<img id='headpict' src='".$row[0]."'>";
			mysqli_close($conn);
			?>
		</div>
		<!-- 右边信息 -->
		<div class="right">
			<?php
			if(!session_id())session_start();
			include("conn.php");
			$id=$_GET['id'];
			$sql="SELECT ID,realname,sex,phonenum,college,class,year,go FROM students WHERE id='$id'";
			$rs=mysqli_query($conn,$sql);
			if(!$rs)
			{
				printf("Error: %s\n", mysqli_error($conn));
				exit();
			}
			$row=mysqli_fetch_array($rs);
			echo "<lable>学生用户名：<span>".$row['ID']."</span></lable>";

			echo "<label>学生姓名：<span>".$row['realname']."</span></label>";

			if($row['sex']==0)
				echo "<label>性别：<span>男</span></label>";
			else
				echo "<label>学生姓名：<span>女</span></label>";

			echo "<label>学生姓名：<span>".$row['phonenum']."</span></label>";

			echo "<label>所在学院：<span>".$row['college']."</span></label>";

			echo "<label>所在班级：<span>".$row['class']."</span></label>";

			echo "<label>入学年份：<span>".$row['year']."</span></label>";

			if($row['go']==1)
				$goold="就业";
			else if($row['go']==2)
				$goold="创业";
			else if($row['go']==3)
				$goold="读研";
			else if($row['go']==4)
				$goold="待业";
			echo "<label>就业去向：<span>".$goold."</span></label>";
			mysqli_close($conn);
		?>
			<input type="submit" name="send" value="确定删除" class="send">
		    <input type="submit" name="reset" value="取消" class="reset">
		</div>
	</form>
</div>
<!-- 取消按钮 -->
<?php include("reset.php") ?>
<!-- 确定按钮 -->
<?php include("delete_send.php") ?>