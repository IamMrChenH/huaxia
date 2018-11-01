<?php
session_start();
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="./css/general.css">
    <script src="js/jquery.js"></script>
    <style>
      /*p{font-size: 18px;*/
      /*padding: 5px 20px;}*/
        /*.div{margin: 10px;}*/
      .fk{width: 500px; margin: 10px auto;border: 1px solid #c9c9c9;padding: 10px; }
      .fk div { padding: 0 10px; margin-bottom: 15px;}
      .fk div  input{ height: 46px; line-height: 46px; }
      .fk div  textarea{border: 0;  padding: 10px 0; color: #fff; height: 100px; width: 100%;}
      .fk .submit{ margin: auto;display: block;color: #f6f6f6;padding: 7px 0;
          background: #37A803;
          border: 1px solid #37A803;
          cursor: pointer;
          width: 300px;
          height: 48px;
          border-radius: 8px;
          letter-spacing: 2px;
          font-size: 22px;
          line-height: 12px;}
      /*.fk .submit input{ background: #37a803; font-size: 18px; transition: 0.3s;}*/
      .fk .submit:hover{ background: #179500;}
    </style>
</head>
<body>
<!-- 头部开始 -->
<?php include 'header.php'; ?>
<!-- 头部结束 -->
<!-- 主体开始 -->
<div class="container w1100">

    <h1 style="font-size: 24px; text-align: center;">用户反馈调查</h1>
    <div style="margin: 0 50px; font-size: 18px;">
    <p>尊敬的用户：</p>
    <p>您好！为了给您提供更好的服务，我们希望收集您使用华夏酒庄网站时的看法或建议。对您的配合和支持表示衷心感谢！
    </p></div>
    <form class="fk" action="/dofeedback.php" method="post"  style="font-size: 18px;  " >
        <div class="div"> <label>请输入您的姓名:&nbsp;&nbsp;&nbsp;</label><input type="text" name="username" value=""></div><br>
           <div  class="div"><label>请输入您的手机号:</label><input type="text" name="tel" value=""><br></div>
           <div  class="div"><label>请输入您认为需要改进的地方:</label> <textarea name="suggestion" ></textarea></div><br>
        <input class="submit"type="submit"  value="提交" ></form>
</div>


<!-- 主体结束 -->
<!-- 底部开始 -->
<?php include 'footer.php'; ?>
<!-- 底部结束 -->

