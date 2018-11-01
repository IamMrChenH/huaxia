<?php
/**
 * 用户中心
 */
session_start();
include '../conn.php';
$uid = $_REQUEST['uid'];

$sql = "SELECT * FROM user where id = '" . $uid . "'";
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
    <title>用户中心-华夏酒庄</title>
    <link rel="stylesheet" type="text/css" href="../css/general.css">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <link rel="stylesheet" type="text/css" href="../css/center.css">
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/general.js"></script>
    <script type="text/javascript" src="../js/carousel.js"></script>
</head>

<body>
<!-- 顶部开始 -->

<!-- 头部开始 -->
<?php include '../header.php'; ?>
<!-- 头部结束 -->
<!-- 主体 -->
<div class="container w1110 ">
    <div class="menu">
        <dd class="f20 ">全部功能</dd>
        <div class="">
            <dl class="f17 pad5">
                <dd class="pad5"><a href="/user/edituserinfo.php?uid=<?php echo $uid ?>">修改信息</a></dd>
                <dd class="pad5"><a href="/user/upload.php?uid=<?php echo $uid ?>">上传头像</a></dd>
                <dd class="pad5"><a href="/user/order.php?uid=<?php echo $uid ?>">我的订单</a></dd>
                <dd class="pad5"><a href="/user/adaddress.php?uid=<?php echo $uid ?>">地址管理</a></dd>
            </dl>
        </div>
    </div>

    <div class=" personData ">
        <div class="testBg userbar  ">
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
            <image class="headerImager radius50" src="<?php echo $row['avatar'] ?>">
                <div class="mr20">
                    <p class="f30 mt20"><?php echo "&nbsp&nbsp" . $row['uname'] ?></p>
                    <p class="f15 mt8">
                        <a class="clearA fl"><?php echo "&nbsp&nbsp&nbsp" . ($row['sex'] == 1 ? "男" : "女") ?></a>
                        <a class="fr pad5"><a href="/user/address.php?uid=<?php echo $uid ?>">我的收货地址</a>
                        <a class="fr pad5"><a href="/user/edituserinfo.php?uid=<?php echo $uid ?>">我的优惠信息</a>
                        <a class="fr pad5"><a href="/user/edituserinfo.php?uid=<?php echo $uid ?>">我的账户</a>
                    </p>

                </div>
                <br/>
                <br/>


                <div class="f17 pad5">
                    <div class="fl  width50">
                        我的邮箱：<a><?php echo($row['email']) ?></a>
                    </div>

                    <div class="fr width50">
                        我的电话：<a class=""><?php echo($row['tel']) ?></a>
                    </div>

                </div>


                <?php
                }
                ?>


        </div>


    </div>

    <!-- 新品上市开始 -->
    <div class="module mt30 cut radius20px pad5 bgf7f7f7" >
        <div class="gli_t"><h2 class="fl">商品推荐</h2></div>
        <div class="gli w1110">
            <ul>
                <?php
                $sql = "SELECT * FROM goods";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // 输出每行数据
                    $i = 0;
                    while ($row = $result->fetch_assoc()) {
                        $i++;
                        if ($i > 10) break;
                        ?>
                        <li>
                            <div class="im"><a href="./goods.php?id=<?php echo $row["id"];
                                if ($flag == 1) {
                                    echo '&uid=' . $uid;
                                }
                                ?>"><img src="<?php echo $row['picture'] ?>"></a></div>
                            <h3><a href="./goods.php?id=<?php echo $row["id"];
                                if ($flag == 1) {
                                    echo '&uid=' . $uid;
                                }
                                ?>">
                                    <?php
                                    echo $row["goods_name"];
                                    ?>
                                </a></h3>
                            <del><p class="price"><i>原价¥</i>
                                    <?php
                                    echo $row["old_price"]
                                    ?>
                                </p></del>
                            <p class="price"><i>现价t¥</i>
                                <?php
                                echo $row["price"]
                                ?>
                            </p>
                        </li>
                        <?php
                    }
                } else {
                    echo "0 个结果";
                }
                ?>
            </ul>
        </div>


    </div>
    <!-- 页脚开始 -->



    <!-- 页脚  -->


    <div class="footer mt20">
        <script type="text/javascript" src="../images/juicer.js"></script>

</body>
</html>
<?php include '../footer.php'; ?>