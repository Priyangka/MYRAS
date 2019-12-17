<?php
session_start();
include('../connection/config.php');

if(!isset($_SESSION['username']) || $_SESSION['username'] == " ")
{
       header("Location: ../index.php");
       die();
}
$no = $_SESSION['no'];
$id = $_GET['id'];

$sql = "SELECT * FROM personal_info, login WHERE login.no=personal_info.no AND login.no = '$no' AND personal_info.no='$no'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);

$sqlProfile = "SELECT personal_info.id FROM personal_info, login WHERE login.no=personal_info.no AND login.no = '$no' AND personal_info.no='$no'";
$resultProfile = mysqli_query($db, $sqlProfile);
$rowProfile = mysqli_fetch_array($resultProfile);

$sql_comp = "SELECT * FROM personal_info WHERE id = '$id'";
$result_comp = mysqli_query($db, $sql_comp);
$row_comp = mysqli_fetch_array($result_comp);
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
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        	  <div class="col-md-9 col-md-offset-1">
              <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
           <div class="widget-user-header bg-aqua-active" style="background: url('../dist/img/images5.jpg') center;">
              <h3 class="widget-user-username"><?php echo $row_comp['name']; ?></h3>
            </div>
            <div class="widget-user-image">
            <?php echo "<img class='img-circle' alt='User profile picture' id='blah' src='../uploads/".$row_comp['image']."' width='300' height='300'/>"; ?>
            </div>
            <div class="box-footer">
              <div class="row">
			  <!-- /.col -->
                <div class="col-sm-12">
                  <div class="description text-center">
                    <h5 class="description-header"><?php echo $row_comp['email']; ?>
					<a href="edit_profile.php"><?php if ($row_comp['nric']==$row['nric']){ 
                    echo '<i class="fa fa-pencil"></i>'; }?></a></h5>
					 <h5 class="widget-user-desc"><?php echo $row_comp['phone']; ?></h5>
					</div>
                  </div>
                </div>
              </div>
            </div>
        </div>
 	  <div class="col-md-9 col-md-offset-1">
	   <!--<ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="300">-->
      <div class="box box-warning">
            <div class="box-header with-border">
              <h1 class="box-title">Profile Details</h1>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Widget: user widget style 1 -->
              <div class="row">
			  <!-- /.col -->
                <div class="col-md-12">
             <?php 
				$no = $row_comp['no'];
				$sqlv= "SELECT * FROM personal_info WHERE no = '$no' ";
				if($result3 = mysqli_query($db,$sqlv)){
				if(mysqli_num_rows($result3) > 0){
				while(($rs=mysqli_fetch_assoc($result3)))	
				{
						    echo "
				<dl class='dl-vertical col-md-12'>
				<div class='box-header with-border'>";
				echo '<div class="form-group">
                <label>Address</label><br/>';
                echo $rs['address']; 
                echo '</div>
                <div class="form-group">
                <label>Race</label><br/>';
                echo $rs['race']; 
                echo '</div>';
				echo '<div class="form-group">
                <label>NRIC</label><br/>';
                echo $rs['nric']; 
                echo '</div>';
				echo '<div class="form-group">
                <label>Nationality</label><br/>';
                echo $rs['nationality']; 
                echo '</div>';
				echo '<div class="form-group">
                <label>Nationality</label><br/>';
                echo $rs['nationality']; 
                echo '</div>';
				if ($rs['level']=='user'){
				echo '<div class="form-group">
                <label>Job Preference</label><br/>';
                echo $rs['category']; 
                echo '</div>';}
				if ($row_comp['level']=='admin'){
                echo'<div class="form-group">
                <label>Username</label><br/>';
                echo $rs['username']; 
                echo '</div>';
				echo '<div class="form-group">
                <label>Password</label><br/>';
                echo $rs['password']; }
				echo"</dd></dd>";
				echo"</dt>						
		        </div>
                </dl>
			  ";
			    
				 }}}
				?>
				
        
            </div>
            <!-- /.box-body -->
     </div>
	</div><!-- /.box-body -->
	</div><!-- box box-default collapsed-box-->
	</div><!-- col-md-12-->  
	
	  <div class="col-md-9 col-md-offset-1">
	   <!--<ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="300">-->
      <div class="box box-warning">
            <div class="box-header with-border">
              <h1 class="box-title">Employment Background</h1>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Widget: user widget style 1 -->
              <div class="row">
			  <!-- /.col -->
                <div class="col-md-12">
            <?php 
				$no = $row_comp['no'];
				$sqlv= "SELECT * FROM experience WHERE no = '$no' ";
				$index=0;
				if($result3 = mysqli_query($db,$sqlv)){
				if(mysqli_num_rows($result3) > 0){
				while(($rs=mysqli_fetch_assoc($result3)))	
				{
				$index++;
				$string = $rs['description'];
				$string = strip_tags($string);
			    echo "
				<dl>
				<div class='box-header with-border'><dt><h12 class='box-title col-md-10  widget-user-desc'> ";echo $rs['act_name'];echo"</h12>
				<dd class='col-md-10 '>"; echo $rs['venue'];echo"
				<dd class='col-md-10 '>";echo $rs['start_date']; echo"
				<dd class='col-md-10 '>";
				echo '<a data-toggle="collapse" class="test-block" id="test-block-".$index."" href="#test-block-'.$index.'" aria-expanded="true" aria-controls="test-block-'.$index.'" type="btn btn-warning card-link">...</a>';
				echo '<div id="test-block-'.$index.'" class="collapse"><div class="card-block text-justify">'.$string.'</div></div>';			
				echo"</dd></dd></dd></dt>						
		        </div></dl>";
				 }}}
				?>
				
        
            </div>
            <!-- /.box-body -->
     </div>
	</div><!-- /.box-body -->
	</div><!-- box box-default collapsed-box-->
	</div><!-- col-md-12-->    
	  
        <div class="col-md-9 col-md-offset-1">
	    <!--<ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="300">-->
        <div class="box box-warning">
            <div class="box-header with-border">
              <h1 class="box-title">Education Background</h1>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Widget: user widget style 1 -->
              <div class="row">
			  <!-- /.col -->
                <div class="col-md-12">
           	  <?php 
				$no = $row_comp['no'];
				$sqlv= "SELECT * FROM education WHERE no = '$no' ";
				$index=0;
				if($result3 = mysqli_query($db,$sqlv)){
				if(mysqli_num_rows($result3) > 0){
				while(($rs=mysqli_fetch_assoc($result3)))	
				{
				$index = $rs['id'];
				$index++;
				$university = $rs['university'];
				$string1 = $rs['description'];
				$string1 = strip_tags($string1);
				echo"<p class='card-text text-justify'>";
				//echo 'test-block-"'.$index.$university.'"'.'<br>';

			    echo "
				<dl>
				<div class='box-header with-border'><dt><h12 class='box-title col-md-10  widget-user-desc'> ";echo $rs['course'];echo"</h12>
				<dd class='col-md-10 '>"; echo $rs['university'];echo"
				<dd class='col-md-10 '>";echo $rs['grad']; echo"
				<dd class='col-md-10'>";
	  		    echo '<a data-toggle="collapse" class="test-block" id="test-block-".$index.$university."" href="#test-block-'.$index.'" aria-expanded="true" aria-controls="test-block-'.$index.'" type="btn btn-warning card-link">...</a>';
				echo '<div id="test-block-'.$index.'" class="collapse"><div class="card-block text-justify">'.$string1.'</div></div>';			
				echo"</dd></dd></dt>						
		        </div>
                </dl></p>
			  ";
			  
				 }}}
				?>
        
            </div>
            <!-- /.box-body -->
     </div>
</div><!-- /.box-body -->
</div><!-- box box-default collapsed-box-->
</div><!-- col-md-12-->   
	 
   
</div><!-- /.box-body -->
</div><!-- box box-default collapsed-box-->
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
<!-- page script -->
<script>
  /*$(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })*/
  $(document).ready(function() {
    $('#example1').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    //select.append( '<option value="'+d+'">'+d+'</option>' )
                    select.append( '<option>'+d+'</option>' )
                } );
            } );
        }
    } );
} );
</script>
</body>
</html>
