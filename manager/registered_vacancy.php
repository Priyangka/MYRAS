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

$sqlProfile = "SELECT personal_info.id FROM personal_info, login WHERE login.no=personal_info.no AND login.no = '$no' AND personal_info.no='$no'";
$resultProfile = mysqli_query($db, $sqlProfile);
$rowProfile = mysqli_fetch_array($resultProfile);

$sql_info= "SELECT * FROM vacancy WHERE  no='".$no."'";
$result_info = mysqli_query($db,$sql_info);
$rowsInfo = mysqli_fetch_array($result_info);

$no = $rowsInfo['no'];
$manager = $rowsInfo['manager'];
$company = $rowsInfo['company'];
$company_id = $rowsInfo['company_id'];

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
<style>
input[type=text] {
    width: 130px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

/* When the input field gets focus, change its width to 100% */
input[type=text]:focus {
    width: 100%;
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
       
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Report</h3>
            </div>
			
			<div class="box-header with-border">
				<input class="form-control"  type="text" id="myInput" placeholder="Search.." title="Type search data"> 			
			</div>
			
            <!-- /.box-header -->
			   <div class="box-body">
			<div class="row">
			<div class="col-xs-12"> <h3 class="box-title"></h3></div></div>
			<div id="table-container">
				   <?php 
									
				        
						$sqlv = "SELECT p.id,p.no, p.position, p.salary, p.skills,p.experience,p.category,p.company,p.company_id,p.date, 
					    IF(ISNULL(b.allBids),0,b.allBids)  AS total  
								FROM vacancy p 
								LEFT OUTER JOIN  (
									  SELECT vacancy_id, COUNT(*) AS allBids 
									  FROM vacancy_participant 
									  GROUP BY vacancy_id
									  )b ON b.vacancy_id = p.id WHERE p.no ='$no'
								ORDER BY p.date ASC
						";
						$index=0;
						$result3 = mysqli_query($db,$sqlv);
						$rowsView = mysqli_fetch_array($result3);
						$num = mysqli_num_rows($result3);
				
						if($result3 = mysqli_query($db,$sqlv)){
						if(mysqli_num_rows($result3) > 0){
						while(($rs=mysqli_fetch_assoc($result3)))
						{
						$now = date("m/d/Y");
						$date =  $rs['date'];	
	
						$year = strtotime($date);
						$getYear = date("Y", $year);
						$NewYear = date("Y");
						
						if (($getYear>=$NewYear)&& ($date>=$now) && ($rs['no']==$no)) {	
						echo '<table id="myTable" class="table table-bordered table-striped">
						<thead>
						<tr>
						  <th>#</th> 
						  <th>Position</th>
						  <th>Category</th>
						  <th>Salary</th>
						  <th>Experience</th>
						  <th>Skills</th>
						  <th>Total Application</th>
						  <th>Change</th>
						</tr>
						</thead>
						<tbody>';
						
						if($result3 = mysqli_query($db,$sqlv)){
						if(mysqli_num_rows($result3) > 0){
						while(($rs=mysqli_fetch_assoc($result3)))
						{
						$date = $rs['date'];
						$month = strtotime($date);
						$getMonth = date("m", $month);
						
						$date = $rs['date'];
						$year = strtotime($date);
						$getYear = date("Y", $year);
						
						if (($getYear>=$NewYear)&& ($date>=$now) ) {	
						$index++;
						$id = $rs['id'];
						

						echo "<tr><td>"; echo $index; echo"</td>";
						echo "<td><a href='vacancy_details.php?vacancy_id=$id'>"; echo $rs['position']; echo"</td>";
						if($rs['category']=='Manager'){
                        echo "<td>";
                        echo "<span class='label label-danger'>";echo $rs['category']; echo"</span>";echo"</td>";}
						elseif($rs['category']=='Engineer'){
                        echo "<td>";
                        echo "<span class='label label-warning'>";echo $rs['category']; echo"</span>";echo"</td>";}
						elseif($rs['category']=='Technichian'){
                         echo "<td>";
                        echo "<span class='label label-success'>";echo $rs['category']; echo"</span>";echo"</td>";}
						elseif($rs['category']=='Supervisor'){
                        echo "<td>";
                        echo "<span class='label label-info'>";echo $rs['category']; echo"</span>";echo"</td>";}
						elseif($rs['category']=='Operator'){
                        echo "<td>";
                        echo "<span class='label label-danger'>";echo $rs['default']; echo"</span>";echo"</td>";}
						echo "<td>"; echo $rs['salary']; echo"</td>";
						echo "<td>"; echo $rs['experience']; echo"</td>";
						echo "<td>"; echo $rs['skills']; echo"</td>";
						
						if($rs['total']>='100'){
						echo "<td>";
                        echo "<span class='label label-success'>";echo $rs['total']; echo"</span>";echo"</td>";}
						if($rs['total']>='50' && $rs['total']<'100'){
						echo "<td>";
                        echo "<span class='label label-warning'>";echo $rs['total']; echo"</span>";echo"</td>";}
						elseif($rs['total']<'50'){
						echo "<td>";
                        echo "<span class='label label-danger'>";echo $rs['total']; echo"</span>";echo"</td>";}
						echo "<td><a id='adds' href='delete_vacancies.php?info_id=".$rs['id']."'><i class='fa fa-trash'></i></a></td>";     
						echo'
						';}}}}
					} 
			    }}}
				?>
				
              </tbody>
              </table>
			  </div>
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
    $('#myTable').DataTable({
      'searching'   : false,
    })
  });
  
     $(document).ready(function()
                     {
        $("#fetchval").on('change',function()
                         {
            var keyword = $(this).val();
            $.ajax(
            {
                url:'fetch.php',
                type:'POST',
                data:'request='+keyword,
                
                beforeSend:function()
                {
                    $("#table-container").html('Working...');
                    
                },
                success:function(data)
                {
                    $("#table-container").html(data);
                },
            });
        });
    });
</script>

<script>
function filterTable(event) {
    var filter = event.target.value.toUpperCase();
    var rows = document.querySelector("#myTable tbody").rows;
    
    for (var i = 0; i < rows.length; i++) {
        var firstCol = rows[i].cells[0].textContent.toUpperCase();
        var secondCol = rows[i].cells[1].textContent.toUpperCase();
        var thirdCol = rows[i].cells[2].textContent.toUpperCase();
        var fourthCol = rows[i].cells[3].textContent.toUpperCase();
        var fifthCol = rows[i].cells[4].textContent.toUpperCase();
        if (firstCol.indexOf(filter) > -1 || secondCol.indexOf(filter) > -1|| thirdCol.indexOf(filter) > -1|| 
		fourthCol.indexOf(filter) > -1 || fifthCol.indexOf(filter) > -1) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }      
    }
}
document.querySelector('#myInput').addEventListener('keyup', filterTable, false);
</script>
</body>
</html>
