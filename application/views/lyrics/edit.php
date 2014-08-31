<div class="row">

    <div class="span12">

    </div>

    <div class="span3">

    </div>
    <div class="span9">

        <h5>Getir</h5>

        <div class="well">
            <?= form_open('media/getsearch') ?>
            <input name="getsearch" class="search input-xxlarge" value="http://www.youtube.com/watch?v=OCSevzJQ2-Y"/>
            <button type="submit" class="btn btn-primary">Video'yu MP3'e dönüştür</button>
            <?= form_close() ?>
        </div>

        <h2 itemprop="description"><span itemprop="name"><?= convert_accented_characters($data->adi) ?> Düzenleniyor</span></h2>
        <br/>

        <h5>Şarkı Sözleri / Lyrics</h5>

        <div class="well">
            <?=form_open('lyrics/edit/'.$data->vid)?>
            <textarea name="lyrics" class="textarea input-xxlarge" style="height: 400px;"><?= ($data->lyrics) ?></textarea>
            <input type="hidden" name="vid" value="<?=$data->vid?>" />
            <br/><br/><br/>
            <input type="submit" name="submit" value="kaydet" class="btn btn-primary"/>
            <?=form_close()?>
        </div>

        <h5>Exit</h5>
        <div class="well">
            <?=anchor(site_url('lyrics/logout'),'ÇIKIŞ')?>
            <br/>
        </div>
    </div>
</div>
