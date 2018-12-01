<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../assets/LoginAdmin/assets/img/telkom-logo.png" type="image/x-icon" />
    <title>Sign Up</title>
    <script src="<?php echo base_url(); ?> ../../assets/LoginAdmin/assets/js/particles.js"></script>
    <script src="<?php echo base_url(); ?> ../../assets/LoginAdmin/assets/js/main.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.3/css/bulma.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
    <link rel="stylesheet" href="<?php echo base_url(); ?> ../../assets/LoginAdmin/assets/css/main.css">
  </head>
  <body>
      <div class="interactive-bgregister  column is-12">
          <div class="login column is-4 is-offset-4 registerform">
              <section class="section">
                <div class="has-text-centered">
                    <img class="login-logo" src="<?php echo base_url(); ?> ../../assets/LoginAdmin/assets/img/telkom-logo.png">
                </div>
                <form action="#" method="post">
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
                    <label class="label">Email</label>
                    <div class="control has-icons-right">
                      <input class="input" type="text" placeholder="email" required>
                      <span class="icon is-small is-right">
                        <i class="fa fa-envelope"></i>
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

                  <div class="field">
                    <label class="label">Retype Password</label>
                    <div class="control has-icons-right">
                      <input class="input" type="password" placeholder="retype password" required>
                      <span class="icon is-small is-right">
                        <i class="fa fa-key"></i>
                      </span>
                    </div>
                  </div>
                  <div class="has-text-centered">
                    <!-- <a class="button is-vcentered is-primary is-outlined">Sign Up!</a> -->
                    <button type="submit" class="button is-vcentered is-primary is-outlined">Sign Up!</button>
                  </div>
                  <div class="has-text-centered">
                     <p>Already have an account? <a href="login.html" class="signup">Log in now !</a></p>
                  </div>
              </form>
              </section>
            </div>
          </div>
  </body>
</html>
