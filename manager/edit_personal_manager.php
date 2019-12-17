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
$id = $row['no'];

$sqlProfile = "SELECT personal_info.id FROM personal_info, login WHERE login.no=personal_info.no AND login.no = '$no' AND personal_info.no='$no'";
$resultProfile = mysqli_query($db, $sqlProfile);
$rowProfile = mysqli_fetch_array($resultProfile);

$sql_comp = "SELECT * FROM personal_info WHERE id = '$id'";
$result_comp = mysqli_query($db, $sql_comp);
$row_comp = mysqli_fetch_array($result_comp);

$sql_query = "SELECT * FROM experience, login  WHERE  login.no=experience.no AND login.no = '$no' AND experience.no='$no'";;
$resultView = mysqli_query($db, $sql_query);
$rowView = mysqli_fetch_array($resultView);

 $sql_res = "SELECT no, GROUP_CONCAT(emp_name SEPARATOR ', ')";
 $sql_res .= " AS emp_names FROM experience GROUP BY no";
$result_sql = mysqli_query($db,$sql_res);

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
  <!-- daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<script type="text/javascript">
$(document).ready(function(){
    $("#myNav").affix({
        offset: { 
            top: $(".header").outerHeight(true)
        }
    });
});
 function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah1')
                        .attr('src', e.target.result)
                        .width(300)
                        .height(300);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

</script>
<style>
.dl-horizontal dt { text-align: left; }

 /*----------------Containers--------------------*/
#banner-container-fluid
{
	background-image: url("dist/img/images7.jpg");
	background-color:#2C3E50  ;	
	background-attachment:scroll;
	background-repeat:no-repeat;
	background-position:center;
	background-size:cover;
 }
 
/**********************
		GLOBAL DECLARATIONS
**********************/

