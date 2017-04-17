﻿﻿<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" oncontextmenu="return false">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta name="theme-color" content="#7e57c3">
  <meta http-equiv="Cache-control" content="public">
  <title>Login Page | SIMS</title>

  <!-- Icons -->

  <link href="<?php echo base_url()?>assets/css/icon.css" type="text/css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Favicons-->

  <link rel="icon" href="<?php echo base_url()?>assets/images/favicon/favicon-32x32.png" sizes="32x32">

  <!-- Favicons-->

  <link rel="apple-touch-icon-precomposed" href="<?php echo base_url()?>assets/images/favicon/apple-touch-icon-152x152.png">

  <!-- For iPhone -->

  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="<?php echo base_url()?>assets/images/favicon/mstile-144x144.png">

  <!-- For Windows Phone -->


  <!-- CORE CSS-->

  <link href="<?php echo base_url()?>assets/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url()?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection">

  <style type="text/css">
    .wrap {
      margin-bottom: -20px;
    }
    #unsuccessfulMessage {
      color: white;
      display: none;
      word-wrap: break-word;
      width: 300px;
      margin: auto;
    }
    #login-page {
      width: 300px;
    }
    .imgDiv {
      margin-top: 20px;
    }

  </style>

</head>

<body class="deep-purple lighten-1 valign-wrapper">
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
    <div id="loader"></div>        
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->
  <div class="wrap row col s12">
    <div id="unsuccessfulMessage" class="z-depth-1 center card-panel translucent"></div>

    <div id="login-page" class="row valign">
      <div class="col s12 z-depth-3 card-panel translucent">
        <form id="loginForm" class="login-form" method="post">
          <div class="imgDiv center">
            <img src="<?php echo base_url()?>assets/images/user-icon.png" alt="" class="circle responsive-img profile-image-login" draggable="false">
          </div>
          <div class="row">
            <p class="center login-form-text white-text flow-text">Login</p>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="material-icons prefix">perm_identity</i>
              <input id="email" name="email" type="email" class="white-text flow-text validate" autocomplete="on" pattern="^[A-Za-z0-9\.]+@acharya\.ac\.in$" title="Enter valid Acharya email id" required>
              <label id="emailLabel" for="email" class="white-text flow-text">Email</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="material-icons md-24 prefix">lock_outline</i>
              <input id="password" name="password" type="password" class="white-text flow-text" required="true" autocomplete="off">
              <label id="passwordLabel" for="password" class="white-text flow-text">Password</label>
            </div>
          </div>
          <div class="row margin">
            <div class="container center-align">
              <button type="submit" class="btn translucent waves-effect col s12">Login</button>
            </div>
          </div>
        </form>
        <form id="forgotPassword" class="login-form" method="post">
          <div class="row">
            <a id="hide" href="#" class='col s12'>Forgot password ?</a>
          </div>
          <div id="hideDiv" style="display: none;">
            <div class="input-field col s12">
              <input id="emailSendKey" name="emailSendKey" type="email" class="white-text flow-text validate" pattern="^[A-Za-z0-9\.]+@acharya\.ac\.in$" title="Enter valid Acharya email id" required autocomplete="off">
              <label id="emailSendKeyLabel" for="emailSendKey" class="white-text flow-text">Email</label>
            </div>
            <div class="row">
              <div class="container center-align">
                <button id="forgotPasswordSubmit" class="btn translucent waves-effect col s12" type="submit" name="action">Submit<i class="material-icons right">send</i></button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="hide-on-med-and-down" style="position: fixed; left: 10px; bottom: 10px;">
    <img src="<?php echo base_url()?>assets/images/acharya_wm.png" class="responsive-img" width="250px;" style="opacity: 0.4" draggable="false">
  </div>

  <!-- ================================================
  Scripts
  ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/ajax.jquery-1.11.2.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-1.11.2.min.js"></script>

  <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js" async></script>
  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugin.js" async></script>

  <script type="text/javascript">

    $(function () {
      if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
        $("#email, #password, #emailSendKey").click(function() {
          $element = "#" + $(this).attr('id') + "Label";
          $($element).addClass('active');
        });

        $("#email, #password, #emailSendKey").focusout(function() {
          $element = "#" + $(this).attr('id') + "Label";
          if(!$(this).val()){
            $($element).removeClass('active');
          }
        });
      }
    });

    $('#hide').click(function() {

      if($('#hideDiv').css('display') == 'none'){
        $('#hideDiv').show('blind');
      } else {
        $('#hideDiv').hide('blind');

      }
    });

    $(document).ready( function() {

      $('#loginForm').on('submit', function(value) {

        value.preventDefault();

        $.ajax({
          url: '<?php echo base_url("loginController/validateUser");?>',
          type: 'POST',
          data: {
            email: $('#email').val(),
            password: $('#password').val()
          },
          success:function(data) {
            if(data == 'Login Unsuccessful!') {
              $('#password').val('');
              $('#unsuccessfulMessage').html(data);
              $('#unsuccessfulMessage').show('blind');
              $('#unsuccessfulMessage').delay(3000).hide('blind');     
            }
            else {
              switch(data) {
                case "admin" : document.location.href = "<?php echo base_url('adminController');?>";
                break;
                case "headProctor" : document.location.href = "<?php echo base_url('headProctorController');?>";
                break;
                case "proctor" : document.location.href = "<?php echo base_url('proctorController');?>";
                break;
                case "faculty" : document.location.href = "<?php echo base_url('facultyController');?>";
                break;
                case "student" : document.location.href = "<?php echo base_url('studentController');?>";
                break;
                default : document.location.href = "<?php echo base_url('pageNotFoundController');?>";              
              }

            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
            $('#unsuccessfulMessage').html(errorThrown);
            $('#unsuccessfulMessage').show('blind');
            $('#unsuccessfulMessage').delay(3000).hide('blind');
          }
        });
      });

      $('#forgotPassword').on('submit', function(value) {

        value.preventDefault();

        $("#forgotPasswordSubmit").attr('disabled','disabled');

        $.ajax({
          url: '<?php echo base_url("loginController/forgotPassword");?>',
          type: 'POST',
          data: {
            emailSendKey: $('#emailSendKey').val()
          },
          success:function(data) {

            $('#unsuccessfulMessage').html(data);
            $('#unsuccessfulMessage').show('blind');
            $('#unsuccessfulMessage').delay(3000).hide('blind');
            $('#hideDiv').hide('blind'); 
            $('#forgotPasswordSubmit').removeAttr('disabled');
            $('#emailSendKey').val('');
            $('#emailSendKey').removeClass('valid');
            $('#emailSendKeyLabel').removeClass('active');
          },
          error: function(jqXHR, textStatus, errorThrown) {
            $('#unsuccessfulMessage').html(errorThrown);
            $('#unsuccessfulMessage').show('blind');
            $('#unsuccessfulMessage').delay(3000).hide('blind');
            $('#hideDiv').hide('blind'); 
            $('#forgotPasswordSubmit').removeAttr('disabled');
            $('#emailSendKey').val('');
            $('#emailSendKey').removeClass('valid');
            $('#emailSendKeyLabel').removeClass('active');
          }
        });
      });
    });
  </script>
</body>
</html>