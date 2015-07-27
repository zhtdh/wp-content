<?php
    var_dump($_SESSION['ship-query']);
    $statement = $business_db->prepare("select count(1) clientcount from c_client_cod where client_cod = :clientcod");
    $statement->execute(array('clientcod' => $loginUserName));
    $row = $statement->fetch();
    if (($row['CLIENTCOUNT'] > 0) and $loginUserName == $loginUserPw and $_SESSION['AUTHCODE'] == $authcode) {
        //echo 'success';
        $_SESSION['ship-query'] = $loginUserName;
    } else {
        $_SESSION['ship-query'] = null;
    }
    $statement = null;

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
                    单船清单查询： 船名<select style="width:120px;" onchange="loadVoyages(this.selectedIndex)"
                                      id="ctl00_Main_dropShipName" name="ctl00$Main$dropShipName">
                        <option value="3111||20131101024376">安远1</option>
                        <option value="1015S||20150608030404">阿彦</option>
                        <option value="1017S||20150619030508">巴司</option>
                        <option value="213E||20140616026129,221E||20140903026850">珊瑚岛</option>
                        <option
                            value="0814||20110603012982,2115||20110904015226,321||20101216010884,9513||20110307012206">
                            商船三井奉献
                        </option>
                        <option value="1082||20110822014776">恩基5</option>
                        <option value="555||20130527022478">伊朗临时</option>
                        <option value="1187||20111206016430">和宏</option>
                        <option value="3112||20131111024425">金洋69</option>
                        <option value="028S||20110817014455" selected="selected">集海之鸿</option>
                        <option value="3013||20130412022240,3102||20131014024067">恩基3</option>
                        <option value="13181S||20130710022948">南泰7</option>
                        <option value="0277E||20141008027716,0285E||20141223028258,252E||20140120024795">莲花岛</option>
                        <option
                            value="1329||20110826014995,1351||20110930015444,2239||20120305017037,2287||20120523018839,2333||20120803020016,2341||20120815020111,2379||20121013020433,2383||20121019020468,2397||20121113021089">
                            鑫川6
                        </option>
                        <option value="2419||20120215016898,2491||20120703019399,9932||20111222016607">新华801</option>
                        <option value="1132||20111012015755">绪扬15</option>
                        <option value="1016S||20150612030444">阿迪</option>

                    </select>
                    航次<select style="width:70px;" onchange="changeVoyage()" id="ctl00_Main_dropVoyage"
                              name="ctl00$Main$dropVoyage">
                        <option value="20110817014455" selected="selected">028S</option>

                    </select>
                    <input type="hidden" value="20110817014455" id="ctl00_Main_txtSShipNo" name="ctl00$Main$txtSShipNo">
                    <input type="hidden" value="028S||20110817014455" id="ctl00_Main_txtSShip"
                           name="ctl00$Main$txtSShip">
                    &nbsp;
                    <!--<input name="ctl00$Main$txtShipNo" type="text" id="ctl00_Main_txtShipNo" onkeydown="if(event.keyCode==13) { event.keyCode=9; document.getElementById(&#39;btn_ShipManifest_Search&#39;).click();}" style="border-color: #CCCCCC; border-width: 1px; border-style: Solid; width: 212px;" /> --><input
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
