<?php $cntr = strtoupper($_GET['cntr']); ?>
<div class="DRight">
    <div style="margin-left: 10px;overflow:scroll;">
        <form action="<?php echo post_permalink($post->ID); ?>" method="get">
        <table cellspacing="0" cellpadding="0" background="<?php bloginfo('template_url'); ?>/images/ywcxback.gif"
               width="697" height="40" style="background-repeat:no-repeat; ">
            <tbody>
            <tr>
                <td align="right" width="50" style="line-height: 40px;">
                    <img width="21" height="21" src="<?php bloginfo('template_url'); ?>/images/arrow01.gif">
                </td>
                <td width="75" valign="bottom">
                            <span style="font-size: 14px; color: #3366cc; font-weight: bold; vertical-align: middle;
                                line-height: 40px;">单箱查询</span>
                </td>
                <td align="right" style="line-height: 40px;">
                    <div align="right" style="font-size: 13px; text-align: center; font-family: 微软雅黑">
                        箱号：
                        <input type="text" maxlength="11"
                               style="line-height:15px;border-color: #CCCCCC; border-width: 1px; border-style: Solid;
                                   width: 212px;text-transform:uppercase;"
                               name="cntr" id="cntr"
                        value="<?php
                            if (!empty($cntr)){
                                echo $cntr;
                            }
                         ?>">
                        <input type="submit" style="margin-left: 10px; width: 55px;" class="btnbg1" id="cntrbtn" value="查询" name="cntrbtn">
                    </div>
                </td>
            </tr>

            </tbody>
        </table>
        </form>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>序号</th>
                <th>船名航次</th>
                <th>分提单号</th>
                <th>箱号</th>
                <th>箱型</th>
                <th>尺寸</th>
                <th>铅封</th>
                <th>提箱送货</th>
                <th>箱皮重</th>
                <th>最大载重</th>
                <th>提箱时间</th>
                <th>返场时间</th>
                <th>集港时间</th>
                <th>实装件数</th>
                <th>实装重量</th>
                <th>实装体积</th>
            </tr>
            </thead>
            <tbody>
            <?php
            //$cntr = strtoupper($_GET['cntr']);
            //var_dump($cntr);
            if (!empty($cntr)) {
                //echo '查找';
                $queryStr = " select (s.ship_nam ||'/'|| s.e_voyage) SHIP,ccc.bill_no SUBBILLNO,cc.cntr CNTRNO,cc.cntr_typ_cod CNTRTYPE,"
                    . "cc.cntr_siz_cod CNTRSIZE,cc.cntr_seal_no CNTRSEALNO,decode(cc.action_typ,'TIWDTX','外点','内点') WORKTYPE,"
                    . "c.cntr_net_wgt CNTRNETWEIGHT,c.SCALE_WGT SCALE_WGT,to_char(cc.pre_alloc_tim,'yyyy-mm-dd hh24:mi:ss') CNTRTIME,"
                    . "to_char(cc.alloc_tim,'yyyy-mm-dd hh24:mi:ss') BACKTIME,to_char(cc.centra_tim,'yyyy-mm-dd hh24:mi:ss') TOPORTTIME,"
                    . " ccc.cntr_crg_pieces PIECES,ccc.cntr_crg_wgt WEIGHT,ccc.cntr_crg_vol VOL"
                    . " from contract_cntr cc,contract_cntr_cargo ccc,ship s,cntr_file c "
                    . " where cc.cntr_oper_cod = 'MKL' and cc.cntr_sn = ccc.cntr_sn and cc.ship_no = s.ship_no"
                    . " and cc.cntr = :ls_cntr  and cc.cntr_no = c.cntr_no";
                $statement = $business_db->prepare($queryStr);
                $statement->execute(array('ls_cntr' => $cntr));
                $num=0;
                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    $num++;
                    ?>
                    <tr>
                        <td><?php echo $num; ?></td>
                        <td><?php echo mb_convert_encoding($row['SHIP'], 'utf-8', 'gbk'); ?></td>
                        <td><?php echo mb_convert_encoding($row['SUBBILLNO'], 'utf-8', 'gbk'); ?></td>
                        <td><?php echo mb_convert_encoding($row['CNTRNO'], 'utf-8', 'gbk'); ?></td>
                        <td><?php echo mb_convert_encoding($row['CNTRTYPE'], 'utf-8', 'gbk'); ?></td>
                        <td><?php echo mb_convert_encoding($row['CNTRSIZE'], 'utf-8', 'gbk'); ?></td>
                        <td><?php echo mb_convert_encoding($row['CNTRSEALNO'], 'utf-8', 'gbk'); ?></td>
                        <td><?php echo $row['WORKTYPE']; ?></td>
                        <td><?php echo mb_convert_encoding($row['CNTRNETWEIGHT'], 'utf-8', 'gbk'); ?></td>
                        <td><?php echo mb_convert_encoding($row['SCALE_WGT'], 'utf-8', 'gbk'); ?></td>
                        <td><?php echo mb_convert_encoding($row['CNTRTIME'], 'utf-8', 'gbk'); ?></td>
                        <td><?php echo mb_convert_encoding($row['BACKTIME'], 'utf-8', 'gbk'); ?></td>
                        <td><?php echo mb_convert_encoding($row['TOPORTTIME'], 'utf-8', 'gbk'); ?></td>
                        <td><?php echo mb_convert_encoding($row['PIECES'], 'utf-8', 'gbk'); ?></td>
                        <td><?php echo mb_convert_encoding($row['WEIGHT'], 'utf-8', 'gbk'); ?></td>
                        <td><?php echo mb_convert_encoding($row['VOL'], 'utf-8', 'gbk'); ?></td>
                    </tr>

                    <?php
                }
                $statement = null;
                $queryStr = null;
                $num = null;
                $row = null;
            }
            //var_dump($billquery_shipno);
            ?>
            </tbody>
        </table>
    </div>
</div>