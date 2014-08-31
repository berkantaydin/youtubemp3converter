<div class="row">
    <div class="span12">
        <fieldset>
            <legend>Settings</legend>
            <?= form_open('profile/settings', array('class' => 'form-horizontal')) ?>
            <div class="control-group">
                <?= form_label('Username', 'inputUser', array('class' => 'control-label')) ?>
                <div class="controls">
                    <label><?= $user->user ?></label>
                </div>
            </div>
            <br/>
            <br/>
            <br/>

            <div class="control-group">
                <?= form_label('New Password', 'inputPass', array('class' => 'control-label')) ?>
                <div class="controls">
                    <?= form_password('pass', NULL, 'class="req" id="inputPass" placeholder="New Password"') ?>
                </div>
            </div>
            <br/>

            <div class="control-group">
                <?= form_label('Re-Enter New Password', 'inputPassconf', array('class' => 'control-label')) ?>
                <div class="controls">
                    <?= form_password('passconf', NULL, 'class="req" data-equals="pass" id="inputPassconf" placeholder="Re-Enter New Password"') ?>
                </div>
            </div>
            <br/>

            <div class="control-group">
                <?= form_label('Email', 'inputEmail', array('class' => 'control-label')) ?>
                <div class="controls">
                    <label>&nbsp;&nbsp;&nbsp;<?= $user->email ?></label>
                </div>
            </div>
            <br/>
            <br/>
            <br/>

            <div class="control-group">
                <?= form_label('Current Password', 'inputPassmevcut', array('class' => 'control-label')) ?>
                <div class="controls">
                    <?= form_password('passmevcut', NULL, 'class="req" placeholder="Current Password"') ?>
                </div>
            </div>
            <br/>

            <div class="control-group">
                <div class="controls">
                    <?= form_submit('register', 'Save', 'class="btn btn-primary"') ?>
                </div>
            </div>
            <?= form_close() ?>
        </fieldset>
    </div>
    <!--/span-->
</div>