<div class="row">
    <div class="span6">
        <fieldset>
            <legend>Log In</legend>
            <?= form_open('auth/login', array('class' => 'form-horizontal')) ?>
            <div class="control-group">
                <?= form_label('Email', 'inputEmail', array('class' => 'control-label')) ?>
                <div class="controls">
                    <?= form_input('email', NULL, 'class="req email" placeholder="Email"') ?>
                </div>
            </div>
            <br/>

            <div class="control-group">
                <?= form_label('Password', 'inputPass', array('class' => 'control-label')) ?>
                <div class="controls">
                    <?= form_password('pass', NULL, 'class="req" id="inputPass" placeholder="Password"') ?>
                </div>
            </div>
            <br/>

            <div class="control-group" style="text-align: center;">
                <div class="controls">
                    <?= form_submit('login', 'Log In', 'class="btn small primary"') ?>
                </div>
            </div>

            <?= form_close() ?>
        </fieldset>
    </div>
    <!--/span-->
    <div class="span6">
        <fieldset>
            <legend>Sign Up</legend>
            <?= form_open('auth/register', array('class' => 'form-horizontal')) ?>
            <div class="control-group">
                <?= form_label('Username', 'inputUser', array('class' => 'control-label')) ?>
                <div class="controls">
                    <?= form_input('user', NULL, 'class="req" id="inputUser" placeholder="Username"') ?>
                </div>
            </div>
            <br/>

            <div class="control-group">
                <?= form_label('New Password', 'inputPass', array('class' => 'control-label')) ?>
                <div class="controls">
                    <?= form_password('pass', NULL, 'class="req" id="inputPass" placeholder="New Password"') ?>
                </div>
            </div>
            <br/>

            <div class="control-group">
                <?= form_label('Re-Enter Password', 'inputPassconf', array('class' => 'control-label')) ?>
                <div class="controls">
                    <?= form_password('passconf', NULL, 'class="req" data-equals="pass" id="inputPassconf" placeholder="Re-Enter Password"') ?>
                </div>
            </div>
            <br/>

            <div class="control-group">
                <?= form_label('Email', 'inputEmail', array('class' => 'control-label')) ?>
                <div class="controls">
                    <?= form_input('email', NULL, 'class="req email" placeholder="Email"') ?>
                </div>
            </div>
            <br/>

            <div class="control-group" style="text-align: center;">
                <div class="controls">
                    <?= form_submit('register', 'Sign Up', 'class="btn small primary"') ?>
                </div>
            </div>
            <?= form_close() ?>
        </fieldset>
    </div>
    <!--/span-->
</div><!--/row-->