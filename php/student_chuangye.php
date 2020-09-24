<?php 
include("student_top.php");
include("../html/student_nav.html");
include("student_administration.php");
 ?>
 <link rel="stylesheet" type="text/css" href="../css/student_chuangye.css">
<div id="SCcontainer" >
	<div id="studentCView">
		<p id="chuangye" name="chuangye">就业方向选择：</p>
		<p id="companyC" name="companyC">创业公司：</p>
		<p id="positionC" name="positionC">职务：</p>
		<p id="companyAddressC" name="companyAddressC">公司地址：</p>
		<p id="companyPhoneC" name="companyPhoneC">公司电话：</p>
		<form action="" method="post" accept-charset="utf-8">
		<input type="submit" name="backCBtn" id="backCBtn" value="返回">
	</form>
	</div>
	<div id="textView">
		<?php include("student_chuangye_2.php"); ?>
	</div>
	<img src="../images/头像.png" alt="头像" id="SCtouxiang" name="SCtouxiang">
	<!-- <h1 id="Snicheng" name="Snicheng">昵称</h1> -->
	
	
</div>
 <?php 
 include("../html/footer.html"); ?>