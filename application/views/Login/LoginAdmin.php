<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../assets/LoginAdmin/assets/img/telkom-logo.png" type="image/x-icon" />
    <title>Log In</title>
    <script src="<?php echo base_url(); ?> ../../assets/LoginAdmin/assets/js/particles.js"></script>
    <script src="<?php echo base_url(); ?> ../../assets/LoginAdmin/assets/js/main.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.3/css/bulma.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
    <link rel="stylesheet" href="<?php echo base_url(); ?> ../../assets/LoginAdmin/assets/css/main.css">
  </head>
  <body>
    <div class="columns is-vcentered">
      <div id="particles-js" class="interactive-bg column is-8"></div>
       <div class="login column is-4 ">
        <section class="section">
          <div class="has-text-centered">
              <img class="login-logo" src="<?php echo base_url(); ?> ../../assets/LoginAdmin/assets/img/telkom-logo.png">
          </div>
          <form action="login_user" method="post">
            <div class="field">
              <label class="label">Username</label>
              <div class="control has-icons-right">
                <input class="input" type="text" placeholder="username" required>
                <span class="icon is-small is-right">
                  <i class="fa fa-user"></i>
                </span>
              </div>
            </div>

            <div class="field">
              <label class="label">Password</label>
              <div class="control has-icons-right">
                <input class="input" type="password" placeholder="password" required>
                <span class="icon is-small is-right">
                  <i class="fa fa-key"></i>
                </span>
              </div>
            </div>
            <div class="has-text-centered">
              <!-- <a class="button is-primary is-outlined">Login</a> -->
              <button type="submit" class="button is-primary is-outlined">Login</button>
            </div>
            <div class="has-text-centered bottomLogin">
              <p> Don't you have an account? <a href="<?php echo base_url(); ?>user/view_register" class="signup">Sign up now!</a></p>
            </div>
          </form>
        </section>
      </div>
    </div>

  </body>
</html>
