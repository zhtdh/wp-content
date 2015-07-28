
<?php
    //var_dump($_SESSION['ship-query']);
    $queryStr = "select s.ship_no ship_no,s.ship_cod ship_cod,s.ship_nam ship_nam,s.e_voyage e_voyage "
        . " from ship s where s.ship_corp_cod = :client_cod and (sysdate - s.leave_port_tim) < 300 "
        . "order by s.ship_cod,s.e_voyage";
    $exec = $business_db->prepare($queryStr);
    $exec->execute(array('client_cod' => $_SESSION['ship-query']));
    $ships = array();
    $oldshipcod = '';
    $newshipcod = '';
    while ($row = $exec->fetch()){
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
        $('#ShipName').remove('option');
        $('#Voyage').remove('option');
        $('#ShipName').append("<option value=''></option>");
        $('#Voyage').append("<option value=''></option>");
        $.each(arrclientvisit,function(name,value){
            var str = "<option value='" + name + "'>" + value['shipName'] + "</option>" ;
            $('#ShipName').append(str);
        });
        $('#ShipName').bind('change',function(event){

        });
        //$('#ShipName').append("<option value=''></option>");
    });
</script>

<?php
    $exec = null;
    $row = null;
    $queryStr = null;

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
                    <input type="hidden" value="20110817014455" id="ShipNo" name="ShipNo">
                    &nbsp;

                    <input
                        type="submit" style="margin-left: 10px;
                                                                    width: 55px;" class="btnbg1"
                        id="ctl00_Main_btn_ShipManifest_Search" value="查询" name="ctl00$Main$btn_ShipManifest_Search">
                    <input type="submit" style="margin-left: 10px;
                                    width: 55px;" class="btnbg1" id="ctl00_Main_btn_ShipManifest_Download" value="下载"
                           name="ctl00$Main$btn_ShipManifest_Download">
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<table class="table table-striped">
    <thead>
    <tr>
        <th>箱号</th>
        <th>箱尺寸</th>
        <th>箱型</th>
        <th>提单号</th>
        <th>箱铅封号</th>
        <th>件数</th>
        <th>重量</th>
        <th>体检</th>
        <th>温度</th>
        <th>湿度</th>
        <th>通风</th>
        <th>中转港</th>
        <th>目的港</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>TTLU9000297</td>
        <td>40</td>
        <td>HC</td>
        <td>PASU5012792300</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>上海外五</td>
        <td>上海外五</td>
    </tr>
    <tr>
        <td>TTLU9000297</td>
        <td>40</td>
        <td>HC</td>
        <td>PASU5012792300</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>上海外五</td>
        <td>上海外五</td>
    </tr>
    <tr>
        <td>TTLU9000297</td>
        <td>40</td>
        <td>HC</td>
        <td>PASU5012792300</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>上海外五</td>
        <td>上海外五</td>
    </tr>
    <tr>
        <td>TTLU9000297</td>
        <td>40</td>
        <td>HC</td>
        <td>PASU5012792300</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>上海外五</td>
        <td>上海外五</td>
    </tr>
    <tr>
        <td>TTLU9000297</td>
        <td>40</td>
        <td>HC</td>
        <td>PASU5012792300</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>上海外五</td>
        <td>上海外五</td>
    </tr>
    <tr>
        <td>TTLU9000297</td>
        <td>40</td>
        <td>HC</td>
        <td>PASU5012792300</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>上海外五</td>
        <td>上海外五</td>
    </tr>
    </tbody>
</table>
