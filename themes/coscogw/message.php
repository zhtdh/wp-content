<?php
/**
 * Created by PhpStorm.
 * User: zhangtao
 * Date: 15-7-24
 * Time: 上午10:23
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //session_start();
    $authcode = $_POST['iptCode'];
    $message = mb_strimwidth($_POST['postmessage'], 0, 500, '...');
    //var_dump($_SESSION['AUTHCODE']);
    //var_dump($authcode);
    if ($_SESSION['AUTHCODE'] == $authcode) {
        $wpdb->insert('wp_messages', array('message_content' => $message), array('%s'));
        ?>
        <div class="message_nr">
            </br>
            <h4>留言保存成功，我们将尽快与您联系.<a href="<?php echo post_permalink($post->ID); ?>">继续留言</a></h4>
        </div>

    <?php
    }else{
        ?>
        <div class="message_nr">
            <h5 style="color:red;">验证码错误</h5>
            </br>
            <form action="<?php echo post_permalink($post->ID); ?>" method="post">
                <div class="form-group">
                    <label>请填写您的留言,为了方便我们与您联系请务必留下联系方式</label>
                    <textarea class="form-control" rows="10" name="postmessage"><?php echo $message;?></textarea>
                </div>
                <div style="line-height:35px;">
                    <label>验证码：</label>
                    <input maxlength="4" type="text" name="iptCode" style="width:80px;">
                    <img width="85px" height="35" style="vertical-align: middle;" id="iptPic"
                         src="<?php echo get_stylesheet_directory_uri(); ?>/captcha.php"
                         onclick="document.getElementById('iptPic').src='<?php echo get_stylesheet_directory_uri(); ?>/captcha.php?'+Math.random();"
                        >

                    <div class="btn-group">
                        <button type="button" class="btn btn-primary"
                                onclick="document.getElementById('iptPic').src='<?php echo get_stylesheet_directory_uri(); ?>/captcha.php?'+Math.random();">
                            刷新
                        </button>
                        <button type="submit" class="btn btn-primary">提交</button>
                    </div>
                </div>
            </form>
        </div>


    <?php
    }
    ?>
<?php
} else {
    ?>
    <div class="message_nr">
        </br>
        <form action="<?php echo post_permalink($post->ID); ?>" method="post">
            <div class="form-group">
                <label>请填写您的留言,为了方便我们与您联系请务必留下联系方式</label>
                <textarea class="form-control" rows="10" name="postmessage"></textarea>
            </div>
            <div style="line-height:35px;">
                <label>验证码：</label>
                <input maxlength="4" type="text" name="iptCode" style="width:80px;">
                <img width="85px" height="35" style="vertical-align: middle;" id="iptPic"
                     src="<?php echo get_stylesheet_directory_uri(); ?>/captcha.php">

                <div class="btn-group">
                    <button type="button" class="btn btn-primary"
                            onclick="document.getElementById('iptPic').src='<?php echo get_stylesheet_directory_uri(); ?>/captcha.php?'+Math.random();">
                        刷新
                    </button>
                    <button type="submit" class="btn btn-primary">提交</button>
                </div>
            </div>
        </form>
    </div>
<?php
}
?>
