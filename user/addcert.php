<?php
session_start();
include '../conn.php';
include '../chen/MySqlDB.php';
if (!isset($_REQUEST['uid']) || !isset($_REQUEST['gid']) || !isset($_REQUEST['count'])) {
    echo "非法访问！";
    exit;
}
$uid = $_REQUEST['uid'];
$gid = $_REQUEST['gid'];
$count = $_REQUEST['count'];
$sql = "SELECT * FROM user where id = " . $uid;
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
</head>
<body>
<!-- 顶部开始 -->

<!-- 头部开始 -->
<?php include '../header.php'; ?>
<!-- 头部结束 -->
<!-- 主体开始 -->
<div class="container w1100">

    <br> <br> <br> <br>

    <?php
    $mSql = new MySqlDB("huaxia");
    $mCount = $mSql->selectTableSize("cart", "user_id", $uid, "goods_id", $gid);
    if ($mCount != 0) {
        $isResult = $mSql->updateTableData("cart",
            "count", ($mCount + $count),
            "user_id", $uid,
            "goods_id", $gid);
        if ($isResult) {
            echo "添加购物车成功！正在跳转回原页面...";
        } else {
            echo "添加购物车失败！正在跳转回原页面...";
        }
        print <<< EOT
          <script type="text/javascript">
            //休眠5秒，跳转广告列表
            $(function () {
                sleep(500);
               location.href="/goods.php?id={$gid}&uid={$uid}";
            });
            function sleep(n) { //n表示的毫秒数
                var start = new Date().getTime();
                while (true) if (new Date().getTime() - start > n) break;
            }
        </script>

EOT;

    } else {
        $isResult = $mSql->insertTable("cart", "user_id", "goods_id", "count", $uid, $gid, $count);
        if ($isResult) {
            echo "添加购物车成功！正在跳转回原页面...";
        } else {
            echo "添加购物车失败！正在跳转回原页面...";
        }
        print <<< EOT
          <script type="text/javascript">
            //休眠5秒，跳转广告列表
            $(function () {
                sleep(500);
                location.href="/goods.php?id={$gid}&uid={$uid}";
            });
            function sleep(n) { //n表示的毫秒数
                var start = new Date().getTime();
                while (true) if (new Date().getTime() - start > n) break;
            }
        </script>

EOT;

        #thisToSkip("/goods.php?id={$gid}&uid={$uid}", 500);
    }

    #echo $mCount;


    ?>


</div>
<!-- 页脚开始 -->
<?php include '../footer.php'; ?>
