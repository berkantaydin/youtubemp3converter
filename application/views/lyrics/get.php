<div class="row">

    <div class="span12">
        <h6>advertisements</h6>

        <div>
            <!-- REKLAM ALANI -->
            <!-- ReklamStore kodu basla -  youtubemp3donusturucu.com 728x90 -->
            <script type="text/javascript">
                var reklamstore_region_id = 301581;
            </script>
            <script type="text/javascript" src="http://adserver.reklamstore.com/reklamstore.js"></script>
            <!-- ReklamStore kodu bitti youtubemp3donusturucu.com 728x90 -->

            </div>
    </div>

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

        <h2 itemprop="description"><span itemprop="name"><?= convert_accented_characters($data->adi) ?> Şarkı Sözleri</span></h2>
        <br/>

        <h5>Şarkı Sözleri / Lyrics</h5>

        <div class="well">
            <code><?= nl2br($data->lyrics) ?></code>
        </div>

        <h5>Youtube MP3 Dönüştürücü</h5>
        <div class="well">
            <?=anchor(site_url('media/get/'.$data->vid.'/'.url_title(convert_accented_characters($data->adi))),'MP3 Download / MP3 İndir')?>
            <br/>
        </div>
    </div>
</div>
