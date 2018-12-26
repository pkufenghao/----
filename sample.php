<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wx7a3fb12e2b22da08", "8413363ea63f6fa08cddb570c98a6324");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html>
<head>
<title>苏一桐的jQueryMobile天气预报</title>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css">
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
</head>
<style>
.ui-bar-f
{
color:red;  
background-color:red;
}
.ui-body-f
{
color:white;
}
</style>
<!DOCTYPE html>
<html>
<head>
  <title>三木天气</title>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css">
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
</head>
<style>
.ui-bar-f
{
color:red;  
background-color:red;
}
.ui-body-f
{
color:white;
}
</style>
<body font-family:Helvetica;>
   <meta charset="UTF-8">
<div data-role="page" id="pageone" data-theme="a"  style="background:url(images/snow.jpg) 50% 0 no-repeat;background-size:100% 100%">
       <div>
       <p style="font-size:35px;margin-left:40px">    <img src ="images/location.png" width="24" height="32" align="bottom"> <span id="district">北京市</span> <span id="district">大兴区</span> <span id="street">广阳大街</span></p>
     </div>
<!--温度,风力,天气,更新时间-->
 <b style="color:white;font-size:120px;margin-left:80px">-2 <span style="font-size:60px">℃</span></b>
   <p style="color:white;font-size:45px;text-shadow:none;margin-left:80px">
晴</p>
<p style="font-family:verdana;color:white;font-size:45px;text-shadow:none;margin-left:80px">
西南风2级</p>
<br/>
<br/>
  <br/>
  <br/>
  <br/>
<br/>
  <br/>
  <br/>
<!--空气质量和湿度 -->
<div class="ui-grid-b">
     <div style="text-align:center"class="ui-block-a">
		<span style="font-family:verdana;color:white;font-size:45px;text-shadow:none;margin-left:20px" align="center">空气良 58</span>
	</div>
     <div style="text-align:center"class="ui-block-b" >
		<span style="font-family:verdana;color:white;font-size:45px;text-align:center;text-shadow:none">|</span>
	 </div>
     <div style="text-align:center"class="ui-block-c" >
		<span style="font-family:verdana;color:white;font-size:45px;text-align:center;text-shadow:none">湿度 36%</span>
	 </div>
</div>
  <br/>
<br/>
  <br/>
  <br/>
  <br/>
<br/>
  <br/>
  <br/>
<!--未来天气 data-inset="true"-->
<div data-role="content">
    <div class="ui-grid-b">
     <div class="ui-block-a" align="center">
       <a href="#"><img width="80" height="80" src="images/sun35.png"></a>
	   <p style="font-size:45px"><span id="week_next1">周三</span></p>
       <p style="font-size:45px"><span id="high1_next1">3</span>~<span id="low1_next1">-10</span></p>
       <p style="font-size:40px"><span id="fx_next1"></span>晴<span id="type_next1"></span></p>
     </div>
     <div class="ui-block-b" align="center">
       <a href="#"><img width="80" height="80" src="images/sun35.png"></a>
       <p style="font-size:45px"><span id="week_next2">周四</span></p>
       <p style="font-size:45px"><span id="high1_next2">-2</span>~<span id="low1_next2">-10</span></p>
       <p style="font-size:40px"><span id="fx_next2"></span>多云<span id="type_next2"></span></p>
     </div>
     <div class="ui-block-c" align="center">
       <a href="#"><img width="80" height="80" src="images/sun35.png"></a>
       <p style="font-size:45px"><span id="week_next3"></span>周五</p>
       <p style="font-size:45px"><span id="high1_next3">-6</span>~<span id="low1_next3">-14</span></p>
       <p style="font-size:40px"><span id="fx_next3"></span>晴<span id="type_next3"></span></p>
     </div>
    </div>
  </div>
  <br/>
<br/>
  <br/>
  <br/>
  <br/>
<br/>
  <br/>
  <br/>
<p style="font-family:verdana;color:white;font-size:30px;text-align:center;text-shadow:none">Copyright pkufenghao.top</p>
</div>
</body>
 <!-- //Custom-JavaScript-File-Links -->
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
  /*
   * 注意：
   * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
   * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
   * 3. 常见问题及完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
   *
   * 开发中遇到问题详见文档“附录5-常见错误及解决办法”解决，如仍未能解决可通过以下渠道反馈：
   * 邮箱地址：weixin-open@qq.com
   * 邮件主题：【微信JS-SDK反馈】具体问题
   * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
   */
  wx.config({
    debug: true,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
    'getLocation',
    ]
  });
  
      wx.ready(function () {
        // 在这里调用 API
        wx.getLocation({
            type: 'wgs84', // 默认为wgs84的gps坐标，如果要返回直接给openLocation用的火星坐标，可传入'gcj02'
            success: function (res) {
                latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
                longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
                var speed = res.speed; // 速度，以米/每秒计
                var accuracy = res.accuracy; // 位置精度
                $.ajax({
 					 type: 'post',
                     url: 'http://139.199.127.163/wx/Ajax/read',
                     data: {latitude: latitude, longitude: longitude},
                     dataType: 'json',
                     success: function (data) {
                       if (data.status == 0) {
                       	 alert(data.msg);
                       } else {
                         $("#city").text(data.city);
                         $("#district").text(data.district);
                         $("#street").text(data.street);
                         $("#update_time").text(data.update_time);
                         $("#shidu").text(data.shidu);
                         $("#pm25").text(data.pm25);
                         $("#quality").text(data.quality);
                         $("#week").text(data.week);
                         $("#high1").text(data.high1);
                         $("#low1").text(data.low1);
                         $("#fx").text(data.fx);
                         $("#type").text(data.type);
                         $("#week_next1").text(data.week_next1);
                         $("#high1_next1").text(data.high1_next1);
                         $("#low1_next1").text(data.low1_next1);
                         $("#fx_next1").text(data.fx_next1);
                         $("#type_next1").text(data.type_next1);
                         $("#week_next2").text(data.week_next2);
                         $("#high1_next2").text(data.high1_next2);
                         $("#low1_next2").text(data.low1_next2);
                         $("#fx_next2").text(data.fx_next2);
                         $("#type_next2").text(data.type_next2);
                         $("#week_next3").text(data.week_next3);
                         $("#high1_next3").text(data.high1_next3);
                         $("#low1_next3").text(data.low1_next3);
                         $("#fx_next3").text(data.fx_next3);
                         $("#type_next3").text(data.type_next3);
                       }
                      },
                      error: function () {
                       	alert("程序异常");
                      }
                });
            }
        });
    });
</script>
</html>
