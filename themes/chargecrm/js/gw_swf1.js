// JavaScript Document
//Powered by ���壨QQ��57404811��
//����˵�����õ�Ƭ����ϵ��1��6ͼ��

//����˵����
//swf_objname,swf_wmode,swf_bgcolor��FLASH����ID,����ɫ͸��ģʽ(0͸��,1��͸��),����ɫ
//img_width,img_height,text_height��ͼƬ��,ͼƬ��,���ֱ���߶�(���Ϊ20,����ʾ��Ϊ0����)
//img_urls,img_links,img_texts��ͼƬ��ַ,ͼƬ����,ͼƬ����(����|Ϊ�ָ���)
function gw_swf1(swf_objname,swf_wmode,swf_bgcolor,img_width,img_height,text_height,img_urls,img_links,img_texts){
	var selfdir="flash"; //��ǰFLASH/JS������Ŀ¼
	var swf_height=img_height + text_height; //FLASH����߶�
	img_links=""
	if(swf_wmode==0){swf_wmode="transparent";} //���ڵײ㣬͸��FLASH����
	else{swf_wmode="opaque";} //���ڵײ㣬��͸��FLASH����
	if(swf_bgcolor==''){swf_bgcolor="#ffffff";} //Ĭ�ϱ���ɫ
	
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