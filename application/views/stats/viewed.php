<div class="row">
    <div class="span12">
        <h6>advertisements</h6>

        <div>
            REKLAM ALANI
        </div>
    </div>

    <div class="span3">

        <h6>advertisements</h6>

        <div>
            REKLAM ALANI
        </div>

        <h5>What is Face Finder ?</h5>

        <div class="well">
            Face Finder, always search the internet and collect human information for you.
            Face Finder, can not guarantee the accuracy of information.<br/>
            <a href="<?= base_url() ?>">Click to discover or find new faces.</a>
        </div>

    </div>
    <div class="span9">

        <h5>Search</h5>

        <div class="well">
            <input name="search" class="search input-xxlarge"/>
            <span class="help-inline">e.g. James Bond</span>
        </div>

        <? if (count($liste) > 0) : ?>
            <h5>Most Viewed People</h5>
            <table class="table">
                <thead>
                <tr>
                    <th>Photo</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Viewed</th>
                    <th>Link</th>
                </tr>
                </thead>
                <tbody>
                <? foreach ($liste as $k): ?>
                    <tr>
                        <td>
                            <img src="//graph.facebook.com/<?= $k->id ?>/picture?type=square" width="50" height="50"/>
                        </td>
                        <td>
                            <?= convert_accented_characters($k->first_name) ?>
                        </td>
                        <td>
                            <?= convert_accented_characters($k->last_name) ?>
                        </td>
                        <td>
                            <?= $k->viewed ?>
                        </td>
                        <td>
                            <a href="<?= site_url('media/get/' . genid_from_id($k->id) . '/' . url_title($k->name) . '?q=' . urlencode($k->name)) ?>"
                               class="thumbnail" rel="tooltip" title="<?= convert_accented_characters($k->name) ?>"
                               target="_blank">Link</a>
                        </td>
                        </a>
                    </tr>
                <? endforeach ?>
                </tbody>
            </table>
        <? endif ?>

    </div>
</div>
