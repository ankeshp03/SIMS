<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($this->session->userdata('level') != "4" || $this->session->userdata('user') != "proctor") {
  redirect($_SERVER['HTTP_REFERER']);
}
?>

<html>
<head>
	<title>Student In Proctor</title>
	<style type="text/css">
	</style>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/icon.css">    
  <link rel="stylesheet" href="<?php echo base_url('assets/css/materialize.min.css')?>">
  <style type="text/css">
    @media screen and (min-width: 991px) {
      .container {
        width: 60%;
      }
    }
    body {
      font-family: sans-serif;
    }
  </style>
</head>
<body class="blue-grey lighten-5">
  <div class="container">
    <div class="card-panel z-depth-2 center" style="margin-top: 60px;">
      <table class = "highlight">
        <thead>
          <tr>
            <th data-field="id">Name</th>
            <th data-field="name">Usn</th>
          </tr>
        </thead>

        <?php
        foreach($studentInProctor as $key){ ?>

        <tbody>
          <tr>
            <td>
              <a href = '<?php echo base_url("proctorController/loadStudentReport/".$key->usn);?>'><?php echo $key->student_name;?></a>
            </td>
            <td>
              <?php echo $key->usn;?>
            </td>
          </tr>
        </tbody>
        <?php } ?>
      </table>
    </div>
  </div>

  <!--JavaScript-->
  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-2.1.1.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/materialize.min.js')?>"></script>  
  <script type="text/javascript">
    $(document).ready(function() {
      $("#dashboard").css({opacity: 0.8})
    });

    $(".button-collapse").sideNav();
  </script>
</body>
</html>