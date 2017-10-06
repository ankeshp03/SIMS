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
  <link href="<?php echo base_url()?>assets/css/login-page.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url()?>assets/css/loader.css" type="text/css" rel="stylesheet" media="screen,projection">

  <style type="text/css">
    body {
      height: 100%;
      font-family: "Lato","proxima-nova","Helvetica Neue",Arial,sans-serif;
    }
    .wrap {
      margin-bottom: 0px;
    }
    #unsuccessfulMessage {
      color: white;
      display: none;
      word-wrap: break-word;
      width: 300px;
      margin: auto;
    }
    #login-page {
      margin-bottom: 0px;
      width: 300px;
    }
    .imgDiv {
      margin-top: 20px;
    }
    .btn-container {
      position: relative;
    }
    .preloader {
      display: none;
      position: absolute;
      z-index: 999;
      float: right;
      margin-left: 75%;
    }
    @media only screen and (min-width: 991px) {
      #preloader-2 {
        margin-top: 29%;
      }
    }
    @media only screen and (max-width: 991px) {
      #preloader-2 {
        margin-top: 28%;
      }
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
              <input id="email" name="email" type="text" class="white-text flow-text validate" autocomplete="on" pattern="^[A-Za-z0-9\.]+@acharya\.ac\.in$" title="Enter valid Acharya email id" required>
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
            <div class="btn-container container center-align">
              <button id="submit-btn" type="submit" class="btn translucent waves-effect col s12">Login</button>
              <div id="preloader-1" class="preloader preloader-wrapper small active">
                <div class="spinner-layer spinner-blue-only">
                  <div class="circle-clipper left">
                    <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                    <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                    <div class="circle"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
        <form id="forgotPassword" class="login-form" method="post">
          <div class="row" style="display: inline-block;">
            <a id="hide" href="#" class='col s12'>Forgot password ?</a>
          </div>
          <div id="hideDiv" style="display: none;">
            <div class="input-field col s12">
              <input id="emailSendKey" name="emailSendKey" type="email" class="white-text flow-text validate" pattern="^[A-Za-z0-9\.]+@acharya\.ac\.in$" title="Enter valid Acharya email id" required autocomplete="off">
              <label id="emailSendKeyLabel" for="emailSendKey" class="white-text flow-text">Email</label>
            </div>
            <div class="row margin">
              <div class="btn-container container center-align">
                <button id="forgotPasswordSubmit" class="btn translucent waves-effect col s12" type="submit" name="action">Reset Password</button>
                <div id="preloader-2" class="preloader preloader-wrapper small active">
                  <div class="spinner-layer spinner-blue-only">
                    <div class="circle-clipper left">
                      <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                      <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                      <div class="circle"></div>
                    </div>
                  </div>
                </div>
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

        $("#submit-btn").attr('disabled','disabled');
        $('#preloader-1').show();

        $('#hideDiv').hide('blind');

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
              $("label[for='password']").removeClass("active");
              $("#submit-btn").removeAttr('disabled');
              $('#preloader-1').hide();
              $('#unsuccessfulMessage').html(data);
              $('#unsuccessfulMessage').show('blind');
              $('#unsuccessfulMessage').delay(3000).hide('blind');     
            }
            else {
              switch(data) {
                case "admin" : document.location.href = "<?php echo base_url('adminController');?>";
                break;
                case "hod" : document.location.href = "<?php echo base_url('hodController');?>";
                break;
                case "head proctor" : document.location.href = "<?php echo base_url('headProctorController');?>";
                break;
                case "proctor" : document.location.href = "<?php echo base_url('proctorController');?>";
                break;
                case "faculty" : document.location.href = "<?php echo base_url('facultyController');?>";
                break;
                case "student" : document.location.href = "<?php echo base_url('studentController');?>";
                break;
                case "firstTime" : document.location.href = "<?php echo base_url('loginController/setFirstPasswordFunc');?>";
                break;
                default : document.location.href = "<?php echo base_url('pageNotFoundController');?>";
                break;              
              }

            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
            $('#unsuccessfulMessage').html(errorThrown);
            $("#submit-btn").removeAttr('disabled');
            $('#preloader-1').hide();
            $('#loginForm')[0].reset();
            $("label[for='email'], label[for='password']").removeClass("active");
            $('#unsuccessfulMessage').show('blind');
            $('#unsuccessfulMessage').delay(3000).hide('blind');
          }
        });
      });

      $('#forgotPassword').on('submit', function(value) {

        value.preventDefault();

        $("#forgotPasswordSubmit").attr('disabled','disabled');
        $('#preloader-2').show();

        $.ajax({
          url: '<?php echo base_url("loginController/forgotPassword");?>',
          type: 'POST',
          data: {
            emailSendKey: $('#emailSendKey').val()
          },
          success:function(data) {

            $('#hideDiv').hide('blind');
            $('#unsuccessfulMessage').html(data);
            $('#unsuccessfulMessage').delay(500).show('blind');
            $('#unsuccessfulMessage').delay(3000).hide('blind');
            
            $('#forgotPasswordSubmit').removeAttr('disabled');
            $('#preloader-2').hide();
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
            $('#preloader-2').hide();
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