<div class="row">

    <div class="span3">
        <h6>advertisements</h6>

        <div>
            <!-- REKLAM ALANI -->
            <!-- ReklamStore kodu basla -  youtubemp3donusturucu.com 160x600 -->
            <script type="text/javascript">
                var reklamstore_region_id = 301582;
            </script>
            <script type="text/javascript" src="http://adserver.reklamstore.com/reklamstore.js"></script>
            <!-- ReklamStore kodu bitti youtubemp3donusturucu.com 160x600 -->
        </div>

        <div class="well">
            Youtube videolarını mp3 dönüştürmek hiç bu kadar hızlı olmamıştı. Youtube MP3 dönüştürücü ile MP3 dinlemenin
            keyfini çıkarın.
        </div>

    </div>
    <div class="span9">

        <h5>MP3 Dönüştür</h5>

        <div class="well">
            <?= form_open('media/getsearch') ?>
            <input name="getsearch" class="search input-xxlarge" value="http://www.youtube.com/watch?v=OCSevzJQ2-Y"/>
            <button type="submit" class="btn btn-primary">Video'yu MP3'e dönüştür</button>
            <?= form_close() ?>
        </div>

        <div>
            <!---------------------------------------------   MediaGet     ------------------------------------------>
            <center>
                <div id="mediaget_box">
                    <a id="mediaget_link_2" href="http://mediaget.com">
                        <img border="0" src="/assets/tur_red.png">
                    </a>
                    <script type="text/javascript">
                        var ref=document.URL;
                        ref=ref.substring(7,ref.length);
                        if(ref.indexOf("/")>-1){
                            ref=ref.substring(0,ref.indexOf("/"));
                        }
                        if(ref.indexOf("www.")>-1){
                            ref=ref.substring(parseInt(ref.indexOf("www."))+4,ref.length);
                        }
                        var mediaget_str= document.title;
                        var mediaget_name=mediaget_str;
                        if(mediaget_str.indexOf("-")>-1){
                            mediaget_str=mediaget_str.substring(0,mediaget_str.indexOf("-"));
                            mediaget_name=mediaget_str;
                        }
                        mediaget_str=encodeURIComponent(mediaget_str);
                        var mediaget_href="http://mediaget.com/torrent.php?r="+ref+"&s="+mediaget_str+"&f="+mediaget_str;
                        //document.getElementById('mediaget_link_1').href= mediaget_href;
                        document.getElementById('mediaget_link_2').href= mediaget_href;

                        //document.getElementById('mediaget_link_1').innerHTML=mediaget_name;
                    </script>
                </div>
            </center>
            <!---------------------------------------------   MediaGet     ------------------------------------------>
        </div>

        <h2 itemprop="description"><span itemprop="name"><?= convert_accented_characters($data->adi) ?></span></h2>

        <br/>

        <div class="thumbnail">
            <center><img src="http://img.youtube.com/vi/<?= $data->vid ?>/hqdefault.jpg"/></center>
        </div>

        <div class="well">
            Dosyanız başarıyla alındı, şu anda işleniyor. İşlem bitince indirme linki görüntülenecektir.
            <br/>

            <div class="progress progress-striped active">
                <div class="bar" style="float: left; width: 0%; " data-percentage="100"></div>
            </div>
            <br/>

            <div class="indir_link"><h6><a href="<?= $data->srv1 ?>" class="text-center" target="_blank">Tıkla İndir</a></h6></div>
        </div>

        <? if($data->lyrics != ''): ?>
            <h5>Şarkı Sözleri</h5>

            <div class="well">
                <?=anchor(site_url('lyrics/get/'.$data->vid.'/'.url_title(convert_accented_characters($data->adi))),convert_accented_characters($data->adi).' Şarkı Sözleri')?>
            </div>
        <? endif ?>

        <h5>Video bilgileri</h5>
        <div class="well">
            <code><?= $data->aciklama ?></code>
        </div>

        <? if($this->session->userdata('auth') == 'admin'): ?>
        <h5>Düzenle</h5>
        <div class="well">
            <?=anchor(site_url('lyrics/edit/'.$data->vid),'Şarkı Sözlerini Düzenle')?>
        </div>
        <? endif ?>

    </div>
</div>
