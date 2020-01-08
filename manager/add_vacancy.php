<?php
session_start();
include('../connection/config.php');
$no = $_SESSION['no'];

if(!isset($_SESSION['username']) || $_SESSION['username'] == " ")
{
       header("Location: ../index.php");
       die();
}
$sql = "SELECT * FROM personal_info, login WHERE login.no=personal_info.no AND login.no = '$no' AND personal_info.no='$no'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
$image_src2 = $row['image'];

$sqlProfile = "SELECT personal_info.no FROM personal_info, login WHERE login.no=personal_info.no AND login.no = '$no' AND personal_info.no='$no'";
$resultProfile = mysqli_query($db, $sqlProfile);
$rowProfile = mysqli_fetch_array($resultProfile);

$sql_query = "SELECT * FROM company, personal_info WHERE company.no=personal_info.no AND company.no = '$no' AND personal_info.no='$no'";
$resultView = mysqli_query($db, $sql_query);
$rowView = mysqli_fetch_array($resultView);

$manager = $rowView['manager'];

$sql_res = "SELECT no, GROUP_CONCAT(emp_name SEPARATOR ', ')";
$sql_res .= " AS emp_names FROM experience GROUP BY no";
$result_sql = mysqli_query($db,$sql_res);

$sql1 = "SELECT * FROM company WHERE no='$no'";
$result1 = mysqli_query($db, $sql1);
$row1 = mysqli_fetch_array($result1);
$company = $row1['title'];
$company_id = $row1['id'];


?><!DOCTYPE html>
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
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/iCheck/all.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.9.1.js"></script>

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<style>
.dl-horizontal dt { text-align: left; }
.pagination > li > a, .pagination > li > span { color: grey; // use your own color here }
.pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover { background-color: orange; border-color: orange; }
#bins {color: orange; }

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

  </header>  <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
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
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <section class="content-header">
      <br/>
      <h1>
        Vacancy
      </h1>

    </section>

	<br/>
    <section class="content">
       <!-- Info boxes -->
      <div class="row">
 	  <div class="col-md-9 col-md-offset-1">
	   <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Job Description</h3>
            </div>
			<form role="form" class="form-horizontal"  method="POST" action="vacancy_insert.php" enctype="multipart/form-data">		
            <!--<form id="fileupload" class="form-horizontal" action="info_insert.php" method="POST" enctype="multipart/form-data">-->
			<div class="box-body">
							
										
								<div class="form-group">
								  <label for="inputEmail3" class="col-sm-3 control-label">Position</label>
								  <div class="col-sm-7">
									<input id="position" name="position" type="text" class="form-control"  placeholder="Enter Position">
								  </div>
								</div>
								<div class="form-group">
								  <label for="inputEmail3" class="col-sm-3 control-label">Skills Required</label>
								  <div class="col-sm-7">
									<input id="skills" name="skills" type="text" class="form-control"  placeholder="Enter Skills Required">
								  </div>
								</div>
								
								<div class="form-group">
								  <label for="inputEmail3" class="col-sm-3 control-label">Experience</label>
								  <div class="col-sm-7">
									<input id="experience" name="experience" type="text" class="form-control"  placeholder="Enter Experience">
								  </div>
								</div>
								
								
										
										<div class="form-group">
										<label  for="inputEmail3" class="col-sm-3 control-label">Category</label>
										  <div class="col-sm-7">
										  <select onchange="yesnoCheck(this);" id="category" name="category" class="form-control select2" style="width: 100%;">
										  <option selected="selected" value=" ">Select Category</option>
										  	<option value="Manager">Manager</option>
										  <option value="Engineer">Engineer</option>
										  <option value="Technichian">Technichian</option>
										  <option value="Supervisor">Supervisor</option>
										  <option value="Operator">Operator</option>
										</select>
									  </div>
									  </div>
						  													
																		  
									<script>
									function yesnoCheck(that) {
										if (that.value == "Manager") {
											//alert("check");
											document.getElementById("ifYes").style.display = "block";
										}
									}
									</script>			
						  
							<div class="form-group">
					  				<label class="col-sm-3  control-label">Closing Date</label>
									 <div class="col-sm-7">
									  <div class="input-group date" data-provide="datetimepicker9" id='datetimepicker9' required>
									  <input id="date"
										   name="date"
										   class="wizard-field form-control"
										   type="text" data-provide="datepicker"
										   data-date-autoclose="true" data-date-today-btn="true" data-date-today-highlight="true" placeholder="Enter Date" required/>
									  	<span class="input-group-addon">
													<span class="glyphicon glyphicon-calendar">
													</span>
												</span>
										</div>
									 </div>
								</div>	
								
								<div class="form-group">
								  <label for="inputEmail3" class="col-sm-3 control-label">Salary</label>
								  <div class="col-sm-7">
									<input id="salary" name="salary" type="text" class="form-control"  placeholder="Enter Salary (eg: RM 2000 - 2500)">
								  </div>
								</div>
								
									<div class="form-group control-label">
								<label class="col-sm-3">Job Description</label>
									<div class="col-sm-7">
										<textarea id="description" name="description"  class="form-control" rows="3" placeholder="Enter Job Description...." required>
										</textarea>
									</div>
								</div>
							<input type="hidden" name="no" id="no" value="<?php echo $no; ?>">
							<input type="hidden" name="manager" id="manager" value="<?php echo $manager; ?>">
							<input type="hidden" name="company" id="company" value="<?php echo $company; ?>">
							<input type="hidden" name="company_id" id="company_id" value="<?php echo $company_id; ?>">
					        
						
					
              <!-- /.box-body -->
              <div class="box-footer">
             <div class="col-xs-1.9 pull-left">
            <button type="reset"class="btn btn-block pull-right"><a href="vacancy_list.php"> Cancel </a></button>
          </div>
			<div class="col-xs-1.5 pull-right">
            <button name="submit" class="btn btn-warning btn-block pull-right">Submit </button>
            </div>
              </div>
              </div>
              <!-- /.box-footer -->
            </form>
			</div> <!--box -->
      </div>    <!--col-md-12 -->
	  </div>      <!-- row --> 
	 <script type="text/javascript">
		  $('#time_from').timepicker({
			showInputs: false
		  });
		    $('#time_to').timepicker({
			showInputs: false
		  });
		</script>
		<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

        //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
<script>
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
</script>
<script type="text/javascript">
/*function ShowHideDiv() {
        var chkYes = document.getElementById("chkYes");
        var dvtext = document.getElementById("dvtext");
        dvtext.style.display = chkYes.checked ? "block" : "none";
    }*/
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
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(500)
                        .height(300);
                };

                reader.readAsDataURL(input.files[0]);
            }
        };

		$(function () {
				$('#datetimepicker9').datetimepicker({
					todayBtn: true
						});
						});
						
</script>
    </section>
</div>
</div>
</body>
</html>
<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- bootstrap datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page script -->

