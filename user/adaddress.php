<?php
session_start();
include '../conn.php';
include 'function.php';
if (!isset($_REQUEST['uid'])) {
  echo "非法访问！";
  exit;
}
$uid=$_REQUEST['uid'];

$sql = "SELECT * FROM user where id = ".$uid;
$result = $conn->query($sql);

if ($result->num_rows <= 0) {

echo '请先注册或登录！';
exit;
  }

?>
<!DOCTYPE>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>地址管理</title>
  <link rel="stylesheet" type="text/css" href="../css/general.css">
  <link rel="stylesheet" type="text/css" href="../css/index.css">
  <script type="text/javascript" src="../js/jquery.js"></script>
  <script type="text/javascript" src="../js/general.js"></script>
  <script type="text/javascript" src="../js/carousel.js"></script>
  <style>
  td{padding:10px}
  caption{ font-size:30px; padding-bottom:30px;}
  </style>
</head>
<body>
<!-- 顶部开始 -->

<!-- 头部开始 -->
<?php include '../header.php'; ?>
<!-- 头部结束 -->
<!-- 主体开始 -->
<div class="container w1100">

      <br>  <br> 
<table border="1" style="border-collapse:collapse;  margin:auto">
<caption >全部地址</caption>
<?php
$sql = "SELECT * FROM address where username = ".$username;
// echo $sql;
// exit;
$result = $conn->query($sql);
if (isset($result->num_rows) && ($result->num_rows > 0)) {
while($row = $result->fetch_assoc()) {

?>
<tr>
  <td>联系人</td>
  <td><?php echo $row['username']; ?></td>
  <td>手机号</td>
  <td><?php echo $row['tel']; ?></td>
  <td>省</td>
  <td><?php echo $row['province']?></td>
  <td>市</td>
  <td><?php echo $row['city']?></td>
  <td>区</td>
  <td><?php echo $row['district']?></td>

</tr>

<?php

}
}else{
  echo "没有地址";
}
 ?>
</table>

</div>
<br>
<br>
<br>
<br>
<br>

<!-- 页脚开始 -->
<?php include '../footer.php'; ?>