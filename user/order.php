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
  <title>我的订单</title>
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
<caption >全部订单</caption>
<?php
$sql = "SELECT * FROM orders where user_id = ".$uid;
// echo $sql;
// exit;
$result = $conn->query($sql);
if (isset($result->num_rows) && ($result->num_rows > 0)) {
while($row = $result->fetch_assoc()) {

?>
<tr>
  <td>订单id</td>
  <td><?php echo $row['id']; ?></td>
  <td>商品名</td>
  <td><?php echo getGoodsNameById($conn,$row['goods_id'])?></td>
  <td>数量</td>
  <td><?php echo $row['count']?></td>
  <td>单价</td>
  <td><?php echo getGoodsPriceById($conn,$row['goods_id']); ?></td>
  <td>总价</td>
  <td><?php echo  $row['count']*getGoodsPriceById($conn,$row['goods_id'])?></td>

</tr>

<?php

}
}else{
  echo "没有订单";
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
