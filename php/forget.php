<?php 
    //头部
	include("../html/login_top_forget.html");
	

 ?>
 <link rel="stylesheet" type="text/css" href="../css/login_forget_form.css">
<div id="container">
	<img src="../images/头像.png" alt="头像" id="login_img">
	<h1 id="findPwd">找回密码</h1>
	<form action="" method="post" accept-charset="utf-8" id="problemForm">
		<div id="textView">
			<?php //忘记密码表单
			include("login_forget_2.php");
	    ?>
		</div>
		
		<input type="text" name="answer" id="answer" placeholder="请输入问题答案">
		<input type="submit" name="findBtn" id="findBtn" value="找回">
	</form>
		
</div>
<?php 
	//版权
	include("../html/footer.html");
 ?>