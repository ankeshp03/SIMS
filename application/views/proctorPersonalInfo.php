<html>
<head>
	<title>Proctor Dashboard</title>
	<style type="text/css">
	</style>
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">      
	  <link rel="stylesheet" href="<?php echo base_url('/assets/css/materialize.min.css')?>">
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>           
      <script src="<?php echo base_url('/assets/js/materialize.min.js')?>"></script>  
</head>
<body>

  <nav class="light-blue darken-3">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Proctor</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a id="dashboard" href="<?php echo base_url('Welcome/index'); ?>">Dashboard</a></li>
        <li><a id="personalInfo" class="z-depth-5" href="<?php echo base_url('Welcome/index'); ?>">Personal Info</a></li>
        <li><a id=" students"href="<?php echo base_url('Welcome/studentInProctor'); ?>">Students</a></li>
      </ul>
    </div>
  </nav>

  

   <footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2017 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.parallax').parallax();
    $("#dashboard").css({opacity: 0.8})
    });
  </script>
        
</body>
</html>