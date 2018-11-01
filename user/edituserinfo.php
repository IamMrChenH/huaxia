<?php
/**
 * 修改信息界面
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
    <title>修改信息</title>
    <link rel="stylesheet" type="text/css" href="../css/general.css">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <link rel="stylesheet" type="text/css" href="../css/center.css">


    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/general.js"></script>
    <script type="text/javascript" src="../js/carousel.js"></script>
</head>
<style type="text/css">
    tr{
        line-height: 50px;
        font-size: 18px;

    }
    .t1{
        width: auto;
        text-align: right;
        font-size: 18px;
    }

</style>
<body>
<!-- 顶部开始 -->

<!-- 头部开始 -->
<?php include '../header.php'; ?>
<!-- 头部结束 -->
<!-- 主体开始 -->


<div class="bgWhite container w1100 h80">
    <br> <br>
    <p style="font-size:30px">
        <?php
        while ($row = $result->fetch_assoc()) {
        ?>
    <form class="" action="doedituserinfo.php?uid=<?php echo $uid ?>" method="post">
        <table class="item_table">
            <tr>
                <td class="t1">用户名：</td>
                <td><input type="text" name="username" value="<?php echo $row['uname'] ?>"></td>
            </tr>
            <tr>
                <td class="t1">密码：</td>
                <td><input type="password" name="password" value="<?php echo $row['pwd'] ?>"></td>
            </tr>
            <tr>
                <td class="t1"> 手机号：</td>
                <td><input type="text" name="tel" value="<?php echo $row['tel'] ?>"></td>
            </tr>
            <tr>
                <td class="t1">性别：</td>
                <td>
                    <select class="t1" name="sex">
                        <option value="0">女</option>
                        <option value="1">男</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="t1">邮箱：</td>
                <td><input type="text" name="email" value="<?php echo $row['email'] ?>"></td>
            </tr>
            <tr>
                <td class="t1">地址：</td>
                <td>
                    <input type="text" name="address" value="<?php echo $row['address']?>">
                </td>
            </tr>
            <tr>
                <td colspan="2"><input class="form-submit  mg_center " type="submit" name="" value="更&nbsp;新"></td>
            </tr>
        </table>

    </form>
    <?php } ?>
    </p>

</div>
<!-- 页脚开始 -->
<div class="footer mt20">
    <script type="text/javascript" src="../images/juicer.js"></script>
</body>
</html>
<?php include "../footer2.php"?>
