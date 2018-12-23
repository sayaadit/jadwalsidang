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
                <form action="<?php echo base_url('c_user/registrasi')?>" method="post">
                  <div class="field">
                    <label class="label">Username</label>
                    <div class="control has-icons-right">
                      <input name="username" class="input" type="text" placeholder="username" required>
                      <span class="icon is-small is-right">
                        <i class="fa fa-user"></i>
                      </span>
                    </div>
                  </div>
                   <div class="field">
                    <label class="label">Nama</label>
                    <div class="control has-icons-right">
                      <input name="nama" class="input" type="text" placeholder="Nama" required>
                      <span class="icon is-small is-right">
                        <i class="fa fa-user-circle"></i>
                      </span>
                    </div>
                  </div>
                   <div class="field">
                    <label class="label">No Hp</label>
                    <div class="control has-icons-right">
                      <input name="notel" class="input" type="text" placeholder="No Handphone" required>
                      <span class="icon is-small is-right">
                        <i class="fa fa-phone"></i>
                      </span>
                    </div>
                  </div>

                  <div class="field">
                    <label class="label">Password</label>
                    <div class="control has-icons-right">
                      <input id="password" class="input" type="password" placeholder="password" onkeyup='check();' required>
                      <span class="icon is-small is-right">
                        <i class="fa fa-key"></i>
                      </span>
                    </div>
                  </div>

                  <div class="field">
                    <label class="label">Retype Password</label>
                    <div class="control has-icons-right">
                      <input id="confirm_password" name="password" class="input" type="password" placeholder="retype password" onkeyup='check();' required>
                      <span class="icon is-small is-right">
                        <i class="fa fa-key"></i>
                      </span>
                      <span class="small" id='message'> </span>
                    </div>
                  </div>

                  <script>
                      var check = function() {
                        if (document.getElementById('password').value ==
                          document.getElementById('confirm_password').value && document.getElementById('password').value != '') {
                          document.getElementById('message').style.color = 'green';
                        document.getElementById('message').innerHTML = 'Password is matching';
                      } else {
                        document.getElementById('message').style.color = 'red';
                        document.getElementById('message').innerHTML = 'Password is not matching';
                      }
                    }
                  </script>

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