#banner-container-fluid  .jumbotron
{
	background-color:#9e9e9e54;
	color:white;
	max-height:600px;
	height:430px;
	width:430px;
	background-size:cover;
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
  </header>   <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <br/>
      <div class="user-panel">
        <div class="pull-left image">
		  <?php if ($row['image'] == ''){
			   echo "<img alt='User profile picture' id='blah' src='../assets/img/user.png' class='img-circle' height='50%' width='50%'/>";}
               else{
			   echo "<img class='img-circle' alt='User profile picture' id='blah' src='../uploads/".$row['image']."' height='50%' width='50%'/>";}?>
        </div>
        <div class="pull-left info">
          <p>Employer :
 		   <span class="hidden-xs"> <a href="profile_details.php"><?php echo $row['username']; ?></a></span></p>
		  <a href="../logout.php">
            <i class="fa fa-sign-out"></i> <span>Log Out</span>
          </a><br/>
        </div>
      </div>
      <br/>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
		<li class="treeview">
          <a href="#">
              <i class="fa fa-home"></i><span>Home</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
		  <ul class="treeview-menu">
              <li><a href="course_offer.php"><i class="fa fa-circle-o"></i>GCP Courses</a></li>
              <li><a href="personal_detail.php"><i class="fa fa-circle-o"></i>Profile</a></li>
              <li><a href="company_details.php"><i class="fa fa-circle-o"></i>Company Profile</a></li>
            </ul> 
		</li>
		<li class="treeview">
          <a href="#">
              <i class="fa fa-list"></i> <span>Vacancy</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
		  <ul class="treeview-menu">
              <li><a href="vacancy_list.php"><i class="fa fa-circle-o"></i>Catalog</a></li>
              <li><a href="registered_vacancy.php"><i class="fa fa-circle-o"></i>Registered</a></li>
              <li><a href="monthly_report_vacancy.php"><i class="fa fa-circle-o"></i>Details</a></li>
            </ul> 
		</li>
		<!-- <li class="treeview">
          <a href="#">
              <i class="fa fa-list"></i> <span>Registered</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
		  <ul class="treeview-menu">
              <li><a href="user_list.php"><i class="fa fa-circle-o"></i>User</a></li>
              <li><a href="user_category.php"><i class="fa fa-circle-o"></i>User By Category</a></li>
              <li><a href="user_category.php"><i class="fa fa-circle-o"></i>Courses</a></li>
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
        </li> -->
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <section class="content-header">
      <br/>
      <h1>
        Home
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
	    <!-- Info boxes -->
      <div class="row">
	   <div class="col-md-9 col-md-offset-1">
	   <div class="box box-warning">
            <div class="box-header with-border ">
              <h3 class="box-title">Profile</h3>
            </div>
			<form id="fileupload" class="form-horizontal" action="update_personal_manager.php?id=<?php echo $rowProfile['id']; ?>" method="POST" enctype="multipart/form-data">
            		<!-- Text input-->
                    <div class="form-group">
                                          <label class="col-sm-4 control-label" for="exampleInputFile"></label>
                                        
                                        </div>
                                 <div class="form-group">
                                          <label class="col-sm-4 control-label" for="exampleInputFile"></label>
                                        <div class="col-sm-5">
                                            <?php 
											echo "<img class='profile-user img-circle' alt='User profile picture' id='blah1' src='../uploads/".$row['image']."' width='300px' height='300'/>";
                                            echo "<div class='col-sm-offset-2 col-sm-10'>";
                                            echo "<input class='input-group' type='file' name='image' onchange='readURL(this);' />";
                                                ?>
                                        </div>
                                        </div>
                                        </div>
                               
							   <div class="form-group">
					  				<label class="col-sm-3  control-label">Name</label>
									  <div class="col-sm-7">
									   <input id="name" name="name" type="text" class="form-control input-sm" value="<?php echo $row['name']; ?>">
									  </div>
								</div>

								<div class="form-group">
					  				<label class="col-sm-3  control-label">NRIC/Passport</label>
									  <div class="col-sm-7">
									   <input id="nric" name="nric" type="text" class="form-control input-sm" value="<?php echo $row['nric']; ?>">
									  </div>
								</div>
								
								<div class="form-group">
					  				<label class="col-sm-3  control-label">Gender</label>
									  <div class="col-sm-7">
									  	<select id="gender" name="gender" type="text" class="form-control input-sm" >
									  		<option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option selected>
									  		<option value="Male">Male</option>
									  		<option value="Female">Female</option>
									  	</select>
									  </div>
								</div>

								<div class="form-group">
					  				<label class="col-sm-3  control-label">Race</label>
									  <div class="col-sm-7">
									  	<select id="race" name="race" type="text" class="form-control input-sm" >
									  		<option value="<?php echo $row['race']; ?>"><?php echo $row['race']; ?></option selected>
									  		<option value="Malay">Malay</option>
									  		<option value="Chinese">Chinese</option>
									  		<option value="Indian">Indian</option>
									  		<option value="Others">Others</option>
									  	</select>
									 </div>
								</div>							

								<div class="form-group">
					  				<label class="col-sm-3 control-label">Nationality</label>
									  <div class="col-sm-7">
									  	<select id="nationality" name="nationality" type="text" class="form-control input-sm" >
									  		<option value="<?php echo $row['nationality']; ?>"><?php echo $row['nationality']; ?></option selected>
									  		<option value="Malaysian">Malaysian</option>
									  		<option value="Others">Others</option>
									  	</select>
									 </div>
								</div>	
								
								<div class="form-group">
					  				<label class="col-sm-3 control-label">Category</label>
									  <div class="col-sm-7">
									  <select id="preference" name="preference" type="text" class="form-control input-sm" >
									  		 <option value="<?php echo $row['preference']; ?>"><?php echo $row['preference']; ?></option selected>
										  	 <option value="User">User</option>
								             <option value="Manager">Manager</option>
									  	</select>
									  </div>
								</div>		
								
								<div class="form-group">
					  				<label class="col-sm-3  control-label">Address</label>
									  <div class="col-sm-7">
									   <input id="address" name="address" type="text" class="form-control input-sm" value="<?php echo $row['address']; ?>">
									  </div>
								</div>

								<div class="form-group">
					  				<label class="col-sm-3 control-label">Phone Number</label>
									  <div class="col-sm-7">
									  <input id="notel" placeholder="Masukkan No.Telefon" name="phone" type="text" class="form-control input-sm" value="<?php echo $row['phone']; ?>">
									  </div>
								</div>
                             

								<div class="form-group">
					  				<label class="col-sm-3 control-label">Email</label>
									  <div class="col-sm-7">
									  <input id="email" name="email" type="text" class="form-control input-sm" value="<?php echo $row['email']; ?>">
									  </div>
                                        </div>
										

                <input type="hidden" name="id" id="id" value="<?php echo $rowProfile['id']; ?>">  
                <input type="hidden" name="no" id="no" value="<?php echo $row['no']; ?>">  
                                    
								
              					
             <div class="box-footer">
             <div class="col-xs-1.9 pull-left">
				<button type="reset"  class="btn btn-block pull-right"  value="Cancel"> <a href="personal_detail.php">Cancel </a></button>
          </div>
			<div class="col-xs-1.5 pull-right">
            <button name="submit" class="btn btn-warning btn-block pull-right">Submit </button>
            </div>
              </div>
              <!-- /.box-footer -->
            </form>
			</div> <!--box -->
      </div>    <!--col-md-12 -->
	  </div>      <!-- row -->
	 
	    	<!------------------------------------------------------------------------------------------------------------------------------------->
       <!-- Info boxes -->
      
	 	<!------------------------------------------------------------------------------------------------------------------------------------->
       <!-- Info boxes -->
     
	 
</div><!-- col-md-12-->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
</div>
</section>
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

<!-- bootstrap datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- date-range-picker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>


<!-- page script -->
<script>
$(function () {

    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })  
  $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
      $('#datepicker1').datepicker({
      autoclose: true
    })
 

</script>
<script>
$(function () {
				$('#datetimepicker9').datetimepicker({
				viewMode: 'years',
				format: 'yyyy',
						});
						});
</script>
</body>
</html>
