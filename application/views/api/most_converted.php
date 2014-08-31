    <?
    foreach ($liste_encok as $k): ?>
        <li><?= anchor(site_url('media/get/' . $k->vid . '/' . url_title(convert_accented_characters($k->adi))), $k->adi) ?></li>
    <? endforeach ?>