<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<meta name="description" content="<?php bloginfo('description'); ?>" />
<meta name="keywords" content="<?php bloginfo('keywords'); ?>" />

<title>悦库crm有限公司</title>
    <link href="<?php bloginfo('template_url'); ?>/css/ex.css"  rel="stylesheet" type="text/css">
<link href="<?php bloginfo('template_url'); ?>/style.css"  rel="stylesheet" type="text/css">
<script src="<?php bloginfo('template_url'); ?>/js/pptBox.js"></script>
</head>
<body style="margin-top:0px; margin-left:0px;">
<div id="div_main">
<div style="background:url(<?php bloginfo('template_url'); ?>/images/up.jpg) no-repeat; width:980px; height:84px; text-align:center;">
   <table width="980" height="84" border="0" cellpadding="0" cellspacing="0">
     <tbody><tr>
       <td width="535" rowspan="2" valign="top"><img src="<?php bloginfo('template_url'); ?>/images/logo.jpg" width="535" height="84"></td>
       <td width="445" height="34" align="right"><table width="40%" border="0" cellspacing="0" cellpadding="0">
         <tbody><tr>  
           <td align="center"><a href="#" onclick="this.style.behavior=&#39;url(#default#homepage)&#39;;this.setHomePage(&#39;<?php echo site_url() ?>&#39;);" class="menu">设为首页</a></td>
           <td align="center"><a href="<?php echo site_url() ?>" onclick="window.external.AddFavorite(document.location.href,document.title)" class="menu">加入收藏</a></td>
         </tr>
       </tbody></table></td>
     </tr>
     <tr>
       <td><table width="100%" height="54" border="0" cellpadding="0" cellspacing="0">
         <tbody><tr>

<?php
$menu_items = wp_get_nav_menu_items('navmenu');
$cacheMenu=[];
$l_count = 0;
foreach ($menu_items as $iFor){
    if ($iFor->menu_item_parent == "0"){
        $cacheMenu[$iFor->ID] = $iFor;
        $l_count +=1 ;
    }
}
$l_navItemWidth = floor(100 / $l_count);
?>         
         
<?php foreach ($cacheMenu as $iNavMenu) : ?>
   <td width="<?php echo $l_navItemWidth; ?>%" align="center"><a href="<?php echo $iNavMenu->url ?>" class="menu"><?php echo $iNavMenu->title ?></a></td>
<?php endforeach ?>
           
         </tr>
       </tbody></table></td>
     </tr>
   </tbody></table>
 </div>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
  
  <tbody><tr>
    <td valign="top" align="right" width="240"><div style="background:url(<?php bloginfo('template_url'); ?>/images/heec_017.gif) center no-repeat; line-height:33px;background-color:#f4f3f3;" class="title1">网站公告</div>
<div style="padding-left:4px; padding-right:4px; height:200px;background-color:#f4f3f3;" class="text1">
  <div id="rolllink" style="overflow: hidden; width: 230px; height: 190px"> 
 <div id="rolllink1">&nbsp;&nbsp;<strong>xxxx有限公司</strong>是一家具有较大规模的专门从事货运服务的，专营全国各地往返货物运输、配送、仓储等为一体化服务，组织机构健全、货运经验丰富、经济实力雄厚、各种设施完善，合作伙伴近千家。公司备有各种吨位的大型车辆、装卸设备，可承接各种吨位货物，并可为货物代办保险以及货运其他业务。保证客户的货物安全7x24小时不间断服务，并且能够实事提供货物查询、位置提醒、业务咨询，实现诚信、准时、安全、便利的服务目标，并保证运输价格便宜，服务高质。    </div> 
  <div id="rolllink2">&nbsp;&nbsp;<strong>xxx有限公司</strong>是一家具有较大规模的专门从事货运服务的，专营全国各地往返货物运输、配送、仓储等为一体化服务，组织机构健全、货运经验丰富、经济实力雄厚、各种设施完善，合作伙伴近千家。公司备有各种吨位的大型车辆、装卸设备，可承接各种吨位货物，并可为货物代办保险以及货运其他业务。保证客户的货物安全7x24小时不间断服务，并且能够实事提供货物查询、位置提醒、业务咨询，实现诚信、准时、安全、便利的服务目标，并保证运输价格便宜，服务高质。  </div> 
  </div>
  <script type="text/javascript"> 
  var rollspeed=40 
  rolllink2.innerHTML=rolllink1.innerHTML
  function Marquee(){ 
  if(rolllink2.offsetTop-rolllink.scrollTop<=0)
  rolllink.scrollTop-=rolllink1.offsetHeight
  else{
  rolllink.scrollTop++ 
  }
  }
  var MyMar=setInterval(Marquee,rollspeed)
  rolllink.onmouseover=function() {clearInterval(MyMar)}
  rolllink.onmouseout=function() {MyMar=setInterval(Marquee,rollspeed)}
  </script>
</div>
<div style="height:10px; background-color:#FFFFFF;"></div>
<div style="background:url(<?php bloginfo('template_url'); ?>/images/heec_017.gif) center no-repeat; line-height:33px;background-color:#f4f3f3;" class="title1">图片展示</div>
<table width="100%" border="0" cellspacing="0" style="background-color:#f4f3f3;">
  <tbody><tr>
    <td style="padding:5px; vertical-align:top; line-height:24px;" height="175" class="text1">
<!-- 播放器 begin -->


<div id="xxx"  >
     <script>
     var box =new PPTBox();
     box.width = 230; //宽度
     box.height = 175;//高度
     box.autoplayer = 2;//自动播放间隔时间

     //box.add({"url":"图片地址","title":"悬浮标题","href":"链接地址"})
     box.add({"url":"<?php bloginfo('template_url'); ?>/images/tu1.jpg","href":"<?php bloginfo('template_url'); ?>/","title":"悬浮提示标题1"})
     box.add({"url":"<?php bloginfo('template_url'); ?>/images/tu2.jpg","href":"<?php bloginfo('template_url'); ?>/","title":"悬浮提示标题2"})
     box.add({"url":"<?php bloginfo('template_url'); ?>/images/tu3.jpg","href":"<?php bloginfo('template_url'); ?>/","title":"悬浮提示标题3"})
     box.add({"url":"<?php bloginfo('template_url'); ?>/images/tu4.jpg","href":"<?php bloginfo('template_url'); ?>/","title":"悬浮提示标题4"})
     box.show();
    </script>
</div>

</td>
  </tr>
</tbody></table>
<div style="background:url(<?php bloginfo('template_url'); ?>/images/heec_017.gif) center no-repeat; line-height:33px;background-color:#f4f3f3;" class="title1">联系我们</div>
<div style="padding-left:4px; padding-right:4px; height:218px;background-color:#f4f3f3;" class="text1">名称：<strong>xxxxx有限公司</strong> <br>
地址：xx市xx区xx路xx号xx楼<br>
　　　xx室xxx<br>
车队地址：xx区xx路xx路 <br>
联系人：x先生 <br>
电话：xxx-xxxxxxx<br>
手机：13xxxxxx<br>
传真：0xx-xxx<br>
邮箱：sxxx@xxxx.net<br>
网址：www.xxxx.net
</div>
<div><img src="<?php bloginfo('template_url'); ?>/images/heec_004.gif" width="240" height="35"></div></td>
    <td valign="top" width="20"><img src="<?php bloginfo('template_url'); ?>/images/heec_003.gif" width="20" height="16"></td>
    
    
    <td valign="top">
	<div><img src="<?php bloginfo('template_url'); ?>/images/wuliu.jpg" width="720" height="233"></div>

    
    
    


