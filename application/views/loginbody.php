<!-- <img src="<?= base_url() ?>assets/img/5.jpg" id="full-screen-background-image" /> -->
<div id='login_form' class="container">

  <div class="span3"></div>
  <div class="span5">
    <br><br>
    <div class="row">
      <br><br><br><br><br><br><br>
      <center><img src="<?= base_url() ?>assets/img/logo.png"></img></center>
      <div class="login-box">
        <?php echo form_open(base_url() . 'login/'); ?>

        <h3 class="form-signin-heading" style="color:white;">Please Sign-in</h3>

        <?php
        echo form_input(array('id' => 'username', 'name' => 'username', 'class' => 'h3 col-xs-12', 'placeholder' => 'Username'));
        echo form_password(array('id' => 'password', 'name' => 'password', 'class' => 'h3 col-xs-12', 'placeholder' => 'Password'));
        echo form_submit(array('name' => 'submit', 'class' => 'h3 btn-success btn-login btn-block', 'style' => 'height:40px'), 'Login');
        echo form_close();
        ?>

        <br>
        <center>
          <h3 class="form-signin-heading" style="color:red;">
            <?php echo validation_errors(); ?>
            <?php
            if ($this->session->flashdata('login_error')) {
              echo 'You\'ve entered an incorrect username or password';
            }
            if ($this->session->flashdata('session_error')) {
              echo 'Your session has expired. Please Login again.';
            }
            ?>
          </h3>
        </center>
        <br>
      </div>
    </div>
  </div>
</div>

<body>