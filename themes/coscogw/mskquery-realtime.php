<?php
$dtz = new DateTimeZone("Asia/Shanghai");
$systime = new DateTime("now", $dtz);
//var_dump($systime);
?>
<div class="DRight">
    <div style="margin-left: 10px; _margin-left: 5px">
        <table cellspacing="0" cellpadding="0" border="0"
               background="<?php bloginfo('template_url'); ?>/images/ywcxback.gif"
               width="697" height="40" style="background-repeat:no-repeat;">
            <tbody>
            <tr>
                <td align="right" width="50" style="line-height: 40px;">
                    <img width="21" height="21" src="<?php bloginfo('template_url'); ?>/images/arrow01.gif">
                </td>
                <td width="75" valign="bottom">
                            <span style="font-size: 14px; color: #3366cc; font-weight: bold; vertical-align: middle;
                                line-height: 40px;">实时盘存</span>
                </td>
                <td align="right" style="line-height: 40px;">
                    <div align="right" style="width:270px;  font-size: 13px; text-align: center; font-family: 微软雅黑">
                    </div>
                </td>
            </tr>
            <tr style="height:10px;">
                <td colspan="3"> &nbsp; </td>
            </tr>
            <tr>
                <td colspan="3" td="">
                    <div> 最新实时盘存时间:<?php echo $systime->format("Y年m月d日H") ?>时，实时频率(1小时)
                        <table border="1" style="width:693px;border-collapse:collapse;border:thin solid blue">
                            <tbody>
                            <tr style="text-align:center">
                                <th style="width: 40px;">序号</th>
                                <th style="width: 60px;">箱型</th>
                                <th style="width: 40px;">好箱</th>
                                <th>排队</th>
                            </tr>
                            <?php
                            $queryStr = " select t.cntr_siz_cod || t.cntr_typ_cod UCNTRTYPE,a.cnum UGROUP,count(1) UGOODCNTR from cntr_file t,"
                                . " (select c.cntr_siz_cod,c.cntr_typ_cod,count(1) cnum from cy_work_command c"
                                . " where c.cntr_oper_cod = 'MKL' and c.work_typ = 'TI' group by c.cntr_siz_cod,c.cntr_typ_cod) a"
                                . " where t.current_stat = '2' and t.cntr_oper_cod = 'MKL' and t.dam_id = '0' and t.e_f_id = 'E'"
                                . " and t.cntr_typ_cod in ('GP','HC','RF','RH') and nvl(t.pre_tak_id,'0') = '0' "
                                . " and t.cntr_siz_cod = a.cntr_siz_cod(+) and t.cntr_typ_cod = a.cntr_typ_cod(+) "
                                . " group by t.cntr_siz_cod,t.cntr_typ_cod,a.cnum";
                            $statement = $business_db->prepare($queryStr);
                            $statement->execute();
                            $num = 0;
                            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                                $num++;
                                ?>
                                <tr>
                                    <td><?php echo $num; ?></td>
                                    <td><?php echo mb_convert_encoding($row['UCNTRTYPE'], 'utf-8', 'gbk'); ?></td>
                                    <td><?php echo mb_convert_encoding($row['UGOODCNTR'], 'utf-8', 'gbk'); ?></td>
                                    <td><?php echo mb_convert_encoding($row['UGROUP'], 'utf-8', 'gbk'); ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>