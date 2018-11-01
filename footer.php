<?php error_reporting(E_ALL ^ E_NOTICE); //不提示错误?>
<!-- 侧边开始 -->
<script>
<!-- 回到顶部开始 -->
$(document).ready(function(){		
$(".backtotop").click(function(){ //当点击标签的时候,使用animate在200毫秒的时间内,滚到顶部
$("html,body").animate({scrollTop:"0px"},200); });
});


<!-- 回到顶部结束 -->
<!-- 公众号开始 -->
$(document).ready(function(){//单击隐藏出现
  $(".OfficialAccount").click(function(){
    $(".weixin").toggle();
  });
});
/*$(document).ready(function(){//hover隐藏出现
  $(".OfficialAccount").hover(function(){
    $(".weixin").css("display","inline");
    },function(){
    $(".weixin").css("display","none");
  });
});*/
<!-- 公众号结束 -->
</script>
 

<style>
.sidebar img:hover{background-color:#999;}
.weixin{position: fixed;bottom: 260px;right: 0px;display:none;}
.sidebar {position: fixed;bottom: 30px;right: 30px;}
.sidebar div img {width: 35px;height: 35px;margin:10px;}

</style>
<div class="weixin"><img src="/images/weixin1.png" ></div>
<div class="sidebar">
<div class="shopcart" >
<a href="/user/cart.php?uid=<?php echo $_REQUEST['uid']?>">
<img class="shopcartimg" src="/images/sidebar/shopcart.png" >
</a>

</div>
<div class="OfficialAccount" ><img src="/images/sidebar/OfficialAccount.png" ></div>
<div class="feedback" ><img src="/images/sidebar/feedback.png" ></div>
<div class="backtotop"><img src="/images/sidebar/backtotop.png"></div>
</div>
<!-- 侧边结束-->
<!-- 页脚开始 -->
<style>
.footer{font-size:12px;padding:30px 0;color:#ddd;background:#474747; text-align:center;}
.footer a{color:#ddd;}
.footer .footer-nav{margin-bottom:30px;padding-bottom:30px;border-bottom:1px solid #777;}
.footer dl{float:left;width:150px;min-height:160px;padding-right:10px;padding-left:30px;border-right:1px solid #555;_height:160px;}
.footer dl a{line-height:24px;overflow:hidden;height:24px;}
.footer dl a:hover{color:#37a803;}
.footer dl dt{font-size:16px;margin-bottom:10px;}
/*.footer dl.ewm{float:right;width:360px;padding:0;border:none;}*/
.footer dl.ewm{ border:none;width:200px;}
.footer dl.ews275{width:220px;	float:left;}
.footer dl.ews275 a{height:auto;}
.footer dl.ewm a{height:auto;}
.footer .webinfo{text-align:center;}
.webinfo a{ padding:5px;}
/*.footer .webinfo a{margin:0 10px;}*/
.footer .copyright{text-align:center;}
<!-- 页脚结束 --
</style>

<div class="footer">
    <div class="wrap">
        <div class="footer-nav clearfix">
            <dl>
                <dt>我要买酒</dt>
                <dd>酒库查询</dd>
                <dd>帮我选酒</dd>
                <dd>评估鉴定</dd>
            </dl>
			<dl>
                <dt>我要卖酒</dt>
                <dd>在线销售</dd>
                <dd>招商加盟</dd>
                <dd>申请入驻</dd>
            </dl>
            <dl class="ews275">
                <dt>投稿建议</dt>
                <dd>通过E-mail将您的想法和建议发给我们</dd>
                <dd>稿件投诉：<a href="">bianji01@huaxia.com</a></dd>
                <dd>版权建议：<a href="">bianji01@huaxia.com</a></dd>
            </dl>
			<dl>
                <dt>联系我们</dt>
                <dd>联系电话：0755-88941088</dd>
                <dd>官方客服QQ：878782988</dd>
                <dd>微信客服号：huaxia01</dd>
            </dl>
			<dl class="ewm">
            
				<dt>扫二维码</dt>
                <dd class="tc">
                                                            <div class="l">
                    <img src="/images/weixin.png" width="100" height="100">
                      <br/>扫一扫,关注微信
                    </div>
                </dd>
            </dl>
			        </div>
<br><br><br><br><br><br><br><br>
        <div class="webinfo">
            <a 	href="#" >意见反馈</a>|
            <a  href="#" >网站地图</a>|
            <a  href="#" >帮助中心</a>|
            <a >设为主页</a>
            <a  href="#" >法律声明</a>|<a  href="" >隐私保护</a>|<a  href="#" >服务协议</a>|<a  href="" >关于我们</a>|<a  href="#" >联系我们</a>|            <a href="#" ><font >手机版</font></a>
        </div>

        <div class="copyright">
            Copyright <i>&#169;</i>2008-2018 huaxia.com All rights reserved.
<br/>
Powered by huaxiav3.0 闽ICP备12046365号
        </div>
    </div>
</div><!-- /footer -->

<!--<div class="footer mt20">-->
<script type="text/javascript" src="./js/juicer.js"></script>
</body></html>
<?php
include 'db_close.php';
 ?>
