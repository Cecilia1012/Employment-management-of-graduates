<?php 
include("teacher_top.php");
include("../html/teacher_nav.html");
include("teacher_administration.php");
?>
<link rel="stylesheet" type="text/css" href="../css/teacher_formation.css">
<div id="container" >
	<div id="text">
		<p id="gonghao" name="gonghao">工号：</p>
		<p id="trueName" name="trueName">真实姓名：</p>
		<p id="sex" name="sex">性别：</p>
		<p id="phoneNum" name="phoneNum">电话号码：</p>
		<p id="email" name="email">邮箱：</p>
		<p id="department" name="department">任职学院：</p>
		<p id="class" name="class">任教班级：</p>
		<p id="year" name="year">入职年份：</p>
		<p id="problem" name="problem">问题：</p>
		<p id="answer" name="answer">答案：</p>
	</div>
	<div id="textRight">
		<?php include("teacher_formation_2.php"); ?>
	</div>
	<img src="../images/头像.png" alt="头像" id="touxiang" name="touxiang">
	<!-- <h1 id="nicheng" name="nimcheng">昵称</h1> -->
</div>
<?php 

include("../html/footer.html"); 
?>

