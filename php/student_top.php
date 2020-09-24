<?php 
include("../html/student_top.html");
 ?>
 <link rel="stylesheet" type="text/css" href="../css/student_top.css">
<body background="../images/aa.jpg" id="background_img">
	<div id="studentTop">
		<img src="../images/login_path.png" alt="定位图标" id="top_photo">
		<h1 id="top_title">杭师大——本科毕业生就业去向管理平台</h1>
		<p id="top_titleE">Management Platform of Graduates` Employment Orientation</p>
		<form action="login.php" method="post" accept-charset="utf-8">
			<input type="submit" name="exitBtn" id="exit" value="退出">
		</form>
		<div id="output">
			<?php include("student_top_output.php"); ?>
		</div>
	</div>
</body>