<html oncontextmenu="return ">
   <head>
      <title>The Materialize Form Example</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">      
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <link rel="stylesheet" href="<?php echo base_url()?>assets/css/materialize.min.css">
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.1.1.min.js"></script>           
      <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>

      <style type="text/css">
        @media screen and (min-width: 993px) {
          header, .main { padding-left: 300px; }
        }
         {
          width: 95%;
        }
      </style>
      
   </head>
   <body bgcolor="#f1f1f1">


        
      <header>
      <nav class="top-nav light-blue darken-3">
          <div class="nav-wrapper center"><a class="page-title">Student Registration Form</a></div>
      </nav>
      <div class="container">
        <a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only">
          <i class="material-icons">menu</i>
        </a>
        </div>
      <ul id="nav-mobile" class="side-nav fixed">
        <li class="user-details cyan darken-2">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                                <img src="<?php echo base_url()?>assets/images/user-icon.png" alt="" class="circle responsive-img valign profile-image" style="margin-top: 20%">
                            </div>
                            <div class="col col s8 m8 l8">
                                <ul id="profile-dropdown" class="dropdown-content">
                                    <li><a href="#"><i class="material-icons">face</i>Profile</a>
                                    </li>
                                    <li><a href="#"><i class="material-icons">trending_flat</i> Logout</a>
                                    </li>
                                </ul>
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">John Doe</a>
                                <p class="user-roal">Administrator</p>
                            </div>
                        </div>
        <li class="bold"><a href="about.html" class="waves-effect waves-teal">About</a></li>
        <li class="bold"><a href="getting-started.html" class="waves-effect waves-teal">Getting Started</a></li>
      </ul>
    </header>





      <!--start main body-->
      <div class="container main">
      <div class="card-panel">
         <form class="col s12">
            <div class="row">
               <div class="input-field col s4">
                  <input id="fname" type="text" class="active validate" required>
                  <label for="fname">First Name</label>
               </div>
               <div class="input-field col s4">      
                  <label for="mname">Middle Name</label>
                  <input id="mname" type="text" class="validate">          
               </div>
               <div class="input-field col s4">      
                  <label for="lname">Last Name</label>
                  <input id="lname" type="text" class="validate" required>          
               </div>
            </div>
            <div class="row">
               <div class="input-field col s3">
                  <input id="male" type="radio" name="gender" value="male" checked>
                  <label for="male">Male</label>
                  
                  <input id="female" type="radio" name="gender" value="female" checked>
                  <label for="female">Female</label>
               </div>
               <div class="input-field col s3">
                  <select>
                     <option value="" disabled selected>Choose your option</option>
                     <option value="1">CET</option>
                     <option value="2">COMEDK</option>
                     <option value="3">Management</option>
                  </select>
                  <label>Quota</label>
               </div>
               <div class="input-field col s3">
                     <label for="dob">Date of Birth</label>
                     <input id="dob" type="date" class="datepicker">
               </div>
               <div class="input-field col s3">
                  <label for="doj">Date of Admission</label>
                  <input id="doj" type="date" class="datepicker">
               </div>
            </div>
            <div class="row">
               <div class="input-field col s12">
                  <input id="email" type="email" class="validate">
                  <label for="email">Email</label>
               </div>
            </div>
            <div class="row">
               <div class="input-field col s12">
                  <textarea id="address" class="materialize-textarea"></textarea>
                  <label for="address">Permanent Address</label>
               </div>
            </div>
            <div class="row">
               <div class="input-field col s12">
                  <textarea id="address" class="materialize-textarea"></textarea>
                  <label for="address">Current Address</label>
               </div>
            </div>
            <div class="row">
               <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                  <i class="material-icons right">send</i>
               </button>
            </div>          
         </form>       
      </div>
      </div>
      <script type="text/javascript">
         $(document).ready(function() {
            $('select').material_select();
         });

         $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 70 // Creates a dropdown of 15 years to control year
         });
      </script>
   </body>   
</html>