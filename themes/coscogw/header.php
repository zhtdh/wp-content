<?php
/**
 * Created by PhpStorm.
 * User: zhangtao
 * Date: 15-6-2
 * Time: 下午4:05
 */
if ((in_category(['business', 'msk','internal']) and !is_home()) or $_SERVER['REQUEST_METHOD'] == 'POST') {
    //session_set_cookie_params(3600);
    //session_set_cookie_params(10);
    session_start();
    //echo 'session start';
}
include_once('init.php');
//$localhost_name = '172.40.68.246';
//var_dump($localhost_name);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="description" content="<?php bloginfo('description'); ?>"/>
    <meta name="keywords" content="<?php bloginfo('keywords'); ?>"/>
    <title>
        <?php
        if (is_home()) {
            bloginfo('name');
        } elseif (is_category()) {
            single_cat_title();
        } elseif (is_single() || is_page()) {
            single_post_title();
        } elseif (is_search()) {
            echo "搜索结果";
            echo " - ";
            bloginfo('name');
        } elseif (is_404()) {
            echo '页面未找到!';
        } else {
            wp_title('', true);
        }
        ?>
    </title>

    <link href=" <?php bloginfo('template_url'); ?>/css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
    <link href=" <?php bloginfo('stylesheet_url'); ?> " type="text/css" rel="stylesheet"/>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery11.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
