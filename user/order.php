<?php
session_start();
include '../conn.php';
include 'function.php';
if (!isset($_REQUEST['uid'])) {
    echo "非法访问！";
    exit;
}
$uid = $_REQUEST['uid'];



$sql = "SELECT * FROM user where id = " . $uid;
$result = $conn->query($sql);



if ($result->num_rows <= 0) {

    echo '请先注册或登录！';
    exit;
}

?>
    <!DOCTYPE html>
    <html lang="zh">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- <meta name="description" content=""> -->
        <!-- <meta name="author" content=""> -->
        <!-- <link rel="icon" href="../../favicon.ico"> -->

        <title>商品列表</title>

        <!-- Bootstrap core CSS -->
        <link href="../admin/css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <!-- <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet"> -->

        <!-- Custom styles for this template -->
        <link href="../admin/css/navbar-fixed-top.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <!-- <script src="../../assets/js/ie-emulation-modes-warning.js"></script> -->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->

        <script src="/js/jquery.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <!-- <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->

        <link rel="stylesheet" type="text/css" href="../css/general.css">
    </head>

    <body>
    <?php include '../header.php'; ?>

    <div class="container " style="width: 1130px; height: 600px;">

        <table class="table table-striped">
            <tbody>
            <?php
            $db_total=0;
            $sql = "SELECT * FROM orders where user_id = " . $uid;
            // echo $sql;
            // exit;
            $result = $conn->query($sql);
            if (isset($result->num_rows) && ($result->num_rows > 0)) {
                while ($row = $result->fetch_assoc()) {

                    ?>
                    <tr>
                        <th>订单号</th>
                        <td><?php echo $row['id']; ?></td>
                        <td>商品名</td>
                        <td><?php echo getGoodsNameById($conn, $row['goods_id']) ?></td>
                        <td>数量</td>
                        <td><?php echo $row['count'] ?></td>
                        <td>单价</td>
                        <td><?php echo getGoodsPriceById($conn, $row['goods_id']); ?></td>
                        <td>总价</td>
                        <td><?php echo $row['count'] * getGoodsPriceById($conn, $row['goods_id']) ?></td>
                        <td>
                            <!--<a href="editgoods.php?gid=<?php /*echo $row['id'] */ ?>" class="btn btn-primary">编辑</a>-->
                            <!-- 按钮触发模态框 -->
                            <button class="btn btn-danger" data-toggle="modal"
                                    onclick="delOrders(<?php echo $row['id'] ?>,<?php echo $_REQUEST['uid'] ?>)"
                                    data-target="#myModal">删除
                            </button>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "没有订单";
            }




            $conn->close();
            ?>
            </tbody>
        </table>
        <!-- 模态框（Modal） -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">提示</h4>
                    </div>
                    <div class="modal-body">确认是否要删除？</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        <button type="button" id="del" class="btn btn-danger">删除</button>
                        <script type="text/javascript">

                            function delOrders(goodsid, uid) {
                                $.post("/user/delOrder.php", {
                                    gid: goodsid,
                                }, function (data, status) {
                                    // if (data == 1) {
                                    alert('删除成功！');
                                    // }
                                    //休眠3秒
                                    sleep(300);
                                    //跳转商品列表
                                    location.href = "/user/order.php?uid=" + uid;

                                });
                            }

                            function sleep(n) { //n表示的毫秒数
                                var start = new Date().getTime();
                                while (true) if (new Date().getTime() - start > n) break;
                            }
                        </script>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal -->


        </div> <!-- /container -->


    </body>
    </html>
    <!-- 页脚开始 -->
<?php include '../footer.php'; ?>