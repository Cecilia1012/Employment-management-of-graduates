<?php 
include("student_top.php");
include("../html/student_nav.html");
include("student_administration.php");
 ?>
 <link rel="stylesheet" type="text/css" href="../css/student_formation.css">
<div id="Scontainer" >
	<div id="studentText">
		<p id="xuehao" name="xuehao">学号：</p>
		<p id="studentTrueName" name="studnetTrueName">真实姓名：</p>
		<p id="studentSex" name="studentSex">性别：</p>
		<p id="SphoneNum" name="SphoneNum">电话号码：</p>
		<p id="Semail" name="Semail">邮箱：</p>
		<p id="Sdepartment" name="Sdepartment">就读学院：</p>
		<p id="Sclass" name="Sclass">就读班级：</p>
		<p id="Syear" name="Syear">入学年份：</p>
		<p id="Sproblem" name="Sproblem">问题：</p>
		<p id="Sanswer" name="Sanswer">答案：</p>
	</div>
	<div id="textView">
		<?php include("student_formation_2.php"); ?>
	</div>
	<img src="../images/头像.png" alt="头像" id="Stouxiang" name="Stouxiang">
	<!-- <h1 id="Snicheng" name="Snicheng">昵称</h1> -->
	<form action="" method="post" accept-charset="utf-8">
		<input type="submit" name="path" id="path" value="查看就业去向">
	</form>
	
</div>
<?php
 include("../html/footer.html");
 ?>