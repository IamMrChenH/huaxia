<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>
</html>
<?php
include '../conn.php';
//获取内容
$username = $_REQUEST['username'];
$tel 	  = $_REQUEST['tel'];
$province = $_REQUEST['province'];
$city     = $_REQUEST['city'];
$district = $_REQUEST['district'];

//写入数据库
$sql = "insert into address(username,tel,province,city,district) values('".$username."','".$tel."','".$province."','".$city."','".$district."')";
if ($conn->query($sql)==TRUE) {
  echo "success！";
    ?>
    <script type="text/javascript">
        //休眠5秒，跳转广告列表
        $(function() {
            sleep(500);
            location.href="/user/center.php";
        });

        function sleep(n) { //n表示的毫秒数
            var start = new Date().getTime();
            while (true) if (new Date().getTime() - start > n) break;
        }
    </script>
    <?php
}else {
  echo "failed！";
}
