<table class="table table-striped">
    <thead>
    <tr>
        <th>序号</th>
        <th>箱号</th>
        <th>箱尺寸</th>
        <th>箱型</th>
        <th>箱皮重</th>
        <th>箱铅封号</th>
        <th>预定箱号</th>
        <th>预定铅封</th>
        <th>放箱标识</th>
        <th>温度</th>
        <th>湿度</th>
        <th>通风</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (!empty($billquery_shipno) and !empty($billquery_billno) ) {
        $queryStr = " select * from ( "
            . " select c.cntr,c.cntr_siz_cod,c.cntr_typ_cod,f.cntr_net_wgt,c.cntr_seal_no,"
            . " c.pre_cntr,c.pre_seal,f_get_available_id(c.available_id,c.available_tim) AS available_id,"
            . " (c.temp_set || c.temp_id) as temp,c.humidity,c.ventilation "
            . " from contract_cntr c,cntr_file f "
            . " where c.cntr_no = f.cntr_no and c.bill_no = :bill_no and c.ship_no = :ship_no "
            . " union all "
            . " select c.cntr,c.cntr_siz_cod,c.cntr_typ_cod,0 as cntr_net_wgt,c.cntr_seal_no,"
            . " c.pre_cntr,c.pre_seal,f_get_available_id(c.available_id,c.available_tim) AS available_id,"
            . " (c.temp_set || c.temp_id) as temp,c.humidity,c.ventilation "
            . " from contract_cntr c "
            . " where c.cntr_no is null and c.bill_no = :bill_no and c.ship_no = :ship_no "
            . " ) t order by t.cntr ";
        $exec = oci_parse($business_db,$queryStr);
        oci_bind_by_name($exec,":ship_no",$billquery_shipno);
        oci_bind_by_name($exec,":bill_no",$billquery_billno);
        oci_execute($exec);
        $rownum = 0;
        while ($row = oci_fetch_assoc($exec)) {
            $rownum++;
            ?>
            <tr>
                <td><?php echo $rownum; ?></td>
                <td><?php echo mb_convert_encoding($row['CNTR'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['CNTR_SIZ_COD'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['CNTR_TYP_COD'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['CNTR_NET_WGT'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['CNTR_SEAL_NO'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['PRE_CNTR'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['PRE_SEAL'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['AVAILABLE_ID'], 'utf-8', 'gbk') == '1' ? '已放箱' : '未放箱'; ?></td>
                <td><?php echo mb_convert_encoding($row['TEMP'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['HUMIDITY'], 'utf-8', 'gbk'); ?></td>
                <td><?php echo mb_convert_encoding($row['VENTILATION'], 'utf-8', 'gbk'); ?></td>
            </tr>
        <?php }
        oci_free_statement($exec);
        $row = null;
        $rownum = null;
        $queryStr = null;
    }
    ?>
    </tbody>
</table>
