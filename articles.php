<?php
session_start();
include 'conn.php';
?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>文章</title>
<link rel="stylesheet" type="text/css" href="css/general.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/general.js"></script>
<script type="text/javascript" src="js/carousel.js"></script>
</head>
<body>
<!-- 顶部开始 -->


<!-- 头部开始 -->
<?php include 'header.php'; ?>
<!-- 头部结束 -->
<!-- 主体开始 -->
<div class="container w1100">
<img src="images/news1.png" width="1100" height="120">
<br>  <br>  <br>  <br>
        <ul>
<?php
$sql = "select * from wenzhang";
$result = $conn->query($sql);
if($result->num_rows>0){
	//取出关联数组$row['title']."  作者：".$row['author']." 时间:".$row['time'];
  while($row = $result->fetch_assoc()) {
    ?>
     <li><a style = "font-size:19px" href="/article.php?wzid=<?php echo $row['id'];
         if (isset($_REQUEST['uid'])) {
             echo '&uid='.$_REQUEST['uid'];
                }
               ?>"><?php echo $row['title'] ?></a></li><br>
<?php
  }
}

 ?>
</ul>
</div>
<br>
<br>
<br>
<br>
<br>

<?php include 'footer.php'; ?>