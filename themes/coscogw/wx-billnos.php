<div class="DRight">
    <?php
    //session_start();
    //var_dump(empty($_SESSION['ship-query']));
    $qrcodeticket = '';
    function getCurrentToken(){
        global $wpdb;
        //微信服务号token
        return $wpdb->get_var("SELECT option_value FROM wp_options WHERE option_name = 'weixin_service_token'",0,0);
    }
    function getNewToken(){
        $appid = "wx496a438294111b35";
        //$appsecret = "mkdrJaxFkkRN6GqC4le4mQyxd-nxXS7Wf32kKK7butxqAFVmoYalHrSugWWrukvI";
        $appsecret = "831a06d5d1734b2baba16c68366184fb";
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $jsoninfo = json_decode($output, true);
        //var_dump($jsoninfo);
        $access_token = $jsoninfo["access_token"];

        return $access_token;
    }

    function postRequestWxQr($ctoken,$seq){
        $url = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=$ctoken";
        $post_data = array(
            "expire_seconds" => 1800,
            "action_name" => "QR_SCENE",
            "action_info" => array(
                "scene" => array(
                    "scene_id" => $seq
                )
            ));
        $post_datastr = json_encode($post_data,JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        //var_dump($post_data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_datastr);
        $output = curl_exec($ch);
        curl_close($ch);
        $jsoninfo = json_decode($output, true);
        //var_dump($jsoninfo);
        if (array_key_exists('errcode',$jsoninfo)){
            $re = array(
                "errcode" => $jsoninfo["errcode"],
                "errmsg" => $jsoninfo["errmsg"]
            );
        }else{
            $re = array(
                "qrticket" => $jsoninfo["ticket"],
                "qrurl" => $jsoninfo["url"]
            );
        }
        return $re;
    }
    function createWxQr($seq){
        $ctoken = getCurrentToken();
        $r = postRequestWxQr($ctoken,$seq);
        if (array_key_exists('errcode',$r)){
            //产生失败
            $ctoken = getNewToken();
            $r = postRequestWxQr($ctoken,$seq);
            if (array_key_exists('errcode',$r)){
                return $r['errcode'];
            }else{
                return $r;
            }
        }else{
            return $r;
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $billnos = mb_substr(mb_strtoupper(trim($_POST['billnos'])),0,1000);
        $authcode = $_POST['LoginiptCode'];
        if ($_SESSION['AUTHCODE'] == $authcode){
            $result_billnos = '';
            $result = '';
            $queryStr = " begin p_check_attent_billnos(:iv_billnos,:ov_billnos,:ov_rtn); end;";
            $exec = oci_parse($business_db,$queryStr);
            oci_bind_by_name($exec,":iv_billnos",$billnos,1000);
            oci_bind_by_name($exec,":ov_billnos",$result_billnos,1000);
            oci_bind_by_name($exec,":ov_rtn",$result,10);
            oci_execute($exec);
            oci_free_statement($exec);
            if ($result == 'ERR'){
                $qrcodeticket = null;
            }else{
                $rcreate = createWxQr($result);
                if (is_array($rcreate)){
                    $qrcodeticket = $rcreate['qrticket'];
                }else{
                    $qrcodeticket = null;
                }
            }
        }
        else{
            $authcodeerr = true;
            $qrcodeticket = null;
        }
    }else{
        $qrcodeticket = null;
    }
    if (empty($qrcodeticket)) {
        if (!empty($authcodeerr)){
            echo "<h4 style='color: red;'>验证码错误请重新提交</h4>";
        }
        if (!empty($result_billnos)){
            $errbillnos = explode('/',$result_billnos);
            echo "提交失败，请检查如下提单号：";
            ?>
            <table class="table table-bordered table-condensed">
                <?php
                foreach( $errbillnos as $errbillno) {
                    if (mb_strlen($errbillno) > 0 ){
                    echo "<tr><td>$errbillno</td></tr>";
                    }
                }
                ?>

            </table>
            <?php
        }
        ?>

        <form action="<?php echo urldecode(post_permalink($post->ID)); ?>" method="post">
            <fieldset>
                <legend>微信提单关注</legend>
                <div class="form-group">
                    <label>请输入要关注的提单号，多个提单间已'/'分隔，最多关注40个提单</label>
                    <textarea class="form-control" rows="10" name="billnos"><?php echo $billnos;?></textarea>
                </div>
                <div class="form-group">
                    <input type="text" style="width:85px;height: 35px;" maxlength="4" name="LoginiptCode">
                    <img width="85px" height="35" style="vertical-align: middle;" id="iptPic"
                         src="<?php echo get_stylesheet_directory_uri(); ?>/captcha.php"
                         onclick="document.getElementById('iptPic').src='<?php echo get_stylesheet_directory_uri(); ?>/captcha.php?'+Math.random();"
                        >
                    <button type="submit" class="btn btn-default">提交</button>
                </div>

            </fieldset>
        </form>
    <?php
    } else { ?>
        <form>
            <fieldset>
                <legend>请用微信扫描二维码，进行提单关注绑定</legend>
            <div class="form-group">
                <img alt="二维码" src="https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=<?php echo $qrcodeticket;?>">
            </div>
            </fieldset>
        </form>
    <?php
      }
    ?>
</div>