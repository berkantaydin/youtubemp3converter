<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="content-language" content="tr"/>
    <meta name="viewport" content="width=device-width,height=device-height,user-scalable=no"/>
    <meta name="google-site-verification" content="8b1Z-oaWoza4k_6iKy0B5GZcRJKfNMW6ne7Z2M3IhHk"/>
    <meta name="description"
          content="Youtube MP3 ve videolarınızı çok hızlı ve kolay bir şekilde kaliteli Online Mp3 dönüştürüp bilgisayarınıza kaydedin ! Bu işlemi üye olmadan kolayca yapın."/>
    <meta name="keywords"
          content="youtube mp3 dönüştürücü, youtube mp3, you tube mp3 dönüştürücü, youtube downloader mp3, youtube mp3 indir, youtube to mp3, youtube 2 mp3"/>
    <link rel="shortcut icon" href="<?= base_url() ?>favicon.ico"/>
    <?
    switch($_SERVER['HTTP_HOST']){
        case "mp3.youtube3.org":
            $webstore = "fifhlffdbaehohnnhkmeefhhhelilloo";
            break;
        case "youtubemp3donusturucu.com":
        case "www.youtubemp3donusturucu.com":
            $webstore = "gcahdfdmnedgbbfccemiamjcmjnfjodn";
            break;
        default:
            $webstore = "gcahdfdmnedgbbfccemiamjcmjnfjodn";
    }
    ?>
    <link rel="chrome-webstore-item" href="https://chrome.google.com/webstore/detail/<?=$webstore?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>all_min.css"/>
    <script src="<?= base_url() ?>all_min.js" type="text/javascript"></script>
    <title><?= (($title != "") ? "$title" : "Youtube MP3 Dönüştürücü") ?></title>
    <script type="text/javascript">var _sf_startpt = (new Date()).getTime()</script>
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-41046119-1', 'youtubemp3donusturucu.com');
        ga('send', 'pageview');

    </script>
</head>
<body>


<!-- AddThis Smart Layers BEGIN -->
<!-- Go to http://www.addthis.com/get/smart-layers to customize -->
<!--
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51e2e1823241e02f"></script>
<script type="text/javascript">
    addthis.layers({
        'theme': 'transparent',
        'share': {
            'position': 'left',
            'numPreferredServices': 5
        },
        'whatsnext': {},
        'recommended': {
            'title': 'Senin için önerilenler:'
        }
    });
</script>
-->
<!-- AddThis Smart Layers END -->

<div class="topbar">
    <div class="fill">
        <div class="container canvas">
            <a class="brand" href="<?= base_url() ?>">Youtube MP3 Dönüştürücü</a>
            <ul class="nav">
                <? if ($this->session->userdata('user_id') > 0): ?>
                    <li id="index"><a href="<?= base_url() ?>">Index</a></li>
                    <!-- <li id="mostviewed"><a href="<?= site_url("stats/viewed") ?>">Most Viewed</a></li> -->
                <? else: ?>
                    <!-- <li id="signup"><a href="<?= site_url("auth") ?>">Sign Up</a></li> -->
                <? endif ?>
            </ul>
            <!--
            <?= form_open('auth/login', array('class' => 'pull-right')) ?>
            <? if ($this->session->userdata('user_id') > 0): ?>
                <button class="btn" type="submit"
                        onclick="javascript:window.location.href='<?= site_url('profile/settings') ?>'; return false;">
                    Settings
                </button>
                <button class="btn" type="submit"
                        onclick="javascript:window.location.href='<?= site_url('profile/logout') ?>'; return false;">
                    Logout
                </button>
            <? else: ?>
                <input class="input-small" name="email" type="text" placeholder="Email">
                <input class="input-small" name="pass" type="password" placeholder="Password">
                <button class="btn" type="submit">Sign in</button>
            <? endif ?>
            <?= form_close() ?>
            -->
        </div>
    </div>
</div>


<div class="container canvas">

    <div class="content">

        <div class="row">
            <div class="span12">
                <? if ($this->session->flashdata('error') != ""): ?>
                    <div class="alert alert-block alert-error fade in">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4 class="alert-heading">Error</h4>

                        <p><?= $this->session->flashdata('error') ?></p>
                    </div>
                <? endif ?>

                <?
                $validation_errors = validation_errors();
                if ($validation_errors != ""):
                    ?>
                    <div class="alert alert-block alert-error fade in">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4 class="alert-heading">Form Validation Error</h4>

                        <p><?= validation_errors() ?></p>
                    </div>
                <? endif ?>

                <? if ($this->session->flashdata('info') != ""): ?>
                    <div class="alert fade in">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <p><?= $this->session->flashdata('info') ?></p>
                    </div>
                <? endif ?>
            </div>
        </div>

        <?= $page ?>

        <div class="row">
            <div class="span12">
                <h6>Youtube MP3 Dönüştürücü Nedir ?</h6>

                <div class="well">
                    Youtube Videolarını mp3 çeviren birçok masaüstü programı var. Bu Programlar tamamen ücretsiz olarak
                    internetten ulaşabiliyorsunuz.<br/>Bilgisayarınıza kaydedip istediğiniz youtube videosundaki mp3'ü
                    ayırmanızı sağlar.<br/><br/>
                    <strong>Youtube mp3</strong> dönüştürücü sitesi olarak masaüstü programı yerine bunu daha kolay hale
                    getirmek için bir websitesi oluşturduk.Youtube linki yazıp dönüştürme butonuna tıkladığınızda
                    sunucularımızdaki programlar youtube videosundaki <strong>mp3</strong> ayırıp sizin
                    indirebileceğiniz bir
                    link haline getirir.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="span12">
                <hr/>
                <a href="<?= site_url('page/privacypolicy') ?>/" target="_blank">Privacy Policy</a>&nbsp;&nbsp;| &nbsp;&nbsp;
                <a href="mailto:vstcmail@gmail.com?subject=youtubemp3donusturucu.net" target="_blank">Contact Us</a>
            </div>
        </div>

        <!-- Memory: <?= $this->benchmark->elapsed_time() ?>  ||  Elapsed: <?= $this->benchmark->memory_usage() ?> -->
    </div>
    <script type="text/javascript">
        var _sf_async_config = { uid: 43759, domain: '<?=str_replace('www.', '', $_SERVER['HTTP_HOST'])?>', useCanonical: true };
        (function () {
            function loadChartbeat() {
                window._sf_endpt = (new Date()).getTime();
                var e = document.createElement('script');
                e.setAttribute('language', 'javascript');
                e.setAttribute('type', 'text/javascript');
                e.setAttribute('src', '//static.chartbeat.com/js/chartbeat.js');
                document.body.appendChild(e);
            };
            var oldonload = window.onload;
            window.onload = (typeof window.onload != 'function') ?
                loadChartbeat : function () {
                oldonload();
                loadChartbeat();
            };
        })();
    </script>
    <!-- Yandex.Metrika counter --><script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter22103353 = new Ya.Metrika({id:22103353, webvisor:true, clickmap:true, trackLinks:true, accurateTrackBounce:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/22103353" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
    <font style="overflow: auto; position: absolute; height: 0pt; width: 0pt"><a title="porno" href="http://pornocubaba.com" rel="dofollow">porno</a></font>
</body>
</html>
