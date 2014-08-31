<div class="row">

    <div class="span12">
        <h5>MP3 Dönüştür</h5>

        <div class="well">
            <?= form_open('media/getsearch') ?>
            <input name="getsearch" class="search input-xxlarge"
                   value="<?= ($this->input->get('link') != '') ? $this->input->get('link') : 'http://www.youtube.com/watch?v=OCSevzJQ2-Y' ?>"/>
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
        <!--
        <h5>En yeni İndirilenler</h5>
        <table class="condensed-table zebra-striped">
            <thead>
            <th>#</th>
            <th>Dosya</th>
            </thead>
            <tbody>
            <? $i = 1;
            foreach ($liste_enson as $k): ?>
                <tr>
                    <td><?= anchor(site_url('media/get/' . $k->vid), $i++) ?></td>
                    <td><?= anchor(site_url('media/get/' . $k->vid . '/' . url_title(convert_accented_characters($k->adi))), $k->adi) ?></td>
                </tr>
            <? endforeach ?>
            </tbody>
        </table>

        <h5>En çok İndirilenler</h5>
        <table class="condensed-table zebra-striped">
            <thead>
            <th>#</th>
            <th>Dosya</th>
            </thead>
            <tbody>
            <? foreach ($liste_encok as $k): ?>
                <tr>
                    <td><?= anchor(site_url('media/get/' . $k->vid), $k->viewed) ?></td>
                    <td><?= anchor(site_url('media/get/' . $k->vid.'/'.url_title(convert_accented_characters($k->adi))), $k->adi) ?></td>
                </tr>
            <? endforeach ?>
            </tbody>
        </table>

        <h5>Rastgele Liste</h5>
        <table class="condensed-table zebra-striped">
            <thead>
            <th>#</th>
            <th>Dosya</th>
            </thead>
            <tbody>
            <? $i = 1;
            foreach ($liste_random as $k): ?>
                <tr>
                    <td><?= anchor(site_url('media/get/' . $k->vid), $i++) ?></td>
                    <td><?= anchor(site_url('media/get/' . $k->vid.'/'.url_title(convert_accented_characters($k->adi))), $k->adi) ?></td>
                </tr>
            <? endforeach ?>
            </tbody>
        </table>

        -->
    </div>
</div>
