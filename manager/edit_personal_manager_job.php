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




    <div class="row">
     <div class="col-md-9 col-md-offset-1">
     <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Job</h3>
            </div>
      <form id="fileupload" class="form-horizontal" action="add_experience_manager.php" method="POST">
                  <div class="form-group">
                                          <label class="col-sm-4 control-label" for="exampleInputFile"></label>
                                    </div>
                 <div class="form-group">
                    <label class="col-sm-3  control-label">Position</label>
                    <div class="col-sm-7">
                     <input id="act_name" name="act_name" type="text" class="form-control input-sm" placeholder="Enter Job Position">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3  control-label">Company Name</label>
                    <div class="col-sm-7">
                     <input id="venue" name="venue" type="text" class="form-control input-sm" placeholder="Enter Company Name">
                    </div>
                </div>

                  
                <div class="form-group">
                    <label class="col-sm-3  control-label">Start Date</label>
                   <div class="col-sm-7">
                    <div class="input-group date" data-provide="datetimepicker9" id='datetimepicker9'>
                    <input id="start_date"
                       name="start_date"
                       class="wizard-field form-control"
                       type="text" data-provide="datepicker" data-date-format="MM yyyy" data-date-start-view="year" data-date-min-view-mode="months" 
                       data-date-autoclose="true" placeholder="Enter Date Join"/>

                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar">
                          </span>
                        </span>
                    </div>
                   </div>
                </div>                
                <div class="form-group control-label">
                <label class="col-sm-3">Job Description</label>
                  <div class="col-sm-7">
                    <textarea id="description" name="description"  class="form-control" rows="3" placeholder="Enter Description...." required>
                    </textarea>
                  </div>
                </div>
                <br/>
        <div class="form-group">
              <label class="col-sm-3 control-label"></label>  
              <div class="col-sm-3">
              <button type="submit" class="col-sm-6 btn btn-warning" href="edit_personal_manager_job.php">Submit</button>
              </div>
                </div>          
                <input type="hidden" name="no" id="no" value="<?php echo $row['no']; ?>">              
                <input class ='glyphicon glyphicon-trash' type="hidden" name="deletes" id="deletes" value="Delete">              
                
           
                <div class="box-footer">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Position</th>
                  <th>Company Name</th>
                  <th>Start Date</th>
                  <th>Description</th>
          <th>Change</th>
                </tr>
                </thead>
                <tbody>
        <?php 
        $sqlv= "SELECT * FROM experience WHERE no = '".$_SESSION['no']."' ";

        //$sqlv="select * from experience group by no having count(no) >1";
        $result3 = mysqli_query($db,$sqlv);
        $rowsView = mysqli_fetch_array($result3);
        $num = mysqli_num_rows($result3);
            $pfilearray=array();
        if($result3 = mysqli_query($db,$sqlv)){
         if(mysqli_num_rows($result3) > 0){
        //if($num > 0){
        while(($rs=mysqli_fetch_assoc($result3)))
        {
      
        echo "<tr><td>"; echo $rs['act_name']; echo"</td>";
                echo "<td>"; echo $rs['venue']; echo "</td>";
        echo "<td>"; echo $rs['start_date']; echo"</td>";
        echo "<td>"; echo $rs['description']; echo"</td>";
        echo "<td><a href='delete_experience.php?exp_id=".$rs['id']."'><i class='fa fa-trash'></i></a></td></tr>";     
        //echo "<td><a href=\"delete_experience.php?exp_id=".$rs['no']."\">"; echo $rs['deletes']; echo"</a></td></tr>";
        //  $pfilearray[]=$rs['pos_name'].$rs['emp_name'].$rs['start_date'];
         }}}
        //print_r($pfilearray);
        //print_r($pfilearray1);
        //}
        ?>
      </tbody>
    </table>
     <div class="box-footer">
             <div class="col-xs-1.9 pull-left">
        <button type="reset"  class="btn btn-block pull-right"  value="Cancel" > <a href="personal_detail.php">Cancel</a></button>
          </div>
      </div>
      </form>
      </div> <!--box -->
      </div>    <!--col-md-12 -->
    </div>      <!-- row --> 


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
