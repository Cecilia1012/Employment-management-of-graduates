<!-- 版权声明
	Author:廖一凡
    Date:2019.6.5
    Version:v5.0 
 -->
<?php 
	//头部
	include("../html/login_top.html"); 
	
?>
<link rel="stylesheet" type="text/css" href="../css/login_form.css">
<div id="container">
	<img src="../images/头像.png" alt="头像" id="login_img">
	<form action="" method="post" accept-charset="utf-8" id="loginForm">
		<input type="text" name="id" id="id" placeholder="学号/工号">
		<input type="password" name="password" id="password" placeholder="密码">
		<input type="radio" name="profession" value="student" id="student">学生
		<input type="radio" name="profession" value="teacher" id="teacher">教师
		<input type="submit" name="loginBtn" id="loginBtn" value="登录">
		<input type="submit" name="createBtn" id="createBtn" value="注册">
		<!-- <a href="#" id="forgetPwd" onclick="forgetClick()">忘记密码？</a> -->
	</form>
	<div id="forgetPwd">
		<?php include("login_from_2.php");  ?>
	</div>
</div>
<?php 
//版权
include("../html/footer.html");
 ?>