<?php
session_start();
include('../connection/config.php');
$no = $_SESSION['no'];
$sql = "SELECT * FROM personal_info, login WHERE login.no=personal_info.no AND login.no = '$no' AND personal_info.no='$no'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
$image_src2 = $row['image'];

$sqlProfile = "SELECT personal_info.no FROM personal_info, login WHERE login.no=personal_info.no AND login.no = '$no' AND personal_info.no='$no'";
$resultProfile = mysqli_query($db, $sqlProfile);
$rowProfile = mysqli_fetch_array($resultProfile);

$id=$_GET['info_id']; 
$sql_info= "SELECT * FROM latest_information WHERE  id='".$id."'";
$result_info = mysqli_query($db,$sql_info);
$rowsInfo = mysqli_fetch_array($result_info);

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
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
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
<script>
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

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
<script type="text/javascript">
function ShowHideDiv() {
        var chkYes = document.getElementById("chkYes");
        var dvtext = document.getElementById("dvtext");
        dvtext.style.display = chkYes.checked ? "block" : "none";
    }
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
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

		$(function () {
				$('#datetimepicker9').datetimepicker({
				
					todayBtn: true
						});
						});
						
</script>
<style>
  article, aside, figure, footer, header, hgroup, 
  menu, nav, section { display: block; }
  #adds {color:orange;}
  
