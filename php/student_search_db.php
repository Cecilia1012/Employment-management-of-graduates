<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/search.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<form class="container" action="student_search.php" method="POST">
		<!-- 单选按钮组 -->
		<div class="radio">
			<span class="r1"><input type="radio" name="searchop" value=0 checked>按学院查询</span>
			<span class="r1"><input type="radio" name="searchop" value=1>按班级查询</span>
			<span class="r2"><input type="radio" name="searchop" value=2>按入学年份查询</span>
			<span class="r2"><input type="radio" name="searchop" value=3>按就业去向查询</span>
		</div>
		<!-- 查询内容文本框 -->
		<input class="searchtext" type="text" name="searchtext" placeholder="请输入需要查询的内容">
		<!-- 查询按钮 -->
		<input class="searchbtn" type="submit" name="search" value="查询">
	</form>
	<?php include("student_search_button.php") ?>
</body>
</html>