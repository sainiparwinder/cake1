<h1>Login</h1>
<?= '<script src="test.js" type="text/javascript"></script>' ?>
<?= $this->Form->create(null, ['id'=>'loginForm']) ?>
<?= $this->Form->control('email_phone',['id'=>'email_phone']) ?>
<h5 id=login_id_check>aa</h5>

<?= $this->Form->control('password',['id'=>'password']) ?>
<h5 id=login_pass_check>aa</h5>
<?= $this->Form->button('Login',['id'=>'login']) ?>
<?= $this->Form->end() ?>