</head>
<body>
<div class="body-container">
    <div class="header">
        <div class="logo">
            <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
                <img src="<?php bloginfo('template_url'); ?>/images/logo.gif" alt="<?php bloginfo('name'); ?>">
            </a>
        </div>
        <div class="logosystime">
            <script language=JavaScript>
                //生成日期、星期、阴历
                var topMonth = new Array("1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月");
                var topDay = new Array("星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六", "星期日");
                todayDate = new Date();
                YearString = todayDate.getFullYear();
                DateString = todayDate.getDate();
                var bsDate = YearString + "年" + topMonth[todayDate.getMonth()] + DateString + "日";
                var bsWeek = topDay[todayDate.getDay()];

                var CalendarData = new Array(20);
                var madd = new Array(12);
                var tgString = "甲乙丙丁戊己庚辛壬癸";
                var dzString = "子丑寅卯辰巳午未申酉戌亥";
                var numString = "一二三四五六七八九十";
                var monString = "正二三四五六七八九十冬腊";
                var weekString = "日一二三四五六";
                var sx = "鼠牛虎兔龙蛇马羊猴鸡狗猪";
                var cYear;
                var cMonth;
                var cDay;
                var cHour;
                var cDateString;
                var cYearString;
                var Browser = navigator.appName;

                function initCalendar() {
                    CalendarData[0] = 0x41A95;
                    CalendarData[1] = 0xD4A;
                    CalendarData[2] = 0xDA5;
                    CalendarData[3] = 0x20B55;
                    CalendarData[4] = 0x56A;
                    CalendarData[5] = 0x7155B;
                    CalendarData[6] = 0x25D;
                    CalendarData[7] = 0x92D;
                    CalendarData[8] = 0x5192B;
                    CalendarData[9] = 0xA95;
                    CalendarData[10] = 0xB4A;
                    CalendarData[11] = 0x416AA;
                    CalendarData[12] = 0xAD5;
                    CalendarData[13] = 0x90AB5;
                    CalendarData[14] = 0x4BA;
                    CalendarData[15] = 0xA5B;
                    CalendarData[16] = 0x60A57;
                    CalendarData[17] = 0x52B;
                    CalendarData[18] = 0xA93;
                    CalendarData[19] = 0x40E95;
                    madd[0] = 0;
                    madd[1] = 31;
                    madd[2] = 59;
                    madd[3] = 90;
                    madd[4] = 120;
                    madd[5] = 151;
                    madd[6] = 181;
                    madd[7] = 212;
                    madd[8] = 243;
                    madd[9] = 273;
                    madd[10] = 304;
                    madd[11] = 334;
                }

                function GetBit(m, n) {
                    return (m >> n) & 1;
                }

                function e2c() {
                    var total, m, n, k;
                    var isEnd = false;
                    var tmp = todayDate.getYear();
                    if (tmp < 1900) tmp += 1900;
                    total = (tmp - 2001) * 365 + Math.floor((tmp - 2001) / 4) + madd[todayDate.getMonth()] + todayDate.getDate() - 23;
                    if (todayDate.getYear() % 4 == 0 && todayDate.getMonth() > 1)
                        total++;
                    for (m = 0; ; m++) {
                        k = (CalendarData[m] < 0xfff) ? 11 : 12;
                        for (n = k; n >= 0; n--) {
                            if (total <= 29 + GetBit(CalendarData[m], n)) {
                                isEnd = true;
                                break;
                            }
                            total = total - 29 - GetBit(CalendarData[m], n);
                        }
                        if (isEnd) break;
                    }
                    cYear = 2001 + m;
                    cMonth = k - n + 1;
                    cDay = total;
                    if (k == 12) {
                        if (cMonth == Math.floor(CalendarData[m] / 0x10000) + 1)
                            cMonth = 1 - cMonth;
                        if (cMonth > Math.floor(CalendarData[m] / 0x10000) + 1)
                            cMonth--;
                    }
                    cHour = Math.floor((todayDate.getHours() + 3) / 2);
                }

                function GetcDateString() {
                    var tmp = "";
                    tmp += tgString.charAt((cYear - 4) % 10); //年干
                    tmp += dzString.charAt((cYear - 4) % 12); //年支
                    tmp += "年(";
                    tmp += sx.charAt((cYear - 4) % 12);
                    tmp += ") ";
                    cYearString = tmp;
                    var tmp1 = "";
                    if (cMonth < 1) {
                        tmp1 += "闰";
                        tmp1 += monString.charAt(-cMonth - 1);
                    }
                    else
                        tmp1 += monString.charAt(cMonth - 1);
                    tmp1 += "月";
                    tmp1 += (cDay < 11) ? "初" : ((cDay < 20) ? "十" : ((cDay < 30) ? "廿" : "卅"));
                    if (cDay % 10 != 0 || cDay == 10)
                        tmp1 += numString.charAt((cDay - 1) % 10);

                    cDateString = tmp1;
                    return tmp1;
                }

                function CAL() {

                    document.write("<font color=#9b4e00>" + bsDate + "</font><br>");
                    document.write("<p><font color=#9b4e00>" + bsWeek + "</font></p>");
                    initCalendar();
                    e2c();
                    GetcDateString();
                    document.write("<p><font color=#9b4e00>" + cYearString + "</font></p>");
                    document.write("<p><font color=#9b4e00>" + cDateString + "</font></p>");
                    //   document.getElementById('jnkcTime').innerHTML = today.getHours() + ' : ' + today.getMinutes() + ' : ' + today.getSeconds();
                    //   setInterval('realtime()', 1000);
                }

                function realtime() {
                    time1 = new Date();
                    document.getElementById('jnkcTime').innerHTML = time1.getHours() + " : " + time1.getMinutes() + " : " + time1.getSeconds();
                }


                CAL();
                //-->
            </script>
        </div>
        <div class="logosys">
            <iframe
                src="http://www.thinkpage.cn/weather/weather.aspx?uid=&cid=101120201&l=zh-CHS&p=CMA&a=1&u=C&s=31&m=0&x=0&d=1&fc=&bgc=&bc=&ti=1&in=1&li=2&ct=iframe"
                frameborder="0" scrolling="no" width="180" height="110" allowTransparency="true"></iframe>
        </div>
        <div class="login">
            <script>
                jQuery.fn.addFavorite = function (title, url) {
                    return this.click(function (e) {
                        e.preventDefault();
                        try {
                            //ie
                            window.external.addFavorite(url, title);
                        }
                        catch (e) {
                            try {
                                //firefox
                                window.sidebar.addPanel(title, url, "");
                            }
                            catch (e) {
                                try {
                                    var t = jQuery(this);
                                    t.attr("rel", "sidebar");
                                    t.attr("title", title);
                                    t.attr("href", url);
                                }
                                catch (e) {
                                    alert("抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请使用Ctrl+D进行添加");
                                }
                                //alert("抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请使用Ctrl+D进行添加");
                            }
                        }
                    });
                };
                $(function () {
                    $('#fav').addFavorite('<?php bloginfo('name');?>', '<?php echo home_url();?>');
                });
            </script>
            <p style="text-align: right">
            <span><a href="<?php echo home_url(); ?>/?p=66">联系我们</a> <br/>
                <a href="javascript:;" title="收藏本站" id="fav">收藏本站</a>
                </br>
                <a href="<?php echo home_url();?>/注销?fromurl=<?php echo home_url(add_query_arg(array())); ?>">注销</a>
            </span>
                <br/>
            </p>
        </div>
        <div class="nav">
            <ul>
                <li><a href="<?php echo home_url(); ?>">网站首页</a></li>
                <li><a href="<?php echo home_url(); ?>/?p=71">公司概况</a></li>
                <li><a href="<?php echo home_url(); ?>/category/introduction/">业务介绍</a></li>
                <li><a href="<?php echo home_url(); ?>/category/business/">业务查询</a></li>
                <li><a href="<?php echo home_url(); ?>/category/news/">新闻资讯</a></li>
                <li><a href="<?php echo home_url(); ?>/category/internal/">内部查询</a></li>
                <li><a href="<?php echo home_url(); ?>/在线留言">在线留言</a></li>
                <li><a href="<?php echo home_url(); ?>/?p=66">联系我们</a></li>
                <li><a href="<?php echo home_url(); ?>/category/msk/">马士基专页</a></li>
            </ul>
        </div>
    </div>