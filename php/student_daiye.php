<?php 
include("student_top.php");
include("../html/student_nav.html");
include("student_administration.php");

 ?>
 <link rel="stylesheet" type="text/css" href="../css/student_daiye.css">
<div id="SDYcontainer" >
	<div id="studentDYView">
		<p id="daiye" name="daiye">就业方向选择：</p>
		<p id="homeAddress" name="homeAddress">居住地址：</p>
		<p id="homePhone" name="homePhone">家庭电话：</p>
		<form action="" method="post" accept-charset="utf-8">
			<input type="submit" name="backDYBtn" id="backDYBtn" value="返回">
		</form>
	</div>
	<div id="textView">
		<?php include("student_daiye_2.php"); ?>
	</div>
	<img src="../images/头像.png" alt="头像" id="SDYtouxiang" name="SDYtouxiang">
	
</div>




 <?php 
include("../html/footer.html");
?>