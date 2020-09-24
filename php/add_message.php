<link rel="stylesheet" type="text/css" href="../css/add_message.css">
<div>
	<form class="container" action="" method="POST">
		<!-- 左边信息 -->
		<div class="left">
			<img id="headpic" src="../images/头像.png">
		</div>
		<!-- 右边信息 -->
		<div class="right">
			<label>学生用户名：<input type="text" name="id"></label>
			<label>学生姓名：<input type="text" name="name"></label>
			<label>性别：<span><input type="radio" name="sex" class="sex" value=0>男</span><span><input type="radio" name="sex" class="sex" value=1>女</span></label>
			<label>电话号码：<input type="text" name="phone"></label>
			<label>所在学院：<select name="college">
				<?php
					echo "<option>请选择所在学院</option>";
					include("conn.php");
					$sql="SELECT distinct college FROM students";
					$rs=mysqli_query($conn,$sql);
					while($row=mysqli_fetch_array($rs))
					{
						echo "<option>".$row['college']."</option>";
					}
					mysqli_close($conn);
				?>
			</select></label>
			<label>所在班级：<input type="text" name="class" placeholder="填写班级,例：软工172"></label>
			<label>入学年份：<input type="text" name="year" placeholder="例如2017"></label>
			<label>就业去向：<select name="go">
				<option>请选择就业去向</option>
				<option>就业</option>
				<option>创业</option>
				<option>读研</option>
				<option>待业</option>
			</select></label>
			<input type="submit" name="send" value="提交" class="send">
		    <input type="submit" name="reset" value="取消" class="reset">
		</div>
	</form>
</div>
<!-- 重置按钮 -->
<?php include("reset.php") ?>
<!-- 提交按钮 -->
<?php include("add_send.php") ?>