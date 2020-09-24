<?php 
include("student_top.php");
include("../html/student_nav.html");
include("student_administration.php");
 ?>
 <link rel="stylesheet" type="text/css" href="../css/student_jiuye.css">
<div id="SJcontainer" >
	<div id="studentJView">
		<p id="jiuye" name="jiuye">就业方向选择：</p>
		<p id="company" name="company">就职公司：</p>
		<p id="position" name="position">职务：</p>
		<p id="companyAddress" name="companyAddress">公司地址：</p>
		<p id="companyPhone" name="companyPhone">公司电话：</p>
		<form action="" method="post" accept-charset="utf-8">
		<input type="submit" name="backJBtn" id="backJBtn" value="返回">
	</form>
	 </div>
	<div id="textView">
		<?php include("student_jiuye_2.php"); ?>
	</div>
	<img src="../images/头像.png" alt="头像" id="SJtouxiang" name="SJtouxiang">
	
	
</div>
 <?php 
 include("../html/footer.html");
  ?>