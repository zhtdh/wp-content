// JavaScript Document
//Powered by 港湾（QQ：57404811）
//函数说明：幻灯片动画系列1（6图）

//参数说明：
//swf_objname,swf_wmode,swf_bgcolor：FLASH对象ID,背景色透明模式(0透明,1不透明),背景色
//img_width,img_height,text_height：图片宽,图片高,文字标题高度(最佳为20,不显示设为0即可)
//img_urls,img_links,img_texts：图片地址,图片链接,图片标题(都以|为分隔符)
function gw_swf1(swf_objname,swf_wmode,swf_bgcolor,img_width,img_height,text_height,img_urls,img_links,img_texts){
	var selfdir="flash"; //当前FLASH/JS的所在目录
	var swf_height=img_height + text_height; //FLASH整体高度
	img_links=""
	if(swf_wmode==0){swf_wmode="transparent";} //至于底层，透明FLASH背景
	else{swf_wmode="opaque";} //至于底层，不透明FLASH背景
	if(swf_bgcolor==''){swf_bgcolor="#ffffff";} //默认背景色
	
	var str="";
	str+='<object id=\"' + selfdir + swf_objname + '\" classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0\" width=\"' + img_width + '\" height=\"' + swf_height + '\">';
	str+='<param name=\"allowScriptAccess\" value=\"sameDomain\" \/>';
	str+='<param name=\"movie\" value=\"' + selfdir + '/swf.swf\" \/>';
	str+='<param name=\"menu\" value=\"false\" \/>';
	str+='<param name=\"quality\" value=\"high\" \/>';
	str+='<param name=\"wmode\" value=\"' + swf_wmode + '\" \/>';
	str+='<param name=\"bgcolor\" value=\"' + swf_bgcolor + '\" \/>';
	str+='<param name=\"FlashVars\" value=\"pics=' + img_urls + '&links=' + img_links + '&texts=' + img_texts + '&borderwidth=' + img_width + '&borderheight=' + img_height + '&textheight=' + text_height + '\" \/>';
	str+='<embed id=\"' + selfdir + swf_objname + '\" allowScriptAccess=\"sameDomain\" src=\"' + selfdir + '/swf.swf\" width=\"' + img_width + '\" height=\"' + swf_height + '\" menu=\"false\" quality=\"high\" wmode=\"' + swf_wmode + '\" bgcolor=\"' + swf_bgcolor + '\" FlashVars=\"pics=' + img_urls + '&links=' + img_links + '&texts=' + img_texts + '&borderwidth=' + img_width + '&borderheight=' + img_height + '&textheight=' + text_height + '\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\"><\/embed>';
	str+='<\/object>';
	window.document.write(str);
}