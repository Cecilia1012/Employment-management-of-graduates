<?php 
include("student_top.php");
include("../html/student_nav.html");
include("student_administration.php");
 ?>
 <link rel="stylesheet" type="text/css" href="../css/student_duyan.css">
<div id="SDcontainer" >
	<div id="studentDView">
		<p id="duyan" name="duyan">就业方向选择：</p>
		<p id="schoolD" name="schoolD">就读学校：</p>
		<p id="zhuanye" name="zhuanye">专业：</p>
		<p id="schoolDA" name="schoolDA">学校地址：</p>
		<p id="teacherD" name="teacherD">导师：</p>
		<p id="teacherDP" name="teacherDP">导师电话：</p>
		<form action="" method="post" accept-charset="utf-8">
			<input type="submit" name="backDBtn" id="backDBtn" value="返回">
		</form>
	</div>
	<div id="textView">
		<?php  include("student_duyan_2.php"); ?>
	</div>
	<img src="../images/头像.png" alt="头像" id="SJtouxiang" name="SJtouxiang">
	<!-- <h1 id="Snicheng" name="Snicheng">昵称</h1> -->
	
	
</div>
 <?php include("../html/footer.html"); ?>