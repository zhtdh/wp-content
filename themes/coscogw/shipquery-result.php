
<?php
    //var_dump($_SESSION['ship-query']);
    $queryStr = "select s.ship_no ship_no,s.ship_cod ship_cod,s.ship_nam ship_nam,s.e_voyage e_voyage "
        . " from ship s where s.ship_corp_cod = :client_cod and (sysdate - s.leave_port_tim) < 300 "
        . "order by s.ship_cod,s.e_voyage";
    $exec = oci_parse($business_db,$queryStr);
    oci_bind_by_name($exec,":client_cod",$_SESSION['ship-query']);
    oci_execute($exec);
    $ships = array();
    $oldshipcod = '';
    $newshipcod = '';
    while ($row = oci_fetch_assoc($exec)){
        $newshipcod = $row['SHIP_COD'];
        if ($newshipcod == $oldshipcod){
            $ships[$newshipcod]['lists'][] = array('shipNo' => mb_convert_encoding($row['SHIP_NO'], 'utf-8', 'gbk'),
                //'shipCod' => mb_convert_encoding($row['SHIP_COD'], 'utf-8', 'gbk'),
                //'shipName' => mb_convert_encoding($row['SHIP_NAM'], 'utf-8', 'gbk'),
                'shipVoyage' => mb_convert_encoding($row['E_VOYAGE'], 'utf-8', 'gbk'));

        }else{
            $ships[$newshipcod]['shipName'] = mb_convert_encoding($row['SHIP_NAM'], 'utf-8', 'gbk');
            $ships[$newshipcod]['lists'] = array();
            $ships[$newshipcod]['lists'][] = array('shipNo' => mb_convert_encoding($row['SHIP_NO'], 'utf-8', 'gbk'),
                //'shipCod' => mb_convert_encoding($row['SHIP_COD'], 'utf-8', 'gbk'),
                //'shipName' => mb_convert_encoding($row['SHIP_NAM'], 'utf-8', 'gbk'),
                'shipVoyage' => mb_convert_encoding($row['E_VOYAGE'], 'utf-8', 'gbk'));
        }
        $oldshipcod = $row['SHIP_COD'];
    }

    //var_dump($row);
    //$str=json_encode($row,JSON_UNESCAPED_UNICODE);
    $str=wp_json_encode($ships);
    //var_dump($str);
?>
<script type="text/javascript">
    var arrclientvisit=JSON.parse(<?php echo "'" . $str ."'" ;?>);
    //console.info(arrclientvisit);
    $(function(){
        $('#ShipName').append("<option value=''></option>");
        $.each(arrclientvisit,function(name,value){
            var str = "<option value='" + name + "'>" + value['shipName'] + "</option>" ;
            $('#ShipName').append(str);
        });
        $('#ShipName').bind('change',function(event){
            $('#Voyage').empty();
            if (arrclientvisit.hasOwnProperty($('#ShipName').val())){
            $.each(arrclientvisit[$('#ShipName').val()]['lists'],function(name,value){
                var str = "<option value='" + value['shipNo'] + "'>" + value['shipVoyage'] + "</option>" ;
                $('#Voyage').append(str);
            });
            }
        });
        $('#shipSearch').bind('click',function(event){
            //console.info($('#Voyage').val());
            $('#shipReport').load('<?php bloginfo("template_url"); ?>/shipreport.php',{'shipno':$('#Voyage').val()},function(t,s,x){
                if (t == '未登录'){
                    window.location.href = "<?php echo urldecode(post_permalink($post->ID)); ?>";
                }
            });
        });
        $('#shipDownloadbtn').bind('click',function(event){
            //console.info();
            event.preventDefault();
            $('#shipno').val($('#Voyage').val());
            $('#shipdownload').submit();
        });
        //$('#ShipName').append("<option value=''></option>");
    });
</script>

<?php
    oci_free_statement($exec);
    $row = null;
    $queryStr = null;
    $oldshipcod = null;
    $newshipcod = null;
?>
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
                                line-height: 40px;">客户查询</span>
            </td>
            <td align="right" style="line-height: 40px;">
                <div align="right" style="font-size: 13px; text-align: center; font-family: 微软雅黑">
                    单船清单查询： 船名<select style="width:120px;"
                                      id="ShipName" name="ShipName">
                    </select>
                    航次<select style="width:70px;" id="Voyage"
                              name="Voyage">
                    </select>
                    <input type="submit" style="margin-left: 10px;width: 55px;" class="btnbg1"
                           id="shipSearch" value="查询" name="shipSearch">
                    <input type="submit" style="margin-left: 10px;width: 55px;" class="btnbg1"
                           id="shipDownloadbtn" value="下载" name="shipDownloadbtn">
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <form id="shipdownload" style="display: none;" action="<?php bloginfo('template_url'); ?>/shipreportexcel.php" method="post">
        <input name="shipno" type="hidden" id="shipno">
    </form>
</div>
<div id="shipReport">

</div>