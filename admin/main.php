<?php
session_start();
include('../connection/config.php');
$nric = $_SESSION['nric'];


$sql = "SELECT * FROM personal_info, login WHERE login.nric=personal_info.nric AND login.nric = '$nric' AND personal_info.nric='$nric'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);

$sqlProfile = "SELECT personal_info.id FROM personal_info, login WHERE login.nric=personal_info.nric AND login.nric = '$nric' AND personal_info.nric='$nric'";
$resultProfile = mysqli_query($db, $sqlProfile);
$rowProfile = mysqli_fetch_array($resultProfile);

//$sql_comp = "SELECT * FROM company_info WHERE comp_type= 'Pertanian'";
$sql_comp = "SELECT * FROM company_info GROUP BY comp_type";
$result_comp = mysqli_query($db, $sql_comp);
$row_comp = mysqli_fetch_array($result_comp);


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MYRAS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Idea</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Idea</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
		<!-- <li class="dropdown home-menu">
		  <a href="main.php">
              <i class="fa fa-home fa-fw"></i>
            </a>
		  </li>-->
           <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <?php if ($row['image'] == ''){
			   echo "<img class='user-image' alt='User profile picture' id='blah' src='../assets/img/user.png' width='125' height='125'/>";}
               else{
			   echo "<img class='user-image' alt='User profile picture' id='blah' src='../uploads/".$row['image']."' width='125' height='125'/>";}?>
              <span class="hidden-xs"><?php echo $row['name']; ?></span>
            </a>
			<ul class="dropdown-menu">
			 <!-- User image -->
              <li class="user-header">
				<?php if ($row['image'] == ''){
			   echo "<img class='img-circle' alt='User profile picture' id='blah' src='../assets/img/user.png' width='125' height='125'/>";}
               else{
			   echo "<img class='img-circle' alt='User profile picture' id='blah' src='../uploads/".$row['image']."' width='125' height='125'/>";}?>
         
                <p>
                  <span class="hidden-xs"><?php echo $row['name']; ?></span>
                  <!--<small>Toris Sdn.Bhd</small>-->
                </p>
              </li>
			   <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-6 text-center">
                    <a href="profile_details.php?id=<?php echo $rowProfile['id']; ?>" class="text-center">Profil</a>
                  </div>
                  <!--<div class="col-xs-4 text-center">
                    <a href="company_details.html">Syarikat</a>
                  </div>-->
                  <div class="col-xs-6 text-center">
                   <a href="company_details.php" class="btn btn-secondary ">Syarikat</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                     <div class="text-center">
                  <a href="logout.php" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
			</ul>
		</li>
          
        </ul>
      </div>
    </nav>
  </header>  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <br/>
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../assets/img/user.png" class="img-circle" alt="User Image" height="50%" width="50%">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="../logout.php">
            <i class="fa fa-sign-out"></i> <span>Log Out</span>
          </a>
        </div>
      </div>
      <br/>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
		<li class="treeview">
          <a href="#">
              <i class="fa fa-list"></i> <span>Registered</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
		  <ul class="treeview-menu">
              <li><a href="user_list.php"><i class="fa fa-circle-o"></i>User</a></li>
              <li><a href="user_category.php"><i class="fa fa-circle-o"></i>User By Preference</a></li>
              <li><a href="courses.php"><i class="fa fa-circle-o"></i>Courses</a></li>
            </ul> 
		</li>
		
          <li class="treeview">
            <a href="#">
              <i class="fa fa-line-chart"></i> <span>Report</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="info_list.php"><i class="fa fa-circle-o"></i>Catalog</a></li>
			  <li><a href="monthly_report.php"><i class="fa fa-circle-o"></i>Details</a></li>
            </ul>           
        </li>
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content">
      <div class="row">
	   <div class="col-md-12">
		
		  
		 <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Usahawan</span>
			   <?php
			            $sqlv= "SELECT count(name) as total from personal_info WHERE level='user'";
						$pfilearray=array();
						$index=0;
						if($result3 = mysqli_query($db,$sqlv)){
						if(mysqli_num_rows($result3) > 0){
						while(($rs=mysqli_fetch_assoc($result3)))
						{
						$index++;
					
						echo '<span class="info-box-number">';	echo $rs['total']; echo '</span>';
						}}}
			  ?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
		
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-briefcase-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Syarikat</span>
			   <?php
			            $sqlv= "SELECT count(comp_name) as total from company_info";
						$pfilearray=array();
						$index=0;
						if($result3 = mysqli_query($db,$sqlv)){
						if(mysqli_num_rows($result3) > 0){
						while(($rs=mysqli_fetch_assoc($result3)))
						{
						$index++;
					
						echo '<span class="info-box-number">';	echo $rs['total']; echo '</span>';
						}}}
			  ?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
		 <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="ion ion-ios-printer-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Aktiviti</span>
			   <?php
			            $sqlv= "SELECT count(title) as total from latest_information";
						$pfilearray=array();
						$index=0;
						if($result3 = mysqli_query($db,$sqlv)){
						if(mysqli_num_rows($result3) > 0){
						while(($rs=mysqli_fetch_assoc($result3)))
						{
						$index++;
					
						echo '<span class="info-box-number">';	echo $rs['total']; echo '</span>';
						}}}
			  ?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
		
		

      <!-- Profile Image -->
           <!-- <div class="box box-danger">
              <div class="box-body box-profile">
   				<?php 
			    /*
			    if ($row['image'] == ''){
			    echo "<img class='profile-user-img img-responsive img-circle' alt='User profile picture' id='blah' src='../assets/img/user.png' width='125' height='125'/>";}
                else{
			    echo "<img class='profile-user-img img-responsive img-circle' alt='User profile picture' id='blah' src='../uploads/".$row['image']."' width='125' height='125'/>";}
			   */?>
                  <h3 class="profile-username text-center"><?php echo $row['name']; ?></h3>
                  <p class="text-muted text-center">Usahawan</p>
                  <p class="text-center"><a href="profile_details.php?id=<?php echo $rowProfile['id']; ?>" class="text-center"><b>Maklumat Peribadi</b></a></pp>
                    <hr>
                    <div class="box-body">

                      <strong><i class="fa fa-map-marker"></i> Alamat Rasmi</strong>
                      <p class="text-muted"><?php echo $row['address']; ?></p>
                      <hr>

                      <strong><i class="fa fa-phone"></i> No. Telefon</strong>
                      <p class="text-muted"><?php echo $row['phone']; ?></p>
                      <hr>

                      <strong><i class="fa fa-envelope"></i> Emel Rasmi</strong>
                      <p class="text-muted"><?php echo $row['email']; ?></p>
                      <hr>
                      <a href="company_details.php" class="btn btn-primary btn-block"><b>Maklumat Syarikat</b></a>
                    </div>
              </div>
            </div>
            </div>-->
			
   
		  
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- ChartJS -->
<script src="../bower_components/Chart.js/Chart.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
