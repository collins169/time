<?php include 'functions/db.php'; ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fasly | User Groups</title>
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
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>


        <!-- Left Panel -->

  
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
                    <li  ><a href="usergroups"> <i class='menu-icon fa fa-users'></i> User Group</a></li>
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
                        <h1>User Groups</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">User Groups</a></li>
                            <li class="active">View All</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                    <a href="add_usergroups" class="btn btn-success"><i class="fa fa-plus"></i> Add User Groups</a><br><br>
                <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">User Groups</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $check=mysqli_query($connect, "SELECT *  FROM user_groups" )or die("Unable to process check");
                        $j=0;
                        if(!empty($check)){
                        foreach($check as $data){
                        $j++ ?>
                      <tr>
                        <td><?php echo $j ?></td>
                        <td><?php echo $data['title'] ?></td>
                        <td><?php echo $data['description'] ?></td>
                        <td><?php echo $data['created'] ?></td>
                      </tr>
                      <?php } } ?>
                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>

</body>
</html>