.dl-horizontal dt { text-align: left; }
.pagination > li > a, .pagination > li > span { color: grey; // use your own color here }
.pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover { background-color: orange; border-color: orange; }
</style>
<style>
  article, aside, figure, footer, header, hgroup, 
  menu, nav, section { display: block; }
.dl-horizontal dt { text-align: left; }
.pagination > li > a, .pagination > li > span { color: grey; // use your own color here }
.pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover { background-color: orange; border-color: orange; }
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
.div {
    width:300px;
    height:300px;    
    overflow:hidden;
}
.div img {
    min-width:100%;
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
  </header> <aside class="main-sidebar">
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
          <p>Manager :
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
              <li><a href="profile_details.php"><i class="fa fa-circle-o"></i>Profile</a></li>
              <li><a href="company_details.php"><i class="fa fa-circle-o"></i>Company Profile</a></li>
            </ul> 
		</li>
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
        </li>
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
        Home
      </h1>

    </section>

    <section class="content">
      <!-- Info boxes -->
      <div class="row">
	  <div class="col-xs-12">

           <div class="card sticky-top" >
		  <div class="col-md-7 ">
			<div class="card-body"><h5 class="card-title"> <?php echo $rowsInfo['title'].'&nbsp'; if ($rowsInfo['code_title']!=''){echo '('.$rowsInfo['code_title'].')';} ?></h5>
			</div>
			<form class="form-horizontal" action="insert_info_participant.php" method="POST" enctype="multipart/form-data">

			<?php
			    echo'</a><div class="card-body">';
				echo "<ul class='products-list product-list-in-box'>
                <li class='item'>";
					echo"<p class='card-text text-justify'>";
					echo $rowsInfo['description'];
                    echo "</p>
                    </li>
				    </ul>"; 
			       echo '</div>';	
				   
			    echo'<div class="card-body">';
				echo "<ul class='products-list product-list-in-box'>
                <li class='item'>";
					echo"<p class='card-text text-justify'>"; echo"<label class='control-label'><i class='fa fa-clock-o'></i> ";
					echo '&nbsp'.$rowsInfo['time_from'].'-'. $rowsInfo['time_to']."</label>";
				    echo '&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp';
					echo "<label class='control-label'><i class='fa  fa-calendar'></i> ";
					echo $rowsInfo['date']."</label></p>";
					echo "<p class='card-text text-justify'><label class='control-label'><i class='fa fa-map-marker'></i>";
					echo '&nbsp'.$rowsInfo['venue'];
                    echo "</p>
                    </li>
				    </ul>"; 
			       echo '</div>';
			?>
		  </div>
		   <div class="col-md-5 ">
		   		<?php
			    echo'<div class="card-body">';
				echo "<ul class='products-list product-list-in-box'>
                <li class='item'>";
				if($rowsInfo['image_banner']!=''){
	            echo "<img class='img-thumbnail img-responsive center-block' alt='Program Banner' id='blah' src='banner/".$rowsInfo['image_banner']."' style='width:500px; height:300px;object-fit: cover;''/><p></p>";}
				    echo "<a href=\"edit_info.php?info_id=".$rowsInfo['id']."\"   class='col-xs-3 col-md-6 col-md-push-3 btn btn-warning card-link center'>Edit Info</a>";
					//echo'<button type="submit" class="col-sm-8 col-md-offset-2 btn btn-warning center">Edit Information</button>';
                    echo "
                    </li>
				    </ul>"; 
			       echo '</div>';	
			?>
		  </div>
		  </div>
		  <br/>
			</div> <!--box -->
				<input type="hidden" name="no" id="no" value="<?php echo $no; ?>">
			</div> <!--box -->
			   <?php 
	   
		if ($rowsInfo['chk']=='chkY'){
		echo 	
      '<div class="row">
	  <div class="col-md-10 col-md-offset-1">
	   <div class="box box-warning hidden">
            <div class="box-header with-border">';         
				               
				    echo '<h3 class="box-title">Registration Form</div>
			        <form class="form-horizontal" action="insert_info_participant.php" method="POST" enctype="multipart/form-data">';
					 echo "<div class='box-body'>
                        
						<div class='form-group'>
					    <label for='inputEmail3' class='col-sm-2 control-label'>Name</label>
						<div class='col-sm-4'>";
						echo '<input type="text" name="name"  class="form-control" value="' . htmlspecialchars($row['name']) . '"></div></div>';
		
					echo"<div class='form-group'>
					    <label for='inputEmail3' class='col-sm-2 control-label'>Phone Number</label>
						<div class='col-sm-4'>";
					echo '<input type="text" name="phone"  class="form-control" value="' . htmlspecialchars($row['phone']) . '"></div></div>'; 
					
					echo"<div class='form-group'>
					    <label for='inputEmail3' class='col-sm-2 control-label'>Email</label>
						<div class='col-sm-4'>";
					echo '<input type="text" name="email"  class="form-control" value="' . htmlspecialchars($row['email']) . '"></div></div>'; 

					
					echo '<input type="hidden" name="no" id="no" class="form-control" value="' . htmlspecialchars($no) . '">'; 
					echo '<input type="hidden" name="info_id" id="info_id" class="form-control" value="' . htmlspecialchars($rowsInfo['id']) . '">'; 
					echo '<input type="hidden" name="title" id="title" class="form-control" value="' . htmlspecialchars($rowsInfo['title']) . '">'; 

				echo '
				<div class="form-group">
					<label class="col-sm-2 control-label"></label>  
									  <div class="col-sm-3">
								      <button type="submit" class="col-sm-6 btn btn-warning">Enroll</button>
									  </div>
                                      </div>	
                <div class="box-footer">
                </div>';
			  
			  }
					?>		
                 
			  
              </div>
              <!-- /.box-footer -->
            </form>
			</div> <!--box -->
      </div>    <!--col-md-12 -->
	  
	  
	  
	  </div>  
      </div>    <!--col-md-12 -->
	  </div> 
</form>	  <!-- row --> 
    </section>
</div>
</div>

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
<!-- Page script -->
<!-- you need to include the shieldui css and js assets in order for the components to work -->
<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/jszip.min.js"></script>
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
<script type="text/javascript">
jQuery(function ($) {
        $("#exportButton").click(function () {
            // parse the HTML table element having an id=exportTable
            var dataSource = shield.DataSource.create({
                data: "#exportTable",
                schema: {
                    type: "table",
                    fields: {
                                              
						Name: { type: String },
						Phone: { type: String },
                        Email: { type: String },
                       
						
                    }
                }
            });

            // when parsing is done, export the data to Excel
            dataSource.read().then(function (data) {
                new shield.exp.OOXMLWorkbook({
                    author: "PrepBootstrap",
                    worksheets: [
                        {
                            name: "PrepBootstrap Table",
                            rows: [
                                {
                                    cells: [
										{
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Name"
                                        },
										{
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Phone"
                                        },
										{
                                            style: {
                                                bold: true
                                            },
                                            type: String,
                                            value: "Email"
                                        },
										
										
		
										
                                    ]
                                }
                            ].concat($.map(data, function(item) {
                                return {
                                    cells: [
                                                                         
										{ type: String, value: item.Name },
										{ type: String, value: item.Phone },
                                        { type: String, value: item.Email },
                                      

                                    ]
                                };
                            }))
                        }
                    ]
                }).saveAs({
                    fileName: "List of Participants"
                });
            });
        });
    });
	</script>
</body>
</html>