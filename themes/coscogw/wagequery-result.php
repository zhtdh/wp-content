<?php
$dtz = new DateTimeZone("Asia/Shanghai");
$systime = new DateTime("now", $dtz);
if (!localrequest()){
    echo "<h3 style='color:red;'>" . '非内部员工禁止访问' . "</h3>";
    exit;
}

?>
<script type="text/javascript">
    $(function(){
        $('#wageSearchBtn').bind('click',function(event){
            $('#wageReport').load('<?php bloginfo("template_url"); ?>/wagereport.php',
                {
                    'year':$('#year').val(),
                    'month':$('#month').val(),
                    'detailpath':'<?php bloginfo("template_url"); ?>',
                    'selfurl':'<?php echo urldecode(post_permalink($post->ID)); ?>'
                },function(t,s,x){
                if (t == '非法'){
                    window.location.href = "<?php echo urldecode(post_permalink($post->ID)); ?>";
                }
            });
        });
    });
</script>
<div style="margin-left: 10px;">

    <table cellspacing="0" cellpadding="0" border="0"
           background="<?php bloginfo('template_url'); ?>/images/ywcxback.gif" width="697" height="40">
        <tbody>
        <tr>
            <td align="right" width="50" style="line-height: 40px;">
                <img width="21" height="21" src="<?php bloginfo('template_url'); ?>/images/arrow01.gif">
            </td>
            <td width="75" valign="bottom">
                            <span style="font-size: 14px; color: #3366cc; font-weight: bold; vertical-align: middle;
                                line-height: 40px;">工资查询</span>
            </td>
            <td align="right" style="line-height: 40px;">
                <div align="right" style="font-size: 13px; text-align: center; font-family: 微软雅黑">
                    年份：<input type="text" maxlength="4" style="width:120px;line-height: 17px;" name="year" id="year"
                              value="<?php echo $systime->format("Y"); ?>" />
                    月份：<input type="text" maxlength="2" style="width:70px;line-height: 17px;" name="month" id="month"
                         value="<?php echo $systime->format("m"); ?>" />

                    <input type="submit" style="margin-left: 10px;width: 55px;" class="btnbg1"
                           id="wageSearchBtn" value="查询" name="wageSearchBtn">
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<div id="wageReport">

</div>