<?php include 'functions/add.php';
    Global $alert;

        $id=$_SESSION['id'];

        $check=mysqli_query($connect, "SELECT * FROM employees WHERE id=$id")or die('Unable to select from employees');
        $data=mysqli_fetch_assoc($check);
        $first_name=$data['first_name'];
        $middle_name=$data['middle_name'];
        $last_name=$data['last_name'];
        $username=$data['username'];
        $email=$data['email'];
        $phone=$data['phone'];
        $image=$data['image'];
        $usergroups_id=$data['usergroups_id'];
        $countries_id=$data['countries_id'];
        $dob=$data['dob'];
        $gender=$data['gender'];
        $address=$data['address'];

        $check2=mysqli_query($connect, "SELECT * FROM user_groups WHERE id=$usergroups_id")or die('Unable to select user groups');
        $info=mysqli_fetch_array($check2);
        $usergroups=$info['title'];

        $check3=mysqli_query($connect, "SELECT * FROM countries WHERE id=$countries_id")or die("Unable to select Country");
        $info2=mysqli_fetch_array($check3);
        $countries=$info2['country_name'];
    

 ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fasly | Add Employee</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link rel="stylesheet" href="assets/css/lib/chosen/chosen.min.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>


        <!-- Left Panel -->

   <aside id="left-panel" class="left-panel" style="background: #000">
        <nav class="navbar navbar-expand-sm navbar-default" style="background: #000">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation" >
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Personal Information</h3><!-- /.menu-title -->
                    <li >
                        <a href="my_reports" > <i class="menu-icon fa fa-bar-chart"></i>My Reports</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user-circle-o"></i>My Profile</a>
                        <ul class="sub-menu children dropdown-menu" style="background: #000">
                            <li><i class="fa fa-user"></i><a href="my_profile">View Profile</a></li>
                            <li><i class="fa fa-cog"></i><a href="change_password">Change Password</a></li>
                        </ul>
                    </li>
                    <!-- <h3 class="menu-title">Support Unit</h3> --><!-- /.menu-title -->

                    <!-- <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-support"></i>Tickets</a>
                        <ul class="sub-menu children dropdown-menu" style="background: #000">
                            <li><i class="menu-icon fa fa-plus"></i><a href="font-fontawesome.html">New Ticket</a></li>
                            <li><i class="menu-icon fa fa-eye"></i><a href="font-themify.html">view Ticket</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="widgets.html"> <i class="menu-icon ti-email"></i>Projects </a>
                    </li> -->
                    <?php if($user_info['usergroups_id']==1 OR $user_info['usergroups_id']==10 OR $user_info['usergroups_id']==9){ ?>
                    <h3 class="menu-title">Human Resource Managment</h3><!-- /.menu-title -->
                    <li ><a href="usergroups"> <i class='menu-icon fa fa-users'></i> User Group</a></li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-briefcase"></i>Employees</a>
                        <ul class="sub-menu children dropdown-menu"  style="background: #000">
                            <li><i class="menu-icon fa fa-eye"></i><a href="reports">View Reports</a></li>
                            <li><i class="menu-icon fa fa-eye"></i><a href="employees">View Employees</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <!-- <div class="dropdown for-notification">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">5</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">You have 3 Notification</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                          </div>
                        </div>

                        <div class="dropdown for-message">
                          <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-email"></i>
                            <span class="count bg-primary">9</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="message">
                            <p class="red">You have 4 Mails</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jonathan Smith</span>
                                    <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jack Sanders</span>
                                    <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Cheryl Wheeler</span>
                                    <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-3" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Rachel Santos</span>
                                    <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                          </div>
                        </div> -->
                    </div>
                </div>

                 <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $username ?> <i class="fa fa-chevron-down"></i> 
                        </a>

                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="my_profile"><i class="fa fa- user"></i>My Profile</a>

                                <a class="nav-link" href="change_password"><i class="fa fa -cog"></i>Change Password</a>

                                <a class="nav-link" href="functions/logout"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Human Resource Management</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Human Resource Management</a></li>
                            <li><a href="#">Employees</a></li>
                            <li class="active">Edit details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                 <div class="col-lg-10">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Edit Employee</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                              <div class="card-body">
                                  <div class="card-title">
                                      <h3 >Personnal Details</h3>
                                  </div>
                                  <hr>
                                  <form action="" method="post"  name="edit_form" id="edit_form">
                                    <?php echo $alert ?>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <div class="form-group">
                                              <label for="first_name" class="control-label mb-1">First Name</label>
                                              <input type="hidden" value="<?php echo $id ?>" name='id' id='id'></input>
                                              <input id="first_name" name="first_name" type="text" class="form-control" value="<?php echo $first_name ?>" required='required'\>
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                              <div class="form-group has-success">
                                                  <label for="middle_name" class="control-label mb-1">Middle Name</label>
                                                  <input id="middle_name" name="middle_name" type="text" class="form-control"  value="<?php echo $middle_name ?>"">
                                              </div>
                                          </div>
                                          <div class="col-md-4">
                                              <div class="form-group">
                                                  <label for="last_name" class="control-label mb-1">Last Name</label>
                                                  <input id="last_name" name="last_name" type="text" class="form-control"  value="<?php echo $last_name ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                          <div class="form-group">
                                              <label for="username" class="control-label mb-1">Username</label>
                                              <input id="username" name="username" type="text" class="form-control"  value="<?php echo $username ?>" disabled=''\>
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                           <div class="form-group">
                                              <label for="username" class="control-label mb-1">User Group</label>
                                              <input id="usergroup" name="usergroup" type="text" class="form-control"  value="<?php echo $usergroups ?>" disabled=""\>
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class='form-group'>
                                                <label for='country' class='control-label mb-1'> Country</label>
                                                <select data-placeholder="Choose a Country..." class="form-control standardSelect" tabindex="1" name="country" id="country">
                                                    <option value=""></option>
                                                    <?php 
                                                    $check=mysqli_query($connect, "SELECT * FROM countries ORDER BY country_name ASC");
                                                    foreach($check as $get){
                                                ?> 
                                                <?php if($get['country_name']==$countries){ ?>
                                                    <option value="<?php echo $countries_id ?>" selected><?php echo $countries ?></option>
                                                    <?php }else { ?>
                                                    <option value="<?php echo $get['id'] ?>"><?php echo $get['country_name'] ?></option>
                                                    <?php } ?>
                                                <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                          <div class="col-md-4">
                                            <div class='form-group'>
                                                <label for='gender' class='control-label mb-1'> Gender</label>
                                                <select data-placeholder="Choose a gender..." class="form-control standardSelect" tabindex="1" name="gender" id="gender">
                                                    <option value=""></option>
                                                    <?php if($gender=='male'){ ?>
                                            <option value="">----  Select Gender ----</option>
                                            <option value="male" selected>Male</option>
                                            <option value="female">Female</option>
                                            <?php }elseif($gender=='female'){ ?>
                                            <option value="">----  Select Gender ----</option>
                                            <option value="male">Male</option>
                                            <option value="female" selected>Female</option>
                                            <?php }else{ ?>
                                             <option value="">----  Select Option ----</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                              <div class="form-group">
                                        <label class="control-label">Date of Birth</label>
                                        <div class="input-group input-medium date" data-date-format="yyyy-mm-dd" id='date-picker'>
                                            <span class="input-group-btn">
                                                <button class="btn default" type="button">
                                                    <i class="fa fa-calendar"></i>
                                                </button>
                                            </span>
                                            <input type="text" class="form-control" autocomplete="off" name="dob" id="date-picker" value='<?php echo $dob ?>' required>
                                        </div>
                                        <span class="help-block">  YYYY/MM/DD </span> 
                                    </div>
                                          </div>
                                    </div>
                                    <br>
                                    <div class="card-title">
                                      <h4 >Contact Information</h4>
                                  </div>
                                  <hr>
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                 <label for="email" class="control-label mb-1">Email Address</label>
                                                  <input id="email" name="email" type="email" class="form-control" value="<?php echo $email ?>">
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                 <label for="phone" class="control-label mb-1">Phone Number</label>
                                                  <input id="phone" name="phone" type="tel" class="form-control" value="<?php echo $phone ?>">
                                              </div>
                                          </div>
                                      </div>
                                              <div class="form-group">
                                                 <label for="address" class="control-label mb-1">Home Address</label>
                                                 <textarea id="address" name="address" type="textarea" style="resize: none;" rows="6" class="form-control" ><?php echo $address ?></textarea>
                                              </div>
                                      <div>
                                      <button type="submit" class="btn btn-primary btn-sm" name="edit" id='edit'>
                                      <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <a href="index" class="btn btn-danger btn-sm">
                                          <i class="fa fa-times"></i> Cancel
                                        </a>
                                      </div>
                                  </form>
                              </div>
                          </div>

                        </div>
                    </div> <!-- .card -->

                  </div><!--/.col-->

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/lib/chosen/chosen.jquery.min.js"></script>
    <script src="assets/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });
    </script>

</body>
</html>
