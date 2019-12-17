<?php
session_start();
include('../connection/config.php');

if(!isset($_SESSION['username']) || $_SESSION['username'] == " ")
{
       header("Location: ../index.php");
       die();
}
$no = $_SESSION['no'];

$sql = "SELECT * FROM personal_info, login WHERE login.no=personal_info.no AND login.no = '$no' AND personal_info.no='$no'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);

$sqlProfile = "SELECT personal_info.id FROM personal_info, login WHERE login.no=personal_info.no AND login.no = '$no' AND personal_info.no='$no'";
$resultProfile = mysqli_query($db, $sqlProfile);
$rowProfile = mysqli_fetch_array($resultProfile);



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GCP</title>
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
<style>
.dl-horizontal dt { text-align: left; }
.pagination > li > a, .pagination > li > span { color: grey; // use your own color here }
.pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover { background-color: orange; border-color: orange; }
#adds {color: orange; }
</style>

<style>
.dl-horizontal dt { text-align: left; }
.navbar-brand {padding: 0px;}
.example2 .navbar-brand>img {padding: 7px 15px;}

.card {
	top:0;
    font-size: 1em;
    overflow: hidden;
    padding: 0;
    border: none;
    border-radius: .28571429rem;
    box-shadow: 0 1px 1px 0 #d4d4d5, 0 0 0 1px #d4d4d5;
	background-color:white;
}

.card-block {
    font-size: 1em;
    position: relative;
    margin: 0;
    padding: 1em;
    border: none;
    border-top: 1px solid rgba(34, 36, 38, .1);
    box-shadow: none;
}

.card-img-top {
    display: block;
    width: 100%;
    height: auto;
	border:1px solid rgba(0, 0, 0, .05);
}

.card-title {
    font-size: 1.28571429em;
    font-weight: 700;
    line-height: 1.2857em;
	margin-left:0.6em;
	
}
.card-title1 {
    font-size: 1.28571429em;
    font-weight: 700;
    line-height: 1.2857em;
	
}

.card-text {
    clear: both;
    margin-top: .5em;
    color: rgba(0, 0, 0, .68);
	margin-left:1.0em;
	margin-right:1.0em;
	
}
.card-subtitle {
	margin-left:1.0em;
	margin-right:1.0em;
	
}
.card-link {
	margin-left:1.0em;
	margin-right:1.0em;
	
}

.card-footer {
    font-size: 1em;
    position: static;
    top: 0;
    left: 0;
    max-width: 100%;
    padding: .75em 1em;
    color: rgba(0, 0, 0, .4);
    border-top: 1px solid rgba(0, 0, 0, .05) !important;
    background: #fff;
}

.card-inverse .btn {
    border: 1px solid rgba(0, 0, 0, .05);
}
</style>
<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">
<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>GCP</b></span>
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
    </nav>

  </header><aside class="main-sidebar">
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
              <li><a href="user_category.php"><i class="fa fa-circle-o"></i>User By Category</a></li>
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
		
		<li class="treeview">
          <a href="#">
              <i class="fa  fa-briefcase"></i> <span>Vacancy</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
		  <ul class="treeview-menu">
              <li><a href="vacancy_list.php"><i class="fa fa-circle-o"></i>Catalog</a></li>
			  <li><a href="company_list.php"><i class="fa fa-circle-o"></i>Company</a></li>
              <li><a href="registered_vacancy.php"><i class="fa fa-circle-o"></i>Registered</a></li>
              <li><a href="monthly_report_vacancy.php"><i class="fa fa-circle-o"></i>Details</a></li>
            </ul> 
		</li>
		
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <section class="content-header">
      <br/>
      <h1>
       Vacancy
      </h1>
    </section>
	
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
	
		  	<div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Current Vacancy</h3> 
            </a>
		
				<h3 class="box-title pull-right"><?php if($row['level']=='admin' ||$row['level']=='manager' ){echo "<a href='add_vacancy.php' id='adds'> <i class='fa fa-plus-square fa-fw'></i></a>";} ?></h3>
              </div>
	
              <div class="box-body">
             <?php
			 $now = date("m/d/Y");
			 $sqlv = "SELECT * FROM vacancy ORDER BY date desc" ;
			 
				$result3 = mysqli_query($db,$sqlv);
				$rowsView = mysqli_fetch_array($result3);
				$num = mysqli_num_rows($result3);
		        $pfilearray=array();
		
				if($result3 = mysqli_query($db,$sqlv)){
				if(mysqli_num_rows($result3) > 0){
				while(($rs=mysqli_fetch_assoc($result3)))
				{
					$now = date("m/d/Y");
					$date =  $rs['date'];	
					
					$year = strtotime($date);
					$getYear = date("Y", $year);
					$NewYear = date("Y");
					
					if (($getYear>=$NewYear)&& ($date>=$now) ) {	
					echo '<div class="card " ></a><div class="card-body">';
					echo "<ul class='products-list product-list-in-box'>
					<li class='item'>";
                    echo "<h5 class='card-title'>";
					echo "<a href=\"vacancy_details.php?vacancy_id=".$rs['id']."\" class='product-title'>"; echo $rs['position'];
   					echo"</a><a href=\"delete_vacan.php?info_id=".$rs['id']."\" class='product-title' id='adds'><span class='glyphicon glyphicon-remove-sign pull-right' id='adds'></a></span></h5>";
					//echo"<h3><a href=\"delete_info.php?info_id=".$rs['id']."\" class='product-title' id='adds'><span class='glyphicon glyphicon-remove-sign pull-right' id='adds'></a></span></h3>";
                   	echo"<h5 class='card-text text-muted mb-2'>";
					if($rs['category']=='Manager'){
                        echo "<span class='label label-danger'>";echo $rs['category']."</span><br/><td></td>";}
						elseif($rs['category']=='Engineer'){
                        echo "<span class='label label-warning'>";echo $rs['category']."</span><br/><td></td>";}
						elseif($rs['category']=='Technichian'){
                        echo "<span class='label label-success'>";echo $rs['category']."</span><br/><td></td>";}
						elseif($rs['category']=='Supervisor'){
                        echo "<span class='label label-info'>";echo $rs['category']."</span><br/><td></td>";}
						elseif($rs['category']=='Operator'){
                        echo "<span class='label label-default'>";echo $rs['category']."</span><br/><td></td>";}
						echo'<p></p>';
					echo $rs['date'].'<br/>';
					echo $rs['salary'];
                    echo "</h5>";
                    echo "
                    </li>
				    </ul>"; 
			       echo '</div></div></br>';		
				 
					} 
			    }}}
              
			  ?>
              </div>
            </div>
          <!-- /.box -->
	  
			<div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Previous Vacancy</h3> 
            </a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
             <?php
			$result3 = mysqli_query($db,$sqlv);
				$rowsView = mysqli_fetch_array($result3);
				$num = mysqli_num_rows($result3);
		        $pfilearray=array();
		
				if($result3 = mysqli_query($db,$sqlv)){
				if(mysqli_num_rows($result3) > 0){
				while(($rs=mysqli_fetch_assoc($result3)))
				{
					$date = $rs['date'];
					$year = strtotime($date);
					$getYear = date("Y", $year);
					
					$NewYear = date("Y");
					
					$now = date("m/d/Y");
					$date =  $rs['date'];		
					if (($date < $now)|| $getYear>$NewYear) {
				    echo '<div class="card " ></a><div class="card-body">';
					echo "<ul class='products-list product-list-in-box'>
					<li class='item'>";
                    echo "<h5 class='card-title'>";
					echo "<a href=\"vacancy_details.php?vacancy_id=".$rs['id']."\" class='product-title'>"; echo $rs['title'];
   					echo"</a><a href=\"delete_vacan.php?info_id=".$rs['id']."\" class='product-title' id='adds'><span class='glyphicon glyphicon-remove-sign pull-right' id='adds'></a></span></h5>";
					//echo"<h3><a href=\"delete_info.php?info_id=".$rs['id']."\" class='product-title' id='adds'><span class='glyphicon glyphicon-remove-sign pull-right' id='adds'></a></span></h3>";
                   	echo"<h5 class='card-text text-muted mb-2'>";
					if($rs['preference']=='Engineer'){
                        echo "<span class='label label-danger'>";echo $rs['preference']."</span><br/><td></td>";}
						elseif($rs['preference']=='Manager'){
                        echo "<span class='label label-warning'>";echo $rs['preference']."</span><br/><td></td>";}
						elseif($rs['preference']=='Operator'){
                        echo "<span class='label label-success'>";echo $rs['preference']."</span><br/><td></td>";}
						elseif($rs['preference']=='Technical'){
                        echo "<span class='label label-info'>";echo $rs['preference']."</span><br/><td></td>";}
						echo'<p></p>';
					echo $rs['date'].'<br/>';
					echo $rs['venue'];
                    echo "</h5>";
                    echo "
                    </li>
				    </ul>"; 
			       echo '</div></div></br>';
					/*echo "<ul class='products-list product-list-in-box'>
					<li class='item'>
					<div>";
                    echo "<a href=\"info_details.php?info_id=".$rs['id']."\" class='product-title'>"; echo $rs['title'];
					echo"</a>";
					if($row['level']=='user'){
					echo"<a href=href=\"info_details.php?info_id=".$rs['id']."\" class='product-title'><span class='glyphicon glyphicon-info-sign pull-right'></a></span>";}
                    if($row['level']=='admin'){
					echo"<a href=\"delete_info.php?info_id=".$rs['id']."\" class='product-title'id='adds'><span class='glyphicon glyphicon-remove-sign pull-right'></a></span>";}
					echo"<span class='product-description'>";
					echo $rs['date'];
					echo"</span><span class='product-description'>";
					echo $rs['preference'];
                    echo "</span>";
                    echo "</span><span class='product-description'>";
                    echo $rs['venue'];   
                    echo "</span>
                  </div>
					</li>  
					</ul>"; */ 
					} 
			    }}}
			  ?>
              </div>
            </div>
          <!-- /.box -->
		  
        </div>
        <!-- /.col -->
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
