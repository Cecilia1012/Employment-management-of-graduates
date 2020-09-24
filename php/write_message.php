<link rel="stylesheet" type="text/css" href="../css/write_message.css">
<div>
	<span class="title">编辑毕业生信息</span>
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
			echo "<lable>学生用户名：<input type='text' name='id' value='".$row['ID']."'</lable>";

			echo "<label>学生姓名：<input type='text' name='name' value='".$row['realname']."''></label>";

			if($row['sex']==0)
				echo "<label>性别<span class='sex'><input type='radio' name='sex' value='0' checked>男</span><span class='sex'><input type='radio' name='sex' value='1'>女</span></label>";
			else
				echo "<label>性别<span class='sex'><input type='radio' name='sex' value='0'>男</span><span class='sex'><input type='radio' name='sex' value='1' checked>女</span></label>";

			echo "<label>电话号码：<input type='text' name='phone' value='".$row['phonenum']."''></label>";

			echo "<label>所在学院：<select name='college'>";
				echo "<option>".$row['college']."</option>";
			$sql1="SELECT distinct college FROM students";
			$rs1=mysqli_query($conn,$sql1);
			while($row1=mysqli_fetch_array($rs1))
			{
				echo "<option>".$row1['college']."</option>";
			}
			echo "</select></label>";


			echo "<label>所在班级：<input type='text' name='class' value='".$row['class']."'></label>";

			echo "<label>入学年份：<input type='text' name='year' value='".$row['year']."'></label>";

			if($row['go']==1)
				$goold="就业";
			else if($row['go']==2)
				$goold="创业";
			else if($row['go']==3)
				$goold="读研";
			else if($row['go']==4)
				$goold="待业";
			echo "<label>就业去向：<select name='college'>
				<option>".$goold."</option>
				<option>就业</option>
				<option>创业</option>
				<option>读研</option>
				<option>待业</option>
			</select></label>";
			mysqli_close($conn);
		?>
		<input type="submit" name="send" value="确定" class="send">
		    <input type="submit" name="reset" value="取消" class="reset">
		</div>
	</form>
</div>
<!-- 重置按钮 -->
<?php include("reset.php") ?>
<!-- 确定按钮 -->
<?php include("write_send.php") ?>