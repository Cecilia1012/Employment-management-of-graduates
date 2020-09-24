<!-- 版权声明
	Author:廖一凡
    Date:2019.6.5
    Version:v5.0 
 -->
<?php 
// 用户名
$user = 'root';
// 密码
$pwd = '';
// 数据库名称
$db = 'zhou4db18';
// 数据库服务器
$host = 'localhost';
// 端口号
$port = 3306;
// 初始化
$conn = mysqli_init();
// 连接
$success = mysqli_real_connect(
   $conn, 
   $host, 
   $user, 
   $pwd, 
   $db,
   $port
);
if($success!=1){
	die("数据库连接失败");
}

$sql="set names utf8";
mysqli_query($conn,$sql);
 ?>